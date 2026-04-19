@props([
    'name'  => '',
    'value' => 1,
])
<v-quantity-changer
    {{ $attributes->merge(['class' => 'flex items-center']) }}
    name="{{ $name }}"
    value="{{ $value }}"
>
</v-quantity-changer>

@pushOnce('scripts')
    <script
        type="text/x-template"
        id="v-quantity-changer-template"
    >
        <div style="
            display: inline-flex;
            align-items: center;
            border: 1.5px solid rgba(99,102,241,0.35);
            border-radius: 0.65rem;
            background: rgba(255,255,255,0.92);
            box-shadow: 0 2px 8px -2px rgba(99,102,241,0.10);
            overflow: hidden;
            transition: border-color 0.2s;
        "
        @mouseenter="$el.style.borderColor='rgba(99,102,241,0.65)'"
        @mouseleave="$el.style.borderColor='rgba(99,102,241,0.35)'"
        >
            <span
                class="icon-minus cursor-pointer"
                role="button"
                tabindex="0"
                aria-label="@lang('shop::app.components.quantity-changer.decrease-quantity')"
                @click="decrease"
                style="
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    width: 2.4rem;
                    height: 2.4rem;
                    font-size: 1.1rem;
                    color: rgba(99,102,241,0.6);
                    transition: background 0.15s, color 0.15s;
                    cursor: pointer;
                "
                @mouseenter="$el.style.background='rgba(99,102,241,0.07)'; $el.style.color='#6366f1'"
                @mouseleave="$el.style.background='transparent'; $el.style.color='rgba(99,102,241,0.6)'"
            >
            </span>

            <p style="
                min-width: 2rem;
                text-align: center;
                font-size: 0.9rem;
                font-weight: 700;
                color: var(--foreground);
                user-select: none;
                padding: 0 0.25rem;
                border-left: 1px solid rgba(226,232,240,0.7);
                border-right: 1px solid rgba(226,232,240,0.7);
                line-height: 2.4rem;
            ">
                @{{ quantity }}
            </p>

            <span
                class="icon-plus cursor-pointer"
                role="button"
                tabindex="0"
                aria-label="@lang('shop::app.components.quantity-changer.increase-quantity')"
                @click="increase"
                style="
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    width: 2.4rem;
                    height: 2.4rem;
                    font-size: 1.1rem;
                    color: rgba(99,102,241,0.6);
                    transition: background 0.15s, color 0.15s;
                    cursor: pointer;
                "
                @mouseenter="$el.style.background='rgba(99,102,241,0.07)'; $el.style.color='#6366f1'"
                @mouseleave="$el.style.background='transparent'; $el.style.color='rgba(99,102,241,0.6)'"
            >
            </span>

            <v-field
                type="hidden"
                :name="name"
                v-model="quantity"
            ></v-field>
        </div>
    </script>

    <script type="module">
        app.component("v-quantity-changer", {
            template: '#v-quantity-changer-template',
            props: ['name', 'value'],
            data() {
                return {
                    quantity: this.value,
                }
            },
            watch: {
                value() {
                    this.quantity = this.value;
                },
            },
            methods: {
                increase() {
                    this.$emit('change', ++this.quantity);
                },
                decrease() {
                    if (this.quantity > 1) {
                        this.quantity -= 1;
                        this.$emit('change', this.quantity);
                    }
                },
            }
        });
    </script>
@endpushOnce
