{{-- ============================================================
     KILLAVIBES — terminos.blade.php  (MEJORADO)
     ============================================================ --}}

@php
    $channel = core()->getCurrentChannel();

    $sections = [
        ['number' => '1',  'title' => 'Aceptación de Términos',
         'content' => 'Al acceder y usar killavibes.com aceptas estar obligado por estos Términos. Si no estás de acuerdo, no debes usar el sitio. Nos reservamos el derecho de modificarlos; es tu responsabilidad revisarlos regularmente. El uso continuado implica aceptación de cualquier cambio.'],
        ['number' => '2',  'title' => 'Uso Permitido',
         'content' => 'Debes usar el sitio para propósitos legales y sin violar derechos de terceros. Está prohibido: acosar, transmitir obscenidades, enviar spam, hacer cracking, distribuir virus, obtener información no autorizada o cometer cualquier tipo de fraude.'],
        ['number' => '3',  'title' => 'Propiedad Intelectual',
         'content' => 'Todo el contenido (textos, imágenes, logos, marcas, software) es propiedad de KillaVibes o sus licenciantes. No puedes reproducir ni distribuir contenido sin autorización escrita. Derechos protegidos por leyes internacionales de copyright y propiedad intelectual.'],
        ['number' => '4',  'title' => 'Limitación de Responsabilidad',
         'content' => 'El sitio se proporciona "tal cual". KillaVibes no es responsable por daños indirectos, pérdida de datos, interrupciones o errores técnicos. Nuestra responsabilidad máxima queda limitada al monto pagado en la transacción en cuestión.'],
        ['number' => '5',  'title' => 'Cuentas de Usuario',
         'content' => 'Eres responsable de la confidencialidad de tu contraseña. Todas las actividades realizadas bajo tu cuenta son de tu responsabilidad. Notifícanos de inmediato cualquier acceso no autorizado a tu cuenta.'],
        ['number' => '6',  'title' => 'Precios y Disponibilidad',
         'content' => 'Precios y disponibilidad pueden cambiar sin previo aviso. Nos reservamos el derecho de rechazar o cancelar órdenes por disponibilidad limitada, errores de precio o sospecha fundada de fraude.'],
        ['number' => '7',  'title' => 'Cambios y Cancelaciones',
         'content' => 'Solo se aceptan cambios dentro de 1 hora de confirmación del pedido. Cancelaciones dentro de ese período reciben reembolso completo. Las órdenes ya despachadas siguen la política de devoluciones estándar.'],
        ['number' => '8',  'title' => 'Responsabilidad por Terceros',
         'content' => 'El sitio puede incluir contenido de terceros. KillaVibes no es responsable por su exactitud o legalidad. El acceso a sitios externos vinculados desde nuestro sitio es bajo tu propio riesgo.'],
        ['number' => '9',  'title' => 'Ley Aplicable y Jurisdicción',
         'content' => 'Estos Términos se rigen por las leyes de Colombia, Ley 1480/2011. Las disputas se resuelven ante las autoridades judiciales competentes de Barranquilla, Atlántico, Colombia.'],
        ['number' => '10', 'title' => 'Modificaciones del Servicio',
         'content' => 'KillaVibes puede modificar, suspender o descontinuar el sitio sin previo aviso. No somos responsables ante ti o terceros por tales cambios, suspensiones o interrupciones del servicio.'],
        ['number' => '11', 'title' => 'Indemnización',
         'content' => 'Aceptas indemnizar a KillaVibes de reclamaciones resultantes de tu violación de estos Términos, mal uso del sitio o incumplimiento de leyes aplicables o derechos de terceros.'],
        ['number' => '12', 'title' => 'Cumplimiento Legal',
         'content' => 'KillaVibes opera conforme a Ley 1480/2011, Resoluciones SIC, regulaciones de e-commerce colombianas y leyes fiscales aplicables. Estamos debidamente registrados ante las autoridades competentes.'],
        ['number' => '13', 'title' => 'Contacto Legal',
         'content' => 'Email: legal@killavibes.com | Tel: +57 5 123 4567 | Dirección: KillaVibes, Barranquilla, Atlántico, Colombia | Horario: Lunes–Viernes 8 AM–6 PM'],
    ];

    $keyPoints = [
        ['title' => 'Uso legal',          'desc' => 'El sitio solo puede usarse para propósitos legales y legítimos.',       'color' => 'indigo'],
        ['title' => 'Sin fraude',          'desc' => 'Actividades fraudulentas resultan en suspensión inmediata de cuenta.',  'color' => 'red'],
        ['title' => 'Propiedad intelectual','desc' => 'Todo el contenido está protegido por derechos de autor internacionales.','color' => 'cyan'],
        ['title' => 'Ley colombiana',      'desc' => 'Ley 1480/2011 rige todos los aspectos de la relación comercial.',       'color' => 'green'],
    ];

    $faqs = [
        ['q' => '¿Pueden cambiar los términos sin aviso?',   'a' => 'Sí. Es tu responsabilidad revisarlos regularmente. El uso continuado del sitio implica aceptación de los cambios realizados.'],
        ['q' => '¿Cuál es la ley que aplica?',              'a' => 'Ley 1480/2011 y leyes colombianas vigentes. Las disputas se resuelven ante las cortes de Barranquilla, Atlántico.'],
        ['q' => '¿Qué pasa con mi reclamación?',            'a' => 'Contacta legal@killavibes.com con todos los detalles. Respondemos en máximo 15 días hábiles.'],
        ['q' => '¿Son responsables por errores del sitio?', 'a' => 'No. El sitio se proporciona "tal cual". La responsabilidad queda limitada al monto de la transacción en cuestión.'],
        ['q' => '¿Pueden cancelar mi cuenta?',              'a' => 'Sí, si violas estos Términos o existe sospecha fundada de fraude o actividad ilegal.'],
        ['q' => '¿Qué hago ante una disputa?',              'a' => 'Contáctanos primero en legal@killavibes.com. Si no se resuelve, las cortes de Barranquilla tienen jurisdicción.'],
    ];
