@push('styles')
<style>
    .kvf-panel {
        position: relative;
        background: rgba(255,255,255,0.92);
        border: 2px solid rgba(226,232,240,0.55);
        border-radius: 1.25rem;
        box-shadow: 0 4px 20px -4px rgba(99,102,241,0.10);
        overflow: hidden;
    }
    .kvf-panel::before {
        content: '';
        position: absolute; top: 0; right: 0;
        width: 6rem; height: 6rem;
        background: linear-gradient(135deg, rgba(99,102,241,0.07), transparent);
        border-radius: 0 1.25rem 0 100%;
        pointer-events: none;
    }
    .kvf-panel__header {
        display: flex; align-items: center; justify-content: space-between;
        padding: 1.1rem 1.25rem 1rem;
        border-bottom: 1px solid rgba(226,232,240,0.7);
    }
    .kvf-panel__title {
        font-size: 0.78rem !important; font-weight: 700 !important;
        text-transform: uppercase; letter-spacing: 0.09em;
        background: linear-gradient(135deg, #6366f1, #22d3ee);
        -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
    }
    .kvf-panel__clear {
        font-size: 0.68rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.07em;
        color: rgba(99,102,241,0.55); cursor: pointer;
        transition: color 0.2s;
        border: none; background: none; padding: 0;
    }
    .kvf-panel__clear:hover { color: #6366f1; }

    /* ── Filter option rows ── */
    .kvf-option-row {
        display: flex; align-items: center; justify-content: space-between;
        padding: 0.75rem 1.5rem;
        font-size: 0.9rem; color: var(--foreground);
        cursor: pointer; transition: background 0.15s;
    }
    .kvf-option-row:hover { background: rgba(99,102,241,0.04); }
    .kvf-option-row--active {
        background: rgba(99,102,241,0.06);
        color: #6366f1; font-weight: 700;
    }
    .kvf-option-check {
        display: inline-flex; align-items: center; justify-content: center;
        width: 1.2rem; height: 1.2rem;
        border-radius: 9999px;
        background: linear-gradient(135deg, #6366f1, #22d3ee);
        color: white; font-size: 0.6rem;
        flex-shrink: 0;
    }

    /* ── Filter section header ── */
    .kvf-section-title {
        font-size: 0.78rem; font-weight: 700; text-transform: uppercase;
        letter-spacing: 0.07em; color: var(--foreground);
    }

    /* ── Mobile bottom bar ──────────────────────────────────────────────────
     *
     * CRÍTICO — por qué los drawers están FUERA de este elemento:
     *
     * Esta barra recibe `transform: translateY(...)` desde JS (layout.blade.php)
     * para el efecto hide/show al hacer scroll. Cualquier elemento con un
     * `transform` distinto de `none` crea un nuevo "containing block" para sus
     * descendientes con `position: fixed`. Esto hace que los drawers de Bagisto
     * (que usan position:fixed internamente) queden atrapados dentro del área
     * de la barra y no puedan desplegarse en pantalla completa.
     *
     * Solución: esta barra contiene SOLO los botones de toggle.
     * Los drawers son hermanos en el DOM (declarados en <template v-if="isMobile">
     * justo debajo), fuera de cualquier ancestro con transform, por lo que su
     * position:fixed resuelve correctamente contra el viewport.
     *
     * will-change: transform → hint GPU para la animación de scroll.
     * ──────────────────────────────────────────────────────────────────── */
    .kvf-mobile-bar {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 40;
        display: grid;
        grid-template-columns: 1fr auto 1fr;
        align-items: center;
        justify-items: center;
        background: #ffffff;
        border-top: 1px solid rgba(226,232,240,0.6);
        box-shadow: 0 -2px 12px -2px rgba(99,102,241,0.10);
        padding: 0 1.25rem;
        transform: translateY(0);
        will-change: transform;
        /* transition se setea desde JS tras el montaje para evitar
           animación flash en el primer render */
    }

    .kvf-mobile-btn {
        display: flex; align-items: center; gap: 0.5rem;
        padding: 0.875rem 0.75rem;
        font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em;
        color: var(--foreground); cursor: pointer;
        transition: color 0.2s;
        background: none; border: none;
        width: 100%; justify-content: center;
    }
    .kvf-mobile-btn:hover { color: #6366f1; }
    .kvf-mobile-btn .kvf-icon { font-size: 1.2rem; color: #6366f1; }
    .kvf-mobile-sep { width: 1px; height: 1.25rem; background: rgba(226,232,240,0.7); }

    /* ── Price filter wrapper ── */
    .kvf-price-wrap { padding: 0.5rem 1.5rem 1rem; }

    /* ── Drawer clear-all header button ── */
    .kvf-drawer-clear {
        font-size: 0.68rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.07em;
        color: rgba(99,102,241,0.55); cursor: pointer;
        transition: color 0.2s;
        border: none; background: none; padding: 0;
    }
    .kvf-drawer-clear:hover { color: #6366f1; }
</style>
@endpush

{!! view_render_event('bagisto.shop.categories.view.filters.before') !!}

<!-- ── Desktop Filters: columna lateral, sin cambios ── -->
<div v-if="! isMobile">
    <v-filters
        @filter-applied="setFilters('filter', $event)"
        @filter-clear="clearFilters('filter', $event)"
    >
        <x-shop::shimmer.categories.filters />
    </v-filters>
</div>

<!-- ══════════════════════════════════════════════════════════════════════════
     MOBILE — PARTE 1: barra inferior con botones de toggle ÚNICAMENTE
     ══════════════════════════════════════════════════════════════════════════
     Contiene solo los <button>. Ningún drawer vive aquí.
     Esto garantiza que el transform aplicado desde JS para el efecto de
     scroll-hide NO interfiera con el position:fixed de los drawers.
     ══════════════════════════════════════════════════════════════════════════ -->
<div class="kvf-mobile-bar" v-if="isMobile">

    <button
        class="kvf-mobile-btn"
        type="button"
        @click="openDrawer('filter')"
    >
        <span class="kvf-icon icon-filter-1"></span>
        @lang('shop::app.categories.filters.filter')
    </button>

    <span class="kvf-mobile-sep"></span>

    <button
        class="kvf-mobile-btn"
        type="button"
        @click="openDrawer('toolbar')"
    >
        <span class="kvf-icon icon-sort-1"></span>
        @lang('shop::app.categories.filters.sort')
    </button>

</div>

<!-- ══════════════════════════════════════════════════════════════════════════
     MOBILE — PARTE 2: drawers como hermanos en el DOM (fuera de .kvf-mobile-bar)
     ══════════════════════════════════════════════════════════════════════════
     Al estar fuera del elemento con transform, los drawers de Bagisto pueden
     usar position:fixed contra el viewport correctamente → pantalla completa.

     Los slots :toggle están vacíos (span vacío) porque el control real viene
     de isDrawerActive.filter / isDrawerActive.toolbar que maneja openDrawer()
     en el componente v-category. Bagisto requiere el slot toggle para montar
     el componente drawer, pero el botón visible está en .kvf-mobile-bar arriba.
     ══════════════════════════════════════════════════════════════════════════ -->
<template v-if="isMobile">

    <!-- Drawer de Filtros -->
<x-shop::drawer
    position="bottom"
    width="100%"
    ::is-active="isDrawerActive.filter"
    @close="isDrawerActive.filter = false"
>
        <x-slot:toggle>
            <span style="display:none;"></span>
        </x-slot>

        <x-slot:header>
            <div class="flex items-center justify-between">
                <p class="kvf-panel__title" style="-webkit-text-fill-color:unset; color:#6366f1;">
                    @lang('shop::app.categories.filters.filters')
                </p>
                <button
                    class="kvf-drawer-clear ltr:mr-[50px] rtl:ml-[50px]"
                    type="button"
                    @click="clearFilters('filter', '')"
                >
                    @lang('shop::app.categories.filters.clear-all')
                </button>
            </div>
        </x-slot>

        <x-slot:content class="!px-0">
            <v-filters
                @filter-applied="setFilters('filter', $event)"
                @filter-clear="clearFilters('filter', $event)"
            >
                <x-shop::shimmer.categories.filters />
            </v-filters>
        </x-slot>
    </x-shop::drawer>

    <!-- Drawer de Ordenar -->
<x-shop::drawer
    position="bottom"
    width="100%"
    ::is-active="isDrawerActive.toolbar"
    @close="isDrawerActive.toolbar = false"
>
        <x-slot:toggle>
            <span style="display:none;"></span>
        </x-slot>

        <x-slot:header>
            <div class="flex items-center justify-between">
                <p class="kvf-panel__title" style="-webkit-text-fill-color:unset; color:#6366f1;">
                    @lang('shop::app.categories.filters.sort')
                </p>
            </div>
        </x-slot>

        <x-slot:content class="!px-0">
            @include('shop::categories.toolbar')
        </x-slot>
    </x-shop::drawer>

</template>

{!! view_render_event('bagisto.shop.categories.view.filters.after') !!}

@pushOnce('scripts')
    <script type="text/x-template" id="v-filters-template">
        <template v-if="isLoading">
            <x-shop::shimmer.categories.filters />
        </template>

        <template v-else>
            <div
                class="kvf-panel journal-scroll grid max-h-[1320px] min-w-[250px] grid-cols-[1fr] overflow-y-auto overflow-x-hidden max-xl:min-w-[220px] md:max-w-[270px] max-md:rounded-none max-md:border-0 max-md:shadow-none max-md:bg-transparent"
            >
                <div class="kvf-panel__header max-md:hidden">
                    <button class="kvf-panel__clear" type="button" tabindex="0" @click="clear()">
                        @lang('shop::app.categories.filters.clear-all')
                    </button>
                </div>

                <v-filter-item
                    ref="filterItemComponent"
                    :key="filterIndex"
                    :filter="filter"
                    v-for='(filter, filterIndex) in filters.available'
                    @values-applied="applyFilter(filter, $event)"
                >
                </v-filter-item>
            </div>
        </template>
    </script>

    <script type="text/x-template" id="v-filter-item-template">
        <template v-if="filter.type === 'price' || filter.options.length">
            <x-shop::accordion class="last:border-b-0 border-b border-[rgba(226,232,240,0.55)]">

                <x-slot:header class="px-5 py-3 max-sm:!pb-2">
                    <p class="kvf-section-title">@{{ filter.name }}</p>
                </x-slot>

                <x-slot:content class="!p-0 !pt-1 pb-2">

                    <div v-if="filter.type === 'price'" class="kvf-price-wrap">
                        <v-price-filter
                            :key="refreshKey"
                            :default-price-range="appliedValues"
                            @set-price-range="applyValue($event)"
                        ></v-price-filter>
                    </div>

                    <ul v-else style="list-style:none;margin:0;padding:0.5rem 0;">
                        <li
                            :key="option.id"
                            v-for="(option, optionIndex) in filter.options"
                        >
                            <div
                                class="kvf-option-row"
                                :class="{ 'kvf-option-row--active': appliedValues.includes(option.id) }"
                                @click="toggleOption(option.id)"
                                role="checkbox"
                                :aria-checked="appliedValues.includes(option.id)"
                                tabindex="0"
                                @keydown.enter.space.prevent="toggleOption(option.id)"
                                :aria-label="option.name"
                            >
                                <span>@{{ option.name }}</span>

                                <span
                                    class="kvf-option-check"
                                    v-if="appliedValues.includes(option.id)"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </span>

                                <input
                                    type="checkbox"
                                    :id="'option_' + option.id"
                                    class="sr-only"
                                    :value="option.id"
                                    v-model="appliedValues"
                                    @change="applyValue"
                                    tabindex="-1"
                                    aria-hidden="true"
                                />
                            </div>
                        </li>
                    </ul>

                </x-slot>
            </x-shop::accordion>
        </template>
    </script>

    <script type="text/x-template" id="v-price-filter-template">
        <div style="padding:0.5rem 0;">
            <template v-if="isLoading">
                <x-shop::shimmer.range-slider />
            </template>
            <template v-else>
                <x-shop::range-slider
                    ::key="refreshKey"
                    default-type="price"
                    ::default-allowed-max-range="allowedMaxPrice"
                    ::default-min-range="minRange"
                    ::default-max-range="maxRange"
                    @change-range="setPriceRange($event)"
                />
            </template>
        </div>
    </script>

    <script type='module'>
        app.component('v-filters', {
            template: '#v-filters-template',

            data() {
                return {
                    isLoading: true,
                    filters: {
                        available: {},
                        applied: {},
                    },
                };
            },

            mounted() {
                this.getFilters();
                this.setFilters();
            },

            methods: {
                getFilters() {
                    this.$axios.get('{{ route("shop.api.categories.attributes") }}', {
                            params: {
                                category_id: "{{ isset($category) ? $category->id : '' }}",
                            }
                        })
                        .then((response) => {
                            this.isLoading = false;
                            this.filters.available = response.data.data;
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                },

                setFilters() {
                    let queryParams = new URLSearchParams(window.location.search);
                    queryParams.forEach((value, filter) => {
                        if (! ['sort', 'limit', 'mode'].includes(filter)) {
                            this.filters.applied[filter] = value.split(',');
                        }
                    });
                    this.$emit('filter-applied', this.filters.applied);
                },

                applyFilter(filter, values) {
                    if (values.length) {
                        this.filters.applied[filter.code] = values;
                    } else {
                        delete this.filters.applied[filter.code];
                    }
                    this.$emit('filter-applied', this.filters.applied);
                },

                clear() {
                    this.filters.applied = {};
                    this.$refs.filterItemComponent.forEach((filterItem) => {
                        if (filterItem.filter.code === 'price') {
                            filterItem.$data.appliedValues = null;
                        } else {
                            filterItem.$data.appliedValues = [];
                        }
                    });
                    this.$emit('filter-applied', this.filters.applied);
                },
            },
        });

        app.component('v-filter-item', {
            template: '#v-filter-item-template',

            props: ['filter'],

            data() {
                return {
                    active: true,
                    appliedValues: null,
                    refreshKey: 0,
                }
            },

            watch: {
                appliedValues() {
                    if (this.filter.code === 'price' && ! this.appliedValues) {
                        ++this.refreshKey;
                    }
                },
            },

            mounted() {
                if (this.filter.code === 'price') {
                    this.appliedValues = this.$parent.$data.filters.applied[this.filter.code]?.join(',');
                    ++this.refreshKey;
                    return;
                }
                this.appliedValues = this.$parent.$data.filters.applied[this.filter.code] ?? [];
            },

            methods: {
                toggleOption(optionId) {
                    const idx = this.appliedValues.indexOf(optionId);
                    if (idx === -1) {
                        this.appliedValues = [...this.appliedValues, optionId];
                    } else {
                        this.appliedValues = this.appliedValues.filter(v => v !== optionId);
                    }
                    this.$emit('values-applied', this.appliedValues);
                },

                applyValue($event) {
                    if (this.filter.code === 'price') {
                        this.appliedValues = $event;
                        this.$emit('values-applied', this.appliedValues);
                        return;
                    }
                    this.$emit('values-applied', this.appliedValues);
                },
            },
        });

        app.component('v-price-filter', {
            template: '#v-price-filter-template',

            props: ['defaultPriceRange'],

            data() {
                return {
                    refreshKey: 0,
                    isLoading: true,
                    allowedMaxPrice: 100,
                    priceRange: this.defaultPriceRange ?? [0, 100].join(','),
                };
            },

            computed: {
                minRange() {
                    return this.priceRange.split(',')[0];
                },
                maxRange() {
                    return this.priceRange.split(',')[1];
                }
            },

            mounted() {
                this.getMaxPrice();
            },

            methods: {
                getMaxPrice() {
                    this.$axios.get('{{ route("shop.api.categories.max_price", $category->id ?? '') }}')
                        .then((response) => {
                            this.isLoading = false;
                            if (response.data.data.max_price) {
                                this.allowedMaxPrice = response.data.data.max_price;
                            }
                            if (! this.defaultPriceRange) {
                                this.priceRange = [0, this.allowedMaxPrice].join(',');
                            }
                            ++this.refreshKey;
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                },

                setPriceRange($event) {
                    this.priceRange = [$event.minRange, $event.maxRange].join(',');
                    this.$emit('set-price-range', this.priceRange);
                },
            },
        });
    </script>
@endPushOnce