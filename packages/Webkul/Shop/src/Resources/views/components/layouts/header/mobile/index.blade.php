@php
$showCompare = (bool) core()->getConfigData('catalog.products.settings.compare_option');
$showWishlist = (bool) core()->getConfigData('customer.settings.wishlist.wishlist_option');
@endphp

<style>
    .kv-mob-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border-radius: 9999px;
        color: #374151;
        text-decoration: none;
        transition: color 0.2s ease, background-color 0.2s ease;
        cursor: pointer;
    }

    .kv-mob-btn:hover {
        color: #6366f1;
        background-color: rgba(99, 102, 241, 0.10);
    }
</style>

{{-- Solo visible en mobile/tablet (oculto en lg+) --}}
<div class="lg:hidden"
    style="display:flex; flex-direction:column; gap:12px; padding:14px 16px 16px;">

    {{-- ── Fila 1: hamburguesa | logo | acciones ── --}}
    <div style="display:flex; align-items:center; justify-content:space-between;">

        {{-- Izquierda: hamburguesa + logo --}}
        <div style="display:flex; align-items:center; gap:8px;">

            {!! view_render_event('bagisto.shop.components.layouts.header.mobile.drawer.before') !!}

            <x-shop::drawer position="left" width="100%">
                <x-slot:toggle>
                    <span class="icon-hamburger kv-mob-btn" style="font-size:22px;"></span>
                </x-slot>

                <x-slot:header>
                    <a href="{{ route('shop.home.index') }}">
                        <img src="{{ core()->getCurrentChannel()->logo_url ?? bagisto_asset('images/logo.svg') }}"
                            alt="{{ config('app.name') }}" width="140" height="37"  style="height:86px; width:auto; transition:transform 0.3s ease;">
                    </a>
                </x-slot>

                {{--
                    El slot:content del drawer ya tiene flex-1 + overflow-auto
                    desde drawer.blade.php. Solo ponemos el contenido directo,
                    sin ningún wrapper con height fijo que interfiera con el scroll.
                --}}
                <x-slot:content>

                    {{-- Hero cuenta --}}
                    <div style="display:grid; grid-template-columns:auto 1fr; align-items:center; gap:14px; border:1px solid #f3f4f6; border-radius:12px; padding:12px; margin-bottom:16px; margin-top:8px;">
                        <img src="{{ auth()->user()?->image_url ?? bagisto_asset('images/user-placeholder.png') }}"
                            style="width:54px; height:54px; border-radius:9999px; object-fit:cover;"
                            alt="Perfil">
                        @guest('customer')
                        <a href="{{ route('shop.customer.session.create') }}"
                            style="font-size:14px; font-weight:600; color:#6366f1; text-decoration:none; display:flex; align-items:center; gap:6px;">
                            Inicia sesión o Regístrate
                            <span class="icon-double-arrow" style="font-size:18px;"></span>
                        </a>
                        @endguest
                        @auth('customer')
                        <div>
                            <p style="font-size:18px; font-weight:600; color:#111827; margin-bottom:2px;">
                                ¡Hola, {{ auth()->user()?->first_name }}!
                            </p>
                            <p style="font-size:12px; color:#9ca3af;">{{ auth()->user()?->email }}</p>
                        </div>
                        @endauth
                    </div>

                    {{-- Links de nav estáticos --}}
                    <nav style="margin-bottom:8px;">
                        @foreach([
                            ['url' => route('shop.home.index'), 'label' => 'Inicio'],
                            ['url' => url('/contact-us'), 'label' => 'Contacto'],
                        ] as $nav)
                        <a href="{{ $nav['url'] }}"
                            style="display:flex; align-items:center; gap:6px; padding:13px 4px; border-bottom:1px solid #f9fafb; font-size:14px; font-weight:500; color:#374151; text-decoration:none; transition:color 0.2s;"
                            onmouseover="this.style.color='#6366f1'" onmouseout="this.style.color='#374151'">
                            {{ $nav['label'] }}
                        </a>
                        @endforeach
                    </nav>

                    {!! view_render_event('bagisto.shop.components.layouts.header.mobile.drawer.categories.before') !!}

                    <p style="font-size:11px; font-weight:600; text-transform:uppercase; letter-spacing:0.08em; color:#9ca3af; margin-bottom:8px; padding-top:4px;">
                        Categorías de la tienda
                    </p>

                    <v-mobile-category></v-mobile-category>

                    {!! view_render_event('bagisto.shop.components.layouts.header.mobile.drawer.categories.after') !!}

                    {{-- Links de cuenta (solo autenticado) --}}
                    @auth('customer')
                    <div style="margin-top:20px; padding-top:16px; border-top:1px solid #f3f4f6;">
                        <p style="font-size:11px; font-weight:600; text-transform:uppercase; letter-spacing:0.08em; color:#9ca3af; margin-bottom:8px;">
                            Mi cuenta
                        </p>
                        <a href="{{ route('shop.customers.account.profile.index') }}"
                            style="display:block; padding:11px 4px; font-size:14px; font-weight:500; color:#374151; text-decoration:none; border-bottom:1px solid #f9fafb; transition:color 0.2s;"
                            onmouseover="this.style.color='#6366f1'" onmouseout="this.style.color='#374151'">
                            @lang('shop::app.components.layouts.header.profile')
                        </a>
                        <a href="{{ route('shop.customers.account.orders.index') }}"
                            style="display:block; padding:11px 4px; font-size:14px; font-weight:500; color:#374151; text-decoration:none; border-bottom:1px solid #f9fafb; transition:color 0.2s;"
                            onmouseover="this.style.color='#6366f1'" onmouseout="this.style.color='#374151'">
                            @lang('shop::app.components.layouts.header.orders')
                        </a>
                        @if($showWishlist)
                        <a href="{{ route('shop.customers.account.wishlist.index') }}"
                            style="display:block; padding:11px 4px; font-size:14px; font-weight:500; color:#374151; text-decoration:none; border-bottom:1px solid #f9fafb; transition:color 0.2s;"
                            onmouseover="this.style.color='#6366f1'" onmouseout="this.style.color='#374151'">
                            @lang('shop::app.components.layouts.header.wishlist')
                        </a>
                        @endif

                        <x-shop::form method="DELETE"
                            action="{{ route('shop.customer.session.destroy') }}"
                            id="customerLogoutMobile" />

                        <a href="#"
                            style="display:block; padding:11px 4px; font-size:14px; font-weight:500; color:#ef4444; text-decoration:none; transition:color 0.2s; cursor:pointer;"
                            onclick="event.preventDefault(); kvOpenLogoutModal();">
                            @lang('shop::app.components.layouts.header.logout')
                        </a>
                    </div>
                    @endauth

                    {{-- Selector moneda/idioma al fondo del contenido scrollable --}}
                    @if(core()->getCurrentChannel()->locales()->count() > 1 || core()->getCurrentChannel()->currencies()->count() > 1)
                    <div style="margin-top:24px; padding-top:0; border-top:1px solid #f3f4f6;">
                        <div style="display:grid; grid-template-columns:1fr auto 1fr; align-items:center; justify-items:center;">

                            {{-- Moneda --}}
                            <x-shop::drawer position="bottom" width="100%">
                                <x-slot:toggle>
                                    <div style="padding:14px 10px; font-size:13px; font-weight:600; text-transform:uppercase; color:#374151; cursor:pointer; transition:color 0.2s;"
                                         onmouseover="this.style.color='#6366f1'" onmouseout="this.style.color='#374151'"
                                         role="button">
                                        {{ core()->getCurrentCurrency()->symbol . ' ' . core()->getCurrentCurrencyCode() }}
                                    </div>
                                </x-slot>
                                <x-slot:header>
                                    <p style="font-size:16px; font-weight:600; color:#111827;">
                                        @lang('shop::app.components.layouts.header.mobile.currencies')
                                    </p>
                                </x-slot>
                                <x-slot:content class="!px-0">
                                    <div class="overflow-auto" :style="{ height: getCurrentScreenHeight }">
                                        <v-currency-switcher></v-currency-switcher>
                                    </div>
                                </x-slot>
                            </x-shop::drawer>

                            <span style="width:1px; height:20px; background:#e5e7eb;"></span>

                            {{-- Idioma --}}
                            <x-shop::drawer position="bottom" width="100%">
                                <x-slot:toggle>
                                    <div style="display:flex; align-items:center; gap:8px; padding:14px 10px; font-size:13px; font-weight:600; text-transform:uppercase; color:#374151; cursor:pointer; transition:color 0.2s;"
                                         onmouseover="this.style.color='#6366f1'" onmouseout="this.style.color='#374151'"
                                         role="button">
                                        <img src="{{ ! empty(core()->getCurrentLocale()->logo_url) ? core()->getCurrentLocale()->logo_url : bagisto_asset('images/default-language.svg') }}"
                                             style="border-radius:2px;" width="18" height="13" alt="Idioma" />
                                        {{ core()->getCurrentChannel()->locales()->orderBy('name')->where('code', app()->getLocale())->value('name') }}
                                    </div>
                                </x-slot>
                                <x-slot:header>
                                    <p style="font-size:16px; font-weight:600; color:#111827;">
                                        @lang('shop::app.components.layouts.header.mobile.locales')
                                    </p>
                                </x-slot>
                                <x-slot:content class="!px-0">
                                    <div class="overflow-auto" :style="{ height: getCurrentScreenHeight }">
                                        <v-locale-switcher></v-locale-switcher>
                                    </div>
                                </x-slot>
                            </x-shop::drawer>

                        </div>
                    </div>
                    @endif

                </x-slot:content>

                <x-slot:footer></x-slot>
            </x-shop::drawer>

            {!! view_render_event('bagisto.shop.components.layouts.header.mobile.drawer.after') !!}

            {!! view_render_event('bagisto.shop.components.layouts.header.mobile.logo.before') !!}

            <a href="{{ route('shop.home.index') }}"
                style="display:flex; align-items:center; text-decoration:none;"
                aria-label="@lang('shop::app.components.layouts.header.bagisto')">
                <img src="{{ core()->getCurrentChannel()->logo_url ?? bagisto_asset('images/logo.svg') }}"
                    style="height:78px; width:auto;"
                    alt="{{ config('app.name') }}" width="181" height="69">
            </a>

            {!! view_render_event('bagisto.shop.components.layouts.header.mobile.logo.after') !!}
        </div>

        {{-- Derecha: iconos de acción --}}
        <div style="display:flex; align-items:center; gap:2px;">

            {!! view_render_event('bagisto.shop.components.layouts.header.mobile.compare.before') !!}

            @if($showCompare)
            <a href="{{ route('shop.compare.index') }}" class="kv-mob-btn"
                aria-label="@lang('shop::app.components.layouts.header.compare')">
                <span class="icon-compare" style="font-size:21px;"></span>
            </a>
            @endif

            {!! view_render_event('bagisto.shop.components.layouts.header.mobile.compare.after') !!}

            {!! view_render_event('bagisto.shop.components.layouts.header.mobile.mini_cart.before') !!}

            @if(core()->getConfigData('sales.checkout.shopping_cart.cart_page'))
            @include('shop::checkout.cart.mini-cart')
            @endif

            {!! view_render_event('bagisto.shop.components.layouts.header.mobile.mini_cart.after') !!}

            <div class="md:hidden">
                @guest('customer')
                <a href="{{ route('shop.customer.session.create') }}" class="kv-mob-btn"
                    aria-label="@lang('shop::app.components.layouts.header.account')">
                    <span class="icon-users" style="font-size:21px;"></span>
                </a>
                @endguest
                @auth('customer')
                <a href="{{ route('shop.customers.account.index') }}" class="kv-mob-btn"
                    aria-label="@lang('shop::app.components.layouts.header.account')">
                    <span class="icon-users" style="font-size:21px;"></span>
                </a>
                @endauth
            </div>

        </div>
    </div>

    {{-- ── Fila 2: Buscador ── --}}
    {!! view_render_event('bagisto.shop.components.layouts.header.mobile.search.before') !!}

    <form action="{{ route('shop.search.index') }}"
        style="position:relative; width:100%;"
        role="search">
        <label for="organic-search-mobile" class="sr-only">
            @lang('shop::app.components.layouts.header.search')
        </label>

        <span class="icon-search" style="
            position:absolute;
            left:14px;
            top:50%;
            transform:translateY(-50%);
            font-size:18px;
            color:#9ca3af;
            pointer-events:none;
            z-index:1;
        "></span>

        <input
            type="text"
            id="organic-search-mobile"
            name="query"
            value="{{ request('query') }}"
            placeholder="@lang('shop::app.components.layouts.header.search-text')"
            required
            style="
                width: 100%;
                padding: 11px 16px 11px 42px;
                border-radius: 12px;
                border: 1.5px solid #e5e7eb;
                background-color: #f9fafb;
                font-size: 13px;
                font-weight: 500;
                color: #111827;
                outline: none;
                transition: border-color 0.25s, box-shadow 0.25s, background-color 0.25s;
            "
            onfocus="this.style.borderColor='#6366f1'; this.style.backgroundColor='#fff'; this.style.boxShadow='0 0 0 3px rgba(99,102,241,0.12)';"
            onblur="this.style.borderColor='#e5e7eb'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none';">

        @if (core()->getConfigData('catalog.products.settings.image_search'))
        @include('shop::search.images.index')
        @endif
    </form>

    {!! view_render_event('bagisto.shop.components.layouts.header.mobile.search.after') !!}

