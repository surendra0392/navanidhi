<?php

namespace Webkul\Inventory\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Inventory\Contracts\InventoryTransferItem as InventoryTransferItemContract;
use Webkul\Product\Models\ProductProxy;

class InventoryTransferItem extends Model implements InventoryTransferItemContract
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function transfer()
    {
        return $this->belongsTo(InventoryTransferProxy::modelClass(), 'inventory_transfer_id');
    }

    public function product()
    {
        return $this->belongsTo(ProductProxy::modelClass(), 'product_id');
    }
}
