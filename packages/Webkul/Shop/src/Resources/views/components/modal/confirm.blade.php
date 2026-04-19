<v-modal-confirm ref="confirmModal"></v-modal-confirm>

@pushOnce('scripts')
    <script
        type="text/x-template"
        id="v-modal-confirm-template"
    >
        <div>
            <transition
                tag="div"
                name="modal-overlay"
                enter-active-class="duration-300 ease-out"
                enter-from-class="opacity-0"
                enter-to-class="opacity-100"
                leave-active-class="duration-200 ease-in"
                leave-from-class="opacity-100"
                leave-to-class="opacity-0"
            >
                <!--
                    BUG FIX #4: z-index cambiado de z-20 (=20) a z-[1000].
                    El cart drawer usa z-index: 999, así que el overlay del
                    confirm modal debe ser >= 1000 para aparecer por encima.
                -->
                <div
                    class="fixed inset-0 z-[1000] bg-gray-500 bg-opacity-50 transition-opacity"
                    v-show="isOpen"
                ></div>
            </transition>

            <transition
                tag="div"
                name="modal-content"
                enter-active-class="duration-300 ease-out"
                enter-from-class="translate-y-4 opacity-0 md:translate-y-0 md:scale-95"
                enter-to-class="translate-y-0 opacity-100 md:scale-100"
                leave-active-class="duration-200 ease-in"
                leave-from-class="translate-y-0 opacity-100 md:scale-100"
                leave-to-class="translate-y-4 opacity-0 md:translate-y-0 md:scale-95"
            >
                <!--
                    BUG FIX #4: z-index cambiado de z-20 (=20) a z-[1000].
                    Mismo razonamiento — debe estar por encima del cart drawer.
                -->
                <div
                    class="fixed inset-0 z-[1000] transform overflow-y-auto transition"
                    v-show="isOpen"
                >
                    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                        <!--
                            BUG FIX #4: z-index del panel cambiado de z-[999] a z-[1001].
                            El panel del modal debe estar por encima de su propio overlay (1000).
                        -->
                        <div class="absolute left-1/2 top-1/2 z-[1001] w-full max-w-[475px] -translate-x-1/2 -translate-y-1/2 overflow-hidden rounded-xl bg-white p-5 max-md:w-[90%] max-sm:p-4">
                            <div class="flex gap-2.5">
                                <div>
                                    <span class="flex rounded-full border border-gray-300 p-2.5">
                                        <i class="icon-error text-3xl max-sm:text-xl"></i>
                                    </span>
                                </div>

                                <div>
                                    <div class="flex items-center justify-between gap-5 text-xl max-sm:text-lg">
                                        @{{ title }}
                                    </div>

                                    <div class="pb-5 pt-1.5 text-left text-sm text-gray-500">
                                        @{{ message }}
                                    </div>

                                    <div class="flex justify-end gap-2.5">
                                        <button
                                            type="button"
                                            class="secondary-button max-md:py-3 max-sm:px-6 max-sm:py-2.5"
                                            @click="disagree"
                                            :aria-label="options.btnDisagree"
                                        >
                                            @{{ options.btnDisagree }}
                                        </button>

                                        <button
                                            type="button"
                                            class="primary-button max-md:py-3 max-sm:px-6 max-sm:py-2.5"
                                            @click="agree"
                                            :aria-label="options.btnAgree"
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

            methods: {
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

                    document.body.style.overflow = 'hidden';

                    this.title = title;
                    this.message = message;
                    this.options = options;
                    this.agreeCallback = agree;
                    this.disagreeCallback = disagree;
                },

                disagree() {
                    this.isOpen = false;

                    // BUG FIX #4: Usar '' en lugar de 'auto' para no interferir
                    // con el overflow manejado por el cart drawer u otros componentes
                    document.body.style.overflow = '';

                    this.disagreeCallback();
                },

                agree() {
                    this.isOpen = false;

                    // BUG FIX #4: Usar '' en lugar de 'auto'
                    document.body.style.overflow = '';

                    this.agreeCallback();
                },

                registerGlobalEvents() {
                    this.$emitter.on('open-confirm-modal', this.open);
                },
            }
        });
    </script>
@endPushOnce