</div>


@pushOnce('scripts')

<script type="text/x-template" id="v-mobile-category-template">
    <div>
        <template v-for="(category) in categories" :key="category.id">
            {!! view_render_event('bagisto.shop.components.layouts.header.mobile.category.before') !!}

            {{-- ── Nivel 1 ── --}}
            <div style="border-bottom:1px solid #f9fafb;">
                <div style="display:flex; align-items:center; justify-content:space-between; padding:12px 4px;">
                    <a :href="category.url"
                       style="font-size:13px; font-weight:600; color:#374151; text-decoration:none; transition:color 0.2s; flex:1;"
                       onmouseover="this.style.color='#6366f1'" onmouseout="this.style.color='#374151'">
                        @{{ category.name }}
                    </a>
                    <button
                        v-if="category.children && category.children.length"
                        type="button"
                        style="
                            background:none; border:none; padding:4px; cursor:pointer;
                            color:#9ca3af; font-size:18px; line-height:1;
                            transition:transform 0.2s ease, color 0.2s;
                            display:flex; align-items:center; justify-content:center;
                        "
                        :style="category.isOpen ? 'transform:rotate(90deg); color:#6366f1;' : ''"
                        :aria-label="'Expandir ' + category.name"
                        @click.stop="toggle(category)"
                    >
                        <span :class="category.isOpen ? 'icon-arrow-down' : 'icon-arrow-right'"></span>
                    </button>
                </div>

                {{-- ── Nivel 2 ── --}}
                <div v-if="category.isOpen && category.children && category.children.length"
                     style="padding-left:12px; padding-bottom:4px;">
                    <div v-for="child in category.children" :key="child.id">

                        <div style="display:flex; align-items:center; justify-content:space-between; padding:10px 4px; border-bottom:1px solid #f9fafb;">
                            <a :href="child.url"
                               style="font-size:13px; font-weight:500; color:#6b7280; text-decoration:none; transition:color 0.2s; flex:1;"
                               onmouseover="this.style.color='#6366f1'" onmouseout="this.style.color='#6b7280'">
                                @{{ child.name }}
                            </a>
                            <button
                                v-if="child.children && child.children.length"
                                type="button"
                                style="
                                    background:none; border:none; padding:4px; cursor:pointer;
                                    color:#d1d5db; font-size:16px; line-height:1;
                                    transition:transform 0.2s ease, color 0.2s;
                                    display:flex; align-items:center; justify-content:center;
                                "
                                :style="child.isOpen ? 'transform:rotate(90deg); color:#6366f1;' : ''"
                                :aria-label="'Expandir ' + child.name"
                                @click.stop="toggleChild(category, child)"
                            >
                                <span :class="child.isOpen ? 'icon-arrow-down' : 'icon-arrow-right'"></span>
                            </button>
                        </div>

                        {{-- ── Nivel 3 ── --}}
                        <div v-if="child.isOpen && child.children && child.children.length"
                            style="padding-left:12px;">

                            <a v-for="grandchild in child.children"
                            :key="grandchild.id"
                            :href="grandchild.url"
                            style="
                                    display:block;
                                    padding:9px 4px;
                                    font-size:12px;
                                    color:#9ca3af;
                                    text-decoration:none;
                                    border-bottom:1px solid #f9fafb;
                                    transition:color 0.2s;
                            "
                            @mouseover="$event.target.style.color='#6366f1'"
                            @mouseout="$event.target.style.color='#9ca3af'">

                                @{{ grandchild.name }}

                            </a>

                        </div>

                    </div>
                </div>
            </div>

            {!! view_render_event('bagisto.shop.components.layouts.header.mobile.category.after') !!}
        </template>

        <span v-if="!isLoading && categories.length === 0"
              style="display:block; padding:12px 4px; font-size:12px; color:#9ca3af;">
            @lang('shop::app.components.layouts.header.no-category-found')
        </span>
    </div>
