{{-- ============================================================
     KILLAVIBES — garantia.blade.php  (MEJORADO)
     ============================================================ --}}

@php
    $channel = core()->getCurrentChannel();

    $warrantyTypes = [
        ['name'=>'Garantía de Fábrica',  'period'=>'12 meses',  'coverage'=>'Defectos de fabricación y materiales','color'=>'indigo',
         'icon'=>'<path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437 1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008Z"/>',
         'includes'=>['Defectos de componentes','Fallas internas','Problemas de ensamblaje','Malfuncionamiento']],
        ['name'=>'Garantía Comercial',   'period'=>'24 meses',  'coverage'=>'Vicios ocultos según Ley 1480',       'color'=>'cyan',
         'icon'=>'<path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/>',
         'includes'=>['Conformidad con descripción','Servicios y accesorios','Cumplimiento de función','Calidad prometida']],
        ['name'=>'Garantía Extendida',   'period'=>'36 meses',  'coverage'=>'Protección completa adicional',       'color'=>'violet',
         'icon'=>'<path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/>',
         'includes'=>['Cobertura accidental','Reemplazo rápido','Soporte técnico','Sin costos ocultos']],
        ['name'=>'Garantía de Servicio', 'period'=>'Permanente', 'coverage'=>'Soporte y servicio técnico continuo', 'color'=>'green',
         'icon'=>'<path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437 1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008Z"/>',
         'includes'=>['Asesoría técnica 24/7','Piezas de repuesto','Reparación','Actualización']],
    ];

    $timeline = [
        ['range'=>'0–30 días',    'title'=>'Período de Inspección',     'desc'=>'Revisa tu compra. Si encuentras defecto, reporta inmediatamente. Ofrecemos cambio o reembolso sin problemas.'],
        ['range'=>'1–12 meses',   'title'=>'Garantía de Fábrica',       'desc'=>'Cobertura total contra defectos de fabricación. Reparación o reemplazo gratis si el producto falla.'],
        ['range'=>'12–24 meses',  'title'=>'Garantía Comercial',        'desc'=>'Protección legal contra vicios ocultos. Cubrimos conformidad con descripción y promesas comerciales.'],
        ['range'=>'24+ meses',    'title'=>'Servicio Técnico',          'desc'=>'Soporte de pago. Disponibilidad de repuestos y asesoría para mantenimiento preventivo.'],
    ];

    $benefits = [
        'Cero trámites complicados. Proceso simple sin documentación excesiva.',
        'Soporte 24/7 por teléfono, email y chat en línea.',
        'Reemplazo en 3–5 días si es defecto de fábrica.',
        'Cobertura integral: piezas, mano de obra y accesorios originales.',
        'Garantía transferible al vender el producto dentro del primer año.',
        'Cumplimiento total con Ley 1480 Colombiana.',
    ];

    $exclusions = [
        ['title'=>'Daño por líquidos',     'desc'=>'Humedad, salpicaduras o inmersión accidental no están cubiertos.'],
        ['title'=>'Desgaste normal',        'desc'=>'Rayones superficiales y pérdida de color por uso ordinario.'],
        ['title'=>'Mal uso',               'desc'=>'Caídas, golpes fuertes y modificaciones no autorizadas.'],
        ['title'=>'Accesorios de terceros','desc'=>'Solo cubre componentes y accesorios originales de fábrica.'],
        ['title'=>'Batería degradada',      'desc'=>'Pérdida de capacidad por ciclos normales de carga.'],
        ['title'=>'Falta de mantenimiento','desc'=>'No seguir instrucciones de cuidado y limpieza del fabricante.'],
    ];

    $faqs = [
        ['q'=>'¿Cuál es la cobertura?',              'a'=>'Cubre defectos de fábrica y materiales defectuosos. No cubre daño por agua, mal uso o desgaste normal.'],
        ['q'=>'¿Cómo activo mi garantía?',           'a'=>'Se activa automáticamente. Conserva tu factura o recibo para reclamaciones.'],
        ['q'=>'¿Qué documentos necesito?',           'a'=>'Factura de compra, foto del serial, descripción del problema y fotos del daño si aplica.'],
        ['q'=>'¿Puedo transferir la garantía?',      'a'=>'Sí, dentro del primer año con registro del nuevo propietario.'],
        ['q'=>'¿Qué pasa después de la garantía?',  'a'=>'Ofrecemos servicio técnico de pago con piezas de repuesto disponibles.'],
        ['q'=>'¿Cómo reporto un defecto?',           'a'=>'Contáctanos dentro de 30 días de detectarlo con descripción, fotos e información de compra.'],
    ];
@endphp

