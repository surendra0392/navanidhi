@props(['position' => 'left'])

<v-tabs
    position="{{ $position }}"
    {{ $attributes }}
>
    <x-shop::shimmer.tabs />
</v-tabs>

@pushOnce('scripts')
    <script
        type="text/x-template"
        id="v-tabs-template"
    >
        <div>
            <div
                class="flex flex-row justify-center gap-4 sm:gap-8 bg-[rgba(4,26,14,0.7)] backdrop-blur-xl border border-white/10 max-sm:gap-1.5 rounded-2xl p-1.5 shadow-xl"
                :style="positionStyles"
            >
                <div
                    role="button"
                    tabindex="0"
                    v-for="tab in tabs"
                    class="cursor-pointer px-6 py-3.5 text-sm sm:text-base font-serif font-semibold text-white/70 hover:text-white transition-all max-md:px-4 max-md:py-2.5 max-md:text-xs max-sm:px-2.5 max-sm:py-2 rounded-xl"
                    :class="{'!text-emerald-300 bg-emerald-500/20 border border-emerald-500/30 shadow-md': tab.isActive }"
                    :id="tab.$attrs.id + '-button'"
                    @click="change(tab)"
                >
                    @{{ tab.title }}
                </div>
            </div>

            <div>
                {{ $slot }}
            </div>
        </div>
    </script>

    <script type="module">
        app.component('v-tabs', {
            template: '#v-tabs-template',

            props: ['position'],

            data() {
                return {
                    tabs: []
                }
            },

            computed: {
                positionStyles() {
                    return [
                        `justify-content: ${this.position}`
                    ];
                },
            },

            methods: {
                change(selectedTab) {
                    this.tabs.forEach(tab => {
                        tab.isActive = (tab.title == selectedTab.title);
                    });
                },
            },
        });
    </script>
@endPushOnce
