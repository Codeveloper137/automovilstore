{{-- ============================================================
     KILLAVIBES — sobre-nosotros.blade.php  (MEJORADO)
     ============================================================ --}}

@php
    $channel = core()->getCurrentChannel();

    $values = [
        ['title'=>'Calidad Premium',       'color'=>'indigo','icon'=>'<path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z"/>',
         'desc'=>'Seleccionamos los mejores productos para garantizar satisfacción total.'],
        ['title'=>'Servicio Excepcional',  'color'=>'cyan', 'icon'=>'<path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"/>',
         'desc'=>'Atención enfocada en resolver tus dudas y problemas rápidamente.'],
        ['title'=>'Innovación Continua',   'color'=>'violet','icon'=>'<path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 0 1-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 0 0 6.16-12.12A14.98 14.98 0 0 0 9.631 8.41m5.96 5.96a14.926 14.926 0 0 1-5.841 2.58m-.119-8.54a6 6 0 0 0-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 0 0-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 0 1-2.448-2.448 14.9 14.9 0 0 1 .06-.312m-2.24 2.39a4.493 4.493 0 0 0-1.757 4.306 4.493 4.493 0 0 0 4.306-1.758M16.5 9a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>',
         'desc'=>'Evolucionamos para ofrecer mejores productos y experiencias.'],
        ['title'=>'Transparencia',         'color'=>'green', 'icon'=>'<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>',
         'desc'=>'Información clara sobre productos, precios y políticas sin sorpresas.'],
        ['title'=>'Responsabilidad Social', 'color'=>'green', 'icon'=>'<path stroke-linecap="round" stroke-linejoin="round" d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 0 1-1.161.886l-.143.048a1.107 1.107 0 0 0-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 0 1-1.652.928l-.679-.906a1.125 1.125 0 0 0-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 0 0-8.862 12.872M12.75 3.031a9 9 0 0 1 6.69 14.036m0 0-.177-.529A2.249 2.249 0 0 0 17.128 15H16.5l-.324-.324a1.453 1.453 0 0 0-2.328.377l-.036.073a1.586 1.586 0 0 1-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643"/>',
         'desc'=>'Comprometidos con el ambiente y la comunidad de Barranquilla.'],
        ['title'=>'Confianza y Seguridad', 'color'=>'amber', 'icon'=>'<path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/>',
         'desc'=>'Privacidad, seguridad de datos y transacciones 100% protegidas.'],
    ];

    $milestones = [
        ['year'=>'2020','event'=>'Fundación',           'desc'=>'Iniciamos en Barranquilla para llevar tecnología de calidad a la costa colombiana.'],
        ['year'=>'2021','event'=>'Plataforma digital',   'desc'=>'Lanzamos e-commerce para alcanzar clientes en toda Colombia.'],
        ['year'=>'2022','event'=>'Certificación ISO 9001','desc'=>'Reconocidos internacionalmente por estándares de calidad en servicio.'],
        ['year'=>'2023','event'=>'Expansión regional',   'desc'=>'Llegamos a Latinoamérica y nuevos mercados internacionales.'],
        ['year'=>'2024','event'=>'100 K+ clientes',      'desc'=>'Superamos cien mil clientes satisfechos y seguimos creciendo.'],
    ];

    $stats = [
        ['number'=>'100K+','label'=>'Clientes satisfechos', 'color'=>'indigo',
         'icon'=>'<path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182a4.5 4.5 0 0 1-6.364 0M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z"/>'],
        ['number'=>'10K+', 'label'=>'Productos disponibles','color'=>'cyan',
         'icon'=>'<path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9"/>'],
        ['number'=>'24/7', 'label'=>'Soporte activo',       'color'=>'green',
         'icon'=>'<path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z"/>'],
        ['number'=>'48h',  'label'=>'Envío express',        'color'=>'amber',
         'icon'=>'<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/>'],
    ];

    $faqs = [
        ['q'=>'¿Dónde se ubica KillaVibes?',       'a'=>'Sede principal en Barranquilla, Colombia. Operamos desde un moderno almacén con sistemas automáticos de logística.'],
        ['q'=>'¿Cómo puedo trabajar con ustedes?', 'a'=>'Aceptamos propuestas de proveedores, distribuidores y afiliados. Contáctanos a alianzas@killavibes.com.'],
        ['q'=>'¿Venden al por mayor?',             'a'=>'Sí. Ofrecemos precios especiales para compras al por mayor. Contacta a nuestro equipo B2B para negociar condiciones.'],
        ['q'=>'¿Cómo manejan los datos?',          'a'=>'Cumplimos GDPR y la ley colombiana de protección de datos. Tu información es 100% confidencial.'],
        ['q'=>'¿Son socialmente responsables?',    'a'=>'Destinamos 2% de ganancias a programas educativos y ambientales en la comunidad.'],
        ['q'=>'¿Ofrecen pasantías?',               'a'=>'Sí. Visita careers.killavibes.com para postularte a nuestro programa de pasantía.'],
    ];

    $legalItems = [
        'Ley 1480 de 2011 — Estatuto del Consumidor Colombiano',
        'Resoluciones SIC — Superintendencia de Industria y Comercio',
        'Normas ISO 9001 — Certificación de Gestión de Calidad',
        'GDPR y Leyes de Protección de Datos',
        'Resolución 10 de 2015 — Comercio electrónico en Colombia',
        'Estándares internacionales de logística y seguridad',
    ];

    $rseItems = [
        ['label'=>'Educación Digital',   'desc'=>'Capacitación en tecnología para jóvenes de bajos recursos.'],
        ['label'=>'Sostenibilidad',       'desc'=>'Reciclaje electrónico y reducción de huella de carbono.'],
        ['label'=>'Comunidad',           'desc'=>'Apoyo a emprendedores locales de Barranquilla.'],
        ['label'=>'Becas universitarias','desc'=>'Para estudiantes sobresalientes de la región.'],
    ];
