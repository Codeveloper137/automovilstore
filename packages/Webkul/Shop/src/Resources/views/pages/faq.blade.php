{{-- ============================================================
     KILLAVIBES — faq-general.blade.php  (MEJORADO)
     ============================================================ --}}

@php
    $channel = core()->getCurrentChannel();

    $faqCategories = [
        [
            'name' => 'Sobre Compras',
            'slug' => 'compras',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007Z"/>',
            'questions' => [
                ['q'=>'¿Cómo compro en KillaVibes?',               'a'=>'Navega el catálogo, agrega al carrito, procede al checkout, ingresa datos de envío, elige pago y confirma. Recibirás confirmación por email.'],
                ['q'=>'¿Necesito cuenta para comprar?',             'a'=>'No. Puedes comprar como invitado. Con cuenta accedes a rastreo, favoritos y ofertas exclusivas.'],
                ['q'=>'¿Hay monto mínimo de compra?',               'a'=>'No hay monto mínimo. Algunos métodos de pago pueden tener restricciones propias.'],
                ['q'=>'¿Puedo cambiar mi pedido después?',          'a'=>'Dentro de 1 hora de confirmación puedes cancelarlo. Después aplica la política estándar de devoluciones.'],
                ['q'=>'¿Reciben órdenes corporativas?',             'a'=>'Sí, con precios especiales por volumen. Escríbenos a b2b@killavibes.com.'],
                ['q'=>'¿Tienen programa de lealtad?',               'a'=>'Sí. Cada compra acumula puntos canjeables en futuras órdenes.'],
            ]
        ],
        [
            'name' => 'Métodos de Pago',
            'slug' => 'pagos',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z"/>',
            'questions' => [
                ['q'=>'¿Qué métodos de pago aceptan?',              'a'=>'Tarjetas Visa, Mastercard y Amex; transferencia bancaria, PSE, Nequi, Daviplata y efectivo contra entrega en puntos habilitados.'],
                ['q'=>'¿Es segura mi información de pago?',         'a'=>'Sí. Usamos encriptación SSL 256 bits y cumplimos PCI DSS. No almacenamos números completos de tarjeta.'],
                ['q'=>'¿Cuántas cuotas ofrecen?',                   'a'=>'Hasta 12 cuotas sin interés con tarjetas participantes. Consulta con tu banco las condiciones.'],
                ['q'=>'¿Aceptan criptomonedas?',                    'a'=>'No por el momento. Estamos evaluando agregarlo próximamente.'],
                ['q'=>'¿Mi transacción es reversible?',             'a'=>'Sí. Contáctanos dentro de 24 horas para procesar un reembolso o ajuste.'],
                ['q'=>'¿Qué hago si mi pago fue rechazado?',        'a'=>'Verifica saldo, datos y límite de compra online. Intenta con otro método. Si persiste, contacta tu banco.'],
            ]
        ],
        [
            'name' => 'Mi Cuenta',
            'slug' => 'cuenta',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>',
            'questions' => [
                ['q'=>'¿Cómo creo una cuenta?',                     'a'=>'Haz clic en "Registrarse", ingresa email y contraseña, verifica tu email y listo.'],
                ['q'=>'Olvidé mi contraseña, ¿qué hago?',           'a'=>'Haz clic en "Olvidé contraseña", ingresa tu email y recibirás un link válido por 24 horas.'],
                ['q'=>'¿Cómo edito mi perfil?',                     'a'=>'Ve a "Mi Perfil", edita los datos y guarda los cambios.'],
                ['q'=>'¿Puedo tener múltiples cuentas?',            'a'=>'No recomendamos. Múltiples cuentas pueden resultar en restricciones de la plataforma.'],
                ['q'=>'¿Cómo elimino mi cuenta?',                   'a'=>'Envía solicitud a privacidad@killavibes.com. Procesaremos la eliminación en 30 días.'],
                ['q'=>'¿Qué datos personales solicitan?',           'a'=>'Solo nombre, email, teléfono, dirección y documento para verificación.'],
            ]
        ],
        [
            'name' => 'Productos',
            'slug' => 'productos',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9"/>',
            'questions' => [
                ['q'=>'¿Son 100% originales?',                      'a'=>'Sí. Trabajamos directo con marcas y distribuidores autorizados. Tenemos certificado de originalidad.'],
                ['q'=>'¿Cómo sé si hay stock?',                     'a'=>'El stock se actualiza en tiempo real. "En stock" significa disponibilidad inmediata.'],
                ['q'=>'¿Me notifican cuando vuelve el stock?',      'a'=>'Sí. Haz clic en "Notificarme" en el producto agotado y te avisamos por email.'],
                ['q'=>'¿Tienen fichas técnicas completas?',         'a'=>'Sí. Si faltan datos en algún producto, contáctanos y los agregamos.'],
                ['q'=>'¿Puedo comparar productos?',                 'a'=>'Sí. Agrega productos a "Comparar" para ver especificaciones lado a lado.'],
                ['q'=>'¿Las fotos son reales?',                     'a'=>'Sí, 100% fotografiadas de nuestro inventario. Diferencias permiten devolución sin costo.'],
            ]
        ],
        [
            'name' => 'Envío y Rastreo',
            'slug' => 'envios',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/>',
            'questions' => [
                ['q'=>'¿Envían a donde vivo?',                      'a'=>'Enviamos a todo Colombia. Para zonas remotas consulta disponibilidad antes de comprar.'],
                ['q'=>'¿Cuándo llega mi pedido?',                   'a'=>'Express 2–5 días, Estándar 5–8 días, Internacional 7–21 días. Desde confirmación del pago.'],
                ['q'=>'¿Cómo rastro mi pedido?',                    'a'=>'Cuenta › Mis Pedidos › selecciona la orden y accedes al número de rastreo en tiempo real.'],
                ['q'=>'¿Qué hago si se demora?',                    'a'=>'Si supera el plazo estimado contáctanos. Investigamos con el transportista.'],
                ['q'=>'¿Puedo cambiar la dirección?',               'a'=>'Sí, dentro de 1 hora del pedido. Después depende de si ya está en tránsito.'],
                ['q'=>'¿Tienen puntos de recogida?',                'a'=>'Sí. Elige entrega a domicilio o recogida en tienda física en Barranquilla.'],
            ]
        ],
        [
            'name' => 'Devoluciones',
            'slug' => 'devoluciones',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3"/>',
            'questions' => [
                ['q'=>'¿Cuál es la política de devoluciones?',      'a'=>'30 días para devolver productos sin usar. Defectos de fábrica: hasta 45 días. Reembolso 100%.'],
                ['q'=>'¿Quién paga el envío de retorno?',           'a'=>'Nosotros si es defecto, daño o error nuestro. Por cambio de opinión, el cliente asume el costo.'],
                ['q'=>'¿Cuánto tarda el reembolso?',                'a'=>'Recibido y verificado el producto (2–3 días), procesamos en 5–7 días hábiles.'],
                ['q'=>'¿Puedo cambiar por un producto diferente?',  'a'=>'Sí. Más caro pagas la diferencia; más barato te devolvemos la diferencia.'],
                ['q'=>'¿Qué no puedo devolver?',                    'a'=>'Personalizados, software descargado, higiene abierta, cables cortados, baterías dañadas.'],
                ['q'=>'¿Cómo reporto un defecto?',                  'a'=>'Escríbenos a servicio@killavibes.com dentro de 48 horas con fotos del problema.'],
            ]
        ],
        [
            'name' => 'Garantía',
            'slug' => 'garantia',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/>',
            'questions' => [
                ['q'=>'¿Todos los productos tienen garantía?',      'a'=>'Sí, mínimo 12 meses de garantía de fábrica. Algunos incluyen 24 meses.'],
                ['q'=>'¿Cómo activo mi garantía?',                  'a'=>'Se activa automáticamente con la compra. Conserva tu factura para reclamaciones.'],
                ['q'=>'¿La garantía cubre accidentes?',             'a'=>'No. Cubre defectos de fábrica y materiales. Caídas y daño por agua son exclusiones.'],
                ['q'=>'¿Puedo transferir la garantía?',             'a'=>'Sí, dentro del primer año, con registro del nuevo propietario en nuestra plataforma.'],
                ['q'=>'¿Qué hago si falla en garantía?',            'a'=>'Escríbenos a garantia@killavibes.com con fotos. Procesamos reparación o reemplazo gratis.'],
                ['q'=>'¿La garantía incluye accesorios?',           'a'=>'Sí, accesorios originales incluidos. No cubre accesorios de terceros.'],
            ]
        ],
        [
            'name' => 'Soporte',
            'slug' => 'soporte',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z"/>',
            'questions' => [
                ['q'=>'¿Cuál es el horario de atención?',           'a'=>'Chat 24/7, email respuesta en 24 h, teléfono lunes-sábado 8 am–6 pm, WhatsApp siempre.'],
                ['q'=>'¿Cómo los contacto?',                        'a'=>'Email: soporte@killavibes.com | WhatsApp: +57 300 123 4567 | Tel: +57 5 123 4567'],
                ['q'=>'¿Atienden en otros idiomas?',                'a'=>'Solo español por ahora. Inglés próximamente.'],
                ['q'=>'¿Responden fines de semana?',                'a'=>'Horario extendido. Emergencias prioritarias. Respuesta completa lunes–viernes.'],
                ['q'=>'¿Tienen chat en vivo?',                      'a'=>'Sí, disponible en el botón inferior derecho de la web. Respuesta en minutos.'],
                ['q'=>'¿Puedo agendar videollamada?',               'a'=>'Sí, para asesoría técnica. Solicita en soporte@killavibes.com y coordinamos horario.'],
            ]
        ],
    ];

    $allFaqs = collect($faqCategories)->flatMap(fn($cat) => $cat['questions'])->toArray();
