{{-- ============================================================
     KILLAVIBES — envios.blade.php  (MEJORADO)
     ============================================================ --}}

@php
    $channel = core()->getCurrentChannel();

    $shippingMethods = [
        [
            'name'     => 'Express Nacional',
            'coverage' => 'Todo Colombia',
            'time'     => '2–5 días hábiles',
            'cost'     => 'Desde $8.000 COP',
            'color'    => 'indigo',
            'free'     => false,
            'featured' => true,
            'benefits' => ['Rastreo en tiempo real', 'Seguro incluido', 'Entrega puerta a puerta'],
            'icon'     => '<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/>',
        ],
        [
            'name'     => 'Envío Estándar',
            'coverage' => 'Colombia',
            'time'     => '5–8 días hábiles',
            'cost'     => 'Desde $5.000 COP',
            'color'    => 'cyan',
            'free'     => false,
            'featured' => false,
            'benefits' => ['Económico', 'Rastreo disponible', 'Garantía de entrega'],
            'icon'     => '<path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9"/>',
        ],
        [
            'name'     => 'Internacional',
            'coverage' => 'Latinoamérica y mundo',
            'time'     => '7–21 días hábiles',
            'cost'     => 'Según destino',
            'color'    => 'violet',
            'free'     => false,
            'featured' => false,
            'benefits' => ['Múltiples destinos', 'Manejo aduanal', 'Rastreo internacional'],
            'icon'     => '<path stroke-linecap="round" stroke-linejoin="round" d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 0 1-1.161.886l-.143.048a1.107 1.107 0 0 0-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 0 1-1.652.928l-.679-.906a1.125 1.125 0 0 0-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 0 0-8.862 12.872M12.75 3.031a9 9 0 0 1 6.69 14.036m0 0-.177-.529A2.249 2.249 0 0 0 17.128 15H16.5l-.324-.324a1.453 1.453 0 0 0-2.328.377l-.036.073a1.586 1.586 0 0 1-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643"/>',
        ],
        [
            'name'     => 'Recogida en Tienda',
            'coverage' => 'Barranquilla',
            'time'     => '24 horas',
            'cost'     => 'Gratis',
            'color'    => 'green',
            'free'     => true,
            'featured' => false,
            'benefits' => ['Sin costo de envío', 'Retiro inmediato', 'Verificación en tienda'],
            'icon'     => '<path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z"/>',
        ],
    ];

    $processSteps = [
        ['num' => '1', 'color' => 'indigo', 'title' => 'Confirmación',  'desc' => 'Recibes email de confirmación dentro de 5 minutos tras el pago exitoso.',
         'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>'],
        ['num' => '2', 'color' => 'cyan',   'title' => 'Preparación',   'desc' => 'Verificamos inventario y empacamos en 24–48 horas hábiles con cuidado.',
         'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9"/>'],
        ['num' => '3', 'color' => 'violet', 'title' => 'Despacho',      'desc' => 'Entregamos al courier con número de seguimiento activo y notificación.',
         'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/>'],
        ['num' => '4', 'color' => 'amber',  'title' => 'En tránsito',   'desc' => 'Rastreo en tiempo real disponible en tu cuenta y por email automático.',
         'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/>'],
        ['num' => '5', 'color' => 'green',  'title' => 'Entrega',        'desc' => 'Recepción en tu dirección. Tienes 48 h para reportar cualquier problema.',
         'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>'],
    ];

    $legalCards = [
        ['title' => 'Normativa colombiana', 'desc' => 'Cumplimos Ley 1480/2011 y regulaciones de la Superintendencia de Industria y Comercio.',       'color' => 'indigo',
         'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/>'],
        ['title' => 'Estándares ISO',        'desc' => 'Certificación ISO 9001 y protocolos internacionales de logística y cadena de suministro.',    'color' => 'cyan',
         'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 0 1-1.161.886l-.143.048a1.107 1.107 0 0 0-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 0 1-1.652.928l-.679-.906a1.125 1.125 0 0 0-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 0 0-8.862 12.872M12.75 3.031a9 9 0 0 1 6.69 14.036m0 0-.177-.529A2.249 2.249 0 0 0 17.128 15H16.5l-.324-.324a1.453 1.453 0 0 0-2.328.377l-.036.073a1.586 1.586 0 0 1-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643"/>'],
        ['title' => 'Seguro de envío',       'desc' => 'Cobertura completa contra daños, pérdida o extravío incluida en cada pedido sin costo extra.', 'color' => 'green',
         'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/>'],
        ['title' => 'Rastreo digital',       'desc' => 'Sistema compatible con couriers nacionales e internacionales certificados en tiempo real.',    'color' => 'amber',
         'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3"/>'],
    ];

    $faqs = [
        ['q' => '¿Cómo rastreo mi pedido?',                'a' => 'Accede a tu cuenta con el número de seguimiento enviado por email. Recibirás actualizaciones automáticas en cada etapa del envío.'],
        ['q' => '¿Mi paquete llegó dañado?',               'a' => 'Contáctanos dentro de 48 horas con fotos claras del daño y el empaque. Realizamos reemplazo o reembolso completo según corresponda.'],
        ['q' => '¿Envían a zonas rurales?',                'a' => 'Sí, cubrimos la mayoría de zonas de Colombia. El tiempo y costo pueden variar. Contáctanos para verificar disponibilidad en tu dirección.'],
        ['q' => '¿Cuál es el horario de entrega?',         'a' => 'Lunes a sábado, 7:00 AM a 6:00 PM. Puedes solicitar una franja horaria preferida al confirmar tu pedido.'],
        ['q' => '¿Ofrecen envío el mismo día?',            'a' => 'En Barranquilla sí. Ordena antes de las 12:00 PM para entrega ese día (aplica para órdenes hasta $300.000 COP).'],
        ['q' => '¿Cómo funcionan los envíos internacionales?', 'a' => 'Trabajamos con couriers certificados. El cliente es responsable de aranceles aduaneros. Incluimos empaque reforzado y seguro de envío.'],
    ];
