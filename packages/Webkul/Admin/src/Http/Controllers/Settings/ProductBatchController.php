<?php

namespace Webkul\Admin\Http\Controllers\Settings;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Webkul\Admin\DataGrids\Settings\ProductBatchDataGrid;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Inventory\Models\InventorySourceProxy;
use Webkul\Inventory\Models\ProductBatchProxy;

class ProductBatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return app(ProductBatchDataGrid::class)->toJson();
        }

        return view('admin::settings.product_batches.index');
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

        return view('admin::settings.product_batches.create', compact('inventorySources', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'batch_number' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
            'inventory_source_id' => 'required|exists:inventory_sources,id',
            'qty' => 'required|numeric|min:0',
            'manufacturing_date' => 'nullable|date',
            'expiry_date' => 'nullable|date|after_or_equal:manufacturing_date',
            'unit_cost' => 'nullable|numeric|min:0',
            'status' => 'required|string|in:active,expired,quarantined',
        ]);

        ProductBatchProxy::modelClass()::create($validated);

        session()->flash('success', 'Product batch registered successfully.');

        return redirect()->route('admin.settings.product_batches.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $batch = ProductBatchProxy::modelClass()::findOrFail($id);
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

        return view('admin::settings.product_batches.edit', compact('batch', 'inventorySources', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $batch = ProductBatchProxy::modelClass()::findOrFail($id);

        $validated = $request->validate([
            'batch_number' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
            'inventory_source_id' => 'required|exists:inventory_sources,id',
            'qty' => 'required|numeric|min:0',
            'manufacturing_date' => 'nullable|date',
            'expiry_date' => 'nullable|date|after_or_equal:manufacturing_date',
            'unit_cost' => 'nullable|numeric|min:0',
            'status' => 'required|string|in:active,expired,quarantined',
        ]);

        $batch->update($validated);

        session()->flash('success', 'Product batch updated successfully.');

        return redirect()->route('admin.settings.product_batches.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $batch = ProductBatchProxy::modelClass()::findOrFail($id);
        $batch->delete();

        return response()->json(['message' => 'Product batch deleted successfully.']);
    }
}
