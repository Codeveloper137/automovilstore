{{-- ============================================================
     KILLAVIBES — devoluciones.blade.php  (MEJORADO)
     ============================================================ --}}

@php
    $channel = core()->getCurrentChannel();

    $returnSteps = [
        ['num' => '01', 'color' => 'indigo', 'title' => 'Solicita',
         'desc' => 'Contáctanos dentro del plazo establecido. Te enviamos un formulario de solicitud de devolución.',
         'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z"/>'],
        ['num' => '02', 'color' => 'cyan',   'title' => 'Verificación',
         'desc' => 'Revisamos tu solicitud y el estado del producto en un plazo de 24 horas hábiles.',
         'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>'],
        ['num' => '03', 'color' => 'green',  'title' => 'Autorización',
         'desc' => 'Te enviamos la etiqueta de retorno prepagada directamente a tu correo electrónico.',
         'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>'],
        ['num' => '04', 'color' => 'amber',  'title' => 'Recolección',
         'desc' => 'El courier recoge el paquete en tu dirección en el horario que tú eliges.',
         'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/>'],
        ['num' => '05', 'color' => 'violet', 'title' => 'Procesamiento',
         'desc' => 'Inspeccionamos el producto con cuidado e iniciamos el proceso de reembolso o cambio.',
         'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 14.25l6-6m4.5-3.493V21.75l-3.75-1.5-3.75 1.5-3.75-1.5-3.75 1.5V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0c1.1.128 1.907 1.077 1.907 2.185ZM9.75 9h.008v.008H9.75V9Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm4.125 4.5h.008v.008h-.008V13.5Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"/>'],
        ['num' => '06', 'color' => 'green',  'title' => 'Resolución',
         'desc' => 'Recibes tu dinero o producto nuevo en 5–7 días hábiles, sin complicaciones.',
         'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z"/>'],
    ];

    $returnReasons = [
        ['reason' => 'Producto Defectuoso',  'timeline' => '45 días',  'refund' => '100%', 'shipping' => 'gratis'],
        ['reason' => 'Daño en Transporte',   'timeline' => '48 horas', 'refund' => '100%', 'shipping' => 'gratis'],
        ['reason' => 'No Corresponde',       'timeline' => '30 días',  'refund' => '100%', 'shipping' => 'gratis'],
        ['reason' => 'Cambio de Opinión',    'timeline' => '30 días',  'refund' => '90%',  'shipping' => 'cliente'],
        ['reason' => 'Error en Pedido',      'timeline' => '60 días',  'refund' => '100%', 'shipping' => 'gratis'],
        ['reason' => 'Producto Incompleto',  'timeline' => '45 días',  'refund' => '100%', 'shipping' => 'gratis'],
    ];

    $requirements = [
        ['title' => 'Solicitud oportuna',   'desc' => 'Dentro del plazo establecido (30 o 45 días según el caso).'],
        ['title' => 'Producto íntegro',     'desc' => 'Empaques, accesorios y documentos incluidos originalmente.'],
        ['title' => 'Evidencia visual',     'desc' => 'Fotos claras del producto, empaque y factura de compra.'],
        ['title' => 'Razón válida',         'desc' => 'Defecto, daño, no corresponde, error nuestro o arrepentimiento.'],
        ['title' => 'Estado de venta',      'desc' => 'Sin desgaste considerable por uso indebido del producto.'],
        ['title' => 'Embalaje seguro',      'desc' => 'Retorno bien protegido para evitar daños adicionales en tránsito.'],
    ];

    $noReturn = [
        'Productos personalizados o hechos a medida',
        'Software descargado o licencias digitales activadas',
        'Artículos de higiene personal abiertos o usados',
        'Productos consumibles ya utilizados',
        'Artículos con daño severo por negligencia del usuario',
        'Ropa probada sin etiqueta de protección colocada',
    ];

    $legalPoints = [
        ['title' => 'Ley 1480 de 2011',       'desc' => 'Estatuto del Consumidor Colombiano — tus derechos garantizados por ley.'],
        ['title' => 'Derecho a retractación',  'desc' => '30 días para cambiar de opinión sin penalización (costos de retorno aplican).'],
        ['title' => 'Garantía legal',          'desc' => 'Todos los productos incluyen garantía por vicios ocultos hasta 2 años desde la compra.'],
        ['title' => 'Responsabilidad',         'desc' => 'Asumimos defectos de fábrica, daños en transporte y errores en el despacho del pedido.'],
    ];

    $faqs = [
        ['q' => '¿Cuál es el período de devolución?',   'a' => 'Tienes 30 días desde la entrega para cambios o devoluciones. Para defectos de fábrica el plazo es de 45 días.'],
        ['q' => '¿Quién paga el envío de retorno?',     'a' => 'Nosotros asumimos el costo para productos defectuosos o errores nuestros. Para cambio de opinión, el cliente asume el envío.'],
        ['q' => '¿Cuánto tarda el reembolso?',          'a' => 'Después de verificar el producto, procesamos el reembolso en 5–7 días hábiles al método de pago original.'],
        ['q' => '¿Puedo cambiar por otro producto?',    'a' => 'Sí. Ofrecemos cambio por igual o mayor valor. Si el nuevo producto es de menor valor, devolvemos la diferencia.'],
        ['q' => '¿Qué productos no se pueden devolver?','a' => 'Personalizados, software activado, artículos de higiene personal abiertos y artículos con daño severo por negligencia.'],
        ['q' => '¿Cómo reporto un producto defectuoso?','a' => 'Contáctanos dentro de 48 horas con fotos claras. Te guiamos en todo el proceso de reemplazo sin ningún costo.'],
    ];