@endphp

@push('meta')
    <meta name="title"       content="Política de Envíos | {{ $channel->name ?? 'KillaVibes' }}" />
    <meta name="description" content="Envíos rápidos y seguros a toda Colombia y el mundo. Rastreo en tiempo real. Desde $5.000 COP." />
    <meta name="keywords"    content="envíos Colombia, entrega rápida, rastreo, Barranquilla, logística" />
    <meta name="robots"      content="index, follow" />
    <meta property="og:title"       content="Política de Envíos — KillaVibes" />
    <meta property="og:description" content="Entregas seguras y rápidas a Colombia y el mundo." />
@endpush

<x-shop::layouts>
<x-slot:title>Política de Envíos</x-slot>

@push('styles')
    @include('shop::pages.page-shared')
@endpush

@push('styles')
<style>
/* ── Grid de métodos ── */
.kvp-methods-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.25rem;
}
@media (min-width: 640px)  { .kvp-methods-grid { grid-template-columns: repeat(2, 1fr); } }
@media (min-width: 1024px) { .kvp-methods-grid { grid-template-columns: repeat(4, 1fr); } }

.kvp-method-card {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    padding: 1.875rem 1.625rem;
    position: relative;
}
.kvp-method-card--featured {
    border-color: var(--kv-primary) !important;
    box-shadow: var(--kv-shadow-md) !important;
}
.kvp-method-badge {
    position: absolute;
    top: -0.8rem;
    left: 50%;
    transform: translateX(-50%);
    white-space: nowrap;
    font-size: 0.67rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    padding: 0.3rem 0.9rem;
    border-radius: var(--kv-radius-pill);
    background: linear-gradient(135deg, var(--kv-primary), var(--kv-accent));
    color: #fff;
    box-shadow: 0 4px 12px var(--kv-primary-glow);
}
.kvp-method-card h3 {
    font-size: 1rem;
    font-weight: 700;
    color: var(--kv-text);
    margin: 0;
}
.kvp-method-specs {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    border-top: 1px solid var(--kv-border);
    padding-top: 0.875rem;
}
.kvp-method-spec {
    display: flex;
    justify-content: space-between;
    align-items: baseline;
    gap: 0.5rem;
}
.kvp-method-spec-lbl {
    font-size: 0.72rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.07em;
    color: var(--kv-text-subtle);
    flex-shrink: 0;
}
.kvp-method-spec-val {
    font-size: 0.88rem;
    color: var(--kv-text);
    text-align: right;
}
.kvp-method-spec-val--free {
    color: #16a34a;
    font-weight: 700;
}
.kvp-method-benefits {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 0.4rem;
}
.kvp-method-benefits li {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.82rem;
    color: var(--kv-text-muted);
}
.kvp-method-benefits li::before {
    content: '';
    width: 5px;
    height: 5px;
    border-radius: 50%;
    background: var(--kv-primary);
    flex-shrink: 0;
}

