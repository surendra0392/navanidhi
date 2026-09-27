<?php

namespace Webkul\Inventory\Providers;

use Webkul\Core\Providers\CoreModuleServiceProvider;
use Webkul\Inventory\Models\InventoryAdjustment;
use Webkul\Inventory\Models\InventoryAdjustmentItem;
use Webkul\Inventory\Models\InventoryMovement;
use Webkul\Inventory\Models\InventorySource;
use Webkul\Inventory\Models\InventoryTransfer;
use Webkul\Inventory\Models\InventoryTransferItem;
use Webkul\Inventory\Models\ProductBatch;

class ModuleServiceProvider extends CoreModuleServiceProvider
{
    /**
     * Models.
     *
     * @var array
     */
    protected $models = [
        InventorySource::class,
        InventoryMovement::class,
        InventoryAdjustment::class,
        InventoryAdjustmentItem::class,
        InventoryTransfer::class,
        InventoryTransferItem::class,
        ProductBatch::class,
    ];
}
