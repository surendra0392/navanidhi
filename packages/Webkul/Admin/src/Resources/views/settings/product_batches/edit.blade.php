<x-admin::layouts>
    <x-slot:title>
        Edit Product Batch #{{ $batch->batch_number }}
    </x-slot>

    <form method="POST" action="{{ route('admin.settings.product_batches.update', $batch->id) }}">
        @csrf
        @method('PUT')

        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-xl font-bold text-gray-800 dark:text-white">
                    Edit Product Batch
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Update batch status, dates, and quantity.
                </p>
            </div>

            <div class="flex items-center gap-x-2.5">
                <a href="{{ route('admin.settings.product_batches.index') }}" class="transparent-button hover:bg-gray-200 dark:hover:bg-gray-800">
                    Cancel
                </a>
                <button type="submit" class="primary-button">
                    Update Batch
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 space-y-6">
                <div class="p-6 bg-white dark:bg-gray-900 rounded-lg shadow-sm border border-gray-200 dark:border-gray-800 space-y-4">
                    <h3 class="text-base font-semibold text-gray-800 dark:text-white">Batch & Product Details</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase mb-1">
                                Batch Number <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                name="batch_number" 
                                required 
                                value="{{ old('batch_number', $batch->batch_number) }}"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 text-gray-800 dark:text-white text-sm"
                            >
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase mb-1">
                                Status <span class="text-red-500">*</span>
                            </label>
                            <select 
                                name="status" 
                                required 
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 text-gray-800 dark:text-white text-sm"
                            >
                                <option value="active" {{ $batch->status === 'active' ? 'selected' : '' }}>Active (Quality Passed)</option>
                                <option value="quarantined" {{ $batch->status === 'quarantined' ? 'selected' : '' }}>Quarantined (Pending Lab Test)</option>
                                <option value="expired" {{ $batch->status === 'expired' ? 'selected' : '' }}>Expired</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase mb-1">
                                Botanical Product <span class="text-red-500">*</span>
                            </label>
                            <select 
                                name="product_id" 
                                required 
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 text-gray-800 dark:text-white text-sm"
                            >
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" {{ $batch->product_id == $product->id ? 'selected' : '' }}>
                                        {{ $product->name }} ({{ $product->sku }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase mb-1">
                                Inventory Location <span class="text-red-500">*</span>
                            </label>
                            <select 
                                name="inventory_source_id" 
                                required 
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 text-gray-800 dark:text-white text-sm"
                            >
                                @foreach ($inventorySources as $source)
                                    <option value="{{ $source->id }}" {{ $batch->inventory_source_id == $source->id ? 'selected' : '' }}>
                                        {{ $source->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase mb-1">
                                Quantity <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="number" 
                                step="1" 
                                min="0" 
                                name="qty" 
                                required 
                                value="{{ old('qty', (int) $batch->qty) }}"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 text-gray-800 dark:text-white text-sm"
                            >
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase mb-1">
                                Manufacturing Date
                            </label>
                            <input 
                                type="date" 
                                name="manufacturing_date" 
                                value="{{ old('manufacturing_date', $batch->manufacturing_date) }}"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 text-gray-800 dark:text-white text-sm"
                            >
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase mb-1">
                                Expiry Date
                            </label>
                            <input 
                                type="date" 
                                name="expiry_date" 
                                value="{{ old('expiry_date', $batch->expiry_date) }}"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 text-gray-800 dark:text-white text-sm"
                            >
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase mb-1">
                            Unit Cost (Internal / Confidential)
                        </label>
                        <input 
                            type="number" 
                            step="0.01" 
                            min="0" 
                            name="unit_cost" 
                            value="{{ old('unit_cost', $batch->unit_cost) }}"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 text-gray-800 dark:text-white text-sm"
                        >
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="p-6 bg-white dark:bg-gray-900 rounded-lg shadow-sm border border-gray-200 dark:border-gray-800 space-y-3">
                    <h3 class="text-sm font-bold text-gray-800 dark:text-white uppercase tracking-wider">Batch Traceability</h3>
                    <p class="text-xs text-gray-600 dark:text-gray-400 leading-relaxed">
                        Registered on: {{ $batch->created_at ? $batch->created_at->format('d M Y, h:i A') : 'N/A' }}
                    </p>
                    <p class="text-xs text-gray-600 dark:text-gray-400 leading-relaxed">
                        Last Modified: {{ $batch->updated_at ? $batch->updated_at->format('d M Y, h:i A') : 'N/A' }}
                    </p>
                </div>
            </div>
        </div>
    </form>
</x-admin::layouts>
