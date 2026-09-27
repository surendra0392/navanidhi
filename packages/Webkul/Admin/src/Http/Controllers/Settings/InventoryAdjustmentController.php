<?php

namespace Webkul\Admin\Http\Controllers\Settings;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Webkul\Admin\DataGrids\Settings\InventoryAdjustmentDataGrid;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Inventory\Models\InventoryAdjustmentItemProxy;
use Webkul\Inventory\Models\InventoryAdjustmentProxy;
use Webkul\Inventory\Models\InventorySourceProxy;
use Webkul\Inventory\Services\InventoryLedgerService;
use Webkul\Product\Repositories\ProductInventoryRepository;

class InventoryAdjustmentController extends Controller
{
    public function __construct(
        protected InventoryLedgerService $inventoryLedgerService,
        protected ProductInventoryRepository $productInventoryRepository
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return app(InventoryAdjustmentDataGrid::class)->toJson();
        }

        return view('admin::settings.inventory_adjustments.index');
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

        return view('admin::settings.inventory_adjustments.create', compact('inventorySources', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'reference_number' => 'required|string|max:255|unique:inventory_adjustments,reference_number',
            'inventory_source_id' => 'required|exists:inventory_sources,id',
            'type' => 'required|string|in:increase,decrease,reconciliation',
            'notes' => 'nullable|string',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.actual_qty' => 'required|numeric|min:0',
            'items.*.reason' => 'nullable|string|max:255',
            'items.*.batch_number' => 'nullable|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            $adjustment = InventoryAdjustmentProxy::modelClass()::create([
                'reference_number' => $validated['reference_number'],
                'type' => $validated['type'],
                'inventory_source_id' => $validated['inventory_source_id'],
                'status' => 'completed',
                'created_by' => auth()->guard('admin')->id(),
                'approved_by' => auth()->guard('admin')->id(),
                'notes' => $validated['notes'] ?? null,
            ]);

            foreach ($validated['items'] as $itemData) {
                $productId = (int) $itemData['product_id'];
                $actualQty = (float) $itemData['actual_qty'];

                // Fetch current system stock
                $currentInv = $this->productInventoryRepository->findOneWhere([
                    'product_id' => $productId,
                    'inventory_source_id' => $validated['inventory_source_id'],
                    'vendor_id' => 0,
                ]);

                $systemQty = $currentInv ? (float) $currentInv->qty : 0.0;
                $adjustedQty = $actualQty - $systemQty;

                InventoryAdjustmentItemProxy::modelClass()::create([
                    'inventory_adjustment_id' => $adjustment->id,
                    'product_id' => $productId,
                    'system_qty' => $systemQty,
                    'actual_qty' => $actualQty,
                    'adjusted_qty' => $adjustedQty,
                    'batch_number' => $itemData['batch_number'] ?? null,
                    'reason' => $itemData['reason'] ?? 'Inventory Adjustment',
                ]);

                if ($adjustedQty != 0) {
                    $this->inventoryLedgerService->createMovement([
                        'product_id' => $productId,
                        'inventory_source_id' => (int) $validated['inventory_source_id'],
                        'quantity' => $adjustedQty,
                        'type' => 'adjustment',
                        'reference_type' => 'adjustment',
                        'reference_id' => $adjustment->id,
                        'batch_number' => $itemData['batch_number'] ?? null,
                        'user_id' => auth()->guard('admin')->id(),
                        'reason' => $itemData['reason'] ?? 'Manual Stock Adjustment',
                        'notes' => $validated['notes'] ?? "Stock adjusted from {$systemQty} to {$actualQty}",
                    ]);
                }
            }

            DB::commit();

            session()->flash('success', 'Inventory adjustment created and stock ledger updated successfully.');

            return redirect()->route('admin.settings.inventory_adjustments.index');
        } catch (\Exception $e) {
            DB::rollBack();

            session()->flash('error', 'Failed to record adjustment: '.$e->getMessage());

            return redirect()->back()->withInput();
        }
    }

    /**
     * Show the details of the adjustment.
     */
    public function view($id)
    {
        $adjustment = InventoryAdjustmentProxy::modelClass()::with([
            'inventory_source',
            'creator',
            'approver',
            'items.product',
        ])->findOrFail($id);

        return view('admin::settings.inventory_adjustments.view', compact('adjustment'));
    }
}
