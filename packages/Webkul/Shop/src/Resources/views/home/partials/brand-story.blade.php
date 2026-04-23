{{-- brand-story.blade.php --}}

@push('styles')
<style>
.kvbs-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 4rem;
    align-items: center;
}
@media (min-width: 1024px) {
    .kvbs-grid {
        grid-template-columns: 1fr 1fr;
        gap: 6rem;
    }
}
.kvbs-text-col {
    display: flex;
    flex-direction: column;
    gap: 1.75rem;
    animation: kvFadeUp 0.9s cubic-bezier(0.22,1,0.36,1) 0.1s both;
}
.kvbs-title {
    font-size: clamp(2rem, 4.5vw, 3.2rem);
    font-weight: 800;
    letter-spacing: -0.04em;
    line-height: 1.1;
    color: var(--foreground);
    margin: 0;
}
.kvbs-desc {
    font-size: 1.05rem;
    color: var(--muted-foreground);
    line-height: 1.85;
    margin: 0;
    max-width: 42rem;
}
.kvbs-values {
    display: flex;
    flex-direction: column;
    gap: 0.875rem;
    margin: 0;
    padding: 0;
    list-style: none;
}
.kvbs-value-item {
    display: flex;
    align-items: flex-start;
    gap: 0.875rem;
    padding: 1rem 1.25rem;
    border-radius: 0.875rem;
    border: 1.5px solid rgba(226,232,240,0.7);
    background: rgba(255,255,255,0.55);
    backdrop-filter: blur(8px);
    transition: transform 0.3s cubic-bezier(0.34,1.56,0.64,1),
                box-shadow 0.3s ease,
                border-color 0.3s ease;
}
.kvbs-value-item:hover {
    transform: translateX(6px);
    box-shadow: 0 8px 28px rgba(99,102,241,0.10);
    border-color: rgba(99,102,241,0.28);
}
.kvbs-value-icon {
    flex-shrink: 0;
    width: 2.25rem;
    height: 2.25rem;
    border-radius: 0.625rem;
    display: flex;
    align-items: center;
    justify-content: center;
}
.kvbs-value-icon svg {
    width: 1.1rem;
    height: 1.1rem;
}
.kvbs-value-text strong {
    display: block;
    font-size: 0.88rem;
    font-weight: 700;
    color: var(--foreground);
    margin-bottom: 0.15rem;
}
.kvbs-value-text span {
    font-size: 0.8rem;
    color: var(--muted-foreground);
    line-height: 1.55;
}
.kvbs-ctas {
    display: flex;
    flex-wrap: wrap;
    gap: 0.875rem;
    align-items: center;
}
.kvbs-visual-col {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 460px;
    animation: kvFadeUp 0.9s cubic-bezier(0.22,1,0.36,1) 0.25s both;
}
.kvbs-main-card {
    position: relative;
    z-index: 10;
    width: min(360px, 90%);
    border-radius: 1.75rem;
    background: rgba(255,255,255,0.95);
    backdrop-filter: blur(24px);
    border: 1.5px solid rgba(226,232,240,0.9);
    box-shadow:
        0 24px 80px rgba(99,102,241,0.14),
        0 4px 20px rgba(99,102,241,0.08),
        inset 0 1px 0 rgba(255,255,255,1);
    overflow: hidden;
    animation: kvFloatSlow 7s ease-in-out infinite;
}
.kvbs-card-header {
    padding: 1.5rem 1.75rem 1.25rem;
    background: linear-gradient(135deg, rgba(99,102,241,0.07), rgba(34,211,238,0.05));
    border-bottom: 1px solid rgba(226,232,240,0.6);
    display: flex;
    align-items: center;
    gap: 0.875rem;
}
.kvbs-card-logo {
    width: 3rem;
    height: 3rem;
    border-radius: 0.875rem;
    background: linear-gradient(135deg, #6366f1, #22d3ee);
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 16px rgba(99,102,241,0.30);
    flex-shrink: 0;
}
.kvbs-card-logo svg {
    width: 1.4rem;
    height: 1.4rem;
    color: #fff;
}
.kvbs-card-brand strong {
    display: block;
    font-size: 0.95rem;
    font-weight: 800;
    color: var(--foreground);
}
.kvbs-card-brand span {
    font-size: 0.72rem;
    color: var(--muted-foreground);
    font-weight: 500;
}
.kvbs-card-body {
    padding: 1.5rem 1.75rem;
    display: flex;
    flex-direction: column;
    gap: 1.25rem;
}
.kvbs-metrics-row {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 0.75rem;
}
.kvbs-metric {
    text-align: center;
    padding: 0.875rem 0.5rem;
    border-radius: 0.875rem;
    background: rgba(99,102,241,0.05);
    border: 1px solid rgba(99,102,241,0.10);
}
.kvbs-metric-val {
    display: block;
    font-size: 1.15rem;
    font-weight: 800;
    letter-spacing: -0.03em;
    background: linear-gradient(135deg, #6366f1, #22d3ee);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 0.2rem;
}
.kvbs-metric-label {
    display: block;
    font-size: 0.62rem;
    font-weight: 600;
    color: var(--muted-foreground);
    text-transform: uppercase;
    letter-spacing: 0.06em;
}
.kvbs-progress-wrap {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}
.kvbs-progress-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.kvbs-progress-header span:first-child {
    font-size: 0.8rem;
    font-weight: 700;
    color: var(--foreground);
}
.kvbs-progress-header span:last-child {
    font-size: 0.8rem;
    font-weight: 800;
    color: #6366f1;
}
.kvbs-progress-bar {
    height: 6px;
    border-radius: 9999px;
    background: rgba(99,102,241,0.10);
    overflow: hidden;
}
.kvbs-progress-fill {
    height: 100%;
    border-radius: 9999px;
    background: linear-gradient(90deg, #6366f1, #22d3ee);
    box-shadow: 0 0 8px rgba(99,102,241,0.4);
    width: 0;
    transition: width 1.4s cubic-bezier(0.22,1,0.36,1);
}
.kvbs-mini-quote {
    padding: 0.875rem 1rem;
    border-radius: 0.875rem;
    background: rgba(34,211,238,0.06);
    border: 1px solid rgba(34,211,238,0.15);
}
.kvbs-mini-quote p {
    font-size: 0.78rem;
    color: var(--muted-foreground);
    line-height: 1.65;
    margin: 0 0 0.625rem;
    font-style: italic;
}
.kvbs-mini-quote-author {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}
.kvbs-mini-quote-avatar {
    width: 1.75rem;
    height: 1.75rem;
    border-radius: 9999px;
    background: linear-gradient(135deg, rgba(99,102,241,0.18), rgba(34,211,238,0.18));
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.6rem;
    font-weight: 800;
    color: #6366f1;
    flex-shrink: 0;
}
.kvbs-mini-quote-name {
    font-size: 0.72rem;
    font-weight: 700;
    color: var(--foreground);
}
.kvbs-pill-founded {
    position: absolute;
    z-index: 20;
    top: 14%;
    right: -1rem;
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    padding: 0.45rem 1rem;
    border-radius: 9999px;
    background: rgba(255,255,255,0.92);
    border: 1.5px solid rgba(99,102,241,0.22);
    backdrop-filter: blur(16px);
    box-shadow: 0 4px 20px rgba(99,102,241,0.12);
    font-size: 0.72rem;
    font-weight: 700;
    color: #6366f1;
    animation: kvFloatSlow 5s ease-in-out infinite 0.8s;
    white-space: nowrap;
}
@media (max-width: 639px) {
    .kvbs-pill-founded { right: 0.5rem; }
}
.kvbs-pill-local {
    position: absolute;
    z-index: 20;
    bottom: 14%;
    left: -1rem;
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    padding: 0.45rem 1rem;
    border-radius: 9999px;
    background: rgba(255,255,255,0.92);
    border: 1.5px solid rgba(34,197,94,0.25);
    backdrop-filter: blur(16px);
    box-shadow: 0 4px 20px rgba(34,197,94,0.12);
    font-size: 0.72rem;
    font-weight: 700;
    color: #16a34a;
    animation: kvFloatSlow 6s ease-in-out infinite 1.5s;
    white-space: nowrap;
}
@media (max-width: 639px) {
    .kvbs-pill-local { left: 0.5rem; }
}
.kvbs-divider-label {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin: 0.5rem 0;
}
.kvbs-divider-label::before,
.kvbs-divider-label::after {
    content: '';
    flex: 1;
    height: 1px;
    background: linear-gradient(to right, transparent, rgba(99,102,241,0.20));
}
.kvbs-divider-label::after {
    background: linear-gradient(to left, transparent, rgba(99,102,241,0.20));
}
.kvbs-divider-label span {
    font-size: 0.7rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: var(--muted-foreground);
    white-space: nowrap;
}
.kvbs-value-anim-1 { animation: kvCardIn 0.5s cubic-bezier(0.34,1.56,0.64,1) 0.2s both; }
.kvbs-value-anim-2 { animation: kvCardIn 0.5s cubic-bezier(0.34,1.56,0.64,1) 0.32s both; }
.kvbs-value-anim-3 { animation: kvCardIn 0.5s cubic-bezier(0.34,1.56,0.64,1) 0.44s both; }
</style>
@endpush

@php
    $kvbsCategories = ['Audífonos', 'Parlantes', 'Compresores', 'Smartwatches', 'Gaming'];
@endphp

<section class="kv-section" style="background: linear-gradient(180deg, rgba(99,102,241,0.025) 0%, var(--background) 40%, rgba(34,211,238,0.025) 100%);">

    <div class="kv-orb" style="top:-4rem;right:-2rem;width:28rem;height:28rem;background:rgba(99,102,241,0.06);animation:kvPulse 6s ease-in-out infinite;"></div>
    <div class="kv-orb" style="bottom:-4rem;left:-2rem;width:24rem;height:24rem;background:rgba(34,211,238,0.06);animation:kvPulse 7s ease-in-out infinite 2s;"></div>

    <div class="kv-section-inner">

        <div class="kvbs-grid">

            {{-- ── COLUMNA TEXTO ── --}}
            <div class="kvbs-text-col">

                <div>
                    <div class="kv-eyebrow">
                        <div class="kv-eyebrow-dot"></div>
                        <span class="kv-eyebrow-text">Nuestra Historia</span>
                    </div>
                </div>

                <h2 class="kvbs-title">
                    Comercialización de Vehículos Usados<br>
                    <span class="kv-gradient-text">En Colombia.</span>
                </h2>

                <p class="kvbs-desc">
                    AutomovilStore nació para optimizar el proceso de comercialización de vehículos de segunda mano:
                    <strong style="color:#6366f1;font-weight:600;">compra, venta  y exhibición </strong>,
                    al alcance de cualquiera <strong style="color:#22d3ee;font-weight:600;">Vehículos 100% Garantizados.</strong>
                    
                </p>

                <div class="kvbs-divider-label">
                    <span>Lo que nos define</span>
                </div>

                <ul class="kvbs-values">

                    {{-- CORREGIDO: animaciones movidas a clases CSS (kvbs-value-anim-N) --}}
                    {{-- para evitar que cubic-bezier() dentro de style="" confunda al parser --}}
                    <li class="kvbs-value-item kvbs-value-anim-1">
                        <div class="kvbs-value-icon" style="background:rgba(99,102,241,0.10);color:#6366f1;">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div class="kvbs-value-text">
                            <strong>100% Local</strong>
                            <span>Barranquilla y Soledad, con envío el mismo día sin costo adicional.</span>
                        </div>
                    </li>

                    <li class="kvbs-value-item kvbs-value-anim-2">
                        <div class="kvbs-value-icon" style="background:rgba(34,197,94,0.10);color:#22c55e;">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <div class="kvbs-value-text">
                            <strong>Autenticidad Garantizada</strong>
                            <span>Cada producto con certificación de origen y garantía directa del fabricante.</span>
                        </div>
                    </li>

                    <li class="kvbs-value-item kvbs-value-anim-3">
                        <div class="kvbs-value-icon" style="background:rgba(168,85,247,0.10);color:#a855f7;">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <div class="kvbs-value-text">
                            <strong>Vibra Única</strong>
                            <span>Una comunidad que vive la tecnología al ritmo de Barranquilla.</span>
                        </div>
                    </li>

                </ul>

                <div class="kvbs-ctas">
                    <a href="{{ url('/collections') }}" class="kv-btn-primary">
                        Conoce nuestras Colecciones
                        <svg xmlns="http://www.w3.org/2000/svg" style="width:1.1rem;height:1.1rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    <a href="{{ url('about-us') }}" class="kv-btn-ghost">
                        Nuestra historia
                    </a>
                </div>

            </div>{{-- /kvbs-text-col --}}

            {{-- ── COLUMNA VISUAL ── --}}
            <div class="kvbs-visual-col">

                <div style="position:absolute;inset:0;background:radial-gradient(circle at 60% 50%,rgba(99,102,241,0.08),rgba(34,211,238,0.06),transparent 70%);pointer-events:none;border-radius:2rem;"></div>

                <div class="kvbs-main-card">

                    <div class="kvbs-card-header">
                        <div class="kvbs-card-logo">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <div class="kvbs-card-brand">
                            <strong>KillaVibes</strong>
                            <span>Barranquilla · Desde 2023</span>
                        </div>
                        <div style="margin-left:auto;display:flex;align-items:center;gap:0.3rem;background:rgba(34,197,94,0.08);padding:0.25rem 0.625rem;border-radius:9999px;border:1px solid rgba(34,197,94,0.18);">
                            <div style="width:0.4rem;height:0.4rem;border-radius:9999px;background:#22c55e;animation:kvPulse 1.5s ease-in-out infinite;"></div>
                            <span style="font-size:0.62rem;font-weight:700;color:#22c55e;">Activo</span>
                        </div>
                    </div>

                    <div class="kvbs-card-body">

                        <div class="kvbs-metrics-row">
                            <div class="kvbs-metric">
                                <span class="kvbs-metric-val">500+</span>
                                <span class="kvbs-metric-label">Clientes</span>
                            </div>
                            <div class="kvbs-metric">
                                <span class="kvbs-metric-val">1K+</span>
                                <span class="kvbs-metric-label">Productos</span>
                            </div>
                            <div class="kvbs-metric">
                                <span class="kvbs-metric-val">4.9★</span>
                                <span class="kvbs-metric-label">Rating</span>
                            </div>
                        </div>

                        <div class="kvbs-progress-wrap">
                            <div class="kvbs-progress-header">
                                <span>Satisfacción del cliente</span>
                                <span>98%</span>
                            </div>
                            <div class="kvbs-progress-bar">
                                <div class="kvbs-progress-fill" id="kvbsProgressFill" style="width:0%;"></div>
                            </div>
                        </div>

                        <div class="kvbs-mini-quote">
                            <p>"KillaVibes tiene los mejores precios y el servicio es increíble. ¡La vibra es real!"</p>
                            <div class="kvbs-mini-quote-author">
                                <div class="kvbs-mini-quote-avatar">MG</div>
                                <span class="kvbs-mini-quote-name">María G. · Barranquilla</span>
                                {{-- CORREGIDO: @for con $s<5 reemplazado por @foreach con range() --}}
                                {{-- El operador < dentro de @for puede confundir parsers HTML --}}
                                <div style="margin-left:auto;display:flex;gap:1px;">
                                    @foreach(range(1, 5) as $star)
                                        <svg xmlns="http://www.w3.org/2000/svg" style="width:0.6rem;height:0.6rem;fill:#fbbf24;" viewBox="0 0 24 24"><path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        {{-- CORREGIDO: categorías desde variable PHP --}}
                        <div style="display:flex;flex-wrap:wrap;gap:0.4rem;">
                            @foreach($kvbsCategories as $cat)
                                <span style="font-size:0.68rem;font-weight:600;padding:0.2rem 0.625rem;border-radius:9999px;background:rgba(99,102,241,0.07);border:1px solid rgba(99,102,241,0.14);color:#6366f1;">{{ $cat }}</span>
                            @endforeach
                        </div>

                    </div>{{-- /kvbs-card-body --}}

                </div>{{-- /kvbs-main-card --}}

                <div class="kvbs-pill-founded">
                    <svg xmlns="http://www.w3.org/2000/svg" style="width:0.75rem;height:0.75rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    Fundada 2023
                </div>

                <div class="kvbs-pill-local">
                    <div style="width:0.4rem;height:0.4rem;border-radius:9999px;background:#22c55e;animation:kvPulse 1.5s ease-in-out infinite;"></div>
                    Envío local gratis
                </div>

            </div>{{-- /kvbs-visual-col --}}

        </div>{{-- /kvbs-grid --}}

    </div>{{-- /kv-section-inner --}}

</section>

@push('scripts')
<script>
(function () {
    'use strict';
    if (window.__kvbsProgressReady) return;
    window.__kvbsProgressReady = true;

    function animateFill() {
        var el = document.getElementById('kvbsProgressFill');
        if (!el) return;
        el.style.width = '98%';
    }

    if ('IntersectionObserver' in window) {
        var obs = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    animateFill();
                    obs.disconnect();
                }
            });
        }, { threshold: 0.3 });
        var target = document.getElementById('kvbsProgressFill');
        if (target) obs.observe(target.closest('.kvbs-main-card') || target);
    } else {
        animateFill();
    }
})();
</script>
@endpush
