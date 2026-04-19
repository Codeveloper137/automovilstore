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
            <div {{ $header->attributes->merge(['class' => '
                flex items-center justify-between gap-5
                border-b border-[rgba(226,232,240,0.6)]
                bg-white/95 backdrop-blur-sm
                px-7 py-5
                max-sm:px-4 max-sm:py-3
            ']) }}>
                {{ $header }}

                <button
                    type="button"
                    class="
                        flex h-8 w-8 flex-shrink-0 items-center justify-center
                        rounded-full text-[#9ca3af]
                        border border-[rgba(226,232,240,0.7)]
                        transition-all duration-200
                        hover:border-[rgba(99,102,241,0.35)]
                        hover:bg-[rgba(99,102,241,0.08)]
                        hover:text-[#6366f1]
                        hover:rotate-90
                    "
                    @click="toggle"
                    aria-label="Cerrar"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </template>
    @endisset

    @isset($content)
        <template v-slot:content>
            <div {{ $content->attributes->merge(['class' => 'bg-white px-7 py-6 max-sm:px-4 max-sm:py-5']) }}>
                {{ $content }}
            </div>
        </template>
    @endisset

    @isset($footer)
        <template v-slot:footer>
            <div {{ $footer->attributes->merge(['class' => '
                bg-[rgba(249,250,251,0.8)] backdrop-blur-sm
                border-t border-[rgba(226,232,240,0.6)]
                px-7 py-4
                max-sm:px-4 max-sm:py-3
            ']) }}>
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
            {{-- Trigger --}}
            <div @click="toggle">
                <slot name="toggle"></slot>
            </div>

            {{-- Overlay --}}
            <transition
                name="modal-overlay"
                enter-active-class="duration-300 ease-out"
                enter-from-class="opacity-0"
                enter-to-class="opacity-100"
                leave-active-class="duration-200 ease-in"
                leave-from-class="opacity-100"
                leave-to-class="opacity-0"
            >
                <div
                    class="fixed inset-0 z-[500] bg-black/40 backdrop-blur-[2px] transition-opacity"
                    v-show="isOpen"
                    @click="close"
                ></div>
            </transition>

            {{-- Panel --}}
            <transition
                name="modal-content"
                enter-active-class="duration-300 ease-out"
                enter-from-class="translate-y-4 opacity-0 scale-95"
                enter-to-class="translate-y-0 opacity-100 scale-100"
                leave-active-class="duration-200 ease-in"
                leave-from-class="translate-y-0 opacity-100 scale-100"
                leave-to-class="translate-y-4 opacity-0 scale-95"
            >
                <div
                    class="fixed inset-0 z-[501] transform overflow-y-auto transition"
                    v-show="isOpen"
                >
                    <div class="flex min-h-full items-end justify-center p-4 sm:items-center sm:p-0">
                        <div class="
                            relative z-[502]
                            w-full max-w-[595px]
                            overflow-hidden rounded-2xl
                            bg-white
                            shadow-[0_24px_64px_-12px_rgba(99,102,241,0.25),0_0_0_1px_rgba(226,232,240,0.6)]
                            max-md:w-[92%]
                            max-md:rounded-xl
                        ">
                            {{-- Acento decorativo superior --}}
                            <div class="absolute left-0 right-0 top-0 h-[3px] bg-gradient-to-r from-[#6366f1] to-[#22d3ee]"></div>

                            <slot name="header" :toggle="toggle" :isOpen="isOpen"></slot>
                            <slot name="content"></slot>
                            <slot name="footer"></slot>
                        </div>
                    </div>
                </div>
            </transition>
        </div>
    </script>

    <script type="module">
        app.component('v-modal', {
            template: '#v-modal-template',

            props: ['isActive'],

            data() {
                return {
                    isOpen: this.isActive,
                };
            },

            methods: {
                toggle() {
                    this.isOpen = !this.isOpen;
                    document.body.style.overflow = this.isOpen ? 'hidden' : 'auto';
                    this.$emit('toggle', { isActive: this.isOpen });
                },

                open() {
                    this.isOpen = true;
                    document.body.style.overflow = 'hidden';
                    this.$emit('open', { isActive: this.isOpen });
                },

                close() {
                    this.isOpen = false;
                    document.body.style.overflow = 'auto';
                    this.$emit('close', { isActive: this.isOpen });
                },
            },
        });
    </script>
@endPushOnce
