<?php

namespace Webkul\Admin\Http\Controllers\Settings;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Webkul\Admin\DataGrids\Settings\InventoryTransferDataGrid;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Inventory\Models\InventorySourceProxy;
use Webkul\Inventory\Models\InventoryTransferItemProxy;
use Webkul\Inventory\Models\InventoryTransferProxy;
use Webkul\Inventory\Services\InventoryLedgerService;

class InventoryTransferController extends Controller
{
    public function __construct(
        protected InventoryLedgerService $inventoryLedgerService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return app(InventoryTransferDataGrid::class)->toJson();
        }

        return view('admin::settings.inventory_transfers.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $inventorySources = InventorySourceProxy::modelClass()::where('status', 1)->get();

        $products = DB::table('products as p')
            ->join('product_flat as pf', function ($join) {
                $join->on('p.id', '=', 'pf.product_id')
                    ->where('pf.locale', app()->getLocale())
                    ->where('pf.channel', core()->getCurrentChannelCode());
            })
            ->whereIn('p.type', ['simple', 'virtual'])
            ->select('p.id', 'p.sku', 'pf.name')
            ->orderBy('pf.name')
            ->get();

        return view('admin::settings.inventory_transfers.create', compact('inventorySources', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'reference_number' => 'required|string|max:255|unique:inventory_transfers,reference_number',
            'source_location_id' => 'required|exists:inventory_sources,id',
            'destination_location_id' => 'required|exists:inventory_sources,id|different:source_location_id',
            'notes' => 'nullable|string',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.qty_requested' => 'required|numeric|min:1',
            'items.*.batch_number' => 'nullable|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            $transfer = InventoryTransferProxy::modelClass()::create([
                'reference_number' => $validated['reference_number'],
                'source_location_id' => $validated['source_location_id'],
                'destination_location_id' => $validated['destination_location_id'],
                'status' => 'pending',
                'requested_by' => auth()->guard('admin')->id(),
                'notes' => $validated['notes'] ?? null,
            ]);

            foreach ($validated['items'] as $itemData) {
                InventoryTransferItemProxy::modelClass()::create([
                    'inventory_transfer_id' => $transfer->id,
                    'product_id' => $itemData['product_id'],
                    'qty_requested' => $itemData['qty_requested'],
                    'qty_dispatched' => 0,
                    'qty_received' => 0,
                    'batch_number' => $itemData['batch_number'] ?? null,
                ]);
            }

            DB::commit();

            session()->flash('success', 'Inventory transfer created in Pending state.');

            return redirect()->route('admin.settings.inventory_transfers.index');
        } catch (\Exception $e) {
            DB::rollBack();

            session()->flash('error', 'Failed to create transfer: '.$e->getMessage());

            return redirect()->back()->withInput();
        }
    }

    /**
     * Show details of a transfer.
     */
    public function view($id)
    {
        $transfer = InventoryTransferProxy::modelClass()::with([
            'source_location',
            'destination_location',
            'requester',
            'approver',
            'items.product',
        ])->findOrFail($id);

        return view('admin::settings.inventory_transfers.view', compact('transfer'));
    }

    /**
     * Mark transfer as dispatched and log negative movement at source location.
     */
    public function dispatchTransfer($id)
    {
        $transfer = InventoryTransferProxy::modelClass()::with('items')->findOrFail($id);

        if ($transfer->status !== 'pending') {
            session()->flash('error', 'Only pending transfers can be dispatched.');

            return redirect()->back();
        }

        DB::beginTransaction();

        try {
            $transfer->update([
                'status' => 'dispatched',
                'dispatched_at' => now(),
                'approved_by' => auth()->guard('admin')->id(),
            ]);

            foreach ($transfer->items as $item) {
                $item->update([
                    'qty_dispatched' => $item->qty_requested,
                ]);

                $this->inventoryLedgerService->createMovement([
                    'product_id' => $item->product_id,
                    'inventory_source_id' => $transfer->source_location_id,
                    'quantity' => -$item->qty_requested,
                    'type' => 'transfer_out',
                    'reference_type' => 'transfer',
                    'reference_id' => $transfer->id,
                    'batch_number' => $item->batch_number,
                    'user_id' => auth()->guard('admin')->id(),
                    'reason' => 'Transfer dispatched to destination',
                    'notes' => "Transfer #{$transfer->reference_number}",
                ]);
            }

            DB::commit();

            session()->flash('success', 'Transfer marked as Dispatched. Source inventory updated.');

            return redirect()->route('admin.settings.inventory_transfers.view', $transfer->id);
        } catch (\Exception $e) {
            DB::rollBack();

            session()->flash('error', 'Failed to dispatch transfer: '.$e->getMessage());

            return redirect()->back();
        }
    }

    /**
     * Mark transfer as received/completed and log positive movement at destination location.
     */
    public function receiveTransfer($id)
    {
        $transfer = InventoryTransferProxy::modelClass()::with('items')->findOrFail($id);

        if ($transfer->status !== 'dispatched') {
            session()->flash('error', 'Only dispatched transfers can be received.');

            return redirect()->back();
        }

        DB::beginTransaction();

        try {
            $transfer->update([
                'status' => 'completed',
                'received_at' => now(),
            ]);

            foreach ($transfer->items as $item) {
                $item->update([
                    'qty_received' => $item->qty_dispatched,
                ]);

                $this->inventoryLedgerService->createMovement([
                    'product_id' => $item->product_id,
                    'inventory_source_id' => $transfer->destination_location_id,
                    'quantity' => $item->qty_dispatched,
                    'type' => 'transfer_in',
                    'reference_type' => 'transfer',
                    'reference_id' => $transfer->id,
                    'batch_number' => $item->batch_number,
                    'user_id' => auth()->guard('admin')->id(),
                    'reason' => 'Transfer received from source',
                    'notes' => "Transfer #{$transfer->reference_number}",
                ]);
            }

            DB::commit();

            session()->flash('success', 'Transfer marked as Completed. Destination inventory received.');

            return redirect()->route('admin.settings.inventory_transfers.view', $transfer->id);
        } catch (\Exception $e) {
            DB::rollBack();

            session()->flash('error', 'Failed to receive transfer: '.$e->getMessage());

            return redirect()->back();
        }
    }
}
