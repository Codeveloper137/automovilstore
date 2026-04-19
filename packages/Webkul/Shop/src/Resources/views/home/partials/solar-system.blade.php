{{-- ================================================================
     PARTIAL: home/partials/solar-system.blade.php
     Incluido desde: home/sections/hero-section.blade.php

     Variables recibidas:
       $solarSystem — array con orbit_1..orbit_4, cada órbita
                      contiene productos ya transformados por el Service.

     Responsabilidad de este archivo:
       - Geometría y física del sistema (radios, velocidades, ángulos)
       - Renderizar anillos, sol central, y pills flotantes
       - Emitir data-* para que orbit.js anime cada cápsula
       - NO contiene lógica de negocio ni queries
================================================================= --}}

@php
/*
|----------------------------------------------------------------------
| Configuración de geometría orbital
| Cada órbita define: radio visual, velocidad de rotación (seg),
| escala de la cápsula y blur de profundidad (efecto bokeh Z).
|----------------------------------------------------------------------
*/
$orbitGeometry = [
'orbit_1' => ['radius' => 155, 'speed' => 18, 'scale' => 1.00, 'blur' => 0, 'zIndex' => 18],
'orbit_2' => ['radius' => 210, 'speed' => 26, 'scale' => 0.94, 'blur' => 0, 'zIndex' => 16],
'orbit_3' => ['radius' => 268, 'speed' => 36, 'scale' => 0.88, 'blur' => 0.5, 'zIndex' => 14],
'orbit_4' => ['radius' => 325, 'speed' => 46, 'scale' => 0.82, 'blur' => 1, 'zIndex' => 12],
];
@endphp

<div class="kv-hero-right" id="kv-solar-system">

    {{-- ── Aura central (glow difuso) ── --}}
    <div class="kv-ring kv-ring-glow"></div>

    {{-- ── Anillos orbitales decorativos ── --}}
    @foreach($orbitGeometry as $orbitKey => $geo)
    @php $products = $solarSystem[$orbitKey] ?? []; @endphp
    @if(count($products) > 0)
    <div
        class="kv-orbit-ring"
        data-orbit="{{ $orbitKey }}"
        style="
                    width:  {{ $geo['radius'] * 2 }}px;
                    height: {{ $geo['radius'] * 2 }}px;
                    border-color: {{ $products[0]['orbit_color'] ?? 'rgba(99,102,241,0.15)' }}33;
                ">
    </div>
    @endif
    @endforeach

    {{-- ── Sol central — KillaVibes ── --}}
    <div class="kv-center-badge" style="z-index:20;">
        <svg xmlns="http://www.w3.org/2000/svg" style="width:2.4rem;height:2.4rem;color:#fff;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
        </svg>
        <span style="font-size:0.62rem;font-weight:800;text-transform:uppercase;letter-spacing:0.08em;color:rgba(255,255,255,0.9);">KillaVibes</span>
    </div>

    {{-- ── Cápsulas orbitales — generadas desde $solarSystem ── --}}
    @foreach($solarSystem as $orbitKey => $orbitProducts)
    @php
    $geo = $orbitGeometry[$orbitKey] ?? ['radius'=>200,'speed'=>30,'scale'=>1,'blur'=>0,'zIndex'=>15];
    $count = count($orbitProducts);
    $angleStep = $count > 0 ? (360 / $count) : 0;
    @endphp

    @foreach($orbitProducts as $idx => $product)
    @php
    $initialAngle = $idx * $angleStep; // ángulo de inicio distribuido
    $floatDelay = $idx * 0.4 + ($loop->parent->index * 0.8); // desfase zero-g
    @endphp

    {{--
                data-* = contrato con orbit.js
                El JS lee estos atributos y calcula la posición x/y
                en cada frame del requestAnimationFrame.
            --}}
    <div
        class="kv-orbit-card kv-capsule"
        data-orbit="{{ $orbitKey }}"
        data-radius="{{ $geo['radius'] }}"
        data-speed="{{ $geo['speed'] }}"
        data-initial-angle="{{ $initialAngle }}"
        data-scale="{{ $geo['scale'] }}"
        data-blur="{{ $geo['blur'] }}"
        data-product-id="{{ $product['id'] }}"
        data-orbit-color="{{ $product['orbit_color'] }}"
        style="
                    z-index: {{ $geo['zIndex'] }};
                    --orbit-color: {{ $product['orbit_color'] }};
                    filter: blur({{ $geo['blur'] }}px);
                    transform: scale({{ $geo['scale'] }});
                    border-color: {{ $product['orbit_color'] }}40;
                    box-shadow:
                        0 8px 32px {{ $product['orbit_color'] }}22,
                        0 2px 8px rgba(0,0,0,0.05),
                        inset 0 1px 0 rgba(255,255,255,0.9);
                "
        onmouseenter="kvEclipse(this, true)"
        onmouseleave="kvEclipse(this, false)">
        @include('shop::home.partials.product-capsule', ['product' => $product])
    </div>
    @endforeach
    @endforeach

    {{-- ── Pills flotantes (estáticas, decorativas) ── --}}
    <div class="kv-pill" style="top:14%;right:4%;background:rgba(255,255,255,0.88);border:1.5px solid rgba(34,197,94,0.25);color:#16a34a;animation:kvFloatSlow 4.5s ease-in-out infinite 0.5s;">
        <div style="width:0.45rem;height:0.45rem;border-radius:9999px;background:#22c55e;animation:kvPulse 1.5s ease-in-out infinite;"></div>
        Envío hoy
    </div>
    <div class="kv-pill" style="bottom:15%;left:5%;background:rgba(255,255,255,0.88);border:1.5px solid rgba(99,102,241,0.25);color:#6366f1;animation:kvFloatSlow 5.5s ease-in-out infinite 1s;">
        <svg xmlns="http://www.w3.org/2000/svg" style="width:0.75rem;height:0.75rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
        </svg>
        100% Garantía
    </div>

</div>
{{-- ═══ ( Finaliza el sistema solar ) ═══ --}}