/* ── Proceso de envío ── */
.kvp-process {
    display: flex;
    flex-direction: column;
}
.kvp-process-item {
    display: grid;
    grid-template-columns: 3.5rem 1fr;
    gap: 1.5rem;
    position: relative;
}
.kvp-process-item:not(:last-child)::before {
    content: '';
    position: absolute;
    left: 1.65rem;
    top: 3rem;
    bottom: -1.5rem;
    width: 1.5px;
    background: linear-gradient(to bottom, var(--kv-primary), rgba(99,102,241,0.06));
}
.kvp-process-circle {
    width: 2.75rem;
    height: 2.75rem;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--kv-primary), var(--kv-accent));
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.88rem;
    font-weight: 700;
    flex-shrink: 0;
    box-shadow: 0 4px 16px rgba(99,102,241,0.30);
}
.kvp-process-body {
    padding: 0.35rem 0 2.5rem;
}
.kvp-process-body h4 {
    font-size: 1rem;
    font-weight: 700;
    color: var(--kv-text);
    margin: 0 0 0.4rem;
}
.kvp-process-body p {
    font-size: 0.88rem;
    color: var(--kv-text-muted);
    line-height: 1.7;
    margin: 0;
}

/* ── Grid legal ── */
.kvp-legal-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
}
@media (min-width: 768px) { .kvp-legal-grid { grid-template-columns: repeat(4, 1fr); } }
@media (max-width: 480px) { .kvp-legal-grid { grid-template-columns: 1fr; } }

.kvp-legal-card {
    padding: 1.5rem;
}
.kvp-legal-card h4 {
    font-size: 0.9rem;
    font-weight: 700;
    color: var(--kv-text);
    margin: 0.875rem 0 0.5rem;
}
.kvp-legal-card p {
    font-size: 0.83rem;
    color: var(--kv-text-muted);
    line-height: 1.65;
    margin: 0;
}
</style>
@endpush

{{-- ══ HERO ══════════════════════════════════════════════════════ --}}
<section class="kvp-hero kvp-hero--shipping kvp-animate">
    <div class="kvp-hero-inner">
        <div class="kvp-hero-eyebrow">
            <span class="kvp-hero-eyebrow-dot"></span>
            Logística y entregas
        </div>
        <h1 class="kvp-animate kvp-animate-delay-1">Política de Envíos</h1>
        <p class="kvp-hero-sub kvp-animate kvp-animate-delay-2">
            Entregamos rápido, seguro y confiable a toda Colombia y el mundo.
        </p>
    </div>
</section>

<hr class="kvp-divider">

