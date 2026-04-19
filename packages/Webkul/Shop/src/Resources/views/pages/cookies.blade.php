{{-- ============================================================
     KILLAVIBES — cookies.blade.php  (MEJORADO)
     ============================================================ --}}

@php
    $channel = core()->getCurrentChannel();

    $cookieTypes = [
        [
            'name'       => 'Cookies Técnicas',
            'necessity'  => 'required',
            'label'      => 'Obligatorias',
            'color'      => 'indigo',
            'desc'       => 'Necesarias para el funcionamiento básico del sitio. Sin ellas el carrito, la sesión y la seguridad no funcionan.',
            'duration'   => 'Sesión o 1 año',
            'examples'   => ['Sesión y autenticación', 'Carrito de compras', 'Preferencias de idioma', 'Tokens CSRF de seguridad'],
            'canDisable' => false,
            'icon'       => '<path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12a7.5 7.5 0 0 0 15 0m-15 0a7.5 7.5 0 1 1 15 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077 1.41-.513m14.095-5.13 1.41-.513M5.106 17.785l1.15-.964m11.49-9.642 1.149-.964M7.501 19.795l.75-1.3m7.5-12.99.75-1.3m-6.063 16.658.26-1.477m2.605-14.772.26-1.477m0 17.726-.26-1.477M10.698 4.614l-.26-1.477M16.5 19.794l-.75-1.299M7.5 4.205 12 12m6.894 5.785-1.149-.964M6.256 7.178l-1.15-.964m15.352 8.864-1.41-.513M4.954 9.435l-1.41-.514M12.002 12l-3.75 6.495"/>',
        ],
        [
            'name'       => 'Cookies Analíticas',
            'necessity'  => 'optional',
            'label'      => 'Opcionales',
            'color'      => 'cyan',
            'desc'       => 'Nos ayudan a entender cómo usas el sitio para mejorarlo continuamente con datos de uso.',
            'duration'   => '2 años',
            'examples'   => ['Google Analytics', 'Hotjar (mapas de calor)', 'Páginas vistas y sesiones', 'Comportamiento de usuario'],
            'canDisable' => true,
            'icon'       => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z"/>',
        ],
        [
            'name'       => 'Cookies de Marketing',
            'necessity'  => 'optional',
            'label'      => 'Opcionales',
            'color'      => 'amber',
            'desc'       => 'Permiten mostrarte anuncios personalizados basados en tu comportamiento de navegación.',
            'duration'   => '1–2 años',
            'examples'   => ['Facebook Pixel', 'Google Ads', 'Instagram Ads', 'Remarketing y seguimiento'],
            'canDisable' => true,
            'icon'       => '<path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 0 1-1.44-4.282m3.102.069a18.03 18.03 0 0 1-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 0 1 8.835 2.535M10.34 6.66a23.847 23.847 0 0 1 8.835-2.535m0 0A23.74 23.74 0 0 1 18.795 3m.38 1.125a23.91 23.91 0 0 1 1.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 0 0 1.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 0 1 0 3.46"/>',
        ],
        [
            'name'       => 'Cookies de Preferencias',
            'necessity'  => 'optional',
            'label'      => 'Opcionales',
            'color'      => 'violet',
            'desc'       => 'Recuerdan tus preferencias personales para ofrecerte una experiencia más fluida y personalizada.',
            'duration'   => '1 año',
            'examples'   => ['Tema oscuro / claro', 'Productos favoritos', 'Historial de búsqueda', 'Configuración de notificaciones'],
            'canDisable' => true,
            'icon'       => '<path stroke-linecap="round" stroke-linejoin="round" d="M9.53 16.122a3 3 0 0 0-5.78 1.128 2.25 2.25 0 0 1-2.4 2.245 4.5 4.5 0 0 0 8.4-2.245c0-.399-.078-.78-.22-1.128Zm0 0a15.998 15.998 0 0 0 3.388-1.62m-5.043-.025a15.994 15.994 0 0 1 1.622-3.395m3.42 3.42a15.995 15.995 0 0 0 4.764-4.648l3.876-5.814a1.151 1.151 0 0 0-1.597-1.597L14.146 6.32a15.996 15.996 0 0 0-4.649 4.763m3.42 3.42a6.776 6.776 0 0 0-3.42-3.42"/>',
        ],
    ];

    $gdprRights = [
        ['title' => 'Derecho de acceso',         'desc' => 'Puedes solicitar una copia de tus datos personales en cualquier momento.'],
        ['title' => 'Derecho de rectificación',   'desc' => 'Puedes corregir información inexacta o incompleta sobre ti.'],
        ['title' => 'Derecho al olvido',          'desc' => 'Puedes solicitar la eliminación de tus datos cuando ya no sean necesarios.'],
        ['title' => 'Derecho de oposición',       'desc' => 'Puedes oponerte al procesamiento de datos con fines de marketing.'],
        ['title' => 'Derecho a la portabilidad',  'desc' => 'Recibes tus datos en formato estructurado y transferible a otro proveedor.'],
        ['title' => 'Retirar consentimiento',     'desc' => 'Puedes cambiar tus preferencias de cookies en cualquier momento sin penalización.'],
    ];

    $thirdParties = [
        ['name' => 'Google Analytics', 'purpose' => 'Análisis de uso y comportamiento',    'url' => 'https://policies.google.com/privacy'],
        ['name' => 'Facebook Pixel',   'purpose' => 'Publicidad personalizada',             'url' => 'https://www.facebook.com/policies'],
        ['name' => 'Google Ads',       'purpose' => 'Campañas de anuncios y remarketing',   'url' => 'https://policies.google.com/privacy'],
        ['name' => 'Hotjar',           'purpose' => 'Mapas de calor y análisis UX',         'url' => 'https://www.hotjar.com/legal/policies/privacy'],
    ];

    $browsers = [
        ['name' => 'Google Chrome',   'steps' => ['Configuración', 'Privacidad y seguridad', 'Cookies y datos del sitio']],
        ['name' => 'Mozilla Firefox', 'steps' => ['Preferencias', 'Privacidad y seguridad', 'Cookies y datos del sitio']],
        ['name' => 'Safari',          'steps' => ['Preferencias', 'Privacidad', 'Cookies y datos del sitio web']],
        ['name' => 'Microsoft Edge',  'steps' => ['Configuración', 'Privacidad, búsqueda y servicios', 'Cookies y permisos']],
    ];

    $faqs = [
        ['q' => '¿Qué es una cookie?',                'a' => 'Un pequeño archivo de datos almacenado en tu navegador que recuerda información como preferencias, historial o datos de sesión activa.'],
        ['q' => '¿Las cookies son seguras?',           'a' => 'Sí. No pueden ejecutar código ni transmitir virus. Usamos cookies bajo estándares internacionales de seguridad web.'],
        ['q' => '¿Puedo rechazar las cookies?',        'a' => 'Puedes rechazar las no esenciales desde el panel de configuración. Las técnicas son obligatorias para el funcionamiento del sitio.'],
        ['q' => '¿Cómo borro las cookies?',            'a' => 'En Chrome: Configuración › Privacidad › Borrar datos. En Firefox: Preferencias › Privacidad. En Safari: Preferencias › Privacidad.'],
        ['q' => '¿Venden mis datos a terceros?',       'a' => 'No. Nunca vendemos datos personales. Solo los compartimos con proveedores bajo contrato estricto de confidencialidad.'],
        ['q' => '¿Las cookies rastrean mi ubicación?', 'a' => 'No. Las cookies solo almacenan texto. Tu ubicación se obtiene únicamente si autorizas explícitamente al navegador.'],
        ['q' => '¿Quién accede a las cookies?',        'a' => 'Solo KillaVibes puede leer sus propias cookies. Terceros como Google o Facebook únicamente leen las suyas en nuestro sitio.'],
        ['q' => '¿Cómo me afectan las de marketing?', 'a' => 'Recibirás anuncios más relevantes. Puedes deshabilitarlas en cualquier momento sin afectar la funcionalidad del sitio.'],
    ];
@endphp

@push('meta')
    <meta name="title"       content="Política de Cookies | {{ $channel->name ?? 'KillaVibes' }}" />
    <meta name="description" content="Información sobre el uso de cookies en KillaVibes. Cumplimiento GDPR y normativa colombiana de privacidad." />
    <meta name="keywords"    content="cookies, privacidad, GDPR, consentimiento, datos personales" />
    <meta name="robots"      content="index, follow" />
@endpush

<x-shop::layouts>
<x-slot:title>Política de Cookies</x-slot>

@push('styles')
    @include('shop::pages.page-shared')
@endpush

@push('styles')
<style>
/* ── Grid de tipos de cookie ── */
.kvp-cookie-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.25rem;
}
@media (min-width: 640px)  { .kvp-cookie-grid { grid-template-columns: repeat(2, 1fr); } }
@media (min-width: 1024px) { .kvp-cookie-grid { grid-template-columns: repeat(2, 1fr); gap: 1.5rem; } }

.kvp-cookie-card {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    padding: 1.875rem;
}
.kvp-cookie-card-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 0.75rem;
}
.kvp-cookie-card h3 {
    font-size: 1rem;
    font-weight: 700;
    color: var(--kv-text);
    margin: 0 0 0.5rem;
}
.kvp-cookie-card p {
    font-size: 0.88rem;
    color: var(--kv-text-muted);
    line-height: 1.7;
    margin: 0;
}
.kvp-cookie-duration {
    font-size: 0.78rem;
    font-weight: 600;
    color: var(--kv-text-subtle);
    display: flex;
    align-items: center;
    gap: 0.35rem;
}
.kvp-cookie-examples {
    border-top: 1px solid var(--kv-border);
    padding-top: 1rem;
}
.kvp-cookie-examples-label {
    font-size: 0.72rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.09em;
    color: var(--kv-text-muted);
    margin-bottom: 0.625rem;
}
.kvp-cookie-ex-list {
    display: flex;
    flex-direction: column;
    gap: 0.4rem;
    list-style: none;
    padding: 0;
    margin: 0;
}
.kvp-cookie-ex-list li {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.83rem;
    color: var(--kv-text-muted);
}
.kvp-cookie-ex-list li::before {
    content: '';
    width: 4px;
    height: 4px;
    border-radius: 50%;
    background: var(--kv-primary);
    flex-shrink: 0;
}

