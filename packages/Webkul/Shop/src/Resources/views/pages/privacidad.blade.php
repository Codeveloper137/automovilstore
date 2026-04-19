{{-- ============================================================
     KILLAVIBES — privacidad.blade.php  (INTEGRACIÓN CORREGIDA)
     ============================================================ --}}

@php
    $channel = core()->getCurrentChannel();

    $sections = [
        ['number'=>'1', 'title'=>'Información que Recopilamos',
        'content'=>'Recopilamos lo que proporcionas voluntariamente: nombre, email, dirección, teléfono, documento (verificación) e información de pago. También recopilamos automáticamente: IP, navegador, páginas visitadas y cookies. Esto nos permite procesar órdenes, mejorar servicios y personalizar la experiencia.'],
        ['number'=>'2', 'title'=>'Cómo Usamos tu Información',
        'content'=>'Procesamos y entregamos órdenes, enviamos confirmaciones y rastreo, respondemos consultas, mejoramos el sitio, personalizamos contenido y enviamos comunicaciones de marketing (solo con consentimiento). Nunca vendemos datos a terceros.'],
        ['number'=>'3', 'title'=>'Compartición de Datos',
        'content'=>'Compartimos información solo cuando es necesario con transportistas, proveedores de pago, servicios de análisis y autoridades legales. Todos firman acuerdos de confidencialidad. Tu información jamás se vende a anunciantes.'],
        ['number'=>'4', 'title'=>'Seguridad de Datos',
        'content'=>'Implementamos encriptación SSL 256 bits, firewalls, autenticación de dos factores, control de acceso por roles, auditorías regulares y cumplimiento PCI DSS. Trabajamos continuamente para proteger tu información.'],
        ['number'=>'5', 'title'=>'Retención de Datos',
        'content'=>'Retenemos datos mientras sea necesario: cuenta activa, 6 años para compras (fisco), 3 años comunicaciones, 2 años análisis. Puedes solicitar eliminación anticipada escribiendo a privacidad@killavibes.com.'],
        ['number'=>'6', 'title'=>'Tus Derechos',
        'content'=>'Tienes derecho a acceder, corregir, eliminar, oponerte al procesamiento, portar tus datos y retirar el consentimiento en cualquier momento. Contacta a privacidad@killavibes.com. Respondemos en 30 días.'],
        ['number'=>'7', 'title'=>'Marketing y Comunicaciones',
        'content'=>'Confirmaciones de orden se envían siempre. Marketing y promociones, solo si consintiste. Puedes desuscribirte con el enlace al pie de cualquier email (actualización en 48 h).'],
        ['number'=>'8', 'title'=>'Cookies y Tracking',
        'content'=>'Usamos cookies para funcionalidad, análisis y marketing. Ver nuestra Política de Cookies para detalles. Respetamos Do Not Track y puedes controlar cookies desde tu navegador.'],
        ['number'=>'9', 'title'=>'Datos de Menores',
        'content'=>'El sitio no está dirigido a menores de 18 años. Si detectamos datos de un menor, los eliminamos de inmediato. Padres y tutores pueden contactar privacidad@killavibes.com.'],
        ['number'=>'10','title'=>'Cambios en la Política',
        'content'=>'Notificaremos cambios materiales por email o aviso en el sitio. El uso continuado implica aceptación. Recomendamos revisar esta política periódicamente.'],
        ['number'=>'11','title'=>'Cumplimiento Normativo',
        'content'=>'Cumplimos Ley 1581/2016, Decreto 1377/2013, GDPR y Ley 1480/2011. Designamos un Data Protection Officer (DPO) responsable de privacidad: dpo@killavibes.com.'],
        ['number'=>'12','title'=>'Contacto de Privacidad',
        'content'=>'Email: privacidad@killavibes.com | DPO: dpo@killavibes.com | Tel: +57 5 1234567 | Dirección: KillaVibes, Barranquilla, Atlántico, Colombia | Horario: Lunes–Viernes 8 AM–6 PM'],
    ];

    $rights = [
        ['title'=>'Derecho de Acceso',          'desc'=>'Puedes solicitar una copia de todos tus datos personales procesados.'],
        ['title'=>'Derecho de Rectificación',    'desc'=>'Puedes corregir información inexacta o incompleta en cualquier momento.'],
        ['title'=>'Derecho al Olvido',           'desc'=>'Puedes solicitar la eliminación de tus datos bajo ciertas circunstancias.'],
        ['title'=>'Derecho de Oposición',        'desc'=>'Puedes oponerte al procesamiento de datos para ciertos propósitos.'],
        ['title'=>'Derecho a la Portabilidad',   'desc'=>'Recibes tus datos en formato estructurado y transferible.'],
        ['title'=>'Retirar Consentimiento',      'desc'=>'Puedes cambiar tus preferencias y retirar el consentimiento en cualquier momento.'],
    ];

    $faqs = [
        ['q'=>'¿Venden mis datos personales?',          'a'=>'No. Nunca. Solo compartimos con proveedores de servicios necesarios bajo contrato de confidencialidad.'],
        ['q'=>'¿Cuánto tiempo guardan mi información?', 'a'=>'Según tipo: cuenta activa, compras 6 años, comunicaciones 3 años. Puedes solicitar eliminación.'],
        ['q'=>'¿Cumplen GDPR y leyes colombianas?',     'a'=>'Sí. Cumplimos GDPR, Ley 1581/2016 y Ley 1480/2011. Tenemos DPO designado.'],
        ['q'=>'¿Cómo cambio o corrijo mis datos?',      'a'=>'En "Mi Perfil" o enviando solicitud a privacidad@killavibes.com.'],
        ['q'=>'¿Es seguro dar mi tarjeta?',             'a'=>'Sí. SSL 256 bits y cumplimiento PCI DSS. No almacenamos números completos de tarjeta.'],
        ['q'=>'¿Puedo solicitar reporte de mis datos?', 'a'=>'Sí. Escríbenos a privacidad@killavibes.com con tu documento. Recibirás tus datos en 30 días.'],
    ];