<main class="kvp-main">

    {{-- ══ MÉTODOS DE ENVÍO ═══════════════════════════════════════ --}}
    <section class="kvp-section">
        <div class="kvp-sh">
            <div class="kvp-sh-eyebrow">
                <span class="kvp-sh-eyebrow-line"></span>
                Opciones
            </div>
            <h2>Métodos de Envío</h2>
            <p>Selecciona la opción que mejor se adapte a tus necesidades</p>
        </div>

        <div class="kvp-methods-grid">
            @foreach($shippingMethods as $method)
            <div class="kvp-card kvp-method-card {{ $method['featured'] ? 'kvp-method-card--featured' : '' }}">
                @if($method['featured'])
                    <div class="kvp-method-badge">⚡ Más popular</div>
                @endif
                <div class="kvp-icon-wrap kvp-icon--{{ $method['color'] }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.8" stroke="currentColor" style="width:1.2rem;height:1.2rem;">
                        {!! $method['icon'] !!}
                    </svg>
                </div>
                <h3>{{ $method['name'] }}</h3>
                <div class="kvp-method-specs">
                    <div class="kvp-method-spec">
                        <span class="kvp-method-spec-lbl">Cobertura</span>
                        <span class="kvp-method-spec-val">{{ $method['coverage'] }}</span>
                    </div>
                    <div class="kvp-method-spec">
                        <span class="kvp-method-spec-lbl">Tiempo</span>
                        <span class="kvp-method-spec-val">{{ $method['time'] }}</span>
                    </div>
                    <div class="kvp-method-spec">
                        <span class="kvp-method-spec-lbl">Costo</span>
                        <span class="kvp-method-spec-val {{ $method['free'] ? 'kvp-method-spec-val--free' : '' }}">
                            {{ $method['cost'] }}
                        </span>
                    </div>
                </div>
                <ul class="kvp-method-benefits">
                    @foreach($method['benefits'] as $benefit)
                    <li>{{ $benefit }}</li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </section>

    <hr class="kvp-divider">

    {{-- ══ MARCO LEGAL ════════════════════════════════════════════ --}}
    <section class="kvp-section">
        <div class="kvp-sh">
            <div class="kvp-sh-eyebrow">
                <span class="kvp-sh-eyebrow-line"></span>
                Regulatorio
            </div>
            <h2>Marco Legal y Garantías</h2>
            <p>Operamos bajo los más altos estándares de logística y cumplimiento normativo</p>
        </div>

        <div class="kvp-legal-grid">
            @foreach($legalCards as $card)
            <div class="kvp-card kvp-legal-card">
                <div class="kvp-icon-wrap kvp-icon--{{ $card['color'] }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.8" stroke="currentColor" style="width:1.1rem;height:1.1rem;">
                        {!! $card['icon'] !!}
                    </svg>
                </div>
                <h4>{{ $card['title'] }}</h4>
                <p>{{ $card['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </section>

    <hr class="kvp-divider">

    {{-- ══ PROCESO ════════════════════════════════════════════════ --}}
    <section class="kvp-section">
        <div class="kvp-sh">
            <div class="kvp-sh-eyebrow">
                <span class="kvp-sh-eyebrow-line"></span>
                Flujo
            </div>
            <h2>Proceso de Envío</h2>
            <p>Así procesamos tu pedido desde el pago hasta tu puerta</p>
        </div>

        <div class="kvp-process" style="max-width:640px;">
            @foreach($processSteps as $step)
            <div class="kvp-process-item">
                <div>
                    <div class="kvp-process-circle">{{ $step['num'] }}</div>
                </div>
                <div class="kvp-process-body">
                    <h4>{{ $step['title'] }}</h4>
                    <p>{{ $step['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <hr class="kvp-divider">

    {{-- ══ COMPARATIVA ════════════════════════════════════════════ --}}
    <section class="kvp-section">
        <div class="kvp-sh">
            <div class="kvp-sh-eyebrow">
                <span class="kvp-sh-eyebrow-line"></span>
                Resumen
            </div>
            <h2>Comparativa de Métodos</h2>
        </div>

        <div class="kvp-table-wrap" style="overflow-x:auto;">
            <table class="kvp-table" style="min-width:540px;">
                <thead>
                    <tr>
                        <th>Método</th>
                        <th>Cobertura</th>
                        <th>Tiempo</th>
                        <th>Costo base</th>
                        <th>Seguro</th>
                        <th>Rastreo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong style="color:var(--kv-text);">Express</strong></td>
                        <td>Colombia</td><td>2–5 días</td><td>$8.000+</td>
                        <td style="color:#16a34a;font-weight:700;">Incluido</td>
                        <td>Tiempo real</td>
                    </tr>
                    <tr>
                        <td><strong style="color:var(--kv-text);">Estándar</strong></td>
                        <td>Colombia</td><td>5–8 días</td><td>$5.000+</td>
                        <td style="color:#16a34a;font-weight:700;">Incluido</td>
                        <td>Disponible</td>
                    </tr>
                    <tr>
                        <td><strong style="color:var(--kv-text);">Internacional</strong></td>
                        <td>Mundo</td><td>7–21 días</td><td>Según destino</td>
                        <td style="color:#16a34a;font-weight:700;">Incluido</td>
                        <td>Internacional</td>
                    </tr>
                    <tr>
                        <td><strong style="color:var(--kv-text);">Recogida</strong></td>
                        <td>Barranquilla</td><td>24 h</td>
                        <td style="color:#16a34a;font-weight:700;">Gratis</td>
                        <td>N/A</td>
                        <td>En tienda</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <hr class="kvp-divider">

    {{-- ══ FAQ ════════════════════════════════════════════════════ --}}
    <section class="kvp-section kvp-section--sm">
        <div class="kvp-sh kvp-sh--center">
            <div class="kvp-sh-eyebrow" style="justify-content:center;">
                <span class="kvp-sh-eyebrow-line"></span>Preguntas frecuentes<span class="kvp-sh-eyebrow-line"></span>
            </div>
            <h2>¿Dudas sobre tu envío?</h2>
        </div>

        <div class="kvp-faq-list">
            @foreach($faqs as $faq)
            <div class="kvp-faq-item">
                <button class="kvp-faq-btn" type="button" aria-expanded="false">
                    <span>{{ $faq['q'] }}</span>
                    <svg class="kvp-faq-chevron" xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                    </svg>
                </button>
                <div class="kvp-faq-body" role="region">
                    <div class="kvp-faq-body-inner">{{ $faq['a'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <hr class="kvp-divider">

    {{-- ══ CTA FINAL ══════════════════════════════════════════════ --}}
    <section class="kvp-section">
        <div class="kvp-cta" style="background:linear-gradient(135deg,#2563eb 0%,#1d4ed8 50%,#0ea5e9 100%);">
            <h2>¿Más dudas sobre tu envío?</h2>
            <p>Nuestro equipo de logística está listo para ayudarte en todo momento.</p>
            <div class="kvp-cta-actions">
                <a href="mailto:envios@killavibes.com" class="kvp-cta-btn-white" style="color:#2563eb;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:1rem;height:1rem;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>
                    </svg>
                    Correo de envíos
                </a>
                <a href="https://wa.me/573001234567" class="kvp-cta-btn-ghost">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:1rem;height:1rem;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z"/>
                    </svg>
                    WhatsApp
                </a>
                <a href="tel:+573001234567" class="kvp-cta-btn-ghost">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:1rem;height:1rem;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"/>
                    </svg>
                    Llamada
                </a>
            </div>
        </div>
    </section>

</main>

<script type="application/ld+json">
{
    "@context":"https://schema.org","@type":"FAQPage",
    "mainEntity":[
        @foreach($faqs as $faq)
        {"@type":"Question","name":"{{ $faq['q'] }}","acceptedAnswer":{"@type":"Answer","text":"{{ $faq['a'] }}"}}{{ !$loop->last ? ',' : '' }}
        @endforeach
    ]
}
</script>

@push('scripts')
    @include('shop::pages.page-shared-js')
@endpush

</x-shop::layouts>
