@push('styles')
<style>
    /*
     * FIX: Forzar el overlay y el panel del modal de login
     * por encima de ABSOLUTAMENTE todo el contenido del carrito.
     * Usamos selectores de alta especificidad para no depender
     * de la estructura interna del componente x-shop::modal.
     */
    .kv-login-portal {
        position: relative;
        z-index: 0; /* el botón vive en flujo normal del header */
    }

    /* Overlay backdrop del modal */
    .kv-login-portal ~ div[class*="fixed"],
    body > [class*="modal"],
    [data-v-checkout-login] [class*="fixed"] {
        z-index: 99999 !important;
    }

    /*
     * Selector directo al componente modal de Bagisto.
     * x-shop::modal genera un div con class="fixed inset-0 ..."
     * Nos aseguramos que siempre esté por encima.
     */
    #v-checkout-login-template .fixed,
    .v-checkout-login-wrapper .fixed {
        z-index: 99999 !important;
    }
</style>
@endpush

<!-- Checkout Login Vue JS Component -->
<div class="kv-login-portal v-checkout-login-wrapper">
    <v-checkout-login>
        <div class="flex items-center">
            <span class="cursor-pointer text-base font-medium text-blue-700">
                @lang('shop::app.checkout.login.title')
            </span>
        </div>
    </v-checkout-login>
</div>

@pushOnce('scripts')
    <script
        type="text/x-template"
        id="v-checkout-login-template"
    >
        <div class="v-checkout-login-wrapper">
            <div class="flex items-center">
                <span
                    class="cursor-pointer text-sm font-semibold text-[#6366f1] transition-colors hover:text-[#4f46e5]"
                    role="button"
                    @click="$refs.loginModel.open()"
                >
                    @lang('shop::app.checkout.login.title')
                </span>
            </div>

            <!-- Login Form -->
            <x-shop::form
                v-slot="{ meta, errors, handleSubmit }"
                as="div"
            >
                {!! view_render_event('bagisto.shop.checkout.login.before') !!}

                <form @submit="handleSubmit($event, login)">

                    {!! view_render_event('bagisto.shop.checkout.login.form_controls.before') !!}

                    <x-shop::modal ref="loginModel">
                        <!-- Modal Header -->
                        <x-slot:header>
                            <h2 class="text-2xl font-medium max-md:text-base">
                                @lang('shop::app.checkout.login.title')
                            </h2>
                        </x-slot>

                        <!-- Modal Content -->
                        <x-slot:content>
                            <x-shop::form.control-group>
                                <x-shop::form.control-group.label class="required">
                                    @lang('shop::app.checkout.login.email')
                                </x-shop::form.control-group.label>

                                <x-shop::form.control-group.control
                                    type="email"
                                    class="px-6 py-4"
                                    name="email"
                                    rules="required|email"
                                    :label="trans('shop::app.checkout.login.email')"
                                    placeholder="email@example.com"
                                    :aria-label="trans('shop::app.checkout.login.email')"
                                    aria-required="true"
                                />

                                <x-shop::form.control-group.error control-name="email" />
                            </x-shop::form.control-group>

                            <x-shop::form.control-group class="!mb-0">
                                <x-shop::form.control-group.label class="required">
                                    @lang('shop::app.checkout.login.password')
                                </x-shop::form.control-group.label>

                                <x-shop::form.control-group.control
                                    type="password"
                                    class="px-6 py-4"
                                    id="password"
                                    name="password"
                                    rules="required|min:6"
                                    :label="trans('shop::app.checkout.login.password')"
                                    :placeholder="trans('shop::app.checkout.login.password')"
                                    :aria-label="trans('shop::app.checkout.login.password')"
                                    aria-required="true"
                                />

                                <x-shop::form.control-group.error control-name="password" />
                            </x-shop::form.control-group>
                        </x-slot>

                        <!-- Modal Footer -->
                        <x-slot:footer>
                            <div class="flex flex-wrap items-center gap-4">
                                <x-shop::button
                                    class="primary-button max-w-none flex-auto rounded-2xl px-11 py-3 max-md:rounded-lg max-md:py-1.5"
                                    :title="trans('shop::app.checkout.login.title')"
                                    ::loading="isStoring"
                                    ::disabled="isStoring"
                                />
                            </div>
                        </x-slot>
                    </x-shop::modal>

                    {!! view_render_event('bagisto.shop.checkout.login.form_controls.after') !!}
                </form>

                {!! view_render_event('bagisto.shop.checkout.login.after') !!}
            </x-shop::form>
        </div>
    </script>

    <script type="module">
        app.component('v-checkout-login', {
            template: '#v-checkout-login-template',

            data() {
                return {
                    isStoring: false,
                }
            },

            methods: {
                login(params, { resetForm }) {
                    this.isStoring = true;

                    this.$axios.post("{{ route('shop.api.customers.session.create') }}", params)
                        .then((response) => {
                            this.isStoring = false;
                            window.location.reload();
                        })
                        .catch((error) => {
                            this.isStoring = false;

                            if (error.response.status == 422) {
                                setErrors(error.response.data.errors);
                                return;
                            }

                            this.$emitter.emit('add-flash', { type: 'error', message: error.response.data.message });
                        });
                },
            }
        })
    </script>
@endPushOnce