@endphp

@push('meta')
    <meta name="title"       content="Sobre Nosotros | {{ $channel->name ?? 'KillaVibes' }}" />
    <meta name="description" content="Conoce la historia de KillaVibes. Líderes en tecnología de calidad en Colombia con 100K+ clientes." />
    <meta name="keywords"    content="KillaVibes, sobre nosotros, empresa, Barranquilla, tecnología, e-commerce" />
    <meta name="robots"      content="index, follow" />
    <meta property="og:title"       content="Sobre KillaVibes" />
    <meta property="og:description" content="Misión, visión y valores de KillaVibes" />
    <meta property="og:type"        content="website" />
@endpush

<x-shop::layouts>
<x-slot:title>Sobre Nosotros</x-slot>

@push('styles')
    @include('shop::pages.page-shared')
@endpush

@push('styles')
<style>
/* ── Estilos EXCLUSIVOS de esta página ── */
.kvp-values-grid {
    display:grid; grid-template-columns:repeat(2,1fr); gap:1.125rem;
}
@media (min-width:768px)  { .kvp-values-grid { grid-template-columns:repeat(3,1fr); } }
@media (min-width:1024px) { .kvp-values-grid { grid-template-columns:repeat(3,1fr); gap:1.5rem; } }

.kvp-value-card {
    display:flex; flex-direction:column; gap:.875rem;
    padding:1.75rem 1.5rem;
}
.kvp-value-card h4 { font-size:.97rem; font-weight:700; color:var(--kv-text); margin:0; }
.kvp-value-card p  { font-size:.875rem; color:var(--kv-text-muted); line-height:1.7; margin:0; }

.kvp-mv-grid { display:grid; grid-template-columns:1fr; gap:1.5rem; }
@media (min-width:640px) { .kvp-mv-grid { grid-template-columns:repeat(2,1fr); } }

