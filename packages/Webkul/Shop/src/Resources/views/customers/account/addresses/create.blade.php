<x-shop::layouts.account>
    <!-- Page Title -->
    <x-slot:title>
        @lang('shop::app.customers.account.addresses.create.add-address') | Navanidhi Naturals
    </x-slot>

    <!-- Breadcrumbs -->
    @if ((core()->getConfigData('general.general.breadcrumbs.shop')))
        @section('breadcrumbs')
            <x-shop::breadcrumbs name="addresses.create" />
        @endSection
    @endif

    <x-shop::layouts.account.navigation />

    <!-- Main Card Container -->
    <div class="flex-1 w-full rounded-2xl border border-[#DCD3C3] bg-white p-6 sm:p-8 shadow-sm space-y-6">
        <div class="flex items-center justify-between border-b border-[#DCD3C3]/60 pb-4">
            <div class="flex items-center gap-3">
                <!-- Back Button -->
                <a
                    class="flex h-8 w-8 items-center justify-center rounded-lg border border-[#DCD3C3] text-[#111111] hover:bg-[#F7F5EE] transition-colors"
                    href="{{ route('shop.customers.account.addresses.index') }}"
                >
                    <span class="material-symbols-outlined text-base">arrow_back</span>
                </a>

                <div>
                    <div class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-[#EBF3EE] text-[#0F4D2E] text-[10px] font-bold tracking-wider uppercase">
                        <span class="material-symbols-outlined text-xs">add_location_alt</span>
                        <span>Address Book</span>
                    </div>
                    <h1 class="font-serif text-xl sm:text-2xl font-bold text-[#111111] mt-0.5">
                        @lang('shop::app.customers.account.addresses.create.add-address')
                    </h1>
                </div>
            </div>
        </div>

        <v-create-customer-address>
            <!-- Address Shimmer -->
            <x-shop::shimmer.form.control-group :count="6" />
        </v-create-customer-address>
    </div>

    @push('scripts')
        <script
            type="text/x-template"
            id="v-create-customer-address-template"
        >
            <div>
                <x-shop::form :action="route('shop.customers.account.addresses.store')">
                    {!! view_render_event('bagisto.shop.customers.account.addresses.create_form_controls.before') !!}

                    <div class="space-y-4">
                        <!-- Company Name -->
                        <x-shop::form.control-group>
                            <x-shop::form.control-group.label class="text-xs font-semibold uppercase tracking-wider text-[#111111]">
                                @lang('shop::app.customers.account.addresses.create.company-name') (Optional)
                            </x-shop::form.control-group.label>

                            <x-shop::form.control-group.control
                                type="text"
                                name="company_name"
                                :value="old('company_name')"
                                class="rounded-xl border border-[#DCD3C3] bg-white px-4 py-3 text-sm text-[#111111] focus:border-[#0F4D2E] focus:ring-1 focus:ring-[#0F4D2E] w-full"
                                :placeholder="trans('shop::app.customers.account.addresses.create.company-name')"
                            />

                            <x-shop::form.control-group.error control-name="company_name" />
                        </x-shop::form.control-group>

                        <!-- First & Last Name Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <!-- First Name -->
                            <x-shop::form.control-group>
                                <x-shop::form.control-group.label class="required text-xs font-semibold uppercase tracking-wider text-[#111111]">
                                    @lang('shop::app.customers.account.addresses.create.first-name')
                                </x-shop::form.control-group.label>

                                <x-shop::form.control-group.control
                                    type="text"
                                    name="first_name"
                                    rules="required"
                                    :value="old('first_name') ?? auth()->guard('customer')->user()->first_name"
                                    class="rounded-xl border border-[#DCD3C3] bg-white px-4 py-3 text-sm text-[#111111] focus:border-[#0F4D2E] focus:ring-1 focus:ring-[#0F4D2E] w-full"
                                    :placeholder="trans('shop::app.customers.account.addresses.create.first-name')"
                                />

                                <x-shop::form.control-group.error control-name="first_name" />
                            </x-shop::form.control-group>

                            <!-- Last Name -->
                            <x-shop::form.control-group>
                                <x-shop::form.control-group.label class="required text-xs font-semibold uppercase tracking-wider text-[#111111]">
                                    @lang('shop::app.customers.account.addresses.create.last-name')
                                </x-shop::form.control-group.label>

                                <x-shop::form.control-group.control
                                    type="text"
                                    name="last_name"
                                    rules="required"
                                    :value="old('last_name') ?? auth()->guard('customer')->user()->last_name"
                                    class="rounded-xl border border-[#DCD3C3] bg-white px-4 py-3 text-sm text-[#111111] focus:border-[#0F4D2E] focus:ring-1 focus:ring-[#0F4D2E] w-full"
                                    :placeholder="trans('shop::app.customers.account.addresses.create.last-name')"
                                />

                                <x-shop::form.control-group.error control-name="last_name" />
                            </x-shop::form.control-group>
                        </div>

                        <!-- Email & Phone Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <!-- Email -->
                            <x-shop::form.control-group>
                                <x-shop::form.control-group.label class="required text-xs font-semibold uppercase tracking-wider text-[#111111]">
                                    Email Address
                                </x-shop::form.control-group.label>

                                <x-shop::form.control-group.control
                                    type="email"
                                    name="email"
                                    rules="required|email"
                                    :value="old('email') ?? auth()->guard('customer')->user()->email"
                                    class="rounded-xl border border-[#DCD3C3] bg-white px-4 py-3 text-sm text-[#111111] focus:border-[#0F4D2E] focus:ring-1 focus:ring-[#0F4D2E] w-full"
                                    placeholder="email@example.com"
                                />

                                <x-shop::form.control-group.error control-name="email" />
                            </x-shop::form.control-group>

                            <!-- Phone -->
                            <x-shop::form.control-group>
                                <x-shop::form.control-group.label class="required text-xs font-semibold uppercase tracking-wider text-[#111111]">
                                    Phone Number
                                </x-shop::form.control-group.label>

                                <x-shop::form.control-group.control
                                    type="text"
                                    name="phone"
                                    rules="required|phone"
                                    :value="old('phone') ?? auth()->guard('customer')->user()->phone"
                                    class="rounded-xl border border-[#DCD3C3] bg-white px-4 py-3 text-sm text-[#111111] focus:border-[#0F4D2E] focus:ring-1 focus:ring-[#0F4D2E] w-full"
                                    placeholder="10-digit mobile number"
                                />

                                <x-shop::form.control-group.error control-name="phone" />
                            </x-shop::form.control-group>
                        </div>

                        <!-- Street Address Line 1 -->
                        <x-shop::form.control-group>
                            <x-shop::form.control-group.label class="required text-xs font-semibold uppercase tracking-wider text-[#111111]">
                                @lang('shop::app.customers.account.addresses.create.street-address')
                            </x-shop::form.control-group.label>

                            <x-shop::form.control-group.control
                                type="text"
                                name="address[0]"
                                rules="required"
                                :value="old('address[0]')"
                                class="rounded-xl border border-[#DCD3C3] bg-white px-4 py-3 text-sm text-[#111111] focus:border-[#0F4D2E] focus:ring-1 focus:ring-[#0F4D2E] w-full mb-2"
                                placeholder="House / Flat No., Building, Street Name"
                            />

                            <x-shop::form.control-group.error control-name="address[0]" />

                            <x-shop::form.control-group.control
                                type="text"
                                name="address[1]"
                                :value="old('address[1]')"
                                class="rounded-xl border border-[#DCD3C3] bg-white px-4 py-3 text-sm text-[#111111] focus:border-[#0F4D2E] focus:ring-1 focus:ring-[#0F4D2E] w-full"
                                placeholder="Apartment, Suite, Landmark (Optional)"
                            />
                        </x-shop::form.control-group>

                        <!-- Country & State Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <!-- Country -->
                            <x-shop::form.control-group>
                                <x-shop::form.control-group.label class="required text-xs font-semibold uppercase tracking-wider text-[#111111]">
                                    @lang('shop::app.customers.account.addresses.create.country')
                                </x-shop::form.control-group.label>

                                <x-shop::form.control-group.control
                                    type="select"
                                    name="country"
                                    rules="required"
                                    v-model="country"
                                    class="rounded-xl border border-[#DCD3C3] bg-white px-4 py-3 text-sm text-[#111111] focus:border-[#0F4D2E] focus:ring-1 focus:ring-[#0F4D2E] w-full"
                                >
                                    <option value="">Select Country</option>
                                    @foreach (core()->countries() as $country)
                                        <option value="{{ $country->code }}">
                                            {{ $country->name }}
                                        </option>
                                    @endforeach
                                </x-shop::form.control-group.control>

                                <x-shop::form.control-group.error control-name="country" />
                            </x-shop::form.control-group>

                            <!-- State -->
                            <x-shop::form.control-group>
                                <x-shop::form.control-group.label class="required text-xs font-semibold uppercase tracking-wider text-[#111111]">
                                    @lang('shop::app.customers.account.addresses.create.state')
                                </x-shop::form.control-group.label>

                                <template v-if="haveStates()">
                                    <x-shop::form.control-group.control
                                        type="select"
                                        name="state"
                                        rules="required"
                                        v-model="state"
                                        class="rounded-xl border border-[#DCD3C3] bg-white px-4 py-3 text-sm text-[#111111] focus:border-[#0F4D2E] focus:ring-1 focus:ring-[#0F4D2E] w-full"
                                    >
                                        <option value="">Select State</option>
                                        <option 
                                            v-for='(stateOption, index) in countryStates[country]'
                                            :value='stateOption.code'
                                        >
                                            @{{ stateOption.default_name }}
                                        </option>
                                    </x-shop::form.control-group.control>
                                </template>

                                <template v-else>
                                    <x-shop::form.control-group.control
                                        type="text"
                                        name="state"
                                        rules="required"
                                        v-model="state"
                                        class="rounded-xl border border-[#DCD3C3] bg-white px-4 py-3 text-sm text-[#111111] focus:border-[#0F4D2E] focus:ring-1 focus:ring-[#0F4D2E] w-full"
                                        placeholder="Enter State"
                                    />
                                </template>

                                <x-shop::form.control-group.error control-name="state" />
                            </x-shop::form.control-group>
                        </div>

                        <!-- City & Postcode Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <!-- City -->
                            <x-shop::form.control-group>
                                <x-shop::form.control-group.label class="required text-xs font-semibold uppercase tracking-wider text-[#111111]">
                                    @lang('shop::app.customers.account.addresses.create.city')
                                </x-shop::form.control-group.label>

                                <x-shop::form.control-group.control
                                    type="text"
                                    name="city"
                                    rules="required"
                                    :value="old('city')"
                                    class="rounded-xl border border-[#DCD3C3] bg-white px-4 py-3 text-sm text-[#111111] focus:border-[#0F4D2E] focus:ring-1 focus:ring-[#0F4D2E] w-full"
                                    :placeholder="trans('shop::app.customers.account.addresses.create.city')"
                                />

                                <x-shop::form.control-group.error control-name="city" />
                            </x-shop::form.control-group>

                            <!-- Postcode -->
                            <x-shop::form.control-group>
                                <x-shop::form.control-group.label class="required text-xs font-semibold uppercase tracking-wider text-[#111111]">
                                    @lang('shop::app.customers.account.addresses.create.postcode')
                                </x-shop::form.control-group.label>

                                <x-shop::form.control-group.control
                                    type="text"
                                    name="postcode"
                                    rules="required|numeric"
                                    :value="old('postcode')"
                                    class="rounded-xl border border-[#DCD3C3] bg-white px-4 py-3 text-sm text-[#111111] focus:border-[#0F4D2E] focus:ring-1 focus:ring-[#0F4D2E] w-full"
                                    placeholder="6-digit PIN code"
                                />

                                <x-shop::form.control-group.error control-name="postcode" />
                            </x-shop::form.control-group>
                        </div>

                        <!-- Set As Default -->
                        <div class="flex items-center gap-2 pt-1 text-xs text-[#666666]">
                            <input
                                type="checkbox"
                                name="default_address"
                                value="1"
                                id="default_address"
                                class="h-4 w-4 rounded border-[#DCD3C3] text-[#0F4D2E] focus:ring-[#0F4D2E] cursor-pointer"
                            >
                            <label for="default_address" class="cursor-pointer select-none font-semibold text-[#111111]">
                                @lang('shop::app.customers.account.addresses.create.set-as-default')
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-4 border-t border-[#DCD3C3]/60 flex items-center justify-end gap-3">
                            <a
                                href="{{ route('shop.customers.account.addresses.index') }}"
                                class="px-5 py-2.5 rounded-xl border border-[#DCD3C3] text-xs uppercase tracking-wider font-semibold text-[#111111] hover:bg-[#F7F5EE] transition-colors"
                            >
                                Cancel
                            </a>

                            <button
                                type="submit"
                                class="px-7 py-2.5 rounded-xl text-xs uppercase tracking-widest font-semibold inline-flex items-center gap-2 shadow-sm transition-all"
                                style="background-color: #0F4D2E !important; color: #FFFFFF !important;"
                            >
                                <span>@lang('shop::app.customers.account.addresses.create.save')</span>
                                <span class="material-symbols-outlined text-sm">check</span>
                            </button>
                        </div>
                    </div>

                    {!! view_render_event('bagisto.shop.customers.account.addresses.create_form_controls.after') !!}
                </x-shop::form>
            </div>
        </script>

        <script type="module">
            app.component('v-create-customer-address', {
                template: '#v-create-customer-address-template',

                data() {
                    return {
                        country: "{{ old('country') ?? 'IN' }}",
                        state: "{{ old('state') ?? 'TG' }}",
                        countryStates: @json(core()->groupedStatesByCountries()),
                    }
                },

                methods: {
                    haveStates() {
                        return !!this.countryStates[this.country]?.length;
                    },
                }
            });
        </script>
    @endpush
</x-shop::layouts.account>
