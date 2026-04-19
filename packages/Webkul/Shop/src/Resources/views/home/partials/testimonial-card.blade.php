{{-- =====================================================================
     PARTIAL: testimonial-card
     Uso: @include('shop::home.partials.testimonial-card')

     ARQUITECTURA FINAL:
     ─────────────────────────────────────────────────────────────────
     En index.blade.php la estructura es:

         <div class="kv-section-inner">          ← SIN v-pre
             ...header...
             <div v-pre>                          ← v-pre SOLO aquí
                 @include(este archivo)
             </div>
         </div>

     El <style> de este partial queda FUERA de v-pre → el browser
     lo procesa correctamente como hoja de estilos.

     El HTML del carrusel queda DENTRO de v-pre → Vue no lo destruye
     cuando ejecuta app.mount("#app") en el evento "load".

     El JS se reinicia después del mount de Vue para garantizar
     que los event listeners estén activos post-hidratación.
====================================================================== --}}

{{-- ══════════════════════════════
     CSS — procesado normalmente
     (está fuera del div v-pre)
══════════════════════════════ --}}
<style>

#kvcRoot *,
#kvcRoot *::before,
#kvcRoot *::after {
    box-sizing:  border-box !important;
    font-family: ui-sans-serif, system-ui, -apple-system, sans-serif !important;
}

#kvcRoot p {
    margin:      0 !important;
    padding:     0 !important;
    max-width:   none !important;
    text-align:  left !important;
    line-height: inherit !important;
    font-size:   inherit !important;
    color:       inherit !important;
}

#kvcRoot svg {
    display:        inline-block !important;
    vertical-align: middle !important;
    overflow:       visible !important;
}

#kvcRoot {
    all:                 initial !important;
    display:             block !important;
    width:               100% !important;
    font-family:         ui-sans-serif, system-ui, -apple-system, sans-serif !important;
    font-size:           16px !important;
    line-height:         1.5 !important;
    color:               #0f172a !important;
    animation-duration:  revert !important;
    transition-duration: revert !important;
}

#kvcRoot .kvc-viewport {
    display:  block !important;
    width:    100% !important;
    overflow: hidden !important;
    position: relative !important;
}

#kvcRoot .kvc-track {
    display:             flex !important;
    flex-wrap:           nowrap !important;
    align-items:         stretch !important;
    will-change:         transform !important;
    transition-duration: revert !important;
    animation-duration:  revert !important;
}

#kvcRoot .kvc-slide {
    flex-shrink: 0 !important;
    flex-grow:   0 !important;
    display:     block !important;
}

#kvcRoot .kvc-card {
    display:             flex !important;
    flex-direction:      column !important;
    gap:                 1.25rem !important;
    height:              100% !important;
    position:            relative !important;
    overflow:            hidden !important;
    padding:             2rem !important;
    background:          #ffffff !important;
    border:              1.5px solid rgba(226,232,240,0.85) !important;
    border-radius:       1.25rem !important;
    box-shadow:          0 4px 24px rgba(99,102,241,0.08), inset 0 1px 0 #fff !important;
    animation:           none !important;
    transition:          transform 0.28s cubic-bezier(0.34,1.56,0.64,1),
                         box-shadow 0.28s ease,
                         border-color 0.28s ease !important;
    transition-duration: 0.28s, 0.28s, 0.28s !important;
}

#kvcRoot .kvc-card:hover {
    transform:    translateY(-5px) !important;
    box-shadow:   0 20px 48px rgba(99,102,241,0.16) !important;
    border-color: rgba(99,102,241,0.28) !important;
}

#kvcRoot .kvc-btn {
    -webkit-appearance:  none !important;
    appearance:          none !important;
    display:             inline-flex !important;
    align-items:         center !important;
    justify-content:     center !important;
    width:               2.75rem !important;
    height:              2.75rem !important;
    min-width:           2.75rem !important;
    min-height:          2.75rem !important;
    border-radius:       9999px !important;
    background:          rgba(255,255,255,0.92) !important;
    border:              1.5px solid rgba(99,102,241,0.22) !important;
    color:               #6366f1 !important;
    box-shadow:          0 2px 12px rgba(99,102,241,0.10) !important;
    padding:             0 !important;
    margin:              0 !important;
    flex-shrink:         0 !important;
    cursor:              pointer !important;
    animation:           none !important;
    transition:          background 0.2s ease, box-shadow 0.2s ease !important;
    transition-duration: 0.2s, 0.2s !important;
}

