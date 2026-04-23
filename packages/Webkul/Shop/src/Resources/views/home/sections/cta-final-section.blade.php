<!-- {{-- cta-final-section.blade.php --}}

@php

    $ctaTrustItems = [
        [
            'path' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
            'text' => 'Respaldo KillaVibes',
        ],
        [
            'path' => 'M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z',
            'text' => 'Pagos Seguros',
        ],
        [
            'path' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z',
            'text' => 'Punto Físico en Barranquilla',
        ],
    ];
@endphp

<section class="kv-cta-section">
    <div class="kv-orb" style="top:50%;left:10%;transform:translateY(-50%);width:18rem;height:18rem;background:rgba(99,102,241,0.08);"></div>
    <div class="kv-orb" style="top:50%;right:10%;transform:translateY(-50%);width:18rem;height:18rem;background:rgba(34,211,238,0.08);"></div>

    <div class="kv-cta-inner">
        <div class="kv-cta-card">
            <div class="kv-cta-noise"></div>

            <div style="position:relative;z-index:10;">
                <div style="display:inline-flex;align-items:center;gap:0.5rem;background:rgba(255,255,255,0.15);padding:0.5rem 1rem;border-radius:9999px;border:1px solid rgba(255,255,255,0.25);margin-bottom:1.75rem;backdrop-filter:blur(8px);">
                    <svg xmlns="http://www.w3.org/2000/svg" style="width:0.8rem;height:0.8rem;color:#fff;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    <span style="font-size:0.7rem;font-weight:700;text-transform:uppercase;letter-spacing:0.1em;color:rgba(255,255,255,0.92);">Compra 100% Protegida</span>
                </div>

                <h2 style="font-size:clamp(1.8rem,4vw,2.75rem);font-weight:800;letter-spacing:-0.035em;color:#fff;margin:0 0 1rem;line-height:1.12;">
                    Tu tecnología, respaldada <br>por expertos.
                </h2>
                <p style="font-size:1.05rem;color:rgba(255,255,255,0.82);line-height:1.75;max-width:32rem;margin:0 auto 2.25rem;">
                    En KillaVibes no solo compras un dispositivo; adquieres nuestra garantía de satisfacción total. Protegemos tu inversión con soporte dedicado y políticas claras.
                </p>

                <div style="display:flex;flex-wrap:wrap;gap:1rem;justify-content:center;">
                    <a href="{{ url('/customer/login') }}" class="kv-cta-btn-white">
                        Acceder a mi Cuenta
                        <svg xmlns="http://www.w3.org/2000/svg" style="width:1.1rem;height:1.1rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                    </a>
                    <a href="{{ url('/garantia') }}" class="kv-cta-btn-outline">
                        Políticas de Garantía
                        <svg xmlns="http://www.w3.org/2000/svg" style="width:1.1rem;height:1.1rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </a>
                </div>

                {{-- CORREGIDO: paths SVG desde variable PHP con {!! !!} --}}
                <div style="display:flex;align-items:center;justify-content:center;gap:2rem;flex-wrap:wrap;margin-top:2.5rem;padding-top:2rem;border-top:1px solid rgba(255,255,255,0.15);">
                    @foreach($ctaTrustItems as $trust)
                        <div style="display:flex;align-items:center;gap:0.4rem;">
                            <svg xmlns="http://www.w3.org/2000/svg" style="width:1rem;height:1rem;color:rgba(255,255,255,0.85);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{!! $trust['path'] !!}"/>
                            </svg>
                            <span style="font-size:0.8rem;color:rgba(255,255,255,0.85);font-weight:600;">{{ $trust['text'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section> -->
