<x-shop::layouts.account>
    <!-- Page Title -->
    <x-slot:title>
        @lang('shop::app.customers.account.profile.edit.edit-profile') | Navanidhi Naturals
    </x-slot>

    <!-- Breadcrumbs -->
    @if ((core()->getConfigData('general.general.breadcrumbs.shop')))
        @section('breadcrumbs')
            <x-shop::breadcrumbs name="profile.edit" />
        @endSection
    @endif

    <x-shop::layouts.account.navigation />

    <!-- Main Content Area -->
    <div class="flex-1 w-full rounded-3xl border border-[#0D5C3A]/15 bg-white p-6 sm:p-8 shadow-[0_8px_30px_-6px_rgba(13,92,58,0.06)] space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between border-b border-[#0D5C3A]/10 pb-4">
            <div class="flex items-center gap-3">
                <!-- Back Button -->
                <a
                    class="flex h-8 w-8 items-center justify-center rounded-xl border border-[#0D5C3A]/20 text-[#062E1A] hover:bg-[#0D5C3A]/5 transition-colors"
                    href="{{ route('shop.customers.account.profile.index') }}"
                >
                    <span class="material-symbols-outlined text-base">arrow_back</span>
                </a>

                <div>
                    <div class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-[#0D5C3A]/10 text-[#0D5C3A] text-[10px] font-bold tracking-wider uppercase border border-[#0D5C3A]/15">
                        <span class="material-symbols-outlined text-xs">edit</span>
                        <span>Settings</span>
                    </div>
                    <h1 class="font-serif text-xl sm:text-2xl font-extrabold text-[#062E1A] mt-1">
                        @lang('shop::app.customers.account.profile.edit.edit-profile')
                    </h1>
                </div>
            </div>
        </div>

        {!! view_render_event('bagisto.shop.customers.account.profile.edit.before', ['customer' => $customer]) !!}

        <!-- Profile Edit Form -->
        <x-shop::form
            :action="route('shop.customers.account.profile.update')"
            enctype="multipart/form-data"
        >
            {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.before', ['customer' => $customer]) !!}

            <div class="space-y-6">
                <!-- Profile Image -->
                <x-shop::form.control-group>
                    <x-shop::form.control-group.label class="text-xs font-semibold uppercase tracking-wider text-[#111111]">
                        Profile Photo
                    </x-shop::form.control-group.label>

                    <x-shop::form.control-group.control
                        type="image"
                        class="mb-0 rounded-xl !p-0 text-gray-700"
                        name="image[]"
                        :label="trans('Image')"
                        :is-multiple="false"
                        accepted-types="image/*"
                        :src="$customer->image_url"
                    />

                    <x-shop::form.control-group.error control-name="image[]" />
                </x-shop::form.control-group>

                <!-- First & Last Name Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- First Name -->
                    <x-shop::form.control-group>
                        <x-shop::form.control-group.label class="required text-xs font-semibold uppercase tracking-wider text-[#111111]">
                            @lang('shop::app.customers.account.profile.edit.first-name')
                        </x-shop::form.control-group.label>

                        <x-shop::form.control-group.control
                            type="text"
                            name="first_name"
                            rules="required"
                            class="rounded-xl border border-[#DCD3C3] bg-white px-4 py-3 text-sm text-[#111111] focus:border-[#0F4D2E] focus:ring-1 focus:ring-[#0F4D2E] w-full"
                            :value="old('first_name') ?? $customer->first_name"
                            :label="trans('shop::app.customers.account.profile.edit.first-name')"
                            :placeholder="trans('shop::app.customers.account.profile.edit.first-name')"
                        />

                        <x-shop::form.control-group.error control-name="first_name" />
                    </x-shop::form.control-group>

                    <!-- Last Name -->
                    <x-shop::form.control-group>
                        <x-shop::form.control-group.label class="required text-xs font-semibold uppercase tracking-wider text-[#111111]">
                            @lang('shop::app.customers.account.profile.edit.last-name')
                        </x-shop::form.control-group.label>

                        <x-shop::form.control-group.control
                            type="text"
                            name="last_name"
                            rules="required"
                            class="rounded-xl border border-[#DCD3C3] bg-white px-4 py-3 text-sm text-[#111111] focus:border-[#0F4D2E] focus:ring-1 focus:ring-[#0F4D2E] w-full"
                            :value="old('last_name') ?? $customer->last_name"
                            :label="trans('shop::app.customers.account.profile.edit.last-name')"
                            :placeholder="trans('shop::app.customers.account.profile.edit.last-name')"
                        />

                        <x-shop::form.control-group.error control-name="last_name" />
                    </x-shop::form.control-group>
                </div>

                <!-- Email & Phone Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Email -->
                    <x-shop::form.control-group>
                        <x-shop::form.control-group.label class="required text-xs font-semibold uppercase tracking-wider text-[#111111]">
                            @lang('shop::app.customers.account.profile.edit.email')
                        </x-shop::form.control-group.label>

                        <x-shop::form.control-group.control
                            type="email"
                            name="email"
                            rules="required|email"
                            class="rounded-xl border border-[#DCD3C3] bg-white px-4 py-3 text-sm text-[#111111] focus:border-[#0F4D2E] focus:ring-1 focus:ring-[#0F4D2E] w-full"
                            :value="old('email') ?? $customer->email"
                            :label="trans('shop::app.customers.account.profile.edit.email')"
                            :placeholder="trans('shop::app.customers.account.profile.edit.email')"
                        />

                        <x-shop::form.control-group.error control-name="email" />
                    </x-shop::form.control-group>

                    <!-- Phone -->
                    <x-shop::form.control-group>
                        <x-shop::form.control-group.label class="required text-xs font-semibold uppercase tracking-wider text-[#111111]">
                            @lang('shop::app.customers.account.profile.edit.phone')
                        </x-shop::form.control-group.label>

                        <x-shop::form.control-group.control
                            type="text"
                            name="phone"
                            rules="required|phone"
                            class="rounded-xl border border-[#DCD3C3] bg-white px-4 py-3 text-sm text-[#111111] focus:border-[#0F4D2E] focus:ring-1 focus:ring-[#0F4D2E] w-full"
                            :value="old('phone') ?? $customer->phone"
                            :label="trans('shop::app.customers.account.profile.edit.phone')"
                            placeholder="e.g. 9876543210"
                        />

                        <x-shop::form.control-group.error control-name="phone" />
                    </x-shop::form.control-group>
                </div>

                <!-- Gender & Date of Birth Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Gender -->
                    <x-shop::form.control-group>
                        <x-shop::form.control-group.label class="required text-xs font-semibold uppercase tracking-wider text-[#111111]">
                            @lang('shop::app.customers.account.profile.edit.gender')
                        </x-shop::form.control-group.label>

                        <x-shop::form.control-group.control
                            type="select"
                            name="gender"
                            rules="required"
                            class="rounded-xl border border-[#DCD3C3] bg-white px-4 py-3 text-sm text-[#111111] focus:border-[#0F4D2E] focus:ring-1 focus:ring-[#0F4D2E] w-full"
                            :value="old('gender') ?? $customer->gender"
                            :label="trans('shop::app.customers.account.profile.edit.gender')"
                        >
                            <option value="">Select Gender</option>
                            <option value="Male" {{ (old('gender') ?? $customer->gender) == 'Male' ? 'selected' : '' }}>
                                @lang('shop::app.customers.account.profile.edit.male')
                            </option>
                            <option value="Female" {{ (old('gender') ?? $customer->gender) == 'Female' ? 'selected' : '' }}>
                                @lang('shop::app.customers.account.profile.edit.female')
                            </option>
                            <option value="Other" {{ (old('gender') ?? $customer->gender) == 'Other' ? 'selected' : '' }}>
                                @lang('shop::app.customers.account.profile.edit.other')
                            </option>
                        </x-shop::form.control-group.control>

                        <x-shop::form.control-group.error control-name="gender" />
                    </x-shop::form.control-group>

                    <!-- Date of Birth -->
                    <x-shop::form.control-group>
                        <x-shop::form.control-group.label class="text-xs font-semibold uppercase tracking-wider text-[#111111]">
                            @lang('shop::app.customers.account.profile.edit.dob')
                        </x-shop::form.control-group.label>

                        <x-shop::form.control-group.control
                            type="date"
                            name="date_of_birth"
                            class="rounded-xl border border-[#DCD3C3] bg-white px-4 py-3 text-sm text-[#111111] focus:border-[#0F4D2E] focus:ring-1 focus:ring-[#0F4D2E] w-full"
                            :value="old('date_of_birth') ?? $customer->date_of_birth"
                            :label="trans('shop::app.customers.account.profile.edit.dob')"
                            placeholder="YYYY-MM-DD"
                        />

                        <x-shop::form.control-group.error control-name="date_of_birth" />
                    </x-shop::form.control-group>
                </div>

                <!-- Newsletter Subscription Preference -->
                <div class="p-4 rounded-xl border border-[#DCD3C3]/70 bg-[#F7F5EE]/50 flex items-start gap-3">
                    <input
                        type="checkbox"
                        name="subscribed_to_news_letter"
                        id="subscribed_to_news_letter"
                        value="1"
                        {{ (old('subscribed_to_news_letter') ?? $customer->subscribed_to_news_letter) ? 'checked' : '' }}
                        class="mt-0.5 h-4 w-4 rounded border-[#DCD3C3] text-[#0F4D2E] focus:ring-[#0F4D2E] cursor-pointer"
                    >
                    <label for="subscribed_to_news_letter" class="text-xs text-[#111111] cursor-pointer select-none leading-relaxed">
                        <span class="font-bold block text-[#0F4D2E]">Subscribe to Botanical Wellness Club</span>
                        <span>Receive seasonal crop harvest notifications, clean nutrition formulation guides, and botanical kitchen recipe cards.</span>
                    </label>
                </div>

                <!-- Change Password Accordion / Section -->
                <div class="pt-4 border-t border-[#DCD3C3]/60 space-y-4">
                    <div class="space-y-1">
                        <h2 class="font-serif text-base font-bold text-[#111111]">
                            Change Password (Optional)
                        </h2>
                        <p class="text-xs text-[#666666]">
                            Leave these fields blank if you do not wish to update your current password.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <!-- Current Password -->
                        <x-shop::form.control-group>
                            <x-shop::form.control-group.label class="text-xs font-semibold uppercase tracking-wider text-[#111111]">
                                @lang('shop::app.customers.account.profile.edit.current-password')
                            </x-shop::form.control-group.label>

                            <x-shop::form.control-group.control
                                type="password"
                                name="current_password"
                                rules="min:6"
                                class="rounded-xl border border-[#DCD3C3] bg-white px-4 py-3 text-sm text-[#111111] focus:border-[#0F4D2E] focus:ring-1 focus:ring-[#0F4D2E] w-full"
                                :label="trans('shop::app.customers.account.profile.edit.current-password')"
                                :placeholder="trans('shop::app.customers.account.profile.edit.current-password')"
                            />

                            <x-shop::form.control-group.error control-name="current_password" />
                        </x-shop::form.control-group>

                        <!-- New Password -->
                        <x-shop::form.control-group>
                            <x-shop::form.control-group.label class="text-xs font-semibold uppercase tracking-wider text-[#111111]">
                                @lang('shop::app.customers.account.profile.edit.new-password')
                            </x-shop::form.control-group.label>

                            <x-shop::form.control-group.control
                                type="password"
                                name="new_password"
                                rules="min:6"
                                class="rounded-xl border border-[#DCD3C3] bg-white px-4 py-3 text-sm text-[#111111] focus:border-[#0F4D2E] focus:ring-1 focus:ring-[#0F4D2E] w-full"
                                :label="trans('shop::app.customers.account.profile.edit.new-password')"
                                :placeholder="trans('shop::app.customers.account.profile.edit.new-password')"
                                ref="new_password"
                            />

                            <x-shop::form.control-group.error control-name="new_password" />
                        </x-shop::form.control-group>

                        <!-- Confirm New Password -->
                        <x-shop::form.control-group>
                            <x-shop::form.control-group.label class="text-xs font-semibold uppercase tracking-wider text-[#111111]">
                                @lang('shop::app.customers.account.profile.edit.confirm-password')
                            </x-shop::form.control-group.label>

                            <x-shop::form.control-group.control
                                type="password"
                                name="new_password_confirmation"
                                rules="confirmed:@new_password"
                                class="rounded-xl border border-[#DCD3C3] bg-white px-4 py-3 text-sm text-[#111111] focus:border-[#0F4D2E] focus:ring-1 focus:ring-[#0F4D2E] w-full"
                                :label="trans('shop::app.customers.account.profile.edit.confirm-password')"
                                :placeholder="trans('shop::app.customers.account.profile.edit.confirm-password')"
                            />

                            <x-shop::form.control-group.error control-name="new_password_confirmation" />
                        </x-shop::form.control-group>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-4 border-t border-[#0D5C3A]/10 flex items-center justify-end gap-3">
                    <a
                        href="{{ route('shop.customers.account.profile.index') }}"
                        class="btn-emerald-outline !px-6 !py-2.5 text-xs uppercase tracking-wider font-bold inline-flex items-center"
                    >
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="btn-emerald-primary !px-7 !py-2.5 text-xs uppercase tracking-widest font-bold inline-flex items-center gap-2 shadow-sm cursor-pointer"
                    >
                        <span>@lang('shop::app.customers.account.profile.edit.save')</span>
                        <span class="material-symbols-outlined text-sm">check</span>
                    </button>
                </div>
            </div>

            {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.after', ['customer' => $customer]) !!}
        </x-shop::form>

        {!! view_render_event('bagisto.shop.customers.account.profile.edit.after', ['customer' => $customer]) !!}
    </div>
</x-shop::layouts.account>
