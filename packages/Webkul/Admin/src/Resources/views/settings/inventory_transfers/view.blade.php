<x-admin::layouts>
    <x-slot:title>
        Transfer #{{ $transfer->reference_number }}
    </x-slot>

    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.settings.inventory_transfers.index') }}" class="text-gray-500 hover:text-gray-700 text-lg font-bold">
                &larr;
            </a>
            <div>
                <h2 class="text-xl font-bold text-gray-800 dark:text-white flex items-center gap-2">
                    Transfer #{{ $transfer->reference_number }}
                    @if ($transfer->status === 'completed')
                        <span class="badge badge-sm badge-success uppercase text-xs">Completed</span>
                    @elseif ($transfer->status === 'dispatched')
                        <span class="badge badge-sm badge-info uppercase text-xs">Dispatched</span>
                    @else
                        <span class="badge badge-sm badge-warning uppercase text-xs">Pending</span>
                    @endif
                </h2>
                <p class="text-xs text-gray-500">
                    Created on {{ $transfer->created_at->format('d M Y, h:i A') }}
                </p>
            </div>
        </div>

        <div class="flex items-center gap-x-2.5">
            @if ($transfer->status === 'pending')
                <form method="POST" action="{{ route('admin.settings.inventory_transfers.dispatch', $transfer->id) }}">
                    @csrf
                    <button type="submit" class="primary-button text-xs py-2 px-3 bg-blue-600 hover:bg-blue-700">
                        Dispatch Transfer (Deduct Origin Stock)
                    </button>
                </form>
            @elseif ($transfer->status === 'dispatched')
                <form method="POST" action="{{ route('admin.settings.inventory_transfers.receive', $transfer->id) }}">
                    @csrf
                    <button type="submit" class="primary-button text-xs py-2 px-3 bg-emerald-600 hover:bg-emerald-700">
                        Receive & Complete Transfer (Add Dest Stock)
                    </button>
                </form>
            @endif

            <a href="{{ route('admin.settings.inventory_ledger.index') }}" class="secondary-button text-xs py-2 px-3">
                View Stock Ledger
            </a>
            <a href="{{ route('admin.settings.inventory_transfers.index') }}" class="transparent-button text-xs py-2 px-3">
                Back to Transfers
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Line Items Table -->
        <div class="lg:col-span-2 space-y-6">
            <div class="p-6 bg-white dark:bg-gray-900 rounded-lg shadow-sm border border-gray-200 dark:border-gray-800 space-y-4">
                <h3 class="text-base font-semibold text-gray-800 dark:text-white">Transfer Line Items</h3>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead>
                            <tr class="border-b border-gray-200 dark:border-gray-700 text-xs uppercase text-gray-500">
                                <th class="py-2.5 px-3">Product</th>
                                <th class="py-2.5 px-3">SKU</th>
                                <th class="py-2.5 px-3 text-right">Requested</th>
                                <th class="py-2.5 px-3 text-right">Dispatched</th>
                                <th class="py-2.5 px-3 text-right">Received</th>
                                <th class="py-2.5 px-3">Batch</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transfer->items as $item)
                                <tr class="border-b border-gray-100 dark:border-gray-800">
                                    <td class="py-3 px-3 font-medium text-gray-800 dark:text-white">
                                        {{ $item->product ? $item->product->name : 'Product #' . $item->product_id }}
                                    </td>
                                    <td class="py-3 px-3 text-gray-500">
                                        {{ $item->product ? $item->product->sku : '—' }}
                                    </td>
                                    <td class="py-3 px-3 text-right font-medium text-gray-700 dark:text-gray-300">
                                        {{ (int) $item->qty_requested }}
                                    </td>
                                    <td class="py-3 px-3 text-right font-medium text-blue-600">
                                        {{ (int) $item->qty_dispatched }}
                                    </td>
                                    <td class="py-3 px-3 text-right font-bold text-emerald-600">
                                        {{ (int) $item->qty_received }}
                                    </td>
                                    <td class="py-3 px-3 text-gray-500 text-xs">
                                        {{ $item->batch_number ?: '—' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Routing & Timeline Card -->
        <div class="space-y-6">
            <div class="p-6 bg-white dark:bg-gray-900 rounded-lg shadow-sm border border-gray-200 dark:border-gray-800 space-y-4">
                <h3 class="text-sm font-bold text-gray-800 dark:text-white uppercase tracking-wider">Transfer Details</h3>
                
                <div class="space-y-3 text-xs">
                    <div>
                        <span class="text-gray-500 block">Source (Origin):</span>
                        <span class="font-semibold text-gray-800 dark:text-white text-sm">
                            {{ $transfer->source_location ? $transfer->source_location->name : 'N/A' }}
                        </span>
                    </div>

                    <div class="text-gray-400 font-bold">&darr; In Transit &darr;</div>

                    <div>
                        <span class="text-gray-500 block">Destination (Hub):</span>
                        <span class="font-semibold text-gray-800 dark:text-white text-sm">
                            {{ $transfer->destination_location ? $transfer->destination_location->name : 'N/A' }}
                        </span>
                    </div>

                    <hr class="border-gray-100 dark:border-gray-800">

                    <div class="flex justify-between py-1">
                        <span class="text-gray-500">Requested By:</span>
                        <span class="font-semibold text-gray-800 dark:text-white">{{ $transfer->requester ? $transfer->requester->name : 'Admin' }}</span>
                    </div>

                    <div class="flex justify-between py-1">
                        <span class="text-gray-500">Dispatched At:</span>
                        <span class="font-semibold text-gray-800 dark:text-white">
                            {{ $transfer->dispatched_at ? $transfer->dispatched_at->format('d M Y, h:i A') : '—' }}
                        </span>
                    </div>

                    <div class="flex justify-between py-1">
                        <span class="text-gray-500">Received At:</span>
                        <span class="font-semibold text-gray-800 dark:text-white">
                            {{ $transfer->received_at ? $transfer->received_at->format('d M Y, h:i A') : '—' }}
                        </span>
                    </div>

                    @if ($transfer->notes)
                        <div class="pt-2">
                            <span class="text-gray-500 block mb-1">Transit Notes:</span>
                            <p class="p-2 bg-gray-50 dark:bg-gray-800 rounded text-gray-700 dark:text-gray-300">
                                {{ $transfer->notes }}
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-admin::layouts>
