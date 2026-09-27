<?php

namespace Webkul\Admin\DataGrids\Settings;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;

class ProductBatchDataGrid extends DataGrid
{
    /**
     * Prepare query builder.
     *
     * @return Builder
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('product_batches as pb')
            ->leftJoin('products as p', 'pb.product_id', '=', 'p.id')
            ->leftJoin('product_flat as pf', function ($join) {
                $join->on('p.id', '=', 'pf.product_id')
                    ->where('pf.locale', app()->getLocale())
                    ->where('pf.channel', core()->getCurrentChannelCode());
            })
            ->leftJoin('inventory_sources as isrc', 'pb.inventory_source_id', '=', 'isrc.id')
            ->select(
                'pb.id',
                'pb.batch_number',
                'pf.name as product_name',
                'p.sku',
                'isrc.name as location_name',
                'pb.qty',
                'pb.manufacturing_date',
                'pb.expiry_date',
                'pb.unit_cost',
                'pb.status',
                'pb.created_at'
            );

        $this->addFilter('id', 'pb.id');
        $this->addFilter('batch_number', 'pb.batch_number');
        $this->addFilter('product_name', 'pf.name');
        $this->addFilter('sku', 'p.sku');
        $this->addFilter('location_name', 'isrc.name');
        $this->addFilter('status', 'pb.status');

        return $queryBuilder;
    }

    /**
     * Prepare columns.
     *
     * @return void
     */
    public function prepareColumns()
    {
        $this->addColumn([
            'index' => 'id',
            'label' => trans('admin::app.datagrid.id'),
            'type' => 'integer',
            'searchable' => false,
            'sortable' => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index' => 'batch_number',
            'label' => 'Batch Number',
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index' => 'product_name',
            'label' => 'Product',
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index' => 'sku',
            'label' => 'SKU',
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index' => 'location_name',
            'label' => 'Location',
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index' => 'qty',
            'label' => 'Quantity',
            'type' => 'integer',
            'searchable' => false,
            'sortable' => true,
            'filterable' => true,
            'closure' => function ($row) {
                return (int) $row->qty;
            },
        ]);

        $this->addColumn([
            'index' => 'manufacturing_date',
            'label' => 'Mfg Date',
            'type' => 'date',
            'searchable' => false,
            'sortable' => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index' => 'expiry_date',
            'label' => 'Exp Date',
            'type' => 'date',
            'searchable' => false,
            'sortable' => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index' => 'unit_cost',
            'label' => 'Unit Cost',
            'type' => 'string',
            'searchable' => false,
            'sortable' => true,
            'filterable' => true,
            'closure' => function ($row) {
                return $row->unit_cost ? core()->formatBasePrice($row->unit_cost) : '—';
            },
        ]);

        $this->addColumn([
            'index' => 'status',
            'label' => 'Status',
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
            'filterable' => true,
            'closure' => function ($row) {
                $status = strtolower($row->status);
                if ($status === 'active') {
                    return '<span class="badge badge-sm badge-success">ACTIVE</span>';
                } elseif ($status === 'expired') {
                    return '<span class="badge badge-sm badge-danger">EXPIRED</span>';
                } elseif ($status === 'quarantined') {
                    return '<span class="badge badge-sm badge-warning">QUARANTINED</span>';
                }

                return '<span class="badge badge-sm badge-info">'.strtoupper($row->status).'</span>';
            },
        ]);
    }

    /**
     * Prepare actions.
     *
     * @return void
     */
    public function prepareActions()
    {
        $this->addAction([
            'icon' => 'icon-edit',
            'title' => 'Edit Batch',
            'method' => 'GET',
            'url' => function ($row) {
                return route('admin.settings.product_batches.edit', $row->id);
            },
        ]);

        $this->addAction([
            'icon' => 'icon-delete',
            'title' => 'Delete Batch',
            'method' => 'DELETE',
            'url' => function ($row) {
                return route('admin.settings.product_batches.delete', $row->id);
            },
        ]);
    }
}
