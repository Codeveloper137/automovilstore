{{-- ================================================================
     PARTIAL: home/partials/product-capsule.blade.php
================================================================= --}}

@php
    $hasRating  = ! is_null($product['avg_rating']);

    // Sanitización básica
    $orbitColor = e($product['orbit_color'] ?? '#6366f1');
    $productUrl = e(url('/' . ($product['slug'] ?? '')));

    // Imagen segura (fallback si viene vacía)
    $imageUrl = $product['image_url']
        ?: asset('vendor/webkul/ui/assets/images/product/large-product-placeholder.png');
@endphp

{{-- ── Imagen del producto ── --}}
<div class="kv-cap-img-wrap" style="--cap-color: {{ $orbitColor }};">
    <img
        src="{{ $imageUrl }}"
        alt="{{ e($product['name'] ?? 'Producto') }}"
        class="kv-cap-img"
        loading="lazy"
        onerror="this.onerror=null; this.src='{{ asset('vendor/webkul/ui/assets/images/product/large-product-placeholder.png') }}';">

    {{-- LED status --}}
    <span
        class="kv-cap-led"
        title="{{ e($product['orbit_label'] ?? '') }}"
        style="background: {{ $orbitColor }};">
    </span>
</div>

{{-- ── Nombre + etiqueta ── --}}
<div class="kv-cap-meta">
    <p class="kv-cap-name">
        {{ \Illuminate\Support\Str::limit(e($product['name'] ?? ''), 22) }}
    </p>

    <span
        class="kv-cap-label"
        style="color: {{ $orbitColor }}; border-color: {{ $orbitColor }}40;">
        {{ e($product['orbit_label'] ?? '') }}
    </span>
</div>

{{-- ── Rating ── --}}
@if($hasRating)
<div class="kv-cap-rating">
    @for($s = 0; $s < 5; $s++)
        <svg xmlns="http://www.w3.org/2000/svg"
            style="width:0.65rem;height:0.65rem;
                   fill:{{ $s < round($product['avg_rating']) ? '#fbbf24' : '#e5e7eb' }};"
            viewBox="0 0 24 24">
            <path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
        </svg>
    @endfor

    <span style="font-size:0.58rem;color:var(--muted-foreground);margin-left:0.2rem;">
        ({{ (int) ($product['reviews_count'] ?? 0) }})
    </span>
</div>
@endif

{{-- ── Precio (Bagisto nativo) ── --}}
<div class="kv-cap-price-row">
    {!! $product['price_html'] !!}
</div>

{{-- ── Stock ── --}}
@if(!empty($product['is_in_stock']))
<div class="kv-cap-stock">
    <div class="kv-cap-stock-dot" style="background:#22c55e;"></div>
    <span>En stock</span>
</div>
@endif

{{-- ── Quick Add ── --}}
<a href="{{ $productUrl }}"
   class="kv-cap-quick-add"
   style="--cap-color: {{ $orbitColor }};">
    <svg xmlns="http://www.w3.org/2000/svg"
         style="width:0.85rem;height:0.85rem;"
         fill="none"
         viewBox="0 0 24 24"
         stroke="currentColor"
         stroke-width="2.5">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
    </svg>
    Quick Add
</a>