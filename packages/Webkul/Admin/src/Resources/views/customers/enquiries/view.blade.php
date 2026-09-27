<x-admin::layouts>
    <x-slot:title>
        Enquiry from {{ $enquiry->name }}
    </x-slot>

    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.customers.enquiries.index') }}" class="text-gray-500 hover:text-gray-700 text-lg font-bold">
                &larr;
            </a>
            <div>
                <h2 class="text-xl font-bold text-gray-800 dark:text-white flex items-center gap-2">
                    Enquiry #{{ $enquiry->id }}
                    @if ($enquiry->status === 'new')
                        <span class="badge badge-sm badge-info uppercase text-xs">New</span>
                    @elseif ($enquiry->status === 'in_progress')
                        <span class="badge badge-sm badge-warning uppercase text-xs">In Progress</span>
                    @elseif ($enquiry->status === 'resolved')
                        <span class="badge badge-sm badge-success uppercase text-xs">Resolved</span>
                    @else
                        <span class="badge badge-sm badge-danger uppercase text-xs">Closed</span>
                    @endif
                </h2>
                <p class="text-xs text-gray-500">
                    Received on {{ $enquiry->created_at->format('d M Y, h:i A') }}
                </p>
            </div>
        </div>

        <div class="flex items-center gap-x-2.5">
            <a href="mailto:{{ $enquiry->email }}?subject=Re:%20Navanidhi%20Naturals%20Enquiry%20%23{{ $enquiry->id }}" class="secondary-button text-xs py-2 px-3">
                Reply via Email
            </a>
            @if ($enquiry->contact)
                <a href="tel:{{ $enquiry->contact }}" class="secondary-button text-xs py-2 px-3">
                    Call Customer
                </a>
            @endif
            <a href="{{ route('admin.customers.enquiries.index') }}" class="transparent-button text-xs py-2 px-3">
                Back to Enquiries
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Message Card -->
        <div class="lg:col-span-2 space-y-6">
            <div class="p-6 bg-white dark:bg-gray-900 rounded-lg shadow-sm border border-gray-200 dark:border-gray-800 space-y-4">
                <div class="flex items-center justify-between gap-4 flex-wrap">
                    <h3 class="text-base font-semibold text-gray-800 dark:text-white">Customer Message</h3>
                    @if ($enquiry->subject)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800 dark:bg-emerald-900/50 dark:text-emerald-300 border border-emerald-300 dark:border-emerald-700">
                            Topic: {{ $enquiry->subject }}
                        </span>
                    @endif
                </div>
                
                <div class="p-4 bg-gray-50 dark:bg-gray-800 rounded-lg border border-gray-100 dark:border-gray-700 text-sm text-gray-800 dark:text-gray-200 whitespace-pre-wrap leading-relaxed">
                    {{ $enquiry->message }}
                </div>
            </div>

            <!-- Customer Details Card -->
            <div class="p-6 bg-white dark:bg-gray-900 rounded-lg shadow-sm border border-gray-200 dark:border-gray-800 space-y-4">
                <h3 class="text-base font-semibold text-gray-800 dark:text-white">Contact Information</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs">
                    <div>
                        <span class="text-gray-500 block">Sender Name:</span>
                        <span class="font-semibold text-gray-800 dark:text-white text-sm">{{ $enquiry->name }}</span>
                    </div>

                    <div>
                        <span class="text-gray-500 block">Email Address:</span>
                        <a href="mailto:{{ $enquiry->email }}" class="font-semibold text-emerald-700 dark:text-emerald-400 text-sm hover:underline">
                            {{ $enquiry->email }}
                        </a>
                    </div>

                    <div>
                        <span class="text-gray-500 block">Phone Number:</span>
                        <span class="font-semibold text-gray-800 dark:text-white text-sm">
                            {{ $enquiry->contact ?: 'Not provided' }}
                        </span>
                    </div>

                    <div>
                        <span class="text-gray-500 block">Sender IP Address:</span>
                        <span class="text-gray-600 dark:text-gray-300 font-mono text-sm">
                            {{ $enquiry->ip_address ?: 'Unknown' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Management & Internal Notes Card -->
        <div class="space-y-6">
            <form method="POST" action="{{ route('admin.customers.enquiries.update', $enquiry->id) }}">
                @csrf
                @method('PUT')

                <div class="p-6 bg-white dark:bg-gray-900 rounded-lg shadow-sm border border-gray-200 dark:border-gray-800 space-y-4">
                    <h3 class="text-sm font-bold text-gray-800 dark:text-white uppercase tracking-wider">Internal Handling</h3>

                    <div>
                        <label class="block text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase mb-1">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <select 
                            name="status" 
                            required 
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 text-gray-800 dark:text-white text-sm"
                        >
                            <option value="new" {{ $enquiry->status === 'new' ? 'selected' : '' }}>New (Awaiting Review)</option>
                            <option value="in_progress" {{ $enquiry->status === 'in_progress' ? 'selected' : '' }}>In Progress (Under Investigation)</option>
                            <option value="resolved" {{ $enquiry->status === 'resolved' ? 'selected' : '' }}>Resolved (Customer Answered)</option>
                            <option value="closed" {{ $enquiry->status === 'closed' ? 'selected' : '' }}>Closed</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase mb-1">
                            Internal Confidential Notes
                        </label>
                        <textarea 
                            name="internal_notes" 
                            rows="5" 
                            placeholder="Add internal resolution notes, agent follow-up details..."
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 text-gray-800 dark:text-white text-sm"
                        >{{ old('internal_notes', $enquiry->internal_notes) }}</textarea>
                        <p class="text-xs text-amber-600 dark:text-amber-400 mt-1 font-medium">
                            Internal notes are strictly confidential to back-office personnel and are never exposed to the customer.
                        </p>
                    </div>

                    <button type="submit" class="primary-button w-full justify-center">
                        Save Status & Notes
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin::layouts>