@endphp

@push('meta')
    <meta name="title"       content="Términos y Condiciones | {{ $channel->name ?? 'KillaVibes' }}" />
    <meta name="description" content="Términos y condiciones de uso de KillaVibes. Cumplimiento Ley 1480/2011 Colombia." />
    <meta name="keywords"    content="términos, condiciones, legal, acuerdo de uso, Colombia" />
    <meta name="robots"      content="index, follow" />
@endpush

<x-shop::layouts>
<x-slot:title>Términos y Condiciones</x-slot>

@push('styles')
    @include('shop::pages.page-shared')
@endpush

@push('styles')
<style>
/* ── Grid de puntos clave ── */
.kvp-keypoints-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
    margin-bottom: 2.5rem;
}
@media (min-width: 768px)  { .kvp-keypoints-grid { grid-template-columns: repeat(4, 1fr); } }
@media (max-width: 480px)  { .kvp-keypoints-grid { grid-template-columns: 1fr; } }

.kvp-keypoint-card {
    padding: 1.5rem;
    text-align: center;
}
.kvp-keypoint-card h4 {
    font-size: 0.9rem;
    font-weight: 700;
    color: var(--kv-text);
    margin: 0.875rem 0 0.4rem;
}
.kvp-keypoint-card p {
    font-size: 0.82rem;
    color: var(--kv-text-muted);
    line-height: 1.6;
    margin: 0;
}
</style>
@endpush

{{-- ══ HERO ══════════════════════════════════════════════════════ --}}
<section class="kvp-hero kvp-hero--terms kvp-animate">
    <div class="kvp-hero-inner">
        <div class="kvp-hero-eyebrow">
            <span class="kvp-hero-eyebrow-dot"></span>
            Marco legal
        </div>
        <h1 class="kvp-animate kvp-animate-delay-1">Términos y Condiciones</h1>
        <p class="kvp-hero-sub kvp-animate kvp-animate-delay-2">
            Lee nuestras condiciones de uso del sitio antes de realizar cualquier compra
        </p>
    </div>
</section>

<hr class="kvp-divider">

<main class="kvp-main" style="max-width:var(--kv-max-prose);">

    {{-- ══ PUNTOS CLAVE ═══════════════════════════════════════════ --}}
    <section class="kvp-section kvp-section--sm">
        <div class="kvp-keypoints-grid">
            @foreach($keyPoints as $kp)
            <div class="kvp-card kvp-keypoint-card">
                <div class="kvp-icon-wrap kvp-icon--{{ $kp['color'] }}" style="margin:0 auto;">
                    @if($kp['color'] === 'indigo')
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" style="width:1.1rem;height:1.1rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25"/></svg>
                    @elseif($kp['color'] === 'red')
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" style="width:1.1rem;height:1.1rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/></svg>
                    @elseif($kp['color'] === 'cyan')
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" style="width:1.1rem;height:1.1rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/></svg>
                    @else
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" style="width:1.1rem;height:1.1rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
                    @endif
                </div>
                <h4>{{ $kp['title'] }}</h4>
                <p>{{ $kp['desc'] }}</p>
            </div>
            @endforeach
        </div>

        {{-- Fecha y versión --}}
        <div class="kvp-last-updated">
            <span><strong>Última actualización:</strong> Abril 2026</span>
            <span><strong>Versión:</strong> 1.0</span>
            <span><strong>Aplica desde:</strong> Tu primer acceso al sitio</span>
        </div>

        {{-- Secciones numeradas --}}
        @foreach($sections as $i => $section)
        <div class="kvp-prose-card" style="animation-delay:{{ $i * 0.04 }}s;">
            <div class="kvp-section-badge">{{ $section['number'] }}</div>
            <h3>{{ $section['title'] }}</h3>
            <p>{{ $section['content'] }}</p>
        </div>
        @endforeach

        {{-- Aviso legal --}}
        <div class="kvp-notice kvp-notice--warn" style="margin-top:1.5rem;">
            <div>
                <strong>Aviso Legal Importante</strong>
                <p>Si consideras que alguna cláusula viola tus derechos como consumidor según Ley 1480/2011, puedes presentar una queja formal ante la Superintendencia de Industria y Comercio (SIC) de Colombia.</p>
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
            <h2>¿Dudas sobre los Términos?</h2>
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
        <div class="kvp-cta" style="background:linear-gradient(135deg,#dc2626 0%,#b91c1c 50%,#9f1239 100%);">
            <h2>¿Tienes dudas legales?</h2>
            <p>Contacta a nuestro equipo legal directamente para cualquier consulta.</p>
            <div class="kvp-cta-actions">
                <a href="mailto:legal@killavibes.com" class="kvp-cta-btn-white" style="color:#dc2626;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:1rem;height:1rem;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>
                    </svg>
                    Email Legal
                </a>
                <a href="tel:+5751234567" class="kvp-cta-btn-ghost">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:1rem;height:1rem;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"/>
                    </svg>
                    Llamada
                </a>
                <a href="https://wa.me/573001234567" class="kvp-cta-btn-ghost">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:1rem;height:1rem;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z"/>
                    </svg>
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
