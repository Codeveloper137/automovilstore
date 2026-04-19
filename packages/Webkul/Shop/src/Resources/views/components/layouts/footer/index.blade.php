{!! view_render_event('bagisto.shop.layout.footer.before') !!}

@inject('themeCustomizationRepository', 'Webkul\Theme\Repositories\ThemeCustomizationRepository')

@php
$customization = $themeCustomizationRepository->findOneWhere([
'type' => 'footer_links',
'status' => 1,
'channel_id' => core()->getCurrentChannel()->id,
]);
@endphp

<style>
    /* ── Hover states ── */
    .kvf-lnk:hover {
        color: #6366f1 !important;
    }

    .kvf-legal-a:hover {
        color: #6366f1 !important;
    }

    .kvf-lnk {
        transition: color .2s;
    }

    .kvf-legal-a {
        transition: color .2s;
    }

    .kvf-nl-input:focus {
        border-color: #6366f1 !important;
        background: #fff !important;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, .12) !important;
    }

    .kvf-nl-btn:hover {
        box-shadow: 0 4px 16px rgba(99, 102, 241, .40) !important;
        opacity: .9 !important;
    }

    /* ══ FOOTER: nunca se desborda ══ */
    .kvf-footer-root {
        overflow-x: hidden !important;
        box-sizing: border-box !important;
        width: 100% !important;
    }

    .kvf-wrap {
        overflow-x: hidden !important;
        box-sizing: border-box !important;
        width: 100% !important;
        max-width: 100% !important;
    }

    /* ══ MOBILE — < 640px ══ */
    @media (max-width:639px) {

        .kvf-wrap {
            padding-left: 1.25rem !important;
            padding-right: 1.25rem !important;
        }

        .kvf-grid-wrap {
            padding: 2rem 0 1.5rem 0 !important;
        }

        /* Brand: centrada */
        .kvf-brand-col {
            align-items: center !important;
            text-align: center !important;
            padding-bottom: 1.5rem !important;
            border-bottom: 1px solid rgba(226, 232, 240, .7) !important;
        }

        .kvf-brand-desc {
            text-align: center !important;
            max-width: 100% !important;
        }

        /* Acordeón */
        .kvf-link-col {
            border-bottom: 1px solid rgba(226, 232, 240, .7) !important;
        }

        .kvf-col-header {
            display: flex !important;
            justify-content: space-between !important;
            align-items: center !important;
            cursor: pointer !important;
            padding: 1rem 0 !important;
            margin-bottom: 0 !important;
            user-select: none !important;
        }

        .kvf-col-chevron {
            display: inline-block !important;
        }

        .kvf-col-body {
            display: none !important;
            flex-direction: column !important;
            gap: .85rem !important;
            padding-bottom: 1.1rem !important;
        }

        .kvf-col-open .kvf-col-body {
            display: flex !important;
        }

        .kvf-col-open .kvf-col-chevron {
            transform: rotate(180deg) !important;
        }

        /* Newsletter stack vertical */
        .kvf-nl-wrap {
            padding: 2rem 0 !important;
        }

        .kvf-nl-inner {
            max-width: 100% !important;
            width: 100% !important;
        }

        .kvf-nl-input-wrap {
            position: static !important;
            width: 100% !important;
            display: flex !important;
            flex-direction: column !important;
            gap: .65rem !important;
        }

        .kvf-nl-input {
            padding: .9rem 1.25rem !important;
            border-radius: 0.75rem !important;
            width: 100% !important;
            box-sizing: border-box !important;
            position: static !important;
        }

        .kvf-nl-btn {
            position: static !important;
            transform: none !important;
            width: 100% !important;
            padding: .75rem 1rem !important;
            border-radius: 0.75rem !important;
            display: block !important;
            font-size: .875rem !important;
            box-sizing: border-box !important;
        }

        .kvf-nl-btn:hover {
            transform: none !important;
        }

        /* Bottom bar */
        .kvf-bottom-row {
            flex-direction: column !important;
            align-items: center !important;
            text-align: center !important;
            gap: .85rem !important;
            padding: 1.5rem 0 !important;
        }

        .kvf-legal-links {
            justify-content: center !important;
            flex-wrap: wrap !important;
        }
    }

    /* ══ TABLET — 640px a 1059px ══ */
    @media (min-width:640px) and (max-width:1059px) {

        .kvf-wrap {
            padding-left: 1.75rem !important;
            padding-right: 1.75rem !important;
        }

        .kvf-brand-col {
            grid-column: 1 / -1 !important;
            padding-bottom: 1.5rem !important;
            border-bottom: 1px solid rgba(226, 232, 240, .6) !important;
        }

        .kvf-col-header {
            cursor: default !important;
            pointer-events: none !important;
            margin-bottom: 1.25rem !important;
        }

        .kvf-col-chevron {
            display: none !important;
        }

        .kvf-col-body {
            display: flex !important;
            padding-bottom: 0 !important;
        }

        .kvf-link-col {
            border-bottom: none !important;
        }

        .kvf-nl-input-wrap {
            position: relative !important;
        }

        .kvf-nl-input {
            padding-right: 8.5rem !important;
            border-radius: 9999px !important;
            box-sizing: border-box !important;
        }

        .kvf-nl-btn {
            position: absolute !important;
            right: 5px !important;
            top: 50% !important;
            transform: translateY(-50%) !important;
            width: auto !important;
            margin-top: 0 !important;
            display: inline-block !important;
            border-radius: 9999px !important;
        }

        .kvf-bottom-row {
            flex-direction: row !important;
            align-items: center !important;
        }
    }

    /* ══ DESKTOP — ≥ 1060px ══ */
    @media (min-width:1060px) {
        .kvf-col-header {
            cursor: default !important;
            pointer-events: none !important;
        }

        .kvf-col-chevron {
            display: none !important;
        }

        .kvf-col-body {
            display: flex !important;
            padding-bottom: 0 !important;
        }

        .kvf-link-col {
            border-bottom: none !important;
        }

        .kvf-nl-input-wrap {
            position: relative !important;
        }

        .kvf-nl-input {
            padding-right: 8.5rem !important;
            border-radius: 9999px !important;
            box-sizing: border-box !important;
        }

        .kvf-nl-btn {
            position: absolute !important;
            right: 5px !important;
            top: 50% !important;
            transform: translateY(-50%) !important;
            width: auto !important;
            margin-top: 0 !important;
            display: inline-block !important;
            border-radius: 9999px !important;
        }
    }
