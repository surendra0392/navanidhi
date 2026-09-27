<?php

namespace Webkul\Inventory\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Inventory\Contracts\InventoryAdjustmentItem as InventoryAdjustmentItemContract;
use Webkul\Product\Models\ProductProxy;

class InventoryAdjustmentItem extends Model implements InventoryAdjustmentItemContract
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function adjustment()
    {
        return $this->belongsTo(InventoryAdjustmentProxy::modelClass(), 'inventory_adjustment_id');
    }

    public function product()
    {
        return $this->belongsTo(ProductProxy::modelClass(), 'product_id');
    }
}
