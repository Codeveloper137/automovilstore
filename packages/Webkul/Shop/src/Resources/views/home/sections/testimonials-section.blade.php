{{-- testimonials-section.blade.php --}}

<section id="kv-testimonials" class="kv-section"
         style="background:linear-gradient(180deg,var(--background),rgba(99,102,241,0.03) 50%,var(--background));overflow:visible;">

    <div class="kv-orb" style="top:4rem;left:-2rem;width:20rem;height:20rem;
         background:rgba(99,102,241,0.07);animation:kvFloat 7s ease-in-out infinite;"></div>
    <div class="kv-orb" style="bottom:4rem;right:-2rem;width:26rem;height:26rem;
         background:rgba(34,211,238,0.06);animation:kvFloat 9s ease-in-out infinite 2.5s;"></div>

    <div class="kv-section-inner">

        <div class="kv-section-header">
            <div class="kv-eyebrow">
                <svg xmlns="http://www.w3.org/2000/svg" style="width:.875rem;height:.875rem;fill:#ef4444;" viewBox="0 0 24 24">
                    <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                </svg>
                <span class="kv-eyebrow-text">Testimonios reales</span>
            </div>
            <h2 class="kv-section-title" style="margin-bottom:1rem;">
                Lo que dicen <span class="kv-gradient-text">nuestros clientes</span>
            </h2>
            <p class="kv-section-sub" style="margin-bottom:2.5rem;">
                Cientos de clientes satisfechos confían en
                <strong style="color:#6366f1;font-weight:600;">KillaVibes</strong>
            </p>
            <div style="display:flex;align-items:center;justify-content:center;gap:2.5rem;flex-wrap:wrap;">
                <div style="text-align:center;">
                    <div style="display:flex;align-items:center;gap:.35rem;justify-content:center;margin-bottom:.25rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" style="width:1.25rem;height:1.25rem;color:#6366f1;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                        <span style="font-size:1.7rem;font-weight:800;color:#6366f1;letter-spacing:-.03em;">500+</span>
                    </div>
                    <p style="font-size:.75rem;color:var(--muted-foreground);margin:0;">Clientes Felices</p>
                </div>
                <div style="width:1px;height:2.5rem;background:rgba(226,232,240,.8);"></div>
                <div style="text-align:center;">
                    <div style="display:flex;align-items:center;gap:.35rem;justify-content:center;margin-bottom:.25rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" style="width:1.25rem;height:1.25rem;fill:#eab308;" viewBox="0 0 24 24">
                            <path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                        </svg>
                        <span style="font-size:1.7rem;font-weight:800;color:#eab308;letter-spacing:-.03em;">4.9</span>
                    </div>
                    <p style="font-size:.75rem;color:var(--muted-foreground);margin:0;">Rating Promedio</p>
                </div>
            </div>
        </div>

        <div class="kvh-viewport" id="kvhViewport">
            <div class="kvh-track" id="kvhTrack">

                @foreach($testimonials as $t)
                <div class="kvh-slide" id="kvhSlide{{ $loop->index }}">
                    <div class="kvh-card">

                        <div style="position:absolute;top:0;right:0;width:7rem;height:7rem;background:linear-gradient(135deg,rgba(99,102,241,.07),transparent);border-radius:0 1.25rem 0 100%;pointer-events:none;"></div>

                        <div style="position:absolute;top:-.5rem;right:-.5rem;opacity:.05;pointer-events:none;">
                            <svg xmlns="http://www.w3.org/2000/svg" style="width:7rem;height:7rem;color:#6366f1;" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                            </svg>
                        </div>

                        <div style="display:flex;align-items:center;justify-content:space-between;position:relative;z-index:1;">
                            <div style="display:flex;gap:2px;">
                                {{-- CORREGIDO: @for con < reemplazado por @foreach con range() --}}
                                @foreach(range(1, $t['rating'] ?? 5) as $star)
                                <svg xmlns="http://www.w3.org/2000/svg" style="width:1.1rem;height:1.1rem;fill:#fbbf24;" viewBox="0 0 24 24">
                                    <path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                </svg>
                                @endforeach
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
            <button type="button" class="kvh-btn" id="kvhPrev" aria-label="Anterior">
                <svg xmlns="http://www.w3.org/2000/svg" style="width:1.25rem;height:1.25rem;pointer-events:none;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <div class="kvh-dots-wrap" id="kvhDots"></div>
            <button type="button" class="kvh-btn" id="kvhNext" aria-label="Siguiente">
                <svg xmlns="http://www.w3.org/2000/svg" style="width:1.25rem;height:1.25rem;pointer-events:none;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>

    </div>
</section>

