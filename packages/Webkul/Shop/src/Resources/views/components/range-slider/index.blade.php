<v-range-slider {{ $attributes }}></v-range-slider>

@push('styles')
<style>
    /* ── Track & thumb con colores KillaVibes ── */
    .kv-range-track {
        position: relative;
        height: 4px;
        width: 100%;
        border-radius: 9999px;
        background: rgba(226,232,240,0.9);
    }

    .kv-range-progress {
        position: absolute;
        height: 100%;
        border-radius: 9999px;
        background: linear-gradient(90deg, #6366f1, #22d3ee);
    }

    .kv-range-input {
        pointer-events: none;
        position: absolute;
        height: 4px;
        width: 100%;
        cursor: pointer;
        appearance: none;
        -webkit-appearance: none;
        background: transparent;
        outline: none;
    }

    /* Webkit thumb */
    .kv-range-input::-webkit-slider-thumb {
        pointer-events: auto;
        -webkit-appearance: none;
        appearance: none;
        width: 18px;
        height: 18px;
        border-radius: 9999px;
        background: #ffffff;
        box-shadow: 0 0 0 2.5px #6366f1, 0 2px 6px -1px rgba(99,102,241,0.35);
        transition: box-shadow 0.2s, transform 0.15s;
        cursor: pointer;
    }
    .kv-range-input::-webkit-slider-thumb:hover {
        box-shadow: 0 0 0 3px #6366f1, 0 3px 10px -1px rgba(99,102,241,0.45);
        transform: scale(1.12);
    }

    /* Firefox thumb */
    .kv-range-input::-moz-range-thumb {
        pointer-events: auto;
        width: 18px;
        height: 18px;
        border-radius: 9999px;
        background: #ffffff;
        border: 2.5px solid #6366f1;
        box-shadow: 0 2px 6px -1px rgba(99,102,241,0.35);
        transition: box-shadow 0.2s, transform 0.15s;
        cursor: pointer;
        appearance: none;
    }
    .kv-range-input::-moz-range-thumb:hover {
        box-shadow: 0 3px 10px -1px rgba(99,102,241,0.45);
        transform: scale(1.12);
    }

    /* MS thumb */
    .kv-range-input::-ms-thumb {
        pointer-events: auto;
        width: 18px;
        height: 18px;
        border-radius: 9999px;
        background: #ffffff;
        border: 2.5px solid #6366f1;
        box-shadow: 0 2px 6px -1px rgba(99,102,241,0.35);
        cursor: pointer;
        appearance: none;
    }

    /* Etiqueta de rango */
    .kv-range-label {
        font-size: 0.72rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: rgba(99,102,241,0.55);
    }

    .kv-range-value {
        font-size: 0.82rem;
        font-weight: 700;
        background: linear-gradient(135deg, #6366f1, #22d3ee);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
</style>
@endpush

@pushOnce('scripts')
    <script
        type="text/x-template"
        id="v-range-slider-template"
    >
        <div>
            <!-- Rango actual -->
            <div style="display:flex; align-items:center; gap:0.6rem; margin-bottom:0.25rem;">
                <p class="kv-range-label">
                    @lang('shop::app.components.range-slider.range')
                </p>
                <p class="kv-range-value">
                    @{{ rangeText }}
                </p>
            </div>

            <!-- Slider wrapper -->
            <div style="position:relative; display:flex; height:5rem; width:100%; align-items:center; justify-content:center; padding:0.5rem;">
                <div class="kv-range-track">
                    <!-- Barra de progreso degradada -->
                    <div
                        ref="progress"
                        class="kv-range-progress"
                        style="left:25%; right:0;"
                    ></div>

                    <!-- Input min -->
                    <input
                        :step="allowedMaxRange - Math.floor(allowedMaxRange) > 0 ? 0.01 : 1"
                        ref="minRange"
                        type="range"
                        :value="minRange"
                        class="kv-range-input"
                        :min="allowedMinRange"
                        :max="allowedMaxRange"
                        aria-label="@lang('shop::app.components.range-slider.min-range')"
                        @input="handle('min')"
                        @change="change"
                    >

                    <!-- Input max -->
                    <input
                        :step="allowedMaxRange - Math.floor(allowedMaxRange) > 0 ? 0.01 : 1"
                        ref="maxRange"
                        type="range"
                        :value="maxRange"
                        class="kv-range-input"
                        :min="allowedMinRange"
                        :max="allowedMaxRange"
                        aria-label="@lang('shop::app.components.range-slider.max-range')"
                        @input="handle('max')"
                        @change="change"
                    >
                </div>
            </div>
        </div>
    </script>

    <script type="module">
        app.component('v-range-slider', {
            template: '#v-range-slider-template',

            props: [
                'defaultType',
                'defaultAllowedMinRange',
                'defaultAllowedMaxRange',
                'defaultMinRange',
                'defaultMaxRange',
            ],

            data() {
                return {
                    gap: this.defaultAllowedMaxRange * 0.10,

                    supportedTypes: ['integer', 'float', 'price'],

                    allowedMinRange: parseFloat(this.defaultAllowedMinRange ?? 0),

                    allowedMaxRange: parseFloat(this.defaultAllowedMaxRange ?? 100),

                    minRange: parseFloat(this.defaultMinRange ?? 0),

                    maxRange: parseFloat(this.defaultMaxRange ?? 100),
                };
            },

            computed: {
                rangeText() {
                    let { formattedMinRange, formattedMaxRange } = this.getFormattedData();

                    return `${formattedMinRange} - ${formattedMaxRange}`;
                },
            },

            mounted() {
                this.handleProgressBar();
            },

            methods: {
                getData() {
                    return {
                        allowedMinRange: this.allowedMinRange,
                        allowedMaxRange: this.allowedMaxRange,
                        minRange: this.minRange,
                        maxRange: this.maxRange,
                    };
                },

                getFormattedData() {
                    if (this.isTypeSupported()) {
                        switch (this.defaultType) {
                            case 'price':
                                return {
                                    formattedAllowedMinRange: this.$shop.formatPrice(this.allowedMinRange),
                                    formattedAllowedMaxRange: this.$shop.formatPrice(this.allowedMaxRange),
                                    formattedMinRange: this.$shop.formatPrice(this.minRange),
                                    formattedMaxRange: this.$shop.formatPrice(this.maxRange),
                                };

                            case 'float':
                                return {
                                    formattedAllowedMinRange: parseFloat(this.allowedMinRange).toFixed(2),
                                    formattedAllowedMaxRange: parseFloat(this.allowedMaxRange).toFixed(2),
                                    formattedMinRange: parseFloat(this.minRange).toFixed(2),
                                    formattedMaxRange: parseFloat(this.maxRange).toFixed(2),
                                };

                            default:
                                return {
                                    formattedAllowedMinRange: this.allowedMinRange,
                                    formattedAllowedMaxRange: this.allowedMaxRange,
                                    formattedMinRange: this.minRange,
                                    formattedMaxRange: this.maxRange,
                                };
                        }
                    }

                    return {
                        formattedAllowedMinRange: this.allowedMinRange,
                        formattedAllowedMaxRange: this.allowedMaxRange,
                        formattedMinRange: this.minRange,
                        formattedMaxRange: this.maxRange,
                    };
                },

                handle(rangeType) {
                    this.minRange = parseFloat(this.$refs.minRange.value);

                    this.maxRange = parseFloat(this.$refs.maxRange.value);

                    if (this.maxRange - this.minRange < this.gap) {
                        if (rangeType === 'min') {
                            this.minRange = this.maxRange - this.gap;
                        } else {
                            this.maxRange = this.minRange + this.gap;
                        }
                    } else {
                        this.handleProgressBar();
                    }
                },

                handleProgressBar() {
                    const direction = document.dir == 'ltr' ? 'left' : 'right';

                    this.$refs.progress.style[direction] = (this.minRange / this.allowedMaxRange) * 100 + '%';

                    this.$refs.progress.style[direction == 'left' ? 'right' : 'left'] = 100 - (this.maxRange / this.allowedMaxRange) * 100 + '%';
                },

                change() {
                    this.$emit('change-range', {
                        ...this.getData(),
                        ...this.getFormattedData(),
                    });
                },

                isTypeSupported() {
                    return this.supportedTypes.includes(this.defaultType);
                },
            },
        });
    </script>
@endPushOnce
