{!! view_render_event('bagisto.shop.layout.header.before') !!}

@if(core()->getCurrentChannel()->locales()->count() > 1 || core()->getCurrentChannel()->currencies()->count() > 1)
<div class="max-lg:hidden">
    <x-shop::layouts.header.desktop.top />
</div>
@endif

<header
    id="kv-header"
    style="
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 50;
        width: 100%;
        background-color: #ffffff;
        border-bottom: 1px solid rgba(226,232,240,0.6);
        box-shadow: 0 1px 20px -4px rgba(99,102,241,0.08);
        overflow: visible;
    "
>

    {{-- Desktop nav --}}
    <div class="max-lg:hidden">
        <x-shop::layouts.header.desktop />
    </div>

    {{-- Mobile nav --}}
    <div class="lg:hidden">
        <x-shop::layouts.header.mobile />
    </div>

    {{-- Barra de progreso de scroll --}}
    <div
        id="kv-scroll-progress"
        style="
            position: absolute;
            bottom: 0;
            left: 0;
            height: 2px;
            width: 0%;
            background: linear-gradient(90deg, #6366f1, #22d3ee, #6366f1);
            background-size: 200% 100%;
            transition: width 0.1s linear;
        "
        aria-hidden="true"></div>
</header>

@auth('customer')
<div
    id="kv-logout-modal"
    role="dialog"
    aria-modal="true"
    aria-labelledby="kv-logout-title"
    style="
        display: none;
        position: fixed;
        inset: 0;
        z-index: 9999;
        align-items: center;
        justify-content: center;
        padding: 16px;
        background: rgba(0, 0, 0, 0.45);
    "
    onclick="kvCloseLogoutModal(event)">
    <div
        style="
            background: #ffffff;
            border-radius: 16px;
            padding: 32px 28px 24px;
            max-width: 400px;
            width: 100%;
            box-shadow: 0 20px 60px -10px rgba(0,0,0,0.25);
            text-align: center;
        "
        onclick="event.stopPropagation()">
        <div style="
            width: 52px; height: 52px; border-radius: 9999px;
            background: rgba(239,68,68,0.10);
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 16px;
        ">
            <span class="icon-users" style="font-size: 24px; color: #ef4444;"></span>
        </div>

        <p id="kv-logout-title" style="font-size: 18px; font-weight: 700; color: #111827; margin-bottom: 8px;">
            ¿Cerrar sesión?
        </p>
        <p style="font-size: 13px; color: #6b7280; margin-bottom: 24px; line-height: 1.5;">
            ¿Estás seguro de que deseas cerrar tu sesión?
        </p>

        <div style="display: flex; gap: 10px; justify-content: center;">
            <button
                type="button"
                onclick="kvCloseLogoutModal()"
                style="
                    padding: 10px 24px; border-radius: 9999px;
                    border: 1.5px solid #e5e7eb; background: #ffffff;
                    color: #374151; font-size: 13px; font-weight: 600;
                    cursor: pointer; transition: all 0.2s ease;
                "
                onmouseover="this.style.borderColor='#6366f1'; this.style.color='#6366f1';"
                onmouseout="this.style.borderColor='#e5e7eb'; this.style.color='#374151';">
                Cancelar
            </button>

            <button
                type="button"
                onclick="kvConfirmLogout()"
                style="
                    padding: 10px 24px; border-radius: 9999px;
                    background: linear-gradient(135deg, #ef4444, #dc2626);
                    color: #ffffff; font-size: 13px; font-weight: 600;
                    border: none; cursor: pointer;
                    box-shadow: 0 4px 14px rgba(239,68,68,0.3);
                    transition: all 0.2s ease;
                "
                onmouseover="this.style.transform='scale(1.04)';"
                onmouseout="this.style.transform='scale(1)';">
                Cerrar sesión
            </button>
        </div>
    </div>
</div>
@endauth

{!! view_render_event('bagisto.shop.layout.header.after') !!}

@pushOnce('scripts')
<script>
    function kvOpenLogoutModal() {
        var modal = document.getElementById('kv-logout-modal');
        if (!modal) return;
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function kvCloseLogoutModal(event) {
        var modal = document.getElementById('kv-logout-modal');
        if (!modal) return;
        modal.style.display = 'none';
        document.body.style.overflow = '';
    }

    function kvConfirmLogout() {
        var form = document.getElementById('customerLogout') ||
            document.getElementById('customerLogoutMobile');
        if (form) form.submit();
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') kvCloseLogoutModal();
    });
</script>
@endPushOnce


@push('styles')
<style >

        #kv-header.kv-scrolled {
            background-color: rgba(255, 255, 255, 0.98);
        }
</style>
@endpush