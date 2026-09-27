<x-admin::layouts>
    <x-slot:title>
        Customer Enquiries & Messages
    </x-slot>

    <div class="flex items-center justify-between mb-4">
        <div>
            <h2 class="text-xl font-bold text-gray-800 dark:text-white">
                Customer Enquiries
            </h2>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Inbound inquiries submitted from the storefront contact form and customer care portal.
            </p>
        </div>
    </div>

    <x-admin::datagrid :src="route('admin.customers.enquiries.index')" />

</x-admin::layouts>
