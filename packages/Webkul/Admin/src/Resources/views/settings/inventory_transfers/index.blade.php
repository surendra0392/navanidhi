<x-admin::layouts>
    <x-slot:title>
        Inventory Transfers
    </x-slot>

    <div class="flex items-center justify-between mb-4">
        <div>
            <h2 class="text-xl font-bold text-gray-800 dark:text-white">
                Inventory Transfers
            </h2>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Move stock between warehouses, processing plants, and dispatch hubs.
            </p>
        </div>
        
        <div class="flex items-center gap-x-2.5">
            <a 
                href="{{ route('admin.settings.inventory_transfers.create') }}"
                class="primary-button"
            >
                New Transfer
            </a>
        </div>
    </div>

    <x-admin::datagrid :src="route('admin.settings.inventory_transfers.index')" />

</x-admin::layouts>