#kvcRoot .kvc-btn:not(:disabled) {
    opacity: 1 !important;
    cursor:  pointer !important;
}

#kvcRoot .kvc-btn:hover:not(:disabled) {
    background: rgba(255,255,255,1) !important;
    box-shadow: 0 4px 20px rgba(99,102,241,0.22) !important;
}

#kvcRoot .kvc-dots-wrap {
    display:     flex !important;
    gap:         .5rem !important;
    align-items: center !important;
}

#kvcRoot .kvc-dot {
    -webkit-appearance:  none !important;
    appearance:          none !important;
    display:             block !important;
    height:              0.625rem !important;
    width:               0.625rem !important;
    min-width:           0.625rem !important;
    border-radius:       9999px !important;
    background:          rgba(200,200,220,0.75) !important;
    border:              none !important;
    padding:             0 !important;
    margin:              0 !important;
    flex-shrink:         0 !important;
    cursor:              pointer !important;
    opacity:             1 !important;
    animation:           none !important;
    transition:          width 0.3s ease, background 0.3s ease, box-shadow 0.3s ease !important;
    transition-duration: 0.3s, 0.3s, 0.3s !important;
}

#kvcRoot .kvc-dot:not(:disabled) {
    opacity: 1 !important;
    cursor:  pointer !important;
}

#kvcRoot .kvc-dot.kvc-dot-active {
    width:      2.5rem !important;
    min-width:  2.5rem !important;
    background: linear-gradient(to right, #6366f1, #22d3ee) !important;
    box-shadow: 0 2px 10px rgba(99,102,241,0.40) !important;
}

</style>

{{-- ══════════════════════════
     HTML — dentro de v-pre
     (Vue no lo toca al montar)
══════════════════════════ --}}
<div id="kvcRoot" style="display:block;width:100%;font-family:ui-sans-serif,system-ui,sans-serif;">

    <div class="kvc-viewport" id="kvcViewport">
        <div class="kvc-track" id="kvcTrack">

            @foreach($testimonials as $t)
            <div class="kvc-slide" id="kvcSlide{{ $loop->index }}">
                <div class="kvc-card">

                    <div style="position:absolute;top:0;right:0;width:7rem;height:7rem;background:linear-gradient(135deg,rgba(99,102,241,.07),transparent);border-radius:0 1.25rem 0 100%;pointer-events:none;"></div>

                    <div style="position:absolute;top:-.5rem;right:-.5rem;opacity:.05;pointer-events:none;">
                        <svg xmlns="http://www.w3.org/2000/svg" style="width:7rem;height:7rem;color:#6366f1;" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                        </svg>
                    </div>

                    <div style="display:flex;align-items:center;justify-content:space-between;position:relative;z-index:1;">
                        <div style="display:flex;gap:2px;">
                            @for($s=0; $s < ($t['rating'] ?? 5); $s++)
                            <svg xmlns="http://www.w3.org/2000/svg" style="width:1.1rem;height:1.1rem;fill:#fbbf24;" viewBox="0 0 24 24">
                                <path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                            </svg>
                            @endfor
                        </div>
                        <div style="display:flex;align-items:center;gap:.3rem;background:rgba(34,197,94,.10);padding:.2rem .65rem;border-radius:9999px;border:1px solid rgba(34,197,94,.18);">
                            <svg xmlns="http://www.w3.org/2000/svg" style="width:.8rem;height:.8rem;color:#22c55e;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                            <span style="font-size:.67rem;font-weight:700;color:#22c55e;">Verificado</span>
                        </div>
                    </div>

                    <p style="color:#64748b;line-height:1.78;font-size:.9rem;margin:0;flex:1;position:relative;z-index:1;">"{{ $t['comment'] }}"</p>

                    <div style="padding:.625rem .875rem;background:rgba(99,102,241,.05);border-radius:.75rem;border:1px solid rgba(99,102,241,.10);position:relative;z-index:1;">
                        <p style="font-size:.63rem;color:#64748b;margin:0 0 .15rem;text-transform:uppercase;letter-spacing:.07em;font-weight:600;">Producto comprado</p>
                        <p style="font-size:.82rem;font-weight:700;color:#6366f1;margin:0;">{{ $t['product'] }}</p>
                    </div>

                    <div style="display:flex;align-items:center;gap:.875rem;position:relative;z-index:1;">
                        <div style="width:3rem;height:3rem;border-radius:9999px;background:linear-gradient(135deg,rgba(99,102,241,.18),rgba(34,211,238,.18));display:flex;align-items:center;justify-content:center;font-weight:800;font-size:.95rem;color:#6366f1;border:2px solid rgba(99,102,241,.18);flex-shrink:0;box-shadow:0 2px 10px rgba(99,102,241,.15);">{{ $t['initials'] }}</div>
                        <div>
                            <p style="font-weight:700;font-size:.9rem;color:#0f172a;margin:0 0 .2rem;">{{ $t['name'] }}</p>
                            <p style="font-size:.75rem;color:#64748b;margin:0;display:flex;align-items:center;gap:.2rem;">
                                <svg xmlns="http://www.w3.org/2000/svg" style="width:.7rem;height:.7rem;fill:#6366f1;" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                </svg>
                                {{ $t['location'] }}
                            </p>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach

        </div>
    </div>

    <div style="display:flex;align-items:center;justify-content:center;gap:1.25rem;margin-top:2.5rem;">
        <button type="button" class="kvc-btn" id="kvcPrev" aria-label="Anterior">
            <svg xmlns="http://www.w3.org/2000/svg" style="width:1.25rem;height:1.25rem;pointer-events:none;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>
        <div class="kvc-dots-wrap" id="kvcDots"></div>
        <button type="button" class="kvc-btn" id="kvcNext" aria-label="Siguiente">
            <svg xmlns="http://www.w3.org/2000/svg" style="width:1.25rem;height:1.25rem;pointer-events:none;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
            </svg>
        </button>
    </div>

