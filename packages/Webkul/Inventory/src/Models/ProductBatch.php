<?php

namespace Webkul\Inventory\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Inventory\Contracts\ProductBatch as ProductBatchContract;
use Webkul\Product\Models\ProductProxy;

class ProductBatch extends Model implements ProductBatchContract
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function product()
    {
        return $this->belongsTo(ProductProxy::modelClass(), 'product_id');
    }

    public function inventory_source()
    {
        return $this->belongsTo(InventorySourceProxy::modelClass(), 'inventory_source_id');
    }
}
