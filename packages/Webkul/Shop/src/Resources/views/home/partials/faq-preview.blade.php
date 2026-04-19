{{-- faq-preview.blade.php --}}

@php
    $faqs = [
        [
            'q' => '¿Hacen envíos a toda Barranquilla y Soledad?',
            'a' => 'Sí, hacemos envíos gratis a toda Barranquilla y Soledad. El tiempo de entrega es el mismo día o máximo al día siguiente dependiendo del horario del pedido. Para otras ciudades consulta con nuestro equipo de soporte.',
            'icon' => 'truck',
            'color' => '#3b82f6',
            'bg'    => 'rgba(59,130,246,0.10)',
        ],
        [
            'q' => '¿Los productos tienen garantía?',
            'a' => 'Todos nuestros productos son 100% originales y cuentan con garantía del fabricante. Adicionalmente ofrecemos soporte postventa directo en caso de cualquier inconveniente con tu compra.',
            'icon' => 'shield',
            'color' => '#22c55e',
            'bg'    => 'rgba(34,197,94,0.10)',
        ],
        [
            'q' => '¿Cómo puedo realizar mi pedido?',
            'a' => 'Puedes comprar directamente desde nuestra tienda online, agregar los productos al carrito y completar el pago de forma segura. También puedes contactarnos por WhatsApp para asesoría personalizada antes de tu compra.',
            'icon' => 'cart',
            'color' => '#6366f1',
            'bg'    => 'rgba(99,102,241,0.10)',
        ],
        [
            'q' => '¿Qué métodos de pago aceptan?',
            'a' => 'Aceptamos transferencias bancarias, pagos en efectivo contra entrega, y múltiples métodos de pago digital. Al finalizar tu pedido verás todas las opciones disponibles para elegir la que más te convenga.',
            'icon' => 'zap',
            'color' => '#f97316',
            'bg'    => 'rgba(249,115,22,0.10)',
        ],
        [
            'q' => '¿Tienen soporte después de la compra?',
            'a' => 'Sí, contamos con soporte 24/7. Puedes contactarnos por WhatsApp, redes sociales o directamente en nuestra tienda. Nuestro equipo está siempre disponible para ayudarte con cualquier duda o inconveniente.',
            'icon' => 'clock',
            'color' => '#a855f7',
            'bg'    => 'rgba(168,85,247,0.10)',
        ],
    ];


    $trustItems = [
        ['path' => 'M5 13l4 4L19 7',       'text' => 'Respuesta en menos de 1 hora'],
        ['path' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z', 'text' => 'Soporte 24/7 disponible'],
        ['path' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'text' => 'Garantía en cada compra'],
    ];
@endphp

@push('styles')
<style>
.kvfaq-layout {
    display: grid;
    grid-template-columns: 1fr;
    gap: 4rem;
    align-items: start;
}
@media (min-width: 1024px) {
    .kvfaq-layout {
        grid-template-columns: 1fr 1.5fr;
        gap: 5rem;
    }
}
.kvfaq-side {
    position: sticky;
    top: 6rem;
    display: flex;
    flex-direction: column;
    gap: 2rem;
    animation: kvFadeUp 0.8s cubic-bezier(0.22,1,0.36,1) 0.1s both;
}
@media (max-width: 1023px) {
    .kvfaq-side { position: static; }
}
.kvfaq-side-title {
    font-size: clamp(1.8rem, 3.5vw, 2.6rem);
    font-weight: 800;
    letter-spacing: -0.04em;
    line-height: 1.12;
    color: var(--foreground);
    margin: 0;
}
.kvfaq-side-desc {
    font-size: 1rem;
    color: var(--muted-foreground);
    line-height: 1.8;
    margin: 0;
}
.kvfaq-contact-card {
    padding: 1.5rem;
    border-radius: 1.25rem;
    border: 1.5px solid rgba(99,102,241,0.18);
    background: rgba(99,102,241,0.04);
    backdrop-filter: blur(8px);
    display: flex;
    flex-direction: column;
    gap: 1rem;
}
.kvfaq-contact-card strong {
    font-size: 0.9rem;
    font-weight: 700;
    color: var(--foreground);
    display: block;
    margin-bottom: 0.15rem;
}
.kvfaq-contact-card p {
    font-size: 0.82rem;
    color: var(--muted-foreground);
    line-height: 1.6;
    margin: 0;
}
.kvfaq-list {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
    animation: kvFadeUp 0.8s cubic-bezier(0.22,1,0.36,1) 0.2s both;
}
.kvfaq-item {
    border-radius: 1rem;
    border: 1.5px solid rgba(226,232,240,0.8);
    background: rgba(255,255,255,0.6);
    backdrop-filter: blur(10px);
    overflow: hidden;
    transition: border-color 0.25s ease, box-shadow 0.25s ease;
}
.kvfaq-item.kvfaq-open {
    border-color: rgba(99,102,241,0.28);
    box-shadow: 0 8px 32px rgba(99,102,241,0.10);
}
.kvfaq-trigger {
    width: 100%;
    display: flex;
    align-items: center;
    gap: 0.875rem;
    padding: 1.125rem 1.375rem;
    background: transparent;
    border: none;
    cursor: pointer;
    text-align: left;
    appearance: none;
    -webkit-appearance: none;
    transition: background 0.2s ease;
}
.kvfaq-trigger:hover {
    background: rgba(99,102,241,0.035);
}
.kvfaq-trigger:focus-visible {
    outline: 2px solid #6366f1;
    outline-offset: -2px;
    border-radius: 1rem;
}
.kvfaq-icon {
    flex-shrink: 0;
    width: 2.25rem;
    height: 2.25rem;
    border-radius: 0.625rem;
    display: flex;
    align-items: center;
    justify-content: center;
}
.kvfaq-icon svg {
    width: 1.1rem;
    height: 1.1rem;
}
.kvfaq-question {
    flex: 1;
    font-size: 0.92rem;
    font-weight: 700;
    color: var(--foreground);
    line-height: 1.45;
}
.kvfaq-chevron {
    flex-shrink: 0;
    width: 1.5rem;
    height: 1.5rem;
    border-radius: 9999px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(99,102,241,0.08);
    transition: background 0.25s ease, transform 0.35s cubic-bezier(0.34,1.56,0.64,1);
    color: #6366f1;
}
.kvfaq-chevron svg {
    width: 0.875rem;
    height: 0.875rem;
    transition: transform 0.35s cubic-bezier(0.34,1.56,0.64,1);
}
.kvfaq-open .kvfaq-chevron {
    background: rgba(99,102,241,0.14);
    transform: none;
}
.kvfaq-open .kvfaq-chevron svg {
    transform: rotate(180deg);
}
.kvfaq-panel {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.42s cubic-bezier(0.22,1,0.36,1),
                opacity 0.3s ease,
                padding 0.3s ease;
    opacity: 0;
    padding: 0 1.375rem;
}
.kvfaq-panel.kvfaq-panel-open {
    max-height: 300px;
    opacity: 1;
    padding: 0 1.375rem 1.375rem;
}
.kvfaq-answer {
    font-size: 0.875rem;
    color: var(--muted-foreground);
    line-height: 1.8;
    padding-left: calc(2.25rem + 0.875rem);
    border-left: 2px solid rgba(99,102,241,0.15);
    padding-top: 0.5rem;
}
.kvfaq-counter {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.72rem;
    font-weight: 700;
    color: var(--muted-foreground);
    text-transform: uppercase;
    letter-spacing: 0.08em;
}
.kvfaq-counter strong {
    font-size: 1.1rem;
    font-weight: 800;
    letter-spacing: -0.02em;
    background: linear-gradient(135deg, #6366f1, #22d3ee);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
</style>
@endpush

<section class="kv-section" style="background: linear-gradient(180deg, var(--background) 0%, rgba(99,102,241,0.025) 50%, var(--background) 100%);">

    <div class="kv-orb" style="top:2rem;left:-4rem;width:22rem;height:22rem;background:rgba(99,102,241,0.06);animation:kvPulse 7s ease-in-out infinite;"></div>
    <div class="kv-orb" style="bottom:2rem;right:-4rem;width:26rem;height:26rem;background:rgba(34,211,238,0.05);animation:kvPulse 8s ease-in-out infinite 3s;"></div>

    <div class="kv-section-inner">

        <div class="kv-section-header">
            <div class="kv-eyebrow">
                <div class="kv-eyebrow-dot"></div>
                <span class="kv-eyebrow-text">Preguntas Frecuentes</span>
            </div>
            <h2 class="kv-section-title">
                Todo lo que necesitas <span class="kv-gradient-text">saber</span>
            </h2>
            <p class="kv-section-sub">Resolvemos tus dudas para que compres con total confianza</p>
        </div>

        <div class="kvfaq-layout">

            {{-- ── COLUMNA LATERAL ── --}}
            <div class="kvfaq-side">

                <div>
                    <h3 class="kvfaq-side-title">
                        ¿Tienes más<br>
                        <span class="kv-gradient-text">preguntas?</span>
                    </h3>
                    {{-- CORREGIDO: margin-top como clase CSS en vez de style inline para consistencia --}}
                    <p class="kvfaq-side-desc" style="margin-top:1rem;">
                        Nuestro equipo está disponible 24/7 para ayudarte antes, durante y después de tu compra.
                    </p>
                </div>

                <div class="kvfaq-counter">
                    <strong>{{ count($faqs) }}</strong>
                    preguntas respondidas
                </div>

                <div class="kvfaq-contact-card">
                    <div style="display:flex;align-items:center;gap:0.75rem;">
                        <div style="width:2.5rem;height:2.5rem;border-radius:0.75rem;background:linear-gradient(135deg,#6366f1,#22d3ee);display:flex;align-items:center;justify-content:center;flex-shrink:0;box-shadow:0 4px 14px rgba(99,102,241,0.30);">
                            <svg xmlns="http://www.w3.org/2000/svg" style="width:1.1rem;height:1.1rem;color:#fff;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                        </div>
                        <div>
                            <strong>¿No encontraste tu respuesta?</strong>
                            <p>Escríbenos y te respondemos al instante.</p>
                        </div>
                    </div>
                    <a href="{{ url('/contact-us') }}" class="kv-btn-primary" style="width:100%;justify-content:center;">
                        Contáctanos ahora
                        <svg xmlns="http://www.w3.org/2000/svg" style="width:1rem;height:1rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>

                {{-- CORREGIDO: trust signals — usar {!! !!} para paths SVG en vez de {{ }} --}}
                {{-- {{ }} aplica htmlspecialchars y convierte > en &gt; rompiendo los paths SVG --}}
                <div style="display:flex;flex-direction:column;gap:0.6rem;">
                    @foreach($trustItems as $trust)
                        <div style="display:flex;align-items:center;gap:0.5rem;">
                            <svg xmlns="http://www.w3.org/2000/svg" style="width:0.9rem;height:0.9rem;color:#6366f1;flex-shrink:0;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{!! $trust['path'] !!}"/>
                            </svg>
                            <span style="font-size:0.8rem;font-weight:600;color:var(--muted-foreground);">{{ $trust['text'] }}</span>
                        </div>
                    @endforeach
                </div>

            </div>{{-- /kvfaq-side --}}

            {{-- ── ACORDEÓN ── --}}
            <div class="kvfaq-list" id="kvfaqList">

                @foreach($faqs as $i => $faq)
                    <div class="kvfaq-item" id="kvfaqItem{{ $i }}" style="animation:kvCardIn 0.5s cubic-bezier(0.34,1.56,0.64,1) {{ 0.1 + $i * 0.07 }}s both;">

                        <button
                            type="button"
                            class="kvfaq-trigger"
                            id="kvfaqTrigger{{ $i }}"
                            aria-expanded="false"
                            aria-controls="kvfaqPanel{{ $i }}"
                        >
                            {{-- CORREGIDO: background y color como atributos directos con e() en vez de interpolación libre --}}
                            <div class="kvfaq-icon" style="background:{{ $faq['bg'] }};color:{{ $faq['color'] }};">
                                @if($faq['icon'] === 'truck')
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/></svg>
                                @elseif($faq['icon'] === 'shield')
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                                @elseif($faq['icon'] === 'cart')
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                @elseif($faq['icon'] === 'zap')
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                @endif
                            </div>

                            <span class="kvfaq-question">{{ $faq['q'] }}</span>

                            <span class="kvfaq-chevron">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </span>
                        </button>

                        <div
                            class="kvfaq-panel"
                            id="kvfaqPanel{{ $i }}"
                            role="region"
                            aria-labelledby="kvfaqTrigger{{ $i }}"
                        >
                            <p class="kvfaq-answer">{{ $faq['a'] }}</p>
                        </div>

                    </div>
                @endforeach

            </div>{{-- /kvfaq-list --}}

        </div>{{-- /kvfaq-layout --}}

    </div>{{-- /kv-section-inner --}}

</section>

@push('scripts')
<script>
(function () {
    'use strict';
    if (window.__kvfaqReady) return;
    window.__kvfaqReady = true;

    var TOTAL = {{ count($faqs) }};

    function init() {
        for (var i = 0; i < TOTAL; i++) {
            ;(function (idx) {
                var trigger = document.getElementById('kvfaqTrigger' + idx);
                var panel   = document.getElementById('kvfaqPanel'   + idx);
                var item    = document.getElementById('kvfaqItem'    + idx);
                if (!trigger || !panel || !item) return;

                trigger.addEventListener('click', function () {
                    var isOpen = item.classList.contains('kvfaq-open');

                    for (var j = 0; j < TOTAL; j++) {
                        var otherItem    = document.getElementById('kvfaqItem'    + j);
                        var otherPanel   = document.getElementById('kvfaqPanel'   + j);
                        var otherTrigger = document.getElementById('kvfaqTrigger' + j);
                        if (!otherItem) continue;
                        otherItem.classList.remove('kvfaq-open');
                        otherPanel.classList.remove('kvfaq-panel-open');
                        otherTrigger.setAttribute('aria-expanded', 'false');
                    }

                    if (!isOpen) {
                        item.classList.add('kvfaq-open');
                        panel.classList.add('kvfaq-panel-open');
                        trigger.setAttribute('aria-expanded', 'true');
                    }
                });
            })(i);
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function () {
            requestAnimationFrame(function () { requestAnimationFrame(init); });
        });
    } else {
        requestAnimationFrame(function () { requestAnimationFrame(init); });
    }
})();
</script>
@endpush