</div>

{{-- ══════════════════════════
     JS — se ejecuta al parsear
     Y se reinicia post-Vue mount
══════════════════════════ --}}
<script>
(function () {
    'use strict';

    var TOTAL    = {{ count($testimonials) }};
    var GAP      = 24;
    var DURATION = 560;
    var AUTOPLAY = 5000;
    var EASING   = 'cubic-bezier(0.4, 0, 0.2, 1)';

    var cur      = 0;
    var perPage  = 1;
    var maxIdx   = 0;
    var isMoving = false;
    var isPaused = false;
    var ticker   = null;
    var initialized = false;

    function init() {
        var viewport = document.getElementById('kvcViewport');
        var track    = document.getElementById('kvcTrack');
        var btnPrev  = document.getElementById('kvcPrev');
        var btnNext  = document.getElementById('kvcNext');
        var dotsWrap = document.getElementById('kvcDots');
        var slides   = document.querySelectorAll('#kvcTrack .kvc-slide');

        if (!viewport || !track || !btnPrev || !btnNext || !dotsWrap || !slides.length) return;
        if (initialized) {
            /* Ya inicializado — solo recalcular dimensiones */
            recalc(viewport, track, slides);
            return;
        }
        initialized = true;

        /* ── Dots ── */
        var dots = [];
        dotsWrap.innerHTML = '';

        for (var di = 0; di < TOTAL; di++) {
            var dot = document.createElement('button');
            dot.type = 'button';
            dot.className = 'kvc-dot' + (di === 0 ? ' kvc-dot-active' : '');
            dot.setAttribute('aria-label', 'Ir al testimonio ' + (di + 1));
            ;(function (idx, d, vp, tr, sl) {
                d.addEventListener('click', function () {
                    goTo(idx, true, tr, sl);
                    resetTicker(vp, tr, sl, dots);
                });
            })(di, dot, viewport, track, slides);
            dotsWrap.appendChild(dot);
            dots.push(dot);
        }

        function paintDots() {
            for (var i = 0; i < dots.length; i++) {
                if (i === cur) dots[i].classList.add('kvc-dot-active');
                else           dots[i].classList.remove('kvc-dot-active');
            }
        }

        function applyTranslate(tr, sl, idx, animate) {
            var slideW = sl[0].offsetWidth;
            var offset = idx * (slideW + GAP);
            tr.style.transition = animate
                ? 'transform ' + DURATION + 'ms ' + EASING
                : 'none';
            tr.style.transform = 'translateX(-' + offset + 'px)';
        }

        function recalc(vp, tr, sl) {
            var vw = window.innerWidth;
            perPage = vw >= 1024 ? 3 : vw >= 640 ? 2 : 1;
            maxIdx  = Math.max(0, TOTAL - perPage);
            if (cur > maxIdx) cur = maxIdx;

            var vpW       = vp.offsetWidth;
            var totalGaps = GAP * (perPage - 1);
            var slideW    = Math.floor((vpW - totalGaps) / perPage);

            tr.style.gap = GAP + 'px';
            for (var i = 0; i < sl.length; i++) {
                sl[i].style.width    = slideW + 'px';
                sl[i].style.minWidth = slideW + 'px';
            }
            for (var d = 0; d < dots.length; d++) {
                dots[d].style.display = d <= maxIdx ? '' : 'none';
            }
            applyTranslate(tr, sl, cur, false);
            paintDots();
        }

        function goTo(idx, animate, tr, sl) {
            if (isMoving && animate) return;
            if (idx > maxIdx) idx = 0;
            if (idx < 0)      idx = maxIdx;
            cur = idx;
            if (animate) {
                isMoving = true;
                applyTranslate(tr, sl, cur, true);
                setTimeout(function () { isMoving = false; }, DURATION + 20);
            } else {
                applyTranslate(tr, sl, cur, false);
            }
            paintDots();
        }

        function startTicker(vp, tr, sl, dt) {
            clearInterval(ticker);
            ticker = setInterval(function () {
                if (!isPaused && !isMoving) goTo(cur >= maxIdx ? 0 : cur + 1, true, tr, sl);
            }, AUTOPLAY);
        }

        function resetTicker(vp, tr, sl, dt) { startTicker(vp, tr, sl, dt); }

        /* ── Bind eventos ── */
        btnPrev.addEventListener('click', function () { goTo(cur - 1, true, track, slides); resetTicker(viewport, track, slides, dots); });
        btnNext.addEventListener('click', function () { goTo(cur + 1, true, track, slides); resetTicker(viewport, track, slides, dots); });

        var root = document.getElementById('kvcRoot');
        if (root) {
            root.addEventListener('mouseenter', function () { isPaused = true; });
            root.addEventListener('mouseleave', function () { isPaused = false; });
        }

        var touchX = 0, touchY = 0;
        track.addEventListener('touchstart', function (e) {
            touchX = e.changedTouches[0].clientX;
            touchY = e.changedTouches[0].clientY;
        }, { passive: true });
        track.addEventListener('touchend', function (e) {
            var dx = touchX - e.changedTouches[0].clientX;
            var dy = touchY - e.changedTouches[0].clientY;
            if (Math.abs(dx) > 44 && Math.abs(dx) > Math.abs(dy)) {
                goTo(dx > 0 ? cur + 1 : cur - 1, true, track, slides);
                resetTicker(viewport, track, slides, dots);
            }
        }, { passive: true });

        var resizeTimer;
        window.addEventListener('resize', function () {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function () { recalc(viewport, track, slides); }, 150);
        });

        /* ── Arranque inicial ── */
        recalc(viewport, track, slides);
        startTicker(viewport, track, slides, dots);
    }

    /* ── Inicializar en el parsing (antes de Vue) ── */
    requestAnimationFrame(function () {
        requestAnimationFrame(function () {
            init();
        });
    });

    /*
     * ── Reinicializar DESPUÉS de que Vue monte ──────────────────
     * Vue monta en window "load". Después del mount, el carrusel
     * puede necesitar recalcular dimensiones porque Vue pudo haber
     * causado reflows. Con v-pre el DOM no se destruye, pero las
     * dimensiones calculadas antes del mount pueden ser incorrectas.
     */
    window.addEventListener('load', function () {
        /* Esperar a que Vue termine su mount (~100ms después de load) */
        setTimeout(function () {
            initialized = false; /* Forzar reinicio completo */
            cur      = 0;
            isMoving = false;
            isPaused = false;
            clearInterval(ticker);
            ticker = null;
            init();
        }, 200);
    });

})();
</script>
