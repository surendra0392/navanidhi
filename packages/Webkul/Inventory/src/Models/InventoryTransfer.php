<?php

namespace Webkul\Inventory\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Inventory\Contracts\InventoryTransfer as InventoryTransferContract;
use Webkul\User\Models\AdminProxy;

class InventoryTransfer extends Model implements InventoryTransferContract
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function source_location()
    {
        return $this->belongsTo(InventorySourceProxy::modelClass(), 'source_location_id');
    }

    public function destination_location()
    {
        return $this->belongsTo(InventorySourceProxy::modelClass(), 'destination_location_id');
    }

    public function requester()
    {
        return $this->belongsTo(AdminProxy::modelClass(), 'requested_by');
    }

    public function approver()
    {
        return $this->belongsTo(AdminProxy::modelClass(), 'approved_by');
    }

    public function items()
    {
        return $this->hasMany(InventoryTransferItemProxy::modelClass(), 'inventory_transfer_id');
    }
}