</style>

<footer class="kvf-footer-root" style="
    position:relative;
    overflow:hidden;
    background:linear-gradient(to bottom,rgba(241,245,249,.35),rgba(241,245,249,.6));
    border-top:1px solid rgba(226,232,240,.6);
    margin-top:0;
    font-family:'Poppins',system-ui,sans-serif;
    width:100%;
    box-sizing:border-box;
">

    <div class="kvf-wrap" style="max-width:1280px;margin:0 auto;padding:0 2.5rem;position:relative;z-index:10;">

        {{-- ===================== MAIN GRID ===================== --}}
        <div class="kvf-grid-wrap" style="padding:5rem 0 4rem 0;">

            {{-- ✅ grid-template-columns vuelve al inline style como fuente de verdad en desktop.
             El script kvfGrid() lo sobreescribe en mobile/tablet al cargar y al redimensionar. --}}
            <div id="kvf-grid" class="kvf-main-grid" style="
            display:grid;
            grid-template-columns:2fr 1fr 1fr 1fr;
            column-gap:2.5rem;
            row-gap:2rem;
            align-items:start;
            width:100%;
            box-sizing:border-box;
        ">

                {{-- ================= BRAND COLUMN ================= --}}
                <div class="kvf-brand-col" style="display:flex;flex-direction:column;gap:1.75rem;">

                    <a href="{{ route('shop.home.index') }}" style="display:inline-flex;align-items:center;gap:.75rem;text-decoration:none;">
                        <img src="{{ core()->getCurrentChannel()->logo_url ?? bagisto_asset('images/logo.svg') }}"
                            style="height:7.5rem;width:auto;display:block;" class="md:h-14 h-10">
                        <span style="font-size:1.5rem;font-weight:800;background:linear-gradient(135deg,#6366f1,#22d3ee);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">
                            {{ config('app.name','KillaVibes') }}
                        </span>
                    </a>

                    <p class="kvf-brand-desc" style="color:#64748b;line-height:1.7;font-size:.875rem;max-width:22rem;margin:0;">
                        Tu tienda de confianza en Barranquilla para tecnología de calidad.
                        Productos originales, envíos rápidos y atención personalizada 24/7.
                    </p>

                </div>

                {{-- ================= COLUMNA: Contenido ================= --}}
                <div class="kvf-link-col" style="display:flex;flex-direction:column;">

                    <div class="kvf-col-header"
                        style="font-size:1rem;font-weight:700;color:#1a1c2d;margin:0 0 1.5rem 0;display:flex;justify-content:space-between;align-items:center;"
                        onclick="kvfToggle(this)">
                        <span>Contenido</span>
                        <span class="kvf-col-chevron" style="font-size:.75rem;color:#94a3b8;transition:transform .25s;display:none;">▾</span>
                    </div>

                    <ul class="kvf-col-body" style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:.9rem;">
                        <li><a class="kvf-lnk" href="{{ url('/collections') }}" style="text-decoration:none;color:#64748b;font-size:.875rem;line-height:1.6;">Categorías</a></li>
                        <li><a class="kvf-lnk" href="{{ url('/about-us') }}" style="text-decoration:none;color:#64748b;font-size:.875rem;line-height:1.6;">Sobre Nosotros</a></li>
                    </ul>

                </div>

                {{-- ================= COLUMNA: Atención al Cliente ================= --}}
                <div class="kvf-link-col" style="display:flex;flex-direction:column;">

                    <div class="kvf-col-header"
                        style="font-size:1rem;font-weight:700;color:#1a1c2d;margin:0 0 1.5rem 0;display:flex;justify-content:space-between;align-items:center;"
                        onclick="kvfToggle(this)">
                        <span>Atención al Cliente</span>
                        <span class="kvf-col-chevron" style="font-size:.75rem;color:#94a3b8;transition:transform .25s;display:none;">▾</span>
                    </div>

                    <ul class="kvf-col-body" style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:.9rem;">
                        <li><a class="kvf-lnk" href="{{ url('/contact-us') }}" style="text-decoration:none;color:#64748b;font-size:.875rem;line-height:1.6;">Contacto</a></li>
                        <li><a class="kvf-lnk" href="{{ url('/envios') }}" style="text-decoration:none;color:#64748b;font-size:.875rem;line-height:1.6;">Envíos</a></li>
                        <li><a class="kvf-lnk" href="{{ url('/devoluciones') }}" style="text-decoration:none;color:#64748b;font-size:.875rem;line-height:1.6;">Devoluciones</a></li>
                        <li><a class="kvf-lnk" href="{{ url('/garantia') }}" style="text-decoration:none;color:#64748b;font-size:.875rem;line-height:1.6;">Garantía</a></li>
                    </ul>

                </div>

                {{-- ================= COLUMNA: Contacto ================= --}}
                <div class="kvf-link-col" style="display:flex;flex-direction:column;">

                    <div class="kvf-col-header"
                        style="font-size:1rem;font-weight:700;color:#1a1c2d;margin:0 0 1.5rem 0;display:flex;justify-content:space-between;align-items:center;"
                        onclick="kvfToggle(this)">
                        <span>Contacto</span>
                        <span class="kvf-col-chevron" style="font-size:.75rem;color:#94a3b8;transition:transform .25s;display:none;">▾</span>
                    </div>

                    <div class="kvf-col-body" style="display:flex;flex-direction:column;gap:1rem;font-size:.875rem;color:#64748b;line-height:1.6;">
                        <span>Barranquilla, Colombia</span>
                        <span>+57 300 252 1314</span>
                        <span>info@killavibes.com</span>
                        <span>Atención 24/7</span>
                    </div>

                </div>

            </div>
        </div>

        {{-- ================= NEWSLETTER ================= --}}
        <div class="kvf-nl-wrap" style="
        padding:3rem 0;
        border-top:1px solid rgba(226,232,240,.6);
        border-bottom:1px solid rgba(226,232,240,.6);
    ">
            <div class="kvf-nl-inner" style="max-width:500px;width:100%;">

                <p style="font-size:1.5rem;font-weight:700;color:#1a1c2d;margin:0 0 .75rem 0;">
                    Suscríbete a nuestro Newsletter
                </p>
                <p style="font-size:.85rem;color:#64748b;margin:0 0 1.25rem 0;">
                    Recibe ofertas y novedades directamente en tu correo.
                </p>

                <div class="kvf-nl-input-wrap" style="position:relative;width:100%;">
                    <input type="email"
                        class="kvf-nl-input"
                        placeholder="email@example.com"
                        style="
                           width:100%;
                           padding:.9rem 1.25rem;
                           padding-right:8.5rem;
                           border-radius:9999px;
                           border:1.5px solid rgba(226,232,240,.9);
                           font-size:.875rem;
                           outline:none;
                           box-sizing:border-box;
                           transition:border-color .2s, box-shadow .2s;
                       ">
                    <button class="kvf-nl-btn" style="
                    position:absolute;
                    right:5px;
                    top:50%;
                    transform:translateY(-50%);
                    padding:.6rem 1.2rem;
                    border-radius:9999px;
                    border:none;
                    background:linear-gradient(135deg,#6366f1,#22d3ee);
                    color:white;
                    font-size:.8rem;
                    font-weight:700;
                    cursor:pointer;
                    white-space:nowrap;
                    transition:box-shadow .2s, opacity .2s;
                ">
                        Suscribirme
                    </button>
                </div>

            </div>
        </div>

        {{-- ================= BOTTOM BAR ================= --}}
        <div class="kvf-bottom-row" style="padding:1.75rem 0;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:1rem;">

            <p style="font-size:.875rem;color:#64748b;margin:0;">
                © {{ date('Y') }} {{ config('app.name','KillaVibes') }}. Todos los derechos reservados.
            </p>

            <div class="kvf-legal-links" style="display:flex;gap:1.25rem;flex-wrap:wrap;">
                <a class="kvf-legal-a" href="{{ url('/terminos') }}" style="font-size:.75rem;color:#64748b;text-decoration:none;">Términos</a>
                <a class="kvf-legal-a" href="{{ url('/privacidad') }}" style="font-size:.75rem;color:#64748b;text-decoration:none;">Privacidad</a>
                <a class="kvf-legal-a" href="{{ url('/cookies') }}" style="font-size:.75rem;color:#64748b;text-decoration:none;">Cookies</a>
                <a class="kvf-legal-a" href="{{ url('/faq') }}" style="font-size:.75rem;color:#64748b;text-decoration:none;">FAQ</a>
            </div>

        </div>

    </div>
</footer>

<script>
    // ── Grid responsive por JS (garantizado sobre cualquier CSS de Bagisto) ──────
    function kvfGrid() {
        var g = document.getElementById('kvf-grid');
        if (!g) return;
        var w = window.innerWidth;
        if (w < 640) {
            g.style.gridTemplateColumns = '1fr';
            g.style.columnGap = '0';
            g.style.rowGap = '0';
        } else if (w < 1060) {
            g.style.gridTemplateColumns = '1fr 1fr';
            g.style.columnGap = '2rem';
            g.style.rowGap = '2.5rem';
        } else {
            g.style.gridTemplateColumns = '2fr 1fr 1fr 1fr';
            g.style.columnGap = '2.5rem';
            g.style.rowGap = '2rem';
        }
    }

    // ── Acordeón ─────────────────────────────────────────────────────────────────
    function kvfToggle(header) {
        if (window.innerWidth >= 640) return;
        var col = header.parentElement;
        var body = col.querySelector('.kvf-col-body');
        var chev = header.querySelector('.kvf-col-chevron');
        var open = col.classList.toggle('kvf-col-open');
        body.style.display = open ? 'flex' : 'none';
        chev.style.transform = open ? 'rotate(180deg)' : 'rotate(0deg)';
    }

    // ── Chevron visibility ────────────────────────────────────────────────────────
    function kvfChevrons() {
        document.querySelectorAll('.kvf-col-chevron').forEach(function(c) {
            c.style.display = window.innerWidth < 640 ? 'inline-block' : 'none';
        });
    }

    // ── Cuerpos de columna en resize ──────────────────────────────────────────────
    function kvfBodies() {
        document.querySelectorAll('.kvf-col-body').forEach(function(b) {
            if (window.innerWidth >= 640) {
                b.style.display = 'flex'; // tablet/desktop: siempre visible
            } else {
                var isOpen = b.closest('.kvf-link-col').classList.contains('kvf-col-open');
                b.style.display = isOpen ? 'flex' : 'none';
            }
        });
    }

    // ── Ejecutar al cargar ────────────────────────────────────────────────────────
    document.addEventListener('DOMContentLoaded', function() {
        kvfGrid();
        kvfChevrons();
        kvfBodies();
    });

    // Fallback si DOMContentLoaded ya pasó (script al final del body)
    kvfGrid();
    kvfChevrons();
    kvfBodies();

    // ── Ejecutar al redimensionar ─────────────────────────────────────────────────
    window.addEventListener('resize', function() {
        kvfGrid();
        kvfChevrons();
        kvfBodies();
    });
</script>

{!! view_render_event('bagisto.shop.layout.footer.after') !!}