@push('meta')
    <meta name="title"       content="Política de Garantía | {{ $channel->name ?? 'KillaVibes' }}" />
    <meta name="description" content="Garantía de 12–24 meses en todos nuestros productos. Cobertura contra defectos de fábrica y vicios ocultos." />
    <meta name="keywords"    content="garantía, cobertura, defectos, protección, servicio técnico" />
    <meta name="robots"      content="index, follow" />
@endpush

<x-shop::layouts>
<x-slot:title>Política de Garantía</x-slot>

@push('styles')
    @include('shop::pages.page-shared')
@endpush

@push('styles')
<style>
.kvp-warranty-grid {
    display:grid; grid-template-columns:1fr; gap:1.5rem;
}
@media (min-width:640px)  { .kvp-warranty-grid { grid-template-columns:repeat(2,1fr); } }
@media (min-width:1024px) { .kvp-warranty-grid { grid-template-columns:repeat(4,1fr); } }

.kvp-warranty-card {
    display:flex; flex-direction:column; gap:.875rem;
    padding:1.875rem 1.625rem;
    position:relative;
}
.kvp-warranty-card::before {
    content:''; position:absolute;
    top:0; left:0; right:0; height:3px;
    background:linear-gradient(to right,var(--kv-primary),var(--kv-accent));
    border-radius:var(--kv-radius) var(--kv-radius) 0 0;
}
.kvp-warranty-period {
    display:inline-flex; align-items:center;
    padding:.35rem .875rem; border-radius:var(--kv-radius-pill);
    font-size:.78rem; font-weight:700;
    background:rgba(34,197,94,.10); color:#16a34a;
    border:1px solid rgba(34,197,94,.22);
    width:fit-content;
}
.kvp-warranty-card h3 { font-size:1rem; font-weight:700; color:var(--kv-text); margin:0; }
.kvp-warranty-card p  { font-size:.85rem; color:var(--kv-text-muted); line-height:1.65; margin:0; }
.kvp-warranty-includes { list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:.4rem; }
.kvp-warranty-includes li {
    display:flex; align-items:center; gap:.5rem;
    font-size:.82rem; color:var(--kv-text-muted);
}
.kvp-warranty-includes li::before {
    content:''; width:5px; height:5px; border-radius:50%;
    background:var(--kv-success); flex-shrink:0;
}
.kvp-exclusions-grid {
    display:grid; grid-template-columns:1fr; gap:.75rem;
}
@media (min-width:640px) { .kvp-exclusions-grid { grid-template-columns:repeat(2,1fr); } }
.kvp-exclusion-item {
    display:flex; gap:.875rem; align-items:flex-start;
    padding:1rem 1.25rem;
    background:rgba(245,158,11,.05);
    border:1px solid rgba(245,158,11,.18);
    border-left:3px solid var(--kv-warning);
    border-radius:var(--kv-radius-sm);
}
.kvp-exclusion-item strong { display:block; font-size:.85rem; font-weight:700; color:#92400e; margin-bottom:.2rem; }
.kvp-exclusion-item p      { margin:0; font-size:.82rem; color:#78350f; line-height:1.6; }
</style>
@endpush

<section class="kvp-hero kvp-hero--warranty kvp-animate">
    <div class="kvp-hero-inner">
        <div class="kvp-hero-eyebrow">
            <span class="kvp-hero-eyebrow-dot"></span>
            Protección total
        </div>
        <h1 class="kvp-animate kvp-animate-delay-1">Política de Garantía</h1>
        <p class="kvp-hero-sub kvp-animate kvp-animate-delay-2">
            Protección de 12–24 meses en todos nuestros productos
        </p>
    </div>
</section>

<hr class="kvp-divider">

<main class="kvp-main">

    {{-- Tipos de garantía --}}
    <section class="kvp-section">
        <div class="kvp-sh kvp-sh--center">
            <div class="kvp-sh-eyebrow" style="justify-content:center;"><span class="kvp-sh-eyebrow-line"></span>Coberturas<span class="kvp-sh-eyebrow-line"></span></div>
            <h2>Tipos de Garantía</h2>
            <p>Protección completa en cada etapa de tu compra</p>
        </div>
        <div class="kvp-warranty-grid">
            @foreach($warrantyTypes as $w)
            <div class="kvp-card kvp-warranty-card">
                <div class="kvp-icon-wrap kvp-icon--{{ $w['color'] }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.8" stroke="currentColor" style="width:1.2rem;height:1.2rem;">
                        {!! $w['icon'] !!}
                    </svg>
                </div>
                <div class="kvp-warranty-period">{{ $w['period'] }}</div>
                <h3>{{ $w['name'] }}</h3>
                <p>{{ $w['coverage'] }}</p>
                <ul class="kvp-warranty-includes">
                    @foreach($w['includes'] as $inc)
                    <li>{{ $inc }}</li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </section>

    <hr class="kvp-divider">

    {{-- Timeline --}}
    <section class="kvp-section">
        <div class="kvp-sh">
            <div class="kvp-sh-eyebrow"><span class="kvp-sh-eyebrow-line"></span>Cobertura en el tiempo</div>
            <h2>Tu Garantía Paso a Paso</h2>
        </div>
        <div class="kvp-timeline">
            @foreach($timeline as $tl)
            <div class="kvp-tl-item">
                <div class="kvp-tl-year-wrap">
                    <div class="kvp-tl-dot"></div>
                    <div class="kvp-tl-year" style="font-size:.65rem;white-space:nowrap;">{{ $tl['range'] }}</div>
                </div>
                <div class="kvp-tl-content">
                    <h4>{{ $tl['title'] }}</h4>
                    <p>{{ $tl['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <hr class="kvp-divider">

    {{-- Beneficios --}}
    <section class="kvp-section">
        <div class="kvp-sh">
            <div class="kvp-sh-eyebrow"><span class="kvp-sh-eyebrow-line"></span>Ventajas</div>
            <h2>Beneficios de Nuestra Garantía</h2>
        </div>
        <ul class="kvp-check-list">
            @foreach($benefits as $b)
            <li class="kvp-check-item">
                <span class="kvp-check-icon kvp-check-icon--green">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" style="width:.7rem;height:.7rem;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                    </svg>
                </span>
                <p>{{ $b }}</p>
            </li>
            @endforeach
        </ul>
    </section>

    {{-- Exclusiones --}}
    <section class="kvp-section" style="padding-top:0;">
        <div class="kvp-sh">
            <div class="kvp-sh-eyebrow"><span class="kvp-sh-eyebrow-line"></span>Excepciones</div>
            <h2>Lo que NO Cubre la Garantía</h2>
        </div>
        <div class="kvp-exclusions-grid">
            @foreach($exclusions as $ex)
            <div class="kvp-exclusion-item">
                <div>
                    <strong>{{ $ex['title'] }}</strong>
                    <p>{{ $ex['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <hr class="kvp-divider">

    {{-- Marco legal --}}
    <section class="kvp-section">
        <div class="kvp-sh">
            <div class="kvp-sh-eyebrow"><span class="kvp-sh-eyebrow-line"></span>Regulatorio</div>
            <h2>Marco Legal</h2>
        </div>
        <div class="kvp-info-block kvp-info-block--indigo">
            <h3>Cumplimiento normativo</h3>
            <p><strong style="color:var(--kv-text);">Ley 1480/2011:</strong> Garantía legal de conformidad establecida por el Estatuto del Consumidor colombiano.</p>
            <p><strong style="color:var(--kv-text);">Garantía de Conformidad:</strong> El producto debe ser apto para el uso ordinario esperado y coincidir con su descripción.</p>
            <p><strong style="color:var(--kv-text);">Período de Reclamación:</strong> Hasta 2 años desde la compra para reclamar por vicios ocultos o defectos de fábrica.</p>
            <p><strong style="color:var(--kv-text);">Derechos del Consumidor:</strong> Puedes solicitar reparación, reemplazo, devolución o rebaja de precio según corresponda.</p>
        </div>
    </section>

    <hr class="kvp-divider">

    {{-- FAQ --}}
    <section class="kvp-section kvp-section--sm">
        <div class="kvp-sh kvp-sh--center">
            <div class="kvp-sh-eyebrow" style="justify-content:center;"><span class="kvp-sh-eyebrow-line"></span>Preguntas frecuentes<span class="kvp-sh-eyebrow-line"></span></div>
            <h2>¿Dudas sobre la garantía?</h2>
        </div>
        <div class="kvp-faq-list">
            @foreach($faqs as $faq)
            <div class="kvp-faq-item">
                <button class="kvp-faq-btn" type="button" aria-expanded="false">
                    <span>{{ $faq['q'] }}</span>
                    <svg class="kvp-faq-chevron" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
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

    <section class="kvp-section">
        <div class="kvp-cta" style="background:linear-gradient(135deg,#059669 0%,#047857 50%,#10b981 100%);">
            <h2>¿Necesitas hacer una reclamación?</h2>
            <p>Nuestro equipo está listo para ayudarte en el proceso.</p>
            <div class="kvp-cta-actions">
                <a href="mailto:garantia@killavibes.com" class="kvp-cta-btn-white" style="color:#059669;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:1rem;height:1rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/></svg>
                    Enviar Solicitud
                </a>
                <a href="https://wa.me/573001234567" class="kvp-cta-btn-ghost">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:1rem;height:1rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z"/></svg>
                    WhatsApp
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
