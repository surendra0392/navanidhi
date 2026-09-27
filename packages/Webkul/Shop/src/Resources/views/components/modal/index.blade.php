@props([
    'isActive' => false,
])

<v-modal
    is-active="{{ $isActive }}"
    {{ $attributes }}
>
    @isset($toggle)
        <template v-slot:toggle>
            {{ $toggle }}
        </template>
    @endisset

    @isset($header)
        <template v-slot:header="{ toggle, isOpen }">
            <div {{ $header->attributes->merge(['class' => 'flex items-center justify-between gap-5 border-b border-white/10 p-6 max-sm:px-4 max-sm:py-3 text-white']) }}>
                {{ $header }}

                <span
                    class="icon-cancel cursor-pointer text-2xl text-current opacity-70 hover:opacity-100 transition-opacity"
                    @click="toggle"
                >
                </span>
            </div>
        </template>
    @endisset

    @isset($content)
        <template v-slot:content>
            <div {{ $content->attributes->merge(['class' => 'p-6 max-sm:p-5']) }}>
                {{ $content }}
            </div>
        </template>
    @endisset

    @isset($footer)
        <template v-slot:footer>
            <div {{ $footer->attributes->merge(['class' => 'p-6 max-sm:py-4 max-sm:px-4']) }}>
                {{ $footer }}
            </div>
        </template>
    @endisset
</v-modal>

@pushOnce('scripts')
    <script
        type="text/x-template"
        id="v-modal-template"
    >
        <div>
            <div @click="toggle">
                <slot name="toggle">
                </slot>
            </div>

            <teleport to="body">
                <transition
                    tag="div"
                    name="modal-overlay"
                    enter-active-class="transition-opacity duration-300 ease-out"
                    enter-from-class="opacity-0"
                    enter-to-class="opacity-100"
                    leave-active-class="transition-opacity duration-200 ease-in"
                    leave-from-class="opacity-100"
                    leave-to-class="opacity-0"
                >
                    <div
                        class="fixed inset-0"
                        style="position: fixed !important; inset: 0px !important; z-index: 99999 !important; background-color: rgba(13, 36, 22, 0.62) !important; backdrop-filter: blur(14px) !important; -webkit-backdrop-filter: blur(14px) !important;"
                        v-show="isOpen"
                        @click="close"
                    ></div>
                </transition>

                <transition
                    tag="div"
                    name="modal-content"
                    enter-active-class="transition-all duration-300 ease-out"
                    enter-from-class="translate-y-4 opacity-0 md:translate-y-0 md:scale-95"
                    enter-to-class="translate-y-0 opacity-100 md:scale-100"
                    leave-active-class="transition-all duration-200 ease-in"
                    leave-from-class="translate-y-0 opacity-100 md:scale-100"
                    leave-to-class="translate-y-4 opacity-0 md:translate-y-0 md:scale-95"
                >
                    <div
                        class="fixed inset-0 transform overflow-y-auto"
                        style="position: fixed !important; inset: 0px !important; z-index: 100000 !important; pointer-events: none;"
                        v-show="isOpen"
                    >
                        <div class="flex min-h-full items-end justify-center p-4 sm:items-center sm:p-0" style="pointer-events: none;">
                            <div
                                class="absolute left-1/2 top-1/2 w-full -translate-x-1/2 -translate-y-1/2 overflow-hidden rounded-2xl border border-white/15 max-md:w-[90%] shadow-2xl backdrop-blur-2xl bg-[rgba(4,26,14,0.98)] text-white"
                                style="pointer-events: auto; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7);"
                                :class="panelClass || 'max-w-[595px]'"
                            >
                                <!-- Header Slot-->
                                <slot
                                    name="header"
                                    :toggle="toggle"
                                    :close="close"
                                    :isOpen="isOpen"
                                >
                                </slot>

                                <!-- Content Slot-->
                                <slot name="content"></slot>

                                <!-- Footer Slot-->
                                <slot name="footer"></slot>
                            </div>
                        </div>
                    </div>
                </transition>
            </teleport>
        </div>
    </script>

    <script type="module">
        app.component('v-modal', {
            template: '#v-modal-template',

            props: ['isActive', 'panelClass'],

            data() {
                return {
                    isOpen: this.isActive,
                };
            },

            watch: {
                isActive(newVal) {
                    if (newVal) {
                        this.open();
                    } else {
                        this.close();
                    }
                }
            },

            mounted() {
                window.addEventListener('keydown', this.handleKeydown);
            },

            beforeUnmount() {
                window.removeEventListener('keydown', this.handleKeydown);

                if (this.isOpen) {
                    document.body.style.overflow = 'auto';
                    document.body.style.paddingRight = '';
                }
            },

            methods: {
                handleKeydown(e) {
                    if (e.key === 'Escape' && this.isOpen) {
                        this.close();
                    }
                },

                toggle() {
                    if (this.isOpen) {
                        this.close();
                    } else {
                        this.open();
                    }
                },

                open() {
                    this.isOpen = true;

                    const scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;

                    document.body.style.overflow = 'hidden';

                    document.body.style.paddingRight = `${scrollbarWidth}px`;

                    this.$emit('open', { isActive: true });
                    this.$emit('toggle', { isActive: true });
                },

                close() {
                    this.isOpen = false;

                    document.body.style.overflow = 'auto';

                    document.body.style.paddingRight = '';

                    this.$emit('close', { isActive: false });
                    this.$emit('toggle', { isActive: false });
                }
            }
        });
    </script>
@endPushOnce