@endphp

@push('meta')
    <meta name="title"       content="Centro de Ayuda | {{ $channel->name ?? 'KillaVibes' }}" />
    <meta name="description" content="Respuestas a todas tus preguntas sobre compras, envíos, devoluciones, garantía, pagos y soporte en KillaVibes." />
    <meta name="keywords"    content="FAQ, preguntas frecuentes, soporte, ayuda, compras, envío, devolución" />
    <meta name="robots"      content="index, follow" />
    <meta property="og:title"       content="Centro de Ayuda" />
    <meta property="og:description" content="Centro de ayuda con respuestas a tus dudas sobre KillaVibes" />
@endpush

<x-shop::layouts>
<x-slot:title>Preguntas Frecuentes</x-slot>

@push('styles')
    @include('shop::pages.page-shared')
@endpush

{{-- ══ HERO ══════════════════════════════════════════════════════ --}}
<section class="kvp-hero kvp-hero--faq kvp-animate">
    <div class="kvp-hero-inner">
        <div class="kvp-hero-eyebrow">
            <span class="kvp-hero-eyebrow-dot"></span>
            Centro de Ayuda
        </div>
        <h1 class="kvp-animate kvp-animate-delay-1">¿En qué podemos ayudarte?</h1>
        <p class="kvp-hero-sub kvp-animate kvp-animate-delay-2">
            Encuentra respuestas a todas tus preguntas sobre KillaVibes
        </p>
    </div>
