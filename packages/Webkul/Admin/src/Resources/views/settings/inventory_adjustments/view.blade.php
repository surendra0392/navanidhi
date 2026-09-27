<x-admin::layouts>
    <x-slot:title>
        Adjustment #{{ $adjustment->reference_number }}
    </x-slot>

    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.settings.inventory_adjustments.index') }}" class="text-gray-500 hover:text-gray-700 text-lg font-bold">
                &larr;
            </a>
            <div>
                <h2 class="text-xl font-bold text-gray-800 dark:text-white flex items-center gap-2">
                    Adjustment #{{ $adjustment->reference_number }}
                    <span class="badge badge-sm badge-success uppercase text-xs">
                        {{ $adjustment->status }}
                    </span>
                </h2>
                <p class="text-xs text-gray-500">
                    Recorded on {{ $adjustment->created_at->format('d M Y, h:i A') }}
                </p>
            </div>
        </div>

        <div class="flex items-center gap-x-2.5">
            <a href="{{ route('admin.settings.inventory_ledger.index') }}" class="secondary-button text-xs py-2 px-3">
                View Stock Ledger
            </a>
            <a href="{{ route('admin.settings.inventory_adjustments.index') }}" class="primary-button text-xs py-2 px-3">
                Back to Adjustments
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Line Items Table -->
        <div class="lg:col-span-2 space-y-6">
            <div class="p-6 bg-white dark:bg-gray-900 rounded-lg shadow-sm border border-gray-200 dark:border-gray-800 space-y-4">
                <h3 class="text-base font-semibold text-gray-800 dark:text-white">Adjusted Items</h3>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead>
                            <tr class="border-b border-gray-200 dark:border-gray-700 text-xs uppercase text-gray-500">
                                <th class="py-2.5 px-3">Product</th>
                                <th class="py-2.5 px-3">SKU</th>
                                <th class="py-2.5 px-3 text-right">System Qty</th>
                                <th class="py-2.5 px-3 text-right">Actual Qty</th>
                                <th class="py-2.5 px-3 text-right">Difference</th>
                                <th class="py-2.5 px-3">Batch</th>
                                <th class="py-2.5 px-3">Reason</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($adjustment->items as $item)
                                <tr class="border-b border-gray-100 dark:border-gray-800">
                                    <td class="py-3 px-3 font-medium text-gray-800 dark:text-white">
                                        {{ $item->product ? $item->product->name : 'Product #' . $item->product_id }}
                                    </td>
                                    <td class="py-3 px-3 text-gray-500">
                                        {{ $item->product ? $item->product->sku : '—' }}
                                    </td>
                                    <td class="py-3 px-3 text-right text-gray-600 dark:text-gray-300">
                                        {{ (int) $item->system_qty }}
                                    </td>
                                    <td class="py-3 px-3 text-right font-bold text-gray-800 dark:text-white">
                                        {{ (int) $item->actual_qty }}
                                    </td>
                                    <td class="py-3 px-3 text-right font-semibold">
                                        @if ($item->adjusted_qty > 0)
                                            <span class="text-emerald-600">+{{ (int) $item->adjusted_qty }}</span>
                                        @elseif ($item->adjusted_qty < 0)
                                            <span class="text-rose-600">{{ (int) $item->adjusted_qty }}</span>
                                        @else
                                            <span class="text-gray-400">0</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-3 text-gray-500 text-xs">
                                        {{ $item->batch_number ?: '—' }}
                                    </td>
                                    <td class="py-3 px-3 text-gray-600 dark:text-gray-300 text-xs">
                                        {{ $item->reason }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Sidebar Summary -->
        <div class="space-y-6">
            <div class="p-6 bg-white dark:bg-gray-900 rounded-lg shadow-sm border border-gray-200 dark:border-gray-800 space-y-4">
                <h3 class="text-sm font-bold text-gray-800 dark:text-white uppercase tracking-wider">Adjustment Summary</h3>
                
                <div class="space-y-2 text-xs">
                    <div class="flex justify-between py-1 border-b border-gray-100 dark:border-gray-800">
                        <span class="text-gray-500">Location:</span>
                        <span class="font-semibold text-gray-800 dark:text-white">{{ $adjustment->inventory_source ? $adjustment->inventory_source->name : 'N/A' }}</span>
                    </div>
                    <div class="flex justify-between py-1 border-b border-gray-100 dark:border-gray-800">
                        <span class="text-gray-500">Type:</span>
                        <span class="font-semibold text-gray-800 dark:text-white uppercase">{{ $adjustment->type }}</span>
                    </div>
                    <div class="flex justify-between py-1 border-b border-gray-100 dark:border-gray-800">
                        <span class="text-gray-500">Recorded By:</span>
                        <span class="font-semibold text-gray-800 dark:text-white">{{ $adjustment->creator ? $adjustment->creator->name : 'Admin' }}</span>
                    </div>
                    <div class="flex justify-between py-1 border-b border-gray-100 dark:border-gray-800">
                        <span class="text-gray-500">Approved By:</span>
                        <span class="font-semibold text-gray-800 dark:text-white">{{ $adjustment->approver ? $adjustment->approver->name : 'Admin' }}</span>
                    </div>
                    @if ($adjustment->notes)
                        <div class="pt-2">
                            <span class="text-gray-500 block mb-1">Remarks:</span>
                            <p class="p-2 bg-gray-50 dark:bg-gray-800 rounded text-gray-700 dark:text-gray-300">
                                {{ $adjustment->notes }}
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-admin::layouts>
