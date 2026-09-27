<x-admin::layouts>
    <x-slot:title>
        Create Stock Transfer
    </x-slot>

    <form method="POST" action="{{ route('admin.settings.inventory_transfers.store') }}">
        @csrf

        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-xl font-bold text-gray-800 dark:text-white">
                    Create Stock Transfer
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Initiate an inter-warehouse or plant-to-hub inventory shipment.
                </p>
            </div>

            <div class="flex items-center gap-x-2.5">
                <a href="{{ route('admin.settings.inventory_transfers.index') }}" class="transparent-button hover:bg-gray-200 dark:hover:bg-gray-800">
                    Cancel
                </a>
                <button type="submit" class="primary-button">
                    Create Transfer
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 space-y-6">
                <!-- Locations Card -->
                <div class="p-6 bg-white dark:bg-gray-900 rounded-lg shadow-sm border border-gray-200 dark:border-gray-800 space-y-4">
                    <h3 class="text-base font-semibold text-gray-800 dark:text-white">Transfer Routing</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase mb-1">
                                Reference Number <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                name="reference_number" 
                                required 
                                value="{{ old('reference_number', 'TRF-' . strtoupper(bin2hex(random_bytes(4)))) }}"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 text-gray-800 dark:text-white text-sm"
                            >
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase mb-1">
                                Notes / Transit Instructions
                            </label>
                            <input 
                                type="text" 
                                name="notes" 
                                placeholder="e.g., Temperature controlled transit"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 text-gray-800 dark:text-white text-sm"
                            >
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase mb-1">
                                Source Location (Origin) <span class="text-red-500">*</span>
                            </label>
                            <select 
                                name="source_location_id" 
                                required 
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 text-gray-800 dark:text-white text-sm"
                            >
                                @foreach ($inventorySources as $source)
                                    <option value="{{ $source->id }}">{{ $source->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase mb-1">
                                Destination Location (Hub) <span class="text-red-500">*</span>
                            </label>
                            <select 
                                name="destination_location_id" 
                                required 
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 text-gray-800 dark:text-white text-sm"
                            >
                                @foreach ($inventorySources as $source)
                                    <option value="{{ $source->id }}" {{ $loop->last ? 'selected' : '' }}>{{ $source->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Transfer Items Card -->
                <div class="p-6 bg-white dark:bg-gray-900 rounded-lg shadow-sm border border-gray-200 dark:border-gray-800 space-y-4">
                    <div class="flex items-center justify-between">
                        <h3 class="text-base font-semibold text-gray-800 dark:text-white">Items to Transfer</h3>
                        <button type="button" onclick="addTransferRow()" class="secondary-button text-xs py-1.5 px-3">
                            + Add Product
                        </button>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm" id="items-table">
                            <thead>
                                <tr class="border-b border-gray-200 dark:border-gray-700 text-xs uppercase text-gray-500">
                                    <th class="py-2.5 px-2">Product</th>
                                    <th class="py-2.5 px-2 w-32">Qty to Move</th>
                                    <th class="py-2.5 px-2 w-36">Batch No.</th>
                                    <th class="py-2.5 px-2 w-12"></th>
                                </tr>
                            </thead>
                            <tbody id="items-body">
                                <tr class="border-b border-gray-100 dark:border-gray-800 item-row">
                                    <td class="py-2 px-2">
                                        <select name="items[0][product_id]" required class="w-full px-2 py-1.5 border border-gray-300 dark:border-gray-700 rounded bg-white dark:bg-gray-800 text-xs">
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }} ({{ $product->sku }})</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="py-2 px-2">
                                        <input type="number" step="1" min="1" name="items[0][qty_requested]" required value="5" class="w-full px-2 py-1.5 border border-gray-300 dark:border-gray-700 rounded bg-white dark:bg-gray-800 text-xs">
                                    </td>
                                    <td class="py-2 px-2">
                                        <input type="text" name="items[0][batch_number]" placeholder="Optional" class="w-full px-2 py-1.5 border border-gray-300 dark:border-gray-700 rounded bg-white dark:bg-gray-800 text-xs">
                                    </td>
                                    <td class="py-2 px-2 text-center">
                                        <button type="button" onclick="removeRow(this)" class="text-red-500 hover:text-red-700 font-bold">&times;</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Right Col: Workflow Notice -->
            <div class="space-y-6">
                <div class="p-6 bg-white dark:bg-gray-900 rounded-lg shadow-sm border border-gray-200 dark:border-gray-800 space-y-3">
                    <h3 class="text-sm font-bold text-gray-800 dark:text-white uppercase tracking-wider">Transfer Lifecycle</h3>
                    <ol class="text-xs text-gray-600 dark:text-gray-400 space-y-2 list-decimal list-inside">
                        <li><strong>Pending:</strong> Transfer registered in draft state. No inventory is altered yet.</li>
                        <li><strong>Dispatch:</strong> Mark as dispatched upon physical truck loading. Source warehouse stock is deducted.</li>
                        <li><strong>Complete:</strong> Mark as received upon arrival and inspection. Destination warehouse stock is credited.</li>
                    </ol>
                </div>
            </div>
        </div>
    </form>

    <script>
        let rowIndex = 1;
        const productsOptions = `@foreach ($products as $product)<option value="{{ $product->id }}">{{ addslashes($product->name) }} ({{ $product->sku }})</option>@endforeach`;

        function addTransferRow() {
            const tbody = document.getElementById('items-body');
            const tr = document.createElement('tr');
            tr.className = 'border-b border-gray-100 dark:border-gray-800 item-row';
            tr.innerHTML = `
                <td class="py-2 px-2">
                    <select name="items[${rowIndex}][product_id]" required class="w-full px-2 py-1.5 border border-gray-300 dark:border-gray-700 rounded bg-white dark:bg-gray-800 text-xs">
                        ${productsOptions}
                    </select>
                </td>
                <td class="py-2 px-2">
                    <input type="number" step="1" min="1" name="items[${rowIndex}][qty_requested]" required value="1" class="w-full px-2 py-1.5 border border-gray-300 dark:border-gray-700 rounded bg-white dark:bg-gray-800 text-xs">
                </td>
                <td class="py-2 px-2">
                    <input type="text" name="items[${rowIndex}][batch_number]" placeholder="Optional" class="w-full px-2 py-1.5 border border-gray-300 dark:border-gray-700 rounded bg-white dark:bg-gray-800 text-xs">
                </td>
                <td class="py-2 px-2 text-center">
                    <button type="button" onclick="removeRow(this)" class="text-red-500 hover:text-red-700 font-bold">&times;</button>
                </td>
            `;
            tbody.appendChild(tr);
            rowIndex++;
        }

        function removeRow(btn) {
            const rows = document.querySelectorAll('.item-row');
            if (rows.length > 1) {
                btn.closest('tr').remove();
            } else {
                alert('At least one transfer item is required.');
            }
        }
    </script>
</x-admin::layouts>