</script>

<script type="module">
    app.component('v-mobile-category', {
        template: '#v-mobile-category-template',

        data() {
            return {
                isLoading: true,
                categories: [],
            };
        },

        mounted() {
            this.fetchCategories();
        },

        computed: {
            getCurrentScreenHeight() {
                return window.innerHeight - (window.innerWidth < 920 ? 61 : 0) + 'px';
            },
        },

        methods: {
            fetchCategories() {
                this.$axios.get("{{ route('shop.api.categories.tree') }}")
                    .then(response => {
                        this.categories = (response.data.data || []).map(cat => ({
                            ...cat,
                            isOpen: false,
                            children: (cat.children || []).map(child => ({
                                ...child,
                                isOpen: false,
                                children: child.children || [],
                            })),
                        }));
                        this.isLoading = false;
                    })
                    .catch(error => {
                        console.error('[v-mobile-category] Error cargando categorías:', error);
                        this.isLoading = false;
                    });
            },

            toggle(selectedCategory) {
                this.categories = this.categories.map(cat => ({
                    ...cat,
                    isOpen: cat.id === selectedCategory.id ? !cat.isOpen : false,
                }));
            },

            toggleChild(parentCategory, selectedChild) {
                this.categories = this.categories.map(cat => {
                    if (cat.id !== parentCategory.id) return cat;
                    return {
                        ...cat,
                        children: cat.children.map(child => ({
                            ...child,
                            isOpen: child.id === selectedChild.id ? !child.isOpen : false,
                        })),
                    };
                });
            },
        },
    });
</script>

@endPushOnce
