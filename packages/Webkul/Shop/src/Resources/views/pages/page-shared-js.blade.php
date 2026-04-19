
<script>
(function () {
    'use strict';

    /* ── Protección contra doble inicialización ───────────────────
       Si la página carga este script más de una vez (hot reload,
       turbolinks, etc.) no registramos listeners duplicados.
    ─────────────────────────────────────────────────────────────── */
    if (window.__kvpInit) return;
    window.__kvpInit = true;

    /* ── 1. FAQ ACCORDION ─────────────────────────────────────────
       CORRECCIÓN: usamos delegación de eventos en document en lugar
       de iterar con querySelectorAll en el momento de la carga.
       Esto garantiza que funcione aunque el DOM aún no esté 100%
       listo y también cubre FAQs cargadas dinámicamente.
    ─────────────────────────────────────────────────────────────── */
    function initFaq() {
        document.addEventListener('click', function (e) {
            /* Buscamos el botón más cercano que sea .kvp-faq-btn */
            var btn = e.target.closest('.kvp-faq-btn');
            if (!btn) return;

            var item = btn.closest('.kvp-faq-item');
            if (!item) return;

            var isOpen = item.classList.contains('kvp-faq-open');

            /* Cerrar todos los abiertos dentro del mismo contenedor */
            var list = item.closest('.kvp-faq-list, .kvp-faq-grid');
            if (list) {
                list.querySelectorAll('.kvp-faq-item.kvp-faq-open').forEach(function (el) {
                    if (el !== item) {
                        el.classList.remove('kvp-faq-open');
                        var otherBtn = el.querySelector('.kvp-faq-btn');
                        if (otherBtn) otherBtn.setAttribute('aria-expanded', 'false');
                    }
                });
            }

            /* Toggle del item actual */
            item.classList.toggle('kvp-faq-open', !isOpen);
            btn.setAttribute('aria-expanded', String(!isOpen));
        });
    }

    /* ── 2. COOKIE TOGGLES ────────────────────────────────────────
       Se inicializa con MutationObserver como fallback para el caso
       en que los elementos no estén en el DOM en el momento de
       DOMContentLoaded (por ejemplo, si Bagisto los renderiza tarde).
    ─────────────────────────────────────────────────────────────── */
    function bindToggle(type) {
        var el = document.getElementById('toggle-' + type);
        if (!el || el.__kvpBound) return;
        el.__kvpBound = true;

        /* Restaurar valor guardado */
        try {
            var saved = localStorage.getItem('kv_cookie_' + type);
            if (saved !== null) el.checked = (saved === '1');
        } catch (e) {}

        /* Guardar cambios */
        el.addEventListener('change', function () {
            try {
                localStorage.setItem('kv_cookie_' + type, el.checked ? '1' : '0');
            } catch (e) {}
        });
    }

    function initCookieToggles() {
        ['analytics', 'marketing', 'preferences'].forEach(bindToggle);
    }

    /* ── 3. FAQ SEARCH ────────────────────────────────────────────
       Sin cambios lógicos, pero usa delegación para el input también.
    ─────────────────────────────────────────────────────────────── */
    function initFaqSearch() {
        var searchInput = document.getElementById('kvpSearchFaq');
        if (!searchInput || searchInput.__kvpBound) return;
        searchInput.__kvpBound = true;

        searchInput.addEventListener('input', function () {
            var term = this.value.trim().toLowerCase();

            document.querySelectorAll('.kvp-faq-item[data-searchtext]').forEach(function (item) {
                var match = !term || item.dataset.searchtext.includes(term);
                item.style.display = match ? '' : 'none';
            });

            /* Ocultar secciones vacías */
            document.querySelectorAll('[data-category]').forEach(function (section) {
                var visible = Array.from(
                    section.querySelectorAll('.kvp-faq-item')
                ).some(function (i) { return i.style.display !== 'none'; });
                section.style.display = visible ? '' : 'none';
            });
        });
    }

    /* ── 4. CATEGORY FILTER ───────────────────────────────────────
       Expuesto en window para ser llamable desde onclick="kvpFilterCategory(...)"
       en los botones del template Blade sin problemas de scope.
    ─────────────────────────────────────────────────────────────── */
    window.kvpFilterCategory = function (category, btn) {
        /* Actualizar estado activo de botones */
        document.querySelectorAll('.kvp-cat-btn').forEach(function (b) {
            b.classList.remove('kvp-cat-active');
        });
        if (btn) btn.classList.add('kvp-cat-active');

        /* Mostrar/ocultar secciones por categoría */
        document.querySelectorAll('[data-category]').forEach(function (section) {
            var show = category === 'all' || section.dataset.category === category;
            section.style.display = show ? '' : 'none';
        });

        /* Limpiar búsqueda activa */
        var searchInput = document.getElementById('kvpSearchFaq');
        if (searchInput) {
            searchInput.value = '';
            document.querySelectorAll('.kvp-faq-item[data-searchtext]').forEach(function (i) {
                i.style.display = '';
            });
        }
    };

    /* ── INIT ─────────────────────────────────────────────────────
       Esperamos a DOMContentLoaded si el DOM aún no está listo,
       o ejecutamos de inmediato si ya lo está.

       NOTA: initFaq() usa delegación en document y es seguro
       llamarlo en cualquier momento — no depende del estado del DOM.
    ─────────────────────────────────────────────────────────────── */
    function run() {
        initFaq();
        initCookieToggles();
        initFaqSearch();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', run);
    } else {
        run();
    }

})();
</script>