</section>

<hr class="kvp-divider">

<main class="kvp-main">

    <section class="kvp-section kvp-section--sm">
        {{-- Buscador --}}
        <div class="kvp-search-wrap">
            <span class="kvp-search-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
                </svg>
            </span>
            <input type="text" id="kvpSearchFaq" class="kvp-search-input"
                   placeholder="Busca tu pregunta aquí…" autocomplete="off"
                   aria-label="Buscar preguntas frecuentes">
        </div>

        {{-- Filtros de categoría --}}
        <nav class="kvp-cat-nav" aria-label="Categorías de preguntas">
            <button class="kvp-cat-btn kvp-cat-active"
                    onclick="kvpFilterCategory('all', this)" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.8" stroke="currentColor" style="width:.9rem;height:.9rem;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"/>
                </svg>
                Todas
            </button>
            @foreach($faqCategories as $cat)
            <button class="kvp-cat-btn"
                    onclick="kvpFilterCategory('{{ $cat['slug'] }}', this)" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.8" stroke="currentColor" style="width:.9rem;height:.9rem;">
                    {!! $cat['icon'] !!}
                </svg>
                {{ $cat['name'] }}
            </button>
            @endforeach
        </nav>
    </section>

    {{-- Categorías con preguntas --}}
    @foreach($faqCategories as $cat)
    <section class="kvp-section kvp-section--sm" data-category="{{ $cat['slug'] }}">
        <div class="kvp-cat-header">
            <div class="kvp-cat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.8" stroke="currentColor">
                    {!! $cat['icon'] !!}
                </svg>
            </div>
            <h2>{{ $cat['name'] }}</h2>
        </div>

        <div class="kvp-faq-grid kvp-faq-list">
            @foreach($cat['questions'] as $faq)
            <div class="kvp-faq-item"
                 data-searchtext="{{ strtolower($faq['q'] . ' ' . $faq['a']) }}">
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

    @if(!$loop->last)<hr class="kvp-divider">@endif
    @endforeach

    <hr class="kvp-divider">

    {{-- CTA --}}
    <section class="kvp-section">
        <div class="kvp-cta" style="background:linear-gradient(135deg,#6366f1 0%,#4f46e5 45%,#2563eb 100%);">
            <h2>¿No encontraste tu respuesta?</h2>
            <p>Nuestro equipo de soporte está disponible 24/7 para ayudarte.</p>
            <div class="kvp-cta-actions">
                <a href="mailto:soporte@killavibes.com" class="kvp-cta-btn-white" style="color:#4f46e5;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:1rem;height:1rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/></svg>
                    Enviar Email
                </a>
                <a href="https://wa.me/573001234567" class="kvp-cta-btn-ghost">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:1rem;height:1rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z"/></svg>
                    WhatsApp
                </a>
                <a href="tel:+573001234567" class="kvp-cta-btn-ghost">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:1rem;height:1rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"/></svg>
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
        @foreach($allFaqs as $faq)
        {"@type":"Question","name":"{{ $faq['q'] }}","acceptedAnswer":{"@type":"Answer","text":"{{ $faq['a'] }}"}}{{ !$loop->last ? ',' : '' }}
        @endforeach
    ]
}
</script>

@push('scripts')
    @include('shop::pages.page-shared-js')
@endpush

</x-shop::layouts>
