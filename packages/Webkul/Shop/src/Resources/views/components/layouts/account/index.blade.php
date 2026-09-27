<x-shop::layouts :has-header="true" :has-feature="false" :has-footer="true">
    <!-- Page Title -->
    <x-slot:title>
        {{ $title ?? 'Customer Account' }} | Navanidhi Naturals
    </x-slot>

    <div class="min-h-screen bg-transparent relative z-10">
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-10">
            <!-- Breadcrumbs -->
            <x-shop::layouts.account.breadcrumb />

            <!-- Main Account Layout (Sidebar + Content) -->
            <div class="flex flex-col lg:flex-row items-start gap-8 lg:gap-10">
                {{ $slot }}
            </div>
        </main>
    </div>
</x-shop::layouts>
