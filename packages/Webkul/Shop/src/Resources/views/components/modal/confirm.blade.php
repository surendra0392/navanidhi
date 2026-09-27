<v-modal-confirm ref="confirmModal"></v-modal-confirm>

@pushOnce('scripts')
    <script
        type="text/x-template"
        id="v-modal-confirm-template"
    >
        <div>
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
                        @click="disagree"
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
                        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0" style="pointer-events: none;">
                            <div
                                class="absolute left-1/2 top-1/2 w-full max-w-[475px] -translate-x-1/2 -translate-y-1/2 overflow-hidden rounded-2xl border border-white/15 p-6 max-md:w-[90%] max-sm:p-5 shadow-2xl backdrop-blur-2xl text-white"
                                style="pointer-events: auto; background: rgba(4, 26, 14, 0.98); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7); color: #ffffff;"
                            >
                                <div class="flex gap-4">
                                    <div>
                                        <span class="flex rounded-full border border-red-500/30 bg-red-500/20 p-3 text-red-400">
                                            <i class="icon-error text-3xl max-sm:text-xl"></i>
                                        </span>
                                    </div>

                                    <div class="flex-1 text-left">
                                        <div class="flex items-center justify-between gap-5 font-serif text-xl font-bold text-white max-sm:text-lg">
                                            @{{ title }}
                                        </div>

                                        <div class="pb-5 pt-2 text-sm text-white/70 leading-relaxed">
                                            @{{ message }}
                                        </div>

                                        <div class="flex justify-end gap-3">
                                            <button
                                                type="button"
                                                class="px-5 py-2.5 rounded-xl border border-white/20 text-white/80 hover:text-white hover:bg-white/10 text-xs font-semibold uppercase tracking-wider transition-all cursor-pointer"
                                                @click="disagree"
                                            >
                                                @{{ options.btnDisagree }}
                                            </button>

                                            <button
                                                type="button"
                                                class="px-5 py-2.5 rounded-xl bg-rose-600 hover:bg-rose-500 text-white text-xs font-bold uppercase tracking-wider transition-all cursor-pointer shadow-lg shadow-rose-900/30"
                                                @click="agree"
                                            >
                                                @{{ options.btnAgree }} 
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </transition>
            </teleport>
        </div>
    </script>

    <script type="module">
        app.component('v-modal-confirm', {
            template: '#v-modal-confirm-template',

            data() {
                return {
                    isOpen: false,

                    title: '',

                    message: '',

                    options: {
                        btnDisagree: '',
                        btnAgree: '',
                    },

                    agreeCallback: null,

                    disagreeCallback: null,
                };
            },

            created() {
                this.registerGlobalEvents();
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
                        this.disagree();
                    }
                },

                open({
                    title = "@lang('shop::app.components.modal.confirm.title')",
                    message = "@lang('shop::app.components.modal.confirm.message')",
                    options = {
                        btnDisagree: "@lang('shop::app.components.modal.confirm.disagree-btn')",
                        btnAgree: "@lang('shop::app.components.modal.confirm.agree-btn')",
                    },
                    agree = () => {},
                    disagree = () => {},
                }) {
                    this.isOpen = true;

                    const scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;

                    document.body.style.overflow = 'hidden';

                    document.body.style.paddingRight = `${scrollbarWidth}px`;

                    this.title = title;

                    this.message = message;

                    this.options = options;

                    this.agreeCallback = agree;

                    this.disagreeCallback = disagree;
                },

                disagree() {
                    this.isOpen = false;

                    document.body.style.overflow = 'auto';

                    document.body.style.paddingRight = '';

                    this.disagreeCallback();
                },

                agree() {
                    this.isOpen = false;

                    document.body.style.overflow = 'auto';

                    document.body.style.paddingRight = '';

                    this.agreeCallback();
                },

                registerGlobalEvents() {
                    this.$emitter.on('open-confirm-modal', this.open);
                },
            }
        });
    </script>
@endPushOnce