{{-- CORREGIDO: script movido a @push('scripts') para garantizar ejecución después del DOM --}}
@push('scripts')
<script>
(function () {
    'use strict';

    if (window.__kvhCarouselReady) return;
    window.__kvhCarouselReady = true;

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

    function getEls() {
        return {
            viewport : document.getElementById('kvhViewport'),
            track    : document.getElementById('kvhTrack'),
            btnPrev  : document.getElementById('kvhPrev'),
            btnNext  : document.getElementById('kvhNext'),
            dotsWrap : document.getElementById('kvhDots'),
            slides   : document.querySelectorAll('#kvhTrack .kvh-slide'),
        };
    }

    function applyTranslate(track, slides, idx, animate) {
        var slideW = slides[0] ? slides[0].offsetWidth : 0;
        var offset = idx * (slideW + GAP);
        track.style.transition = animate
            ? 'transform ' + DURATION + 'ms ' + EASING
            : 'none';
        track.style.transform = 'translateX(-' + offset + 'px)';
    }

    function paintDots(dots) {
        for (var i = 0; i < dots.length; i++) {
            if (i === cur) {
                dots[i].classList.add('kvh-dot-active');
            } else {
                dots[i].classList.remove('kvh-dot-active');
            }
        }
    }

    function recalc(els, dots) {
        var vw = window.innerWidth;
        perPage = vw >= 1024 ? 3 : vw >= 640 ? 2 : 1;
        maxIdx  = Math.max(0, TOTAL - perPage);
        if (cur > maxIdx) cur = maxIdx;

        var vpW       = els.viewport.offsetWidth;
        var totalGaps = GAP * (perPage - 1);
        var slideW    = Math.floor((vpW - totalGaps) / perPage);

        els.track.style.gap = GAP + 'px';
        for (var i = 0; i < els.slides.length; i++) {
            els.slides[i].style.width    = slideW + 'px';
            els.slides[i].style.minWidth = slideW + 'px';
        }
        for (var d = 0; d < dots.length; d++) {
            dots[d].style.display = d <= maxIdx ? '' : 'none';
        }
        applyTranslate(els.track, els.slides, cur, false);
        paintDots(dots);
    }

    function goTo(idx, animate, els) {
        if (isMoving && animate) return;
        if (idx > maxIdx) idx = 0;
        if (idx < 0)      idx = maxIdx;
        cur = idx;
        if (animate) {
            isMoving = true;
            applyTranslate(els.track, els.slides, cur, true);
            setTimeout(function () { isMoving = false; }, DURATION + 20);
        } else {
            applyTranslate(els.track, els.slides, cur, false);
        }
    }

    function startTicker(els, dots) {
        clearInterval(ticker);
        ticker = setInterval(function () {
            if (!isPaused && !isMoving) {
                goTo(cur >= maxIdx ? 0 : cur + 1, true, els);
                paintDots(dots);
            }
        }, AUTOPLAY);
    }

    function init() {
        var els = getEls();
        if (!els.viewport || !els.track || !els.slides.length) return;

        var dots = [];
        els.dotsWrap.innerHTML = '';
        for (var di = 0; di < TOTAL; di++) {
            var dot = document.createElement('button');
            dot.type = 'button';
            dot.className = 'kvh-dot' + (di === 0 ? ' kvh-dot-active' : '');
            dot.setAttribute('aria-label', 'Ir al testimonio ' + (di + 1));
            ;(function (idx, d) {
                d.addEventListener('click', function () {
                    goTo(idx, true, els);
                    paintDots(dots);
                    startTicker(els, dots);
                });
            })(di, dot);
            els.dotsWrap.appendChild(dot);
            dots.push(dot);
        }

        els.btnPrev.addEventListener('click', function () {
            goTo(cur - 1, true, els);
            paintDots(dots);
            startTicker(els, dots);
        });
        els.btnNext.addEventListener('click', function () {
            goTo(cur + 1, true, els);
            paintDots(dots);
            startTicker(els, dots);
        });

        var section = document.getElementById('kv-testimonials');
        if (section) {
            section.addEventListener('mouseenter', function () { isPaused = true; });
            section.addEventListener('mouseleave', function () { isPaused = false; });
        }

        var touchX = 0, touchY = 0;
        els.track.addEventListener('touchstart', function (e) {
            touchX = e.changedTouches[0].clientX;
            touchY = e.changedTouches[0].clientY;
        }, { passive: true });
        els.track.addEventListener('touchend', function (e) {
            var dx = touchX - e.changedTouches[0].clientX;
            var dy = touchY - e.changedTouches[0].clientY;
            if (Math.abs(dx) > 44 && Math.abs(dx) > Math.abs(dy)) {
                goTo(dx > 0 ? cur + 1 : cur - 1, true, els);
                paintDots(dots);
                startTicker(els, dots);
            }
        }, { passive: true });

        var resizeTimer;
        window.addEventListener('resize', function () {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function () { recalc(els, dots); }, 150);
        });

        recalc(els, dots);
        startTicker(els, dots);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function () {
            requestAnimationFrame(function () { requestAnimationFrame(init); });
        });
    } else {
        requestAnimationFrame(function () { requestAnimationFrame(init); });
    }

    window.addEventListener('load', function () {
        setTimeout(function () {
            var els = getEls();
            if (!els.viewport || !els.track || !els.slides.length) return;
            var vw    = window.innerWidth;
            perPage   = vw >= 1024 ? 3 : vw >= 640 ? 2 : 1;
            maxIdx    = Math.max(0, TOTAL - perPage);
            if (cur > maxIdx) cur = maxIdx;
            var vpW       = els.viewport.offsetWidth;
            var totalGaps = GAP * (perPage - 1);
            var slideW    = Math.floor((vpW - totalGaps) / perPage);
            els.track.style.gap = GAP + 'px';
            for (var i = 0; i < els.slides.length; i++) {
                els.slides[i].style.width    = slideW + 'px';
                els.slides[i].style.minWidth = slideW + 'px';
            }
            applyTranslate(els.track, els.slides, cur, false);
            var allDots = document.querySelectorAll('#kvhDots .kvh-dot');
            for (var d = 0; d < allDots.length; d++) {
                allDots[d].style.display = d <= maxIdx ? '' : 'none';
                if (d === cur) allDots[d].classList.add('kvh-dot-active');
                else           allDots[d].classList.remove('kvh-dot-active');
            }
        }, 200);
    });

})();
</script>
@endpush
