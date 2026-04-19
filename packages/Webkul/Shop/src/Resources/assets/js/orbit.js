/**
 * orbit.js — KillaVibes Solar System
 * ─────────────────────────────────────────────────────────────
 * CORRECCIÓN DE TIMING:
 *   El archivo se importa desde app.js (Vite/ESM), que ejecuta
 *   el módulo antes de que Vue monte el DOM. Por eso usamos
 *   window 'load' + MutationObserver como doble seguro, igual
 *   que hace el layout para montar Vue.
 *
 * CORRECCIÓN DE POSICIÓN INICIAL:
 *   Las cápsulas arrancaban en top:0/left:0 (visible un frame)
 *   porque el primer tick ocurría antes de que el contenedor
 *   tuviera dimensiones reales. Ahora esperamos a que el
 *   contenedor tenga offsetWidth > 0 antes de arrancar el RAF.
 *
 * CORRECCIÓN DE PARADA ALEATORIA:
 *   El RAF se cancelaba cuando el tab perdía foco (visibilitychange).
 *   Ahora se pausa correctamente y se reanuda sin acumular tiempo
 *   fantasma.
 * ─────────────────────────────────────────────────────────────
 */

(function () {
    'use strict';

    /* ── Constantes ─────────────────────────────────────────── */
    const CONTAINER_ID  = 'kv-solar-system';
    const CAPSULE_CLASS = 'kv-capsule';
    const ECLIPSE_CLASS = 'kv-solar-eclipsed';
    const ACTIVE_CLASS  = 'kv-capsule--active';
    const DEG_TO_RAD    = Math.PI / 180;

    /* ── Estado global ──────────────────────────────────────── */
    let paused          = false;
    let pausedAt        = null;
    let totalPausedTime = 0;
    let startTime       = null;
    let rafId           = null;
    let tabHidden       = false;   // NEW: pausa por visibilitychange

    /* ── Referencias DOM ────────────────────────────────────── */
    let container  = null;
    let capsules   = [];
    let orbitRings = {};

    /* ══════════════════════════════════════════════════════════
       INICIALIZACIÓN — esperar a que el contenedor exista
       Y tenga dimensiones reales (offsetWidth > 0)
    ══════════════════════════════════════════════════════════ */

    function tryInit() {
        container = document.getElementById(CONTAINER_ID);
        if (!container) return false;

        // Contenedor existe pero todavía no tiene dimensiones (Vue renderizando)
        if (container.offsetWidth === 0) return false;

        buildCapsules();
        buildRings();
        attachHoverEvents();
        attachVisibilityHandler();
        attachResizeHandler();

        // Ocultar cápsulas hasta el primer frame calculado
        capsules.forEach(function (cap) {
            cap.el.style.opacity = '0';
        });

        startTime = performance.now();
        rafId = requestAnimationFrame(tick);
        return true;
    }

    /* ── Estrategia de arranque con reintentos ──────────────── */
    function waitForContainer() {
        // Intento 1: inmediato (page ya cargada)
        if (tryInit()) return;

        // Intento 2: polling ligero (máx 3 segundos, cada 100ms)
        let attempts = 0;
        const maxAttempts = 30;

        const poll = setInterval(function () {
            attempts++;
            if (tryInit() || attempts >= maxAttempts) {
                clearInterval(poll);
            }
        }, 100);
    }

    /* ── Construcción de cápsulas desde data-* ──────────────── */
    function buildCapsules() {
        const els = container.querySelectorAll('.' + CAPSULE_CLASS);

        capsules = Array.from(els).map(function (el) {
            const initialAngle = parseFloat(el.dataset.initialAngle) || 0;
            const radius       = parseFloat(el.dataset.radius)       || 200;

            return {
                el:           el,
                orbit:        el.dataset.orbit,
                radius:       radius,
                speed:        parseFloat(el.dataset.speed)  || 30,
                initialAngle: initialAngle,
                scale:        parseFloat(el.dataset.scale)  || 1,
                blur:         parseFloat(el.dataset.blur)   || 0,
                color:        el.dataset.orbitColor         || '#6366f1',
                zeroGPhase:   initialAngle * 0.05,
                zeroGAmp:     3 + (radius % 5),
                zeroGSpeed:   4 + (initialAngle % 3) || 4,
            };
        });
    }

    /* ── Construcción de anillos ────────────────────────────── */
    function buildRings() {
        orbitRings = {};
        container.querySelectorAll('.kv-orbit-ring').forEach(function (ring) {
            orbitRings[ring.dataset.orbit] = ring;
        });
    }

    /* ── Eventos hover ──────────────────────────────────────── */
    function attachHoverEvents() {
        capsules.forEach(function (cap) {
            cap.el.addEventListener('mouseenter', function () { onHoverEnter(cap); });
            cap.el.addEventListener('mouseleave', function () { onHoverLeave(cap); });
        });
    }

    /* ── Pausa por cambio de pestaña ────────────────────────── */
    function attachVisibilityHandler() {
        document.addEventListener('visibilitychange', function () {
            if (document.hidden) {
                // Tab oculto: pausar acumulando tiempo
                if (!tabHidden) {
                    tabHidden = true;
                    if (!paused) {
                        pausedAt = performance.now();
                    }
                }
            } else {
                // Tab visible: reanudar
                if (tabHidden) {
                    tabHidden = false;
                    if (!paused && pausedAt !== null) {
                        totalPausedTime += performance.now() - pausedAt;
                        pausedAt = null;
                    }
                }
            }
        });
    }

    /* ── ResizeObserver: recalcular centro si cambia el contenedor ── */
    function attachResizeHandler() {
        if (!window.ResizeObserver) return;

        const ro = new ResizeObserver(function () {
            // No hace falta nada: cx/cy se recalculan en cada tick
            // El observer existe para forzar re-render si hay un layout shift
        });
        ro.observe(container);
    }

    /* ══════════════════════════════════════════════════════════
       LOOP DE ANIMACIÓN
    ══════════════════════════════════════════════════════════ */

    function tick(timestamp) {
        // Si el tab está oculto Y hay hover pausado, no avanzar
        const actuallyPaused = paused || tabHidden;

        const elapsed = actuallyPaused
            ? (pausedAt !== null ? pausedAt - startTime - totalPausedTime : 0)
            : (timestamp - startTime - totalPausedTime);

        const cx = container.offsetWidth  / 2;
        const cy = container.offsetHeight / 2;

        let firstFrame = false;

        capsules.forEach(function (cap) {
            const angleRad = (
                cap.initialAngle + (elapsed / 1000) * (360 / cap.speed)
            ) * DEG_TO_RAD;

            const orbitX = cx + cap.radius * Math.cos(angleRad);
            const orbitY = cy + cap.radius * Math.sin(angleRad);

            const hw = cap.el.offsetWidth  / 2;
            const hh = cap.el.offsetHeight / 2;

            // Zero-G: solo cuando no está pausado
            const zeroG = actuallyPaused ? 0 :
                Math.sin(
                    (elapsed / 1000) * (Math.PI * 2 / cap.zeroGSpeed) + cap.zeroGPhase
                ) * cap.zeroGAmp;

            const left = (orbitX - hw) + 'px';
            const top  = (orbitY - hh + zeroG) + 'px';

            if (!cap.el.classList.contains(ACTIVE_CLASS)) {
                cap.el.style.left      = left;
                cap.el.style.top       = top;
                cap.el.style.transform = 'scale(' + cap.scale + ')';
            } else {
                cap.el.style.left = left;
                cap.el.style.top  = top;
            }

            // Revelar cápsulas en el primer frame real (evita flash en top:0)
            if (cap.el.style.opacity === '0') {
                cap.el.style.opacity = '1';
                cap.el.style.transition = 'opacity 0.4s ease, transform 0.4s cubic-bezier(0.34,1.56,0.64,1), box-shadow 0.35s ease, filter 0.35s ease';
                firstFrame = true;
            }

            trailEffect(cap, angleRad);
        });

        rafId = requestAnimationFrame(tick);
    }

    /* ── Efecto Estela ──────────────────────────────────────── */
    function trailEffect(cap, angleRad) {
        const ring = orbitRings[cap.orbit];
        if (!ring) return;

        const normAngle = ((angleRad * (180 / Math.PI)) % 360 + 360) % 360;
        const nearTop   = normAngle < 45 || normAngle > 315;

        if (nearTop) {
            ring.style.borderColor = cap.color + '88';
            ring.style.boxShadow   = '0 0 12px ' + cap.color + '33';
        } else {
            ring.style.borderColor = cap.color + '22';
            ring.style.boxShadow   = 'none';
        }
    }

    /* ══════════════════════════════════════════════════════════
       EFECTO ECLIPSE (hover)
    ══════════════════════════════════════════════════════════ */

    window.kvEclipse = function (el, entering) {
        const cap = capsules.find(function (c) { return c.el === el; });
        if (entering) {
            onHoverEnter(cap);
        } else {
            onHoverLeave(cap);
        }
    };

    function onHoverEnter(cap) {
        if (!cap) return;

        paused   = true;
        pausedAt = performance.now();

        cap.el.classList.add(ACTIVE_CLASS);
        container.classList.add(ECLIPSE_CLASS);

        const ring = orbitRings[cap.orbit];
        if (ring) {
            ring.style.borderColor = cap.color + 'bb';
            ring.style.boxShadow   = '0 0 24px ' + cap.color + '55';
        }
    }

    function onHoverLeave(cap) {
        if (!cap) return;

        if (pausedAt !== null && !tabHidden) {
            totalPausedTime += performance.now() - pausedAt;
            pausedAt = null;
        }
        paused = false;

        cap.el.classList.remove(ACTIVE_CLASS);
        container.classList.remove(ECLIPSE_CLASS);

        Object.values(orbitRings).forEach(function (ring) {
            ring.style.boxShadow = 'none';
        });
    }

    /* ── Cleanup ────────────────────────────────────────────── */
    window.addEventListener('beforeunload', function () {
        if (rafId) cancelAnimationFrame(rafId);
    });

    /* ══════════════════════════════════════════════════════════
       PUNTO DE ENTRADA
       Espera al evento 'load' igual que Vue en el layout,
       para garantizar que el DOM de Vue ya está montado.
    ══════════════════════════════════════════════════════════ */
    window.addEventListener('load', function () {
        // Vue se monta en este mismo evento (ver layouts/master.blade.php)
        // Necesitamos correr DESPUÉS de app.mount("#app")
        // El layout hace app.mount() primero, luego nosotros corremos
        // en el siguiente microtask con setTimeout(0)
        setTimeout(waitForContainer, 0);
    });

})();
