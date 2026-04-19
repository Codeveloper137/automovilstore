{{-- customizations-loop.blade.php --}}
{{-- Sin cambios estructurales — el archivo original no tiene errores Vue/HTML --}}

@foreach ($customizations as $customization)
    @php ($data = $customization->options) @endphp
    @switch ($customization->type)
        @case ($customization::IMAGE_CAROUSEL)
            @break
        @case ($customization::STATIC_CONTENT)
            @if(!empty($data['css']))
                @push('styles')<style>{{ $data['css'] }}</style>@endpush
            @endif
            @if(!empty($data['html']))
                <div style="max-width:1400px;margin:0 auto;padding:2rem 1.5rem;">{!! $data['html'] !!}</div>
            @endif
            @break
        @case ($customization::CATEGORY_CAROUSEL)
            <section class="kv-section" style="background:linear-gradient(180deg,var(--background) 0%,rgba(99,102,241,0.025) 50%,var(--background) 100%);">
                <div class="kv-orb" style="top:-2rem;left:0;width:20rem;height:20rem;background:rgba(99,102,241,0.05);"></div>
                <div class="kv-orb" style="bottom:-2rem;right:0;width:24rem;height:24rem;background:rgba(34,211,238,0.05);"></div>
                <div class="kv-section-inner">
                    <div class="kv-section-header">
                        <div class="kv-eyebrow">
                            <div class="kv-eyebrow-dot"></div>
                            <span class="kv-eyebrow-text">Categorías</span>
                        </div>
                        <h2 class="kv-section-title">
                            Explora nuestras <span class="kv-gradient-text">categorías</span>
                        </h2>
                        <p class="kv-section-sub">Todo lo que necesitas en un solo lugar</p>
                    </div>
                    <x-shop::categories.carousel
                        :title="''"
                        :src="route('shop.api.categories.index', $data['filters'] ?? [])"
                        :navigation-link="route('shop.home.index')"
                        aria-label="Categories Carousel"
                    />
                </div>
            </section>
            <hr class="kv-divider">
            @break
        @case ($customization::PRODUCT_CAROUSEL)
            <section class="kv-section" style="background:var(--background);">
                <div class="kv-orb" style="top:50%;left:-5%;transform:translateY(-50%);width:22rem;height:22rem;background:rgba(99,102,241,0.04);"></div>
                <div class="kv-orb" style="top:50%;right:-5%;transform:translateY(-50%);width:22rem;height:22rem;background:rgba(34,211,238,0.04);"></div>
                <div class="kv-section-inner">
                    <div class="kv-section-header">
                        <div class="kv-eyebrow">
                            <div class="kv-eyebrow-dot"></div>
                            <span class="kv-eyebrow-text">Destacados</span>
                        </div>
                        <h2 class="kv-section-title">
                            {{ $data['title'] ?? 'Productos' }}
                            <span class="kv-gradient-text">destacados</span>
                        </h2>
                        <p class="kv-section-sub">Lo más popular entre nuestros clientes</p>
                    </div>
                    <x-shop::products.carousel
                        :title="''"
                        :src="route('shop.api.products.index', $data['filters'] ?? [])"
                        :navigation-link="route('shop.search.index', $data['filters'] ?? [])"
                        aria-label="Product Carousel"
                    />
                </div>
            </section>
            <hr class="kv-divider">
            @break
    @endswitch
@endforeach