@endphp

@push('meta')
    <meta name="title"       content="Política de Devoluciones | {{ $channel->name ?? 'KillaVibes' }}" />
    <meta name="description" content="30 días para devolver. Reembolso 100% garantizado. Cumplimiento Ley 1480 de Colombia." />
    <meta name="keywords"    content="devoluciones, cambios, reembolso, retorno, Colombia" />
    <meta name="robots"      content="index, follow" />
    <meta property="og:title"       content="Política de Devoluciones — KillaVibes" />
    <meta property="og:description" content="30 días para cambios y devoluciones. Reembolso garantizado." />
@endpush

<x-shop::layouts>
<x-slot:title>Política de Devoluciones</x-slot>

@push('styles')
    @include('shop::pages.page-shared')
@endpush

@push('styles')
<style>
/* ── Highlight de garantía ── */
.kvp-guarantee-band {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 0;
    border-radius: var(--kv-radius);
    overflow: hidden;
    border: 1.5px solid var(--kv-border);
    box-shadow: var(--kv-shadow-sm), var(--kv-shadow-inset);
}
@media (max-width: 640px) {
    .kvp-guarantee-band { grid-template-columns: 1fr; }
}
.kvp-guarantee-cell {
    padding: 2rem 1.5rem;
    text-align: center;
    background: var(--kv-surface);
    backdrop-filter: blur(8px);
    border-right: 1px solid var(--kv-border);
    transition: background .2s ease;
}
.kvp-guarantee-cell:last-child { border-right: none; }
.kvp-guarantee-cell:hover { background: var(--kv-surface-hover); }
@media (max-width: 640px) {
    .kvp-guarantee-cell { border-right: none; border-bottom: 1px solid var(--kv-border); }
    .kvp-guarantee-cell:last-child { border-bottom: none; }
}
.kvp-guarantee-num {
    font-size: 2.2rem;
    font-weight: 800;
    letter-spacing: -0.04em;
    line-height: 1;
    margin-bottom: 0.4rem;
}
.kvp-guarantee-label {
    font-size: 0.82rem;
    color: var(--kv-text-muted);
    line-height: 1.55;
}

/* ── Steps grid (proceso) ── */
.kvp-steps-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
}
@media (min-width: 768px)  { .kvp-steps-grid { grid-template-columns: repeat(3, 1fr); } }
@media (max-width: 480px)  { .kvp-steps-grid { grid-template-columns: 1fr; } }

