<?php

namespace Webkul\Admin\DataGrids\Customers;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Webkul\DataGrid\DataGrid;

class EnquiryDataGrid extends DataGrid
{
    /**
     * Prepare query builder.
     *
     * @return Builder
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('contact_enquiries')
            ->select(
                'id',
                'name',
                'email',
                'contact',
                'subject',
                'message',
                'status',
                'created_at'
            );

        $this->addFilter('id', 'id');
        $this->addFilter('name', 'name');
        $this->addFilter('email', 'email');
        $this->addFilter('subject', 'subject');
        $this->addFilter('status', 'status');

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
            'index' => 'name',
            'label' => 'Name',
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index' => 'email',
            'label' => 'Email',
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index' => 'contact',
            'label' => 'Phone / Contact',
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
            'filterable' => true,
            'closure' => function ($row) {
                return $row->contact ?: '—';
            },
        ]);

        $this->addColumn([
            'index' => 'subject',
            'label' => 'Subject / Looking For',
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
            'filterable' => true,
            'closure' => function ($row) {
                return $row->subject ?: 'General Inquiry';
            },
        ]);

        $this->addColumn([
            'index' => 'message',
            'label' => 'Enquiry Message',
            'type' => 'string',
            'searchable' => true,
            'sortable' => false,
            'filterable' => false,
            'closure' => function ($row) {
                return Str::limit(strip_tags($row->message), 75);
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
                if ($status === 'new') {
                    return '<span class="badge badge-sm badge-info">NEW</span>';
                } elseif ($status === 'in_progress') {
                    return '<span class="badge badge-sm badge-warning">IN PROGRESS</span>';
                } elseif ($status === 'resolved') {
                    return '<span class="badge badge-sm badge-success">RESOLVED</span>';
                } elseif ($status === 'closed') {
                    return '<span class="badge badge-sm badge-danger">CLOSED</span>';
                }

                return '<span class="badge badge-sm badge-info">'.strtoupper($row->status).'</span>';
            },
        ]);

        $this->addColumn([
            'index' => 'created_at',
            'label' => 'Received Date',
            'type' => 'datetime',
            'searchable' => false,
            'sortable' => true,
            'filterable' => true,
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
            'icon' => 'icon-view',
            'title' => 'View Enquiry',
            'method' => 'GET',
            'url' => function ($row) {
                return route('admin.customers.enquiries.view', $row->id);
            },
        ]);

        $this->addAction([
            'icon' => 'icon-delete',
            'title' => 'Delete Enquiry',
            'method' => 'DELETE',
            'url' => function ($row) {
                return route('admin.customers.enquiries.delete', $row->id);
            },
        ]);
    }
}
