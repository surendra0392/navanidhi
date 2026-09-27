<x-admin::layouts>
    <x-slot:title>
        Product Batches & Lot Tracking
    </x-slot>

    <div class="flex items-center justify-between mb-4">
        <div>
            <h2 class="text-xl font-bold text-gray-800 dark:text-white">
                Product Batches & Lot Numbers
            </h2>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Track manufacturing dates, expiry dates, batch unit costs, and quarantine statuses for all botanical lots.
            </p>
        </div>
        
        <div class="flex items-center gap-x-2.5">
            <a 
                href="{{ route('admin.settings.product_batches.create') }}"
                class="primary-button"
            >
                + Register New Batch
            </a>
        </div>
    </div>

    <x-admin::datagrid :src="route('admin.settings.product_batches.index')" />

</x-admin::layouts>
