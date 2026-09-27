<x-admin::layouts>
    <x-slot:title>
        Inventory Adjustments
    </x-slot>

    <div class="flex items-center justify-between mb-4">
        <div>
            <h2 class="text-xl font-bold text-gray-800 dark:text-white">
                Inventory Adjustments
            </h2>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Log physical counts, write-offs, and stock reconciliations with automatic ledger tracking.
            </p>
        </div>
        
        <div class="flex items-center gap-x-2.5">
            <a 
                href="{{ route('admin.settings.inventory_adjustments.create') }}"
                class="primary-button"
            >
                Create Adjustment
            </a>
        </div>
    </div>

    <x-admin::datagrid :src="route('admin.settings.inventory_adjustments.index')" />

</x-admin::layouts>