/* ── Panel de preferencias ── */
.kvp-pref-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1.5rem;
    padding: 1.375rem 0;
    border-bottom: 1px solid var(--kv-border);
}
.kvp-pref-row:last-child { border-bottom: none; }
.kvp-pref-info h4 {
    font-size: 0.95rem;
    font-weight: 700;
    color: var(--kv-text);
    margin: 0 0 0.25rem;
}
.kvp-pref-info p {
    font-size: 0.85rem;
    color: var(--kv-text-muted);
    line-height: 1.6;
    margin: 0;
}

/* ── Tabla de terceros ── */
.kvp-third-table td a {
    color: var(--kv-primary);
    text-decoration: none;
    font-size: 0.85rem;
    display: inline-flex;
    align-items: center;
    gap: 0.25rem;
}
.kvp-third-table td a:hover { text-decoration: underline; }

/* ── Grid GDPR ── */
.kvp-gdpr-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 0.75rem;
    margin-top: 1.25rem;
}
@media (min-width: 640px) { .kvp-gdpr-grid { grid-template-columns: repeat(2, 1fr); } }

.kvp-gdpr-item {
    display: flex;
    gap: 0.875rem;
    align-items: flex-start;
    padding: 1.1rem 1.25rem;
    background: var(--kv-surface);
    border: 1.5px solid var(--kv-border);
    border-left: 3px solid var(--kv-primary);
    border-radius: var(--kv-radius-sm);
    transition: border-left-color .2s ease, box-shadow .2s ease;
}
.kvp-gdpr-item:hover {
    border-left-color: var(--kv-accent);
    box-shadow: var(--kv-shadow-md);
}
.kvp-gdpr-item strong {
    display: block;
    font-size: 0.88rem;
    font-weight: 700;
    color: var(--kv-text);
    margin-bottom: 0.2rem;
}
.kvp-gdpr-item p {
    font-size: 0.83rem;
    color: var(--kv-text-muted);
    line-height: 1.65;
    margin: 0;
}
</style>
@endpush

{{-- ══ HERO ══════════════════════════════════════════════════════ --}}
<section class="kvp-hero kvp-hero--cookies kvp-animate">
    <div class="kvp-hero-inner">
        <div class="kvp-hero-eyebrow">
            <span class="kvp-hero-eyebrow-dot"></span>
            Privacidad y datos
        </div>
        <h1 class="kvp-animate kvp-animate-delay-1">Política de Cookies</h1>
        <p class="kvp-hero-sub kvp-animate kvp-animate-delay-2">
            Información clara sobre cómo usamos cookies y cómo puedes controlarlas
        </p>
    </div>
</section>

<hr class="kvp-divider">