@endphp

@push('meta')
    <meta name="title"       content="Política de Privacidad | {{ $channel->name ?? 'KillaVibes' }}" />
    <meta name="description" content="Política de privacidad y protección de datos de KillaVibes. Cumplimiento GDPR y Ley 1581/2016." />
    <meta name="keywords"    content="privacidad, protección de datos, GDPR, Ley 1581, datos personales" />
    <meta name="robots"      content="index, follow" />
@endpush

<x-shop::layouts>
<x-slot:title>Política de Privacidad</x-slot>

@push('styles')
    @include('shop::pages.page-shared')
@endpush

{{-- ══ HERO ══════════════════════════════════════════════════════ --}}
<section class="kvp-hero kvp-hero--privacy kvp-animate">
    <div class="kvp-hero-inner">
        <div class="kvp-hero-eyebrow">
            <span class="kvp-hero-eyebrow-dot"></span>
            Privacidad de datos
        </div>
        <h1 class="kvp-animate kvp-animate-delay-1">Política de Privacidad</h1>
        <p class="kvp-hero-sub kvp-animate kvp-animate-delay-2">Tu privacidad es nuestra prioridad absoluta</p>
    </div>
</section>

<hr class="kvp-divider">

<main class="kvp-main" style="max-width:var(--kv-max-prose);">

    {{-- ══ SECCIONES LEGALES ══════════════════════════════════════ --}}
    <section class="kvp-section kvp-section--sm">
        <div class="kvp-last-updated">
            <span><strong>Última actualización:</strong> Abril 2026</span>
            <span><strong>Versión:</strong> 1.0</span>
            <span><strong>Vigencia:</strong> Permanente, sujeta a cambios</span>
        </div>

        @foreach($sections as $i => $section)
        <div class="kvp-prose-card" style="animation-delay:{{ $i * 0.04 }}s;">
            <div class="kvp-section-badge">{{ $section['number'] }}</div>
            <h3>{{ $section['title'] }}</h3>
            <p>{{ $section['content'] }}</p>
        </div>
        @endforeach
    </section>

    <hr class="kvp-divider">

    {{-- ══ DERECHOS GDPR ══════════════════════════════════════════ --}}
    <section class="kvp-section">
        <div class="kvp-sh">
            <div class="kvp-sh-eyebrow"><span class="kvp-sh-eyebrow-line"></span>GDPR</div>
            <h2>Tus Derechos de Privacidad</h2>
        </div>
        <div class="kvp-rights-grid">
            @foreach($rights as $right)
            <div class="kvp-rights-item">
                <div>
                    <strong>{{ $right['title'] }}</strong>
                    <p>{{ $right['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="kvp-notice kvp-notice--ok" style="margin-top:1.5rem;">
            <div>
                <strong>Cómo ejercer tus derechos</strong>
                <p>Envía solicitud a <strong>privacidad@killavibes.com</strong> con tu nombre y documento. Respondemos en máximo 30 días hábiles conforme a Ley 1581/2016.</p>
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
            <h2>Privacidad: tus dudas</h2>
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
        <div class="kvp-cta" style="background:linear-gradient(135deg,#059669 0%,#047857 60%,#065f46 100%);">
            <h2>¿Preguntas sobre tu privacidad?</h2>
            <p>Contáctanos directamente sin intermediarios.</p>
            <div class="kvp-cta-actions">
                <a href="mailto:privacidad@killavibes.com" class="kvp-cta-btn-white" style="color:#059669;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="2" stroke="currentColor" style="width:1rem;height:1rem;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>
                    </svg>
                    Email Privacidad
                </a>
                <a href="mailto:dpo@killavibes.com" class="kvp-cta-btn-ghost">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="2" stroke="currentColor" style="width:1rem;height:1rem;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/>
                    </svg>
                    Data Protection Officer
                </a>
            </div>
        </div>
    </section>

</main>

{{-- ══ SCHEMA.ORG ══════════════════════════════════════════════ --}}
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
