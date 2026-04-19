{{-- hero-section.blade.php --}}

@php
    $heroStats = [
        [
            'val'   => '500+',
            'label' => 'Clientes Felices',
            'color' => '#6366f1',
            'icon'  => 'badge',
        ],
        [
            'val'   => '1000+',
            'label' => 'Productos',
            'color' => '#22d3ee',
            'icon'  => 'box',
        ],
        [
            'val'   => '98%',
            'label' => 'Satisfacción',
            'color' => '#22c55e',
            'icon'  => 'trending',
        ],
    ];
@endphp

<section class="kv-hero">
    <div class="kv-hero-bg-layer" aria-hidden="true">
        <div class="kv-hero-noise"></div>
        <div class="kv-hero-grid-bg"></div>
        <div class="kv-orb" style="top:-10rem;right:-6rem;width:36rem;height:36rem;background:radial-gradient(circle,rgba(99,102,241,0.16),rgba(34,211,238,0.10),transparent 70%);z-index:2;animation:kvPulse 5s ease-in-out infinite;"></div>
        <div class="kv-orb" style="bottom:-10rem;left:-6rem;width:30rem;height:30rem;background:radial-gradient(circle,rgba(34,211,238,0.14),rgba(99,102,241,0.08),transparent 70%);z-index:2;animation:kvPulse 6s ease-in-out infinite 2s;"></div>
        <div style="position:absolute;inset:0;background:linear-gradient(to bottom,transparent 70%,var(--background) 100%);z-index:3;pointer-events:none;"></div>
    </div>
    <div class="kv-hero-layout">

        <div class="kv-hero-left">

            <div class="kv-hero-badge">
                <svg class="kv-hero-badge-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 3l14 9-14 9V3z" />
                </svg>
                <span class="kv-hero-badge-text">KillaVibes Premium</span>
                <div class="kv-hero-badge-dot"></div>
            </div>

            <h1 class="kv-hero-h1">
                Tecnología<br>
                que
                <span class="kv-hero-h1-word">
                    <span class="kv-hero-h1-grad">vibra</span>
                    <svg class="kv-hero-underline" height="10" viewBox="0 0 200 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 7 Q40 1,100 6 T200 5" stroke="url(#hug)" stroke-width="2.5" fill="none" opacity="0.55" />
                        <defs>
                            <linearGradient id="hug" x1="0" y1="0" x2="200" y2="0">
                                <stop offset="0%" stop-color="#6366f1" />
                                <stop offset="100%" stop-color="#22d3ee" />
                            </linearGradient>
                        </defs>
                    </svg>
                </span>
                <br>contigo
            </h1>

            <p class="kv-hero-desc">
                Descubre los mejores productos tecnológicos en
                <strong style="color:#6366f1;font-weight:600;">Barranquilla</strong>.
                Audífonos, parlantes, compresores y más —
                <strong style="color:#22d3ee;font-weight:600;">envíos gratis</strong>
                y garantía total.
            </p>

            <div class="kv-hero-ctas">
                <a href="{{ url('/collections') }}" class="kv-btn-primary">
                    Explorar Colecciones
                    <svg xmlns="http://www.w3.org/2000/svg" style="width:1.1rem;height:1.1rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
                <a href="{{ url('/search?sort=created_at-desc&new=1') }}" class="kv-btn-ghost">
                    <svg xmlns="http://www.w3.org/2000/svg" style="width:1.2rem;height:1.2rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    Ver Lanzamientos
                </a>
            </div>

            <div class="kv-feat-grid">
                @foreach($features as $idx => $feat)
                <div class="kv-feat-card" style="background:{{ $feat['bg'] }};animation:kvCardIn 0.55s cubic-bezier(0.34,1.56,0.64,1) {{ 0.5 + $idx * 0.08 }}s both;">
                    <div class="kv-feat-icon" style="color:{{ $feat['color'] }};">
                        @if($feat['icon'] === 'truck')
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                        </svg>
                        @elseif($feat['icon'] === 'shield')
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        @elseif($feat['icon'] === 'clock')
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        @endif
                    </div>
                    <span class="kv-feat-title">{{ $feat['title'] }}</span>
                    <span class="kv-feat-desc">{{ $feat['desc'] }}</span>
                </div>
                @endforeach
            </div>

            {{-- CORREGIDO: stats bar — SVGs inline definidos con @if/@elseif --}}
            {{-- Elimina el anti-patrón de inyectar HTML como string PHP en arrays --}}
            <div class="kv-stats-bar">
                @foreach($heroStats as $i => $stat)
                    @if($i > 0)
                        <div class="kv-stat-divider"></div>
                    @endif
                    <div class="kv-stat-item">
                        <div class="kv-stat-val">
                            <svg xmlns="http://www.w3.org/2000/svg" style="width:1rem;height:1rem;color:{{ $stat['color'] }};" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                @if($stat['icon'] === 'badge')
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                @elseif($stat['icon'] === 'box')
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                @else
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                @endif
                            </svg>
                            <span class="kv-stat-num" style="color:{{ $stat['color'] }};">{{ $stat['val'] }}</span>
                        </div>
                        <p class="kv-stat-label">{{ $stat['label'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- ═══ RIGHT COLUMN — Sistema Solar dinámico ═══ --}}
        @include('shop::home.partials.solar-system', ['solarSystem' => $solarSystem])

    </div>
</section>