.kvp-mv-card { padding:2.25rem 2rem; }
.kvp-mv-badge {
    display:inline-flex; align-items:center; gap:.4rem;
    font-size:.68rem; font-weight:700; text-transform:uppercase;
    letter-spacing:.12em; padding:.35rem .875rem;
    border-radius:var(--kv-radius-pill); margin-bottom:1.25rem;
}
.kvp-mv-badge--mission { background:rgba(99,102,241,.10); color:var(--kv-primary); border:1px solid rgba(99,102,241,.22); }
.kvp-mv-badge--vision  { background:rgba(124,58,237,.10);  color:#7c3aed;           border:1px solid rgba(124,58,237,.22); }
.kvp-mv-card h3 { font-size:1.3rem; font-weight:800; color:var(--kv-text); letter-spacing:-.025em; margin:0 0 .875rem; }
.kvp-mv-card p  { font-size:.93rem; color:var(--kv-text-muted); line-height:1.8; margin:0; }

.kvp-rse-grid {
    display:grid; grid-template-columns:repeat(2,1fr); gap:1rem; margin-top:1.5rem;
}
@media (max-width:480px) { .kvp-rse-grid { grid-template-columns:1fr; } }
.kvp-rse-item {
    background:rgba(99,102,241,.04); border:1px solid var(--kv-border);
    border-radius:var(--kv-radius-sm); padding:1rem 1.125rem;
}
.kvp-rse-item strong { display:block; font-size:.85rem; font-weight:700; color:var(--kv-primary); margin-bottom:.3rem; }
.kvp-rse-item span   { font-size:.82rem; color:var(--kv-text-muted); line-height:1.6; }
</style>
@endpush

{{-- ══ HERO ══════════════════════════════════════════════════════ --}}
<section class="kvp-hero kvp-hero--about kvp-animate">
    <div class="kvp-hero-inner">
        <div class="kvp-hero-eyebrow">
            <span class="kvp-hero-eyebrow-dot"></span>
            Nuestra historia
        </div>
        <h1 class="kvp-animate kvp-animate-delay-1">Sobre KillaVibes</h1>
        <p class="kvp-hero-sub kvp-animate kvp-animate-delay-2">
            Líder en tecnología de calidad para Barranquilla y todo Colombia
        </p>
    </div>
</section>

<hr class="kvp-divider">

<main class="kvp-main">

    {{-- ══ QUIÉNES SOMOS ══════════════════════════════════════════ --}}
    <section class="kvp-section">
        <div class="kvp-info-block kvp-info-block--indigo">
            <h3>¿Quiénes Somos?</h3>
            <p>
                <strong style="color:var(--kv-primary);">KillaVibes</strong> es una empresa de comercio electrónico
                especializada en productos tecnológicos de calidad premium. Nacimos en 2020 con la visión de democratizar
                el acceso a tecnología de punta en Barranquilla y expandimos nuestra presencia a todo Colombia.
            </p>
            <p>
                Operamos bajo los más altos estándares internacionales de calidad, seguridad y servicio al cliente.
                Con más de <strong style="color:var(--kv-text);">100,000 clientes satisfechos</strong> y presencia
                en múltiples ciudades, somos un referente confiable en el e-commerce colombiano.
            </p>
        </div>
    </section>

    {{-- ══ ESTADÍSTICAS ═══════════════════════════════════════════ --}}
    <section class="kvp-section" style="padding-top:0;">
        <div class="kvp-stats-band">
            @foreach($stats as $stat)
            <div class="kvp-stat-cell">
                <div class="kvp-stat-icon kvp-icon--{{ $stat['color'] }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.8" stroke="currentColor" style="width:1.15rem;height:1.15rem;">
                        {!! $stat['icon'] !!}
                    </svg>
                </div>
                <div class="kvp-stat-num">{{ $stat['number'] }}</div>
                <div class="kvp-stat-label">{{ $stat['label'] }}</div>
            </div>
            @endforeach
        </div>
    </section>

    <hr class="kvp-divider">

    {{-- ══ MISIÓN Y VISIÓN ════════════════════════════════════════ --}}
    <section class="kvp-section">
        <div class="kvp-sh">
            <div class="kvp-sh-eyebrow">
                <span class="kvp-sh-eyebrow-line"></span>Propósito
            </div>
            <h2>Misión y Visión</h2>
        </div>

        <div class="kvp-mv-grid">
            <div class="kvp-card kvp-mv-card">
                <div class="kvp-mv-badge kvp-mv-badge--mission">Misión</div>
                <h3>Nuestra Misión</h3>
                <p>Proporcionar productos tecnológicos de calidad superior con un servicio excepcional, garantizando la satisfacción de nuestros clientes a través de transparencia, confianza y compromiso continuo.</p>
            </div>
            <div class="kvp-card kvp-mv-card">
                <div class="kvp-mv-badge kvp-mv-badge--vision">Visión</div>
                <h3>Nuestra Visión</h3>
                <p>Ser la tienda de e-commerce más confiable de Colombia, reconocida por excelencia operativa, innovación constante y responsabilidad social.</p>
            </div>
        </div>
    </section>

    <hr class="kvp-divider">

    {{-- ══ VALORES ════════════════════════════════════════════════ --}}
    <section class="kvp-section">
        <div class="kvp-sh kvp-sh--center">
            <div class="kvp-sh-eyebrow" style="justify-content:center;">
                <span class="kvp-sh-eyebrow-line"></span>Principios<span class="kvp-sh-eyebrow-line"></span>
            </div>
            <h2>Nuestros Valores</h2>
            <p>Los principios que guían cada una de nuestras acciones</p>
        </div>

        <div class="kvp-values-grid">
            @foreach($values as $value)
            <div class="kvp-card kvp-value-card">
                <div class="kvp-icon-wrap kvp-icon--{{ $value['color'] }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.8" stroke="currentColor" style="width:1.35rem;height:1.35rem;">
                        {!! $value['icon'] !!}
                    </svg>
                </div>
                <h4>{{ $value['title'] }}</h4>
                <p>{{ $value['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </section>

    <hr class="kvp-divider">

    {{-- ══ HISTORIA / TIMELINE ════════════════════════════════════ --}}
    <section class="kvp-section">
        <div class="kvp-sh">
            <div class="kvp-sh-eyebrow">
                <span class="kvp-sh-eyebrow-line"></span>Trayectoria
            </div>
            <h2>Nuestra Historia</h2>
            <p>Un camino de crecimiento y confianza</p>
        </div>

        <div class="kvp-timeline">
            @foreach($milestones as $milestone)
            <div class="kvp-tl-item">
                <div class="kvp-tl-year-wrap">
                    <div class="kvp-tl-dot"></div>
                    <div class="kvp-tl-year">{{ $milestone['year'] }}</div>
                </div>
                <div class="kvp-tl-content">
                    <h4>{{ $milestone['event'] }}</h4>
                    <p>{{ $milestone['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <hr class="kvp-divider">

    {{-- ══ MARCO LEGAL ════════════════════════════════════════════ --}}
    <section class="kvp-section">
        <div class="kvp-sh">
            <div class="kvp-sh-eyebrow">
                <span class="kvp-sh-eyebrow-line"></span>Cumplimiento
            </div>
            <h2>Compromiso Legal</h2>
        </div>
        <div class="kvp-info-block kvp-info-block--indigo">
            <h3>Operamos conforme a</h3>
            <ul class="kvp-check-list" style="margin-top:.75rem;">
                @foreach($legalItems as $item)
                <li class="kvp-check-item">
                    <span class="kvp-check-icon kvp-check-icon--indigo">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="2.5" stroke="currentColor" style="width:.7rem;height:.7rem;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                        </svg>
                    </span>
                    <p>{{ $item }}</p>
                </li>
                @endforeach
            </ul>
        </div>
    </section>

    {{-- ══ RSE ════════════════════════════════════════════════════ --}}
    <section class="kvp-section" style="padding-top:0;">
        <div class="kvp-sh">
            <div class="kvp-sh-eyebrow">
                <span class="kvp-sh-eyebrow-line"></span>Impacto
            </div>
            <h2>Responsabilidad Social</h2>
        </div>
        <div class="kvp-info-block kvp-info-block--green">
            <p>Como empresa responsable, destinamos el
               <strong style="color:var(--kv-text);">2% de nuestras ganancias</strong>
               a programas de impacto social en áreas de:</p>
            <div class="kvp-rse-grid">
                @foreach($rseItems as $item)
                <div class="kvp-rse-item">
                    <strong>{{ $item['label'] }}</strong>
                    <span>{{ $item['desc'] }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <hr class="kvp-divider">

    {{-- ══ FAQ ════════════════════════════════════════════════════ --}}
    <section class="kvp-section kvp-section--sm">
        <div class="kvp-sh kvp-sh--center">
            <div class="kvp-sh-eyebrow" style="justify-content:center;">
                <span class="kvp-sh-eyebrow-line"></span>Preguntas frecuentes<span class="kvp-sh-eyebrow-line"></span>
            </div>
            <h2>¿Tienes dudas?</h2>
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
        <div class="kvp-cta" style="background:linear-gradient(135deg,#6366f1 0%,#4f46e5 45%,#7c3aed 100%);">
            <h2>¿Quieres ser parte de KillaVibes?</h2>
            <p>Tenemos oportunidades para clientes, proveedores, aliados y talento.</p>
            <div class="kvp-cta-actions">
                <a href="{{ url('/products') }}" class="kvp-cta-btn-white" style="color:#6366f1;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:1rem;height:1rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007Z"/></svg>
                    Comprar ahora
                </a>
                <a href="mailto:alianzas@killavibes.com" class="kvp-cta-btn-ghost">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:1rem;height:1rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/></svg>
                    Ser aliado
                </a>
                <a href="mailto:careers@killavibes.com" class="kvp-cta-btn-ghost">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:1rem;height:1rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0"/></svg>
                    Trabajar con nosotros
                </a>
            </div>
        </div>
    </section>

</main>

<script type="application/ld+json">
{
    "@context":"https://schema.org","@type":"Organization",
    "name":"KillaVibes","url":"{{ config('app.url') }}",
    "description":"Empresa de comercio electrónico especializada en tecnología de calidad",
    "foundingDate":"2020",
    "foundingLocation":{"@type":"Place","name":"Barranquilla","address":{"@type":"PostalAddress","addressCountry":"CO"}},
    "contactPoint":{"@type":"ContactPoint","telephone":"+57-300-123-4567","contactType":"Customer Service"}
}
</script>
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