.kvp-step-card {
    display: flex;
    flex-direction: column;
    gap: 0.875rem;
    padding: 1.625rem 1.5rem;
}
.kvp-step-num {
    font-size: 0.68rem;
    font-weight: 700;
    letter-spacing: 0.12em;
    color: var(--kv-text-subtle);
}
.kvp-step-card h3 {
    font-size: 0.97rem;
    font-weight: 700;
    color: var(--kv-text);
    margin: 0;
}
.kvp-step-card p {
    font-size: 0.86rem;
    color: var(--kv-text-muted);
    line-height: 1.7;
    margin: 0;
}

/* ── Tabla: badges de estado ── */
.kvp-refund-full    { font-weight: 700; color: #16a34a; }
.kvp-refund-partial { font-weight: 700; color: #d97706; }
.kvp-ship-free {
    display: inline-flex;
    align-items: center;
    gap: 0.3rem;
    font-size: 0.82rem;
    font-weight: 700;
    color: #16a34a;
}
.kvp-ship-client {
    font-size: 0.82rem;
    color: var(--kv-text-muted);
}
</style>
@endpush

{{-- ══ HERO ══════════════════════════════════════════════════════ --}}
<section class="kvp-hero kvp-hero--returns kvp-animate">
    <div class="kvp-hero-inner">
        <div class="kvp-hero-eyebrow">
            <span class="kvp-hero-eyebrow-dot"></span>
            Tu satisfacción garantizada
        </div>
        <h1 class="kvp-animate kvp-animate-delay-1">Política de Devoluciones</h1>
        <p class="kvp-hero-sub kvp-animate kvp-animate-delay-2">
            30 días para cambios y devoluciones. Reembolso 100% garantizado sin complicaciones.
        </p>
    </div>
</section>

<hr class="kvp-divider">

<main class="kvp-main">

    {{-- ══ GARANTÍA HIGHLIGHT ═════════════════════════════════════ --}}
    <section class="kvp-section">
        <div class="kvp-guarantee-band">
            <div class="kvp-guarantee-cell">
                <div class="kvp-guarantee-num" style="color:var(--kv-primary);">30</div>
                <div class="kvp-guarantee-label">Días para devoluciones sin complicaciones</div>
            </div>
            <div class="kvp-guarantee-cell">
                <div class="kvp-guarantee-num" style="color:#16a34a;">100%</div>
                <div class="kvp-guarantee-label">Reembolso en defectos o errores nuestros</div>
            </div>
            <div class="kvp-guarantee-cell">
                <div class="kvp-guarantee-num" style="color:#d97706;">5–7</div>
                <div class="kvp-guarantee-label">Días hábiles para procesar el reembolso</div>
            </div>
        </div>
    </section>

    {{-- ══ PROCESO ════════════════════════════════════════════════ --}}
    <section class="kvp-section" style="padding-top:0;">
        <div class="kvp-sh">
            <div class="kvp-sh-eyebrow">
                <span class="kvp-sh-eyebrow-line"></span>Paso a paso
            </div>
            <h2>Proceso de Devolución</h2>
            <p>Simple, rápido y sin complicaciones</p>
        </div>

        <div class="kvp-steps-grid">
            @foreach($returnSteps as $step)
            <div class="kvp-card kvp-step-card">
                <div class="kvp-step-num">{{ $step['num'] }}</div>
                <div class="kvp-icon-wrap kvp-icon--{{ $step['color'] }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.8" stroke="currentColor" style="width:1.2rem;height:1.2rem;">
                        {!! $step['icon'] !!}
                    </svg>
                </div>
                <h3>{{ $step['title'] }}</h3>
                <p>{{ $step['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </section>

    <hr class="kvp-divider">

    {{-- ══ TABLA DE MOTIVOS ═══════════════════════════════════════ --}}
    <section class="kvp-section">
        <div class="kvp-sh">
            <div class="kvp-sh-eyebrow">
                <span class="kvp-sh-eyebrow-line"></span>Referencia rápida
            </div>
            <h2>Plazos y Reembolsos por Motivo</h2>
        </div>

        <div class="kvp-table-wrap">
            <table class="kvp-table">
                <thead>
                    <tr>
                        <th>Motivo</th>
                        <th>Plazo</th>
                        <th>Reembolso</th>
                        <th>Envío retorno</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($returnReasons as $r)
                    <tr>
                        <td><strong style="color:var(--kv-text);">{{ $r['reason'] }}</strong></td>
                        <td>{{ $r['timeline'] }}</td>
                        <td>
                            @if($r['refund'] === '100%')
                                <span class="kvp-refund-full">{{ $r['refund'] }}</span>
                            @else
                                <span class="kvp-refund-partial">{{ $r['refund'] }}</span>
                            @endif
                        </td>
                        <td>
                            @if($r['shipping'] === 'gratis')
                                <span class="kvp-ship-free">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" style="width:.75rem;height:.75rem;">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                                    </svg>
                                    Gratis
                                </span>
                            @else
                                <span class="kvp-ship-client">A cargo del cliente</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    {{-- ══ REQUISITOS ═════════════════════════════════════════════ --}}
    <section class="kvp-section" style="padding-top:0;">
        <div class="kvp-sh">
            <div class="kvp-sh-eyebrow">
                <span class="kvp-sh-eyebrow-line"></span>Condiciones
            </div>
            <h2>Requisitos para Devolución Válida</h2>
        </div>

        <ul class="kvp-check-list">
            @foreach($requirements as $req)
            <li class="kvp-check-item">
                <span class="kvp-check-icon kvp-check-icon--green">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="2.5" stroke="currentColor" style="width:.7rem;height:.7rem;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                    </svg>
                </span>
                <p><strong>{{ $req['title'] }}:</strong> {{ $req['desc'] }}</p>
            </li>
            @endforeach
        </ul>
    </section>

    {{-- ══ NO REEMBOLSABLES ═══════════════════════════════════════ --}}
    <section class="kvp-section" style="padding-top:0;">
        <div class="kvp-sh">
            <div class="kvp-sh-eyebrow">
                <span class="kvp-sh-eyebrow-line"></span>Excepciones
            </div>
            <h2>Productos No Reembolsables</h2>
        </div>

        <ul class="kvp-check-list">
            @foreach($noReturn as $item)
            <li class="kvp-check-item">
                <span class="kvp-check-icon kvp-check-icon--red">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="2.5" stroke="currentColor" style="width:.7rem;height:.7rem;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                    </svg>
                </span>
                <p>{{ $item }}</p>
            </li>
            @endforeach
        </ul>
    </section>

    <hr class="kvp-divider">

    {{-- ══ MARCO LEGAL ════════════════════════════════════════════ --}}
    <section class="kvp-section">
        <div class="kvp-sh">
            <div class="kvp-sh-eyebrow">
                <span class="kvp-sh-eyebrow-line"></span>Regulatorio
            </div>
            <h2>Marco Legal</h2>
        </div>

        <ul class="kvp-check-list">
            @foreach($legalPoints as $lp)
            <li class="kvp-check-item">
                <span class="kvp-check-icon kvp-check-icon--indigo">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="2.5" stroke="currentColor" style="width:.7rem;height:.7rem;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                    </svg>
                </span>
                <p><strong>{{ $lp['title'] }}:</strong> {{ $lp['desc'] }}</p>
            </li>
            @endforeach
        </ul>
    </section>

    <hr class="kvp-divider">

    {{-- ══ FAQ ════════════════════════════════════════════════════ --}}
    <section class="kvp-section kvp-section--sm">
        <div class="kvp-sh kvp-sh--center">
            <div class="kvp-sh-eyebrow" style="justify-content:center;">
                <span class="kvp-sh-eyebrow-line"></span>Preguntas frecuentes<span class="kvp-sh-eyebrow-line"></span>
            </div>
            <h2>¿Tienes dudas sobre devoluciones?</h2>
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

    {{-- ══ CTA ════════════════════════════════════════════════════ --}}
    <section class="kvp-section">
        <div class="kvp-cta" style="background:linear-gradient(135deg,#dc2626 0%,#b91c1c 50%,#c2410c 100%);">
            <h2>¿Necesitas iniciar una devolución?</h2>
            <p>Contáctanos y procesamos tu solicitud de inmediato. Sin filas, sin esperas.</p>
            <div class="kvp-cta-actions">
                <a href="mailto:devoluciones@killavibes.com" class="kvp-cta-btn-white" style="color:#dc2626;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:1rem;height:1rem;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>
                    </svg>
                    Correo de devoluciones
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
