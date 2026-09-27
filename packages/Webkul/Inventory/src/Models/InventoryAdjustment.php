<?php

namespace Webkul\Inventory\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Inventory\Contracts\InventoryAdjustment as InventoryAdjustmentContract;
use Webkul\User\Models\AdminProxy;

class InventoryAdjustment extends Model implements InventoryAdjustmentContract
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function inventory_source()
    {
        return $this->belongsTo(InventorySourceProxy::modelClass());
    }

    public function creator()
    {
        return $this->belongsTo(AdminProxy::modelClass(), 'created_by');
    }

    public function approver()
    {
        return $this->belongsTo(AdminProxy::modelClass(), 'approved_by');
    }

    public function items()
    {
        return $this->hasMany(InventoryAdjustmentItemProxy::modelClass(), 'inventory_adjustment_id');
    }
}
