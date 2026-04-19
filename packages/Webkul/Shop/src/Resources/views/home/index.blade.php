{{-- index.blade.php = Home pagina --}}

@php
$channel = core()->getCurrentChannel();

$testimonials = [
['name' => 'María González', 'location' => 'Barranquilla', 'rating' => 5, 'product' => 'Audífonos Bluetooth Premium', 'initials' => 'MG', 'comment' => 'Excelente servicio y productos de calidad. Los audífonos que compré suenan increíbles y llegaron súper rápido. ¡Totalmente recomendado!'],
['name' => 'Carlos Mendoza', 'location' => 'Soledad', 'rating' => 5, 'product' => 'Compresor Portátil', 'initials' => 'CM', 'comment' => 'El compresor portátil me salvó en una emergencia. Funciona perfecto y la batería dura mucho tiempo. La mejor inversión que he hecho.'],
['name' => 'Ana Rodríguez', 'location' => 'Barranquilla', 'rating' => 5, 'product' => 'Parlante Gato RGB', 'initials' => 'AR', 'comment' => 'Mi hija ama el parlante con orejitas de gato. La calidad del sonido es excelente y el diseño es hermoso. ¡Un 10/10!'],
['name' => 'Luis Martínez', 'location' => 'Barranquilla', 'rating' => 5, 'product' => 'Smartwatch Pro', 'initials' => 'LM', 'comment' => 'Atención al cliente de primera. Me asesoraron perfectamente y el envío fue rapidísimo. Volveré a comprar sin duda.'],
['name' => 'Isabella Torres', 'location' => 'Soledad', 'rating' => 5, 'product' => 'Auriculares Gaming', 'initials' => 'IT', 'comment' => 'Productos originales y a excelentes precios. La experiencia de compra fue increíble de principio a fin.'],
];

$features = [
['icon' => 'truck', 'title' => 'Envío Gratis', 'desc' => 'Barranquilla', 'bg' => 'rgba(59,130,246,0.12)', 'color' => '#3b82f6'],
['icon' => 'shield', 'title' => '100% Original', 'desc' => 'Garantizado', 'bg' => 'rgba(34,197,94,0.12)', 'color' => '#22c55e'],
['icon' => 'clock', 'title' => 'Soporte 24/7', 'desc' => 'Siempre activos', 'bg' => 'rgba(249,115,22,0.12)', 'color' => '#f97316'],
['icon' => 'zap', 'title' => 'Vibra Killa', 'desc' => 'Únete ya', 'bg' => 'rgba(168,85,247,0.12)', 'color' => '#a855f7'],
];
@endphp

{{-- SEO --}}
@push('meta')
<meta name="title" content="{{ $channel->home_seo['meta_title']       ?? '' }}" />
<meta name="description" content="{{ $channel->home_seo['meta_description'] ?? '' }}" />
<meta name="keywords" content="{{ $channel->home_seo['meta_keywords']    ?? '' }}" />
@endpush

<x-shop::layouts>

    <x-slot:title>{{ $channel->home_seo['meta_title'] ?? '' }}</x-slot>

        {{-- ================================================================
         ESTILOS DEL HOME
    ================================================================= --}}
        @include('shop::home.partials.home-styles')

        {{-- ================================================================
         ① HERO SECTION
    ================================================================= --}}
        @include('shop::home.sections.hero-section', [
        'features' => $features,
        'solarSystem' => $solarSystem,
        ])

        <hr class="kv-divider">

        {{-- ================================================================
         ② CUSTOMIZATIONS LOOP — Carousels de Bagisto
    ================================================================= --}}
        @include('shop::home.sections.customizations-loop', ['customizations' => $customizations])

        {{-- ================================================================
         ③ BRAND STORY
    ================================================================= --}}
        @include('shop::home.partials.brand-story')

        <hr class="kv-divider">

        {{-- ================================================================
         ④ BENEFITS SECTION
    ================================================================= --}}
        @include('shop::home.sections.benefits-section')

        <hr class="kv-divider">

        {{-- ================================================================
         ⑤ TESTIMONIOS
    ================================================================= --}}
        @include('shop::home.sections.testimonials-section', ['testimonials' => $testimonials])

        <hr class="kv-divider">

        {{-- ================================================================
         ⑥ FAQ PREVIEW
    ================================================================= --}}
        @include('shop::home.partials.faq-preview')

        <hr class="kv-divider">

        {{-- ================================================================
         ⑦ CTA FINAL
    ================================================================= --}}
        @include('shop::home.sections.cta-final-section')

</x-shop::layouts>