<main class="kvp-main">

    {{-- ══ ¿QUÉ SON? ══════════════════════════════════════════════ --}}
    <section class="kvp-section">
        <div class="kvp-info-block kvp-info-block--cyan">
            <h3>¿Qué son las cookies?</h3>
            <p>Las cookies son pequeños archivos de datos almacenados en tu dispositivo al visitar nuestro sitio. Se usan para mejorar tu experiencia, recordar preferencias, proteger tu cuenta y personalizar el contenido.</p>
            <p>En KillaVibes usamos cookies de acuerdo con el <strong style="color:var(--kv-text);">GDPR</strong>, la <strong style="color:var(--kv-text);">Ley 1581/2016</strong> y la normativa colombiana de privacidad de datos.</p>
        </div>
    </section>

    {{-- ══ TIPOS DE COOKIES ═══════════════════════════════════════ --}}
    <section class="kvp-section" style="padding-top:0;">
        <div class="kvp-sh">
            <div class="kvp-sh-eyebrow">
                <span class="kvp-sh-eyebrow-line"></span>Categorías
            </div>
            <h2>Tipos de Cookies que Usamos</h2>
            <p>Conoce qué información almacenamos y por qué</p>
        </div>

        <div class="kvp-cookie-grid">
            @foreach($cookieTypes as $ct)
            <div class="kvp-card kvp-cookie-card">
                <div class="kvp-cookie-card-header">
                    <div class="kvp-icon-wrap kvp-icon--{{ $ct['color'] }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.8" stroke="currentColor" style="width:1.2rem;height:1.2rem;">
                            {!! $ct['icon'] !!}
                        </svg>
                    </div>
                    <span class="kvp-badge kvp-badge--{{ $ct['necessity'] === 'required' ? 'required' : 'optional' }}">
                        {{ $ct['label'] }}
                    </span>
                </div>
                <div>
                    <h3>{{ $ct['name'] }}</h3>
                    <p>{{ $ct['desc'] }}</p>
                </div>
                <div class="kvp-cookie-duration">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.8" stroke="currentColor" style="width:.85rem;height:.85rem;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    {{ $ct['duration'] }}
                </div>
                <div class="kvp-cookie-examples">
                    <div class="kvp-cookie-examples-label">Ejemplos</div>
                    <ul class="kvp-cookie-ex-list">
                        @foreach($ct['examples'] as $ex)
                        <li>{{ $ex }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <hr class="kvp-divider">

    {{-- ══ GESTIÓN DE PREFERENCIAS ════════════════════════════════ --}}
    <section class="kvp-section">
        <div class="kvp-sh">
            <div class="kvp-sh-eyebrow">
                <span class="kvp-sh-eyebrow-line"></span>Control
            </div>
            <h2>Gestiona tus Preferencias</h2>
            <p>Decide qué cookies deseas aceptar. Las técnicas son obligatorias para el funcionamiento del sitio.</p>
        </div>

        <div class="kvp-card" style="padding:2rem;">
            {{-- Obligatorias --}}
            <div class="kvp-pref-row">
                <div class="kvp-pref-info">
                    <h4>Cookies Técnicas</h4>
                    <p>Necesarias para el funcionamiento del sitio. No pueden deshabilitarse.</p>
                </div>
                <label class="kvp-toggle" aria-label="Cookies técnicas">
                    <input type="checkbox" checked disabled>
                    <span class="kvp-toggle-track"></span>
                    <span class="kvp-toggle-thumb"></span>
                </label>
            </div>
            {{-- Analíticas --}}
            <div class="kvp-pref-row">
                <div class="kvp-pref-info">
                    <h4>Cookies Analíticas</h4>
                    <p>Para entender cómo usas el sitio y mejorarlo continuamente.</p>
                </div>
                <label class="kvp-toggle" aria-label="Cookies analíticas">
                    <input type="checkbox" id="toggle-analytics" checked>
                    <span class="kvp-toggle-track"></span>
                    <span class="kvp-toggle-thumb"></span>
                </label>
            </div>
            {{-- Marketing --}}
            <div class="kvp-pref-row">
                <div class="kvp-pref-info">
                    <h4>Cookies de Marketing</h4>
                    <p>Para personalizar anuncios y seguimiento de campañas publicitarias.</p>
                </div>
                <label class="kvp-toggle" aria-label="Cookies de marketing">
                    <input type="checkbox" id="toggle-marketing" checked>
                    <span class="kvp-toggle-track"></span>
                    <span class="kvp-toggle-thumb"></span>
                </label>
            </div>
            {{-- Preferencias --}}
            <div class="kvp-pref-row">
                <div class="kvp-pref-info">
                    <h4>Cookies de Preferencias</h4>
                    <p>Para recordar tu configuración personal en el sitio.</p>
                </div>
                <label class="kvp-toggle" aria-label="Cookies de preferencias">
                    <input type="checkbox" id="toggle-preferences" checked>
                    <span class="kvp-toggle-track"></span>
                    <span class="kvp-toggle-thumb"></span>
                </label>
            </div>
        </div>
    </section>

    <hr class="kvp-divider">

    {{-- ══ COOKIES DE TERCEROS ════════════════════════════════════ --}}
    <section class="kvp-section">
        <div class="kvp-sh">
            <div class="kvp-sh-eyebrow">
                <span class="kvp-sh-eyebrow-line"></span>Servicios externos
            </div>
            <h2>Cookies de Terceros</h2>
            <p>Proveedores externos que pueden establecer cookies al visitar nuestro sitio</p>
        </div>

        <div class="kvp-table-wrap kvp-third-table">
            <table class="kvp-table">
                <thead>
                    <tr>
                        <th>Proveedor</th>
                        <th>Propósito</th>
                        <th>Política</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($thirdParties as $tp)
                    <tr>
                        <td><strong style="color:var(--kv-text);">{{ $tp['name'] }}</strong></td>
                        <td>{{ $tp['purpose'] }}</td>
                        <td>
                            <a href="{{ $tp['url'] }}" target="_blank" rel="noopener">
                                Ver política
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="2" stroke="currentColor" style="width:.75rem;height:.75rem;">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    {{-- ══ GDPR ════════════════════════════════════════════════════ --}}
    <section class="kvp-section" style="padding-top:0;">
        <div class="kvp-info-block kvp-info-block--indigo">
            <h3>GDPR y derechos de privacidad</h3>
            <p>De conformidad con el GDPR y la Ley 1581/2016, tienes los siguientes derechos sobre tus datos:</p>
            <div class="kvp-gdpr-grid">
                @foreach($gdprRights as $right)
                <div class="kvp-gdpr-item">
                    <div>
                        <strong>{{ $right['title'] }}</strong>
                        <p>{{ $right['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <p style="margin-top:1.5rem;margin-bottom:0;">
                Para ejercer estos derechos contacta a
                <strong style="color:var(--kv-text);">privacidad@killavibes.com</strong> —
                respondemos en máximo 30 días hábiles.
            </p>
        </div>
    </section>

    <hr class="kvp-divider">

    {{-- ══ NAVEGADORES ════════════════════════════════════════════ --}}
    <section class="kvp-section">
        <div class="kvp-sh">
            <div class="kvp-sh-eyebrow">
                <span class="kvp-sh-eyebrow-line"></span>Instrucciones
            </div>
            <h2>Controlar Cookies en tu Navegador</h2>
            <p>Pasos para gestionar cookies directamente desde tu navegador favorito</p>
        </div>

        <div class="kvp-browser-grid">
            @foreach($browsers as $browser)
            <div class="kvp-card kvp-browser-card">
                <h4>{{ $browser['name'] }}</h4>
                <ol class="kvp-browser-steps">
                    @foreach($browser['steps'] as $step)
                    <li>{{ $step }}</li>
                    @endforeach
                </ol>
            </div>
            @endforeach
        </div>
    </section>

    <hr class="kvp-divider">

    {{-- ══ FAQ ════════════════════════════════════════════════════ --}}
    <section class="kvp-section kvp-section--sm">
        <div class="kvp-sh kvp-sh--center">
            <div class="kvp-sh-eyebrow" style="justify-content:center;">
                <span class="kvp-sh-eyebrow-line"></span>Preguntas frecuentes<span class="kvp-sh-eyebrow-line"></span>
            </div>
            <h2>Cookies: tus dudas</h2>
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
        <div class="kvp-cta" style="background:linear-gradient(135deg,#0891b2 0%,#0e7490 50%,#0369a1 100%);">
            <h2>¿Más preguntas sobre privacidad?</h2>
            <p>Nuestro equipo de privacidad está disponible para ayudarte sin complicaciones.</p>
            <div class="kvp-cta-actions">
                <a href="mailto:privacidad@killavibes.com" class="kvp-cta-btn-white" style="color:#0891b2;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:1rem;height:1rem;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>
                    </svg>
                    Correo de privacidad
                </a>
                <a href="{{ url('/politica-privacidad') }}" class="kvp-cta-btn-ghost">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:1rem;height:1rem;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/>
                    </svg>
                    Política de privacidad
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
