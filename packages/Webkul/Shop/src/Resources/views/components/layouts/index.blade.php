@props([
    'hasHeader' => true,
    'hasFeature' => true,
    'hasFooter' => true,
])

<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}" dir="{{ core()->getCurrentLocale()->direction }}">

<head>

    {!! view_render_event('bagisto.shop.layout.head.before') !!}

    <title>{{ $title ?? '' }}</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-language" content="{{ app()->getLocale() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="base-url" content="{{ url()->to('/') }}">
    <meta name="currency" content="{{ core()->getCurrentCurrency()->toJson() }}">

    @stack('meta')

    <link rel="icon" sizes="16x16"
        href="{{ core()->getCurrentChannel()->favicon_url ?? bagisto_asset('images/favicon.ico') }}" />

    @bagistoVite(['src/Resources/assets/css/app.css', 'src/Resources/assets/js/app.js'])

    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        as="style">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap">

    <link rel="preload" href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" as="style">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap">

    @stack('styles')

    <style>
        {!! core()->getConfigData('general.content.custom_scripts.custom_css') !!}
    </style>

    {!! view_render_event('bagisto.shop.layout.head.after') !!}

</head>

<body class="{{ $hasHeader ? 'has-header' : '' }}">

    @if (core()->getConfigData('general.general.whatsapp.number'))
        <x-shop::whatsapp />
    @endif

    {!! view_render_event('bagisto.shop.layout.body.before') !!}

    <a href="#main" class="skip-to-main-content-link">
        Skip to main content
    </a>

    <div id="app">
        <x-shop::flash-group />
        <x-shop::modal.confirm />

        @if ($hasHeader)
            <x-shop::layouts.header />
        @endif

        {!! view_render_event('bagisto.shop.layout.content.before') !!}

        <main id="main" class="bg-white">
            {{ $slot }}
        </main>

        {!! view_render_event('bagisto.shop.layout.content.after') !!}

        @if ($hasFeature)
            <x-shop::layouts.services />
        @endif

        @if ($hasFooter)
            <x-shop::layouts.footer />
        @endif
    </div>

    {!! view_render_event('bagisto.shop.layout.body.after') !!}

    @stack('scripts')

    {!! view_render_event('bagisto.shop.layout.vue-app-mount.before') !!}

{{--
    INSTRUCCIONES:
    Reemplaza SOLO el bloque <script> que va justo antes de
    {!! view_render_event('bagisto.shop.layout.vue-app-mount.after') !!}
    en tu layout.blade.php con este script completo.
--}}

<script>
window.addEventListener("load", function () {

    app.mount("#app");

    (function () {
        var header      = document.getElementById("kv-header");
        var progressBar = document.getElementById("kv-scroll-progress");

        if (!header) return;

        /* ─────────────────────────────────────────────
         * HEADER HEIGHT
         * ───────────────────────────────────────────── */
        function adjustMainSpacing() {
            document.documentElement.style.setProperty(
                "--header-height", header.offsetHeight + "px"
            );
        }
        adjustMainSpacing();
        var headerHeight = header.offsetHeight;

        window.addEventListener("resize", function () {
            adjustMainSpacing();
            headerHeight = header.offsetHeight;
        });

        /* ═════════════════════════════════════════════
         * ✅ SCROLL LOCK CONTROLADO POR DRAWERS
         * SOLO filter y toolbar
         * ═════════════════════════════════════════════ */
        var _locked = false;
        var _savedY = 0;

        function lockScroll() {
            if (_locked) return;

            _locked = true;
            _savedY = window.scrollY;

            document.body.style.position = 'fixed';
            document.body.style.top = '-' + _savedY + 'px';
            document.body.style.width = '100%';
        }

        function unlockScroll() {
            if (!_locked) return;

            _locked = false;

            document.body.style.position = '';
            document.body.style.top = '';
            document.body.style.width = '';

            window.scrollTo(0, _savedY);
        }

        /* ═════════════════════════════════════════════
         * DRAWER EVENTS — kv-drawer-open / kv-drawer-close
         * Emitidos desde v-category (view.blade.php) SOLO en mobile.
         * Cubre los 4 vectores de cierre:
         *   1. openDrawer()   → dispara kv-drawer-open
         *   2. getProducts()  → dispara kv-drawer-close
         *   3. botón nativo X del drawer → watcher detecta cambio
         *   4. tap en overlay del drawer → watcher detecta cambio
         * ═════════════════════════════════════════════ */
        window.addEventListener('kv-drawer-open', function () {
            var mobileBar  = document.querySelector('.kvf-mobile-bar');
            var whatsapp   = document.getElementById('kv-whatsapp-btn');

            lockScroll();

            // Header visible mientras el drawer está abierto
            headerHidden = false;
            header.style.top = '0px';

            // Ocultar barra mobile (ya tiene el drawer encima)
            if (mobileBar) {
                barHidden = true;
                mobileBar.style.transform = 'translateY(100%)';
            }

            // Ocultar WhatsApp flotante
            if (whatsapp) {
                whatsapp.style.transition = 'opacity 0.2s ease, transform 0.2s ease';
                whatsapp.style.opacity    = '0';
                whatsapp.style.transform  = 'scale(0.8)';
                whatsapp.style.pointerEvents = 'none';
            }
        });

        window.addEventListener('kv-drawer-close', function () {
            var mobileBar  = document.querySelector('.kvf-mobile-bar');
            var whatsapp   = document.getElementById('kv-whatsapp-btn');

            unlockScroll();

            // Restaurar posición de scroll reference
            lastScrollY  = window.scrollY;

            // Header visible al cerrar
            headerHidden = false;
            header.style.top = '0px';

            // Restaurar barra mobile
            if (mobileBar) {
                barHidden = false;
                mobileBar.style.transform = 'translateY(0)';
            }

            // Restaurar WhatsApp
            if (whatsapp) {
                whatsapp.style.opacity       = '1';
                whatsapp.style.transform     = 'scale(1)';
                whatsapp.style.pointerEvents = '';
            }
        });

        /* ═════════════════════════════════════════════
         * SCROLL UI (HEADER + MOBILE BAR)
         * ═════════════════════════════════════════════ */
        var THRESHOLD = 80;
        var DELTA     = 8;

        var lastScrollY  = window.scrollY;
        var headerHidden = false;
        var barHidden    = false;
        var ticking      = false;

        header.style.transition =
            "top 0.35s cubic-bezier(0.32,0.72,0,1), " +
            "box-shadow 0.4s ease, border-color 0.4s ease";

        function getMobileBar() {
            return document.querySelector('.kvf-mobile-bar');
        }

        function initMobileBarTransition() {
            var bar = getMobileBar();
            if (bar && !bar._transitionSet) {
                bar._transitionSet = true;
                bar.style.transition = "transform 0.35s cubic-bezier(0.32,0.72,0,1)";
            }
        }

        function hideHeader() {
            if (headerHidden || _locked) return;
            headerHidden = true;
            header.style.top = '-' + (headerHeight + 4) + 'px';
        }

        function showHeader() {
            if (!headerHidden) return;
            headerHidden = false;
            header.style.top = '0px';
        }

        function hideBar() {
            var bar = getMobileBar();
            if (!bar || barHidden) return;
            barHidden = true;
            bar.style.transform = 'translateY(100%)';
        }

        function showBar() {
            var bar = getMobileBar();
            if (!bar || !barHidden) return;
            barHidden = false;
            bar.style.transform = 'translateY(0)';
        }

        function update() {
            var currentScrollY = window.scrollY;
            var diff           = currentScrollY - lastScrollY;

            if (progressBar) {
                var docH = document.documentElement.scrollHeight - window.innerHeight;
                var progress = docH > 0 ? Math.min((currentScrollY / docH) * 100, 100) : 0;
                progressBar.style.width = progress + '%';
            }

            if (_locked) {
                ticking = false;
                return;
            }

            if (currentScrollY <= THRESHOLD) {
                showHeader();
            } else if (diff > DELTA) {
                hideHeader();
            } else if (diff < -DELTA) {
                showHeader();
            }

            initMobileBarTransition();

            if (currentScrollY <= THRESHOLD) {
                showBar();
            } else if (diff > DELTA) {
                hideBar();
            } else if (diff < -DELTA) {
                showBar();
            }

            lastScrollY = currentScrollY;
            ticking     = false;
        }

        window.addEventListener('scroll', function () {
            if (!ticking) {
                window.requestAnimationFrame(update);
                ticking = true;
            }
        }, { passive: true });

        update();
    })();
});
</script>

    {!! view_render_event('bagisto.shop.layout.vue-app-mount.after') !!}

    <script type="text/javascript">
        {!! core()->getConfigData('general.content.custom_scripts.custom_javascript') !!}
    </script>

</body>

</html>