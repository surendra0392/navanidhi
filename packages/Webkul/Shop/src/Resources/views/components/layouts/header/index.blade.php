{!! view_render_event('bagisto.shop.layout.header.before') !!}

<!-- Desktop Topbar Ribbon -->
<div class="max-lg:hidden relative z-50" style="position: relative; z-index: 50 !important;">
    <x-shop::layouts.header.desktop.top />
</div>

<!-- Main Sticky Header -->
<header 
    class="sticky top-0 z-40 glass-header shadow-[0_4px_25px_rgba(13,92,58,0.06)] transition-all duration-300"
>
    <v-header-switcher>
        <!-- Desktop Header Shimmer -->
        <div class="flex flex-wrap max-lg:hidden">
            <div class="site-container flex w-full items-center justify-between min-h-[92px] py-4">
                <!-- Left: Logo Shimmer -->
                <div class="flex items-center gap-3.5">
                    <span class="w-12 h-12 rounded-xl bg-emerald-900/10 shimmer"></span>
                    <div class="flex flex-col gap-1.5">
                        <span class="w-36 h-6 rounded bg-emerald-900/10 shimmer"></span>
                        <span class="w-20 h-3 rounded bg-emerald-900/5 shimmer"></span>
                    </div>
                </div>

                <!-- Center Navigation Shimmer -->
                <div class="flex items-center gap-7">
                    <span class="w-16 h-4 rounded bg-emerald-900/5 shimmer"></span>
                    <span class="w-20 h-4 rounded bg-emerald-900/5 shimmer"></span>
                    <span class="w-16 h-4 rounded bg-emerald-900/5 shimmer"></span>
                    <span class="w-24 h-4 rounded bg-emerald-900/5 shimmer"></span>
                </div>

                <!-- Right Utility Icons Shimmer -->
                <div class="flex items-center gap-4">
                    <span class="w-9 h-9 rounded-full bg-emerald-900/5 shimmer"></span>
                    <span class="w-9 h-9 rounded-full bg-emerald-900/5 shimmer"></span>
                    <span class="w-9 h-9 rounded-full bg-emerald-900/5 shimmer"></span>
                </div>
            </div>
        </div>

        <!-- Mobile Header Shimmer -->
        <div class="flex flex-wrap gap-4 px-4 shadow-sm lg:hidden bg-white/95" style="min-height: 74px; padding-top: 14px; padding-bottom: 14px;">
            <div class="flex w-full items-center justify-between">
                <div class="flex items-center gap-3">
                    <span class="w-9 h-9 rounded-lg bg-emerald-900/10 shimmer"></span>
                    <span class="w-28 h-5 rounded bg-emerald-900/10 shimmer"></span>
                </div>
                <div class="flex items-center gap-3">
                    <span class="w-6 h-6 rounded bg-emerald-900/10 shimmer"></span>
                    <span class="w-6 h-6 rounded bg-emerald-900/10 shimmer"></span>
                </div>
            </div>
        </div>
    </v-header-switcher>
</header>

{!! view_render_event('bagisto.shop.layout.header.after') !!}

@pushOnce('scripts')
    <script 
        type="text/x-template" 
        id="v-header-switcher-template"
    >
        <v-desktop-header v-if="isDesktop"></v-desktop-header>
        <v-mobile-header v-else></v-mobile-header>
    </script>

    <script type="module">
        app.component('v-header-switcher', {
            template: '#v-header-switcher-template',

            data() {
                return {
                    isDesktop: window.innerWidth >= 1024
                };
            },

            mounted() {
                this.media = window.matchMedia('(min-width: 1024px)');
                this.media.addEventListener('change', this.handleMedia);
            },

            beforeUnmount() {
                this.media.removeEventListener('change', this.handleMedia);
            },

            methods: {
                handleMedia(e) {
                    this.isDesktop = e.matches;
                }
            }
        });

        app.component('v-desktop-header', {
            template: '#v-desktop-header-template'
        });

        app.component('v-mobile-header', {
            template: '#v-mobile-header-template',

            data() {
                return {
                    isSearchOpen: false,
                };
            },

            mounted() {
                this.escapeHandler = (e) => {
                    if (e.key === 'Escape' && this.isSearchOpen) {
                        this.closeSearch();
                    }
                };

                window.addEventListener('keydown', this.escapeHandler);
            },

            beforeUnmount() {
                window.removeEventListener('keydown', this.escapeHandler);
            },

            methods: {
                toggleSearch() {
                    this.isSearchOpen = !this.isSearchOpen;

                    if (this.isSearchOpen) {
                        this.$nextTick(() => {
                            const input = document.getElementById('mobile-search-navanidhi');
                            if (input) {
                                input.focus();
                            }
                        });
                    }
                },

                closeSearch() {
                    this.isSearchOpen = false;
                }
            }
        });
    </script>

    <script 
        type="text/x-template" 
        id="v-desktop-header-template"
    >
        <x-shop::layouts.header.desktop />
    </script>

    <script 
        type="text/x-template" 
        id="v-mobile-header-template"
    >
        <x-shop::layouts.header.mobile />
    </script>
@endPushOnce
