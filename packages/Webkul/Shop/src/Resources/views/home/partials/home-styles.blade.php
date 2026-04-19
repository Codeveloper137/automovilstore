<!-----home-styles.blade.php------->

@push('styles')
<style>
    @verbatim

    /* ── Keyframes ────────────────────────────────────────────────── */
    @keyframes kvPulse {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0.5;
        }
    }

    @keyframes kvFloat {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-16px);
        }
    }

    @keyframes kvFloatSlow {

        0%,
        100% {
            transform: translateY(0px) rotate(0deg);
        }

        33% {
            transform: translateY(-10px) rotate(0.8deg);
        }

        66% {
            transform: translateY(-5px) rotate(-0.8deg);
        }
    }

    @keyframes kvFadeUp {
        from {
            opacity: 0;
            transform: translateY(32px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes kvFadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes kvGradShift {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    @keyframes kvSlideRight {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes kvBadgePop {
        0% {
            transform: scale(0.8);
            opacity: 0;
        }

        65% {
            transform: scale(1.04);
        }

        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    @keyframes kvCardIn {
        from {
            opacity: 0;
            transform: translateY(18px) scale(0.975);
        }

        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    @keyframes kvOrbitSpin {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    @keyframes kvShimmer {
        0% {
            transform: translateX(-100%);
        }

        100% {
            transform: translateX(100%);
        }
    }

    @keyframes kvCountUp {
        from {
            opacity: 0;
            transform: scale(0.7) translateY(6px);
        }

        to {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }

    @keyframes kvBorderGlow {

        0%,
        100% {
            border-color: rgba(99, 102, 241, 0.3);
        }

        50% {
            border-color: rgba(34, 211, 238, 0.5);
        }
    }

    /* ── Base section structure ───────────────────────────────────── */
    .kv-section {
        padding: 6rem 0;
        position: relative;
        overflow: hidden;
    }

    .kv-section-inner {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 1.5rem;
        position: relative;
        z-index: 10;
    }

    @media (min-width: 768px) {
        .kv-section-inner {
            padding: 0 2.5rem;
        }
    }

    @media (min-width: 1280px) {
        .kv-section-inner {
            padding: 0 3rem;
        }
    }

    /* ── Section header ───────────────────────────────────────────── */
    .kv-section-header {
        text-align: center;
        margin-bottom: 3.5rem;
    }

    .kv-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: linear-gradient(135deg, rgba(99, 102, 241, 0.08), rgba(34, 211, 238, 0.08));
        padding: 0.55rem 1.1rem;
        border-radius: 9999px;
        border: 1px solid rgba(99, 102, 241, 0.18);
        margin-bottom: 1.25rem;
    }

    .kv-eyebrow-dot {
        width: 0.4rem;
        height: 0.4rem;
        border-radius: 9999px;
        background: linear-gradient(135deg, #6366f1, #22d3ee);
        animation: kvPulse 2s ease-in-out infinite;
    }

    .kv-eyebrow-text {
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.12em;
        background: linear-gradient(135deg, #6366f1, #22d3ee);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .kv-section-title {
        font-size: clamp(1.9rem, 4vw, 2.9rem);
        font-weight: 800;
        letter-spacing: -0.035em;
        color: var(--foreground);
        line-height: 1.12;
        margin: 0 0 1rem;
    }

    .kv-gradient-text {
        background: linear-gradient(135deg, #6366f1 0%, #22d3ee 60%, #6366f1 100%);
        background-size: 200% auto;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: kvGradShift 4s ease infinite;
    }

    .kv-section-sub {
        font-size: 1.05rem;
        color: var(--muted-foreground);
        line-height: 1.75;
        max-width: 36rem;
        margin: 0 auto;
    }

    /* ── Decorative orbs ─────────────────────────────────────────── */
    .kv-orb {
        position: absolute;
        border-radius: 9999px;
        filter: blur(80px);
        pointer-events: none;
    }

    /* ── CTA Buttons ─────────────────────────────────────────────── */
    .kv-btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.9rem 2rem;
        border-radius: 9999px;
        background: linear-gradient(135deg, #6366f1, #22d3ee);
        color: #fff;
        font-weight: 700;
        font-size: 0.92rem;
        text-decoration: none;
        letter-spacing: 0.01em;
        box-shadow: 0 4px 24px rgba(99, 102, 241, 0.35), inset 0 1px 0 rgba(255, 255, 255, 0.15);
        transition: transform 0.25s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.25s ease;
        position: relative;
        overflow: hidden;
    }

    .kv-btn-primary::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.18), transparent);
        border-radius: 9999px;
        opacity: 0;
        transition: opacity 0.25s;
    }

    .kv-btn-primary:hover {
        transform: translateY(-2px) scale(1.03);
        box-shadow: 0 12px 36px rgba(99, 102, 241, 0.45), inset 0 1px 0 rgba(255, 255, 255, 0.2);
    }

    .kv-btn-primary:hover::after {
        opacity: 1;
    }

    .kv-btn-ghost {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.9rem 2rem;
        border-radius: 9999px;
        border: 1.5px solid rgba(99, 102, 241, 0.35);
        color: #6366f1;
        font-weight: 700;
        font-size: 0.92rem;
        text-decoration: none;
        letter-spacing: 0.01em;
        background: rgba(99, 102, 241, 0.04);
        transition: all 0.25s ease;
        backdrop-filter: blur(8px);
    }

    .kv-btn-ghost:hover {
        background: rgba(99, 102, 241, 0.10);
        border-color: rgba(99, 102, 241, 0.6);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(99, 102, 241, 0.15);
    }

    /* ── Hero ────────────────────────────────────────────────────── */
    .kv-hero {
        position: relative;
        overflow: visible;
        /* era hidden — aquí estaba el corte */
        min-height: 92vh;
        display: flex;
        align-items: center;
        background: var(--background);
        isolation: isolate;
        /* stacking context limpio sin clipear */
    }

    /* Nueva capa: contiene los fondos decorativos con su propio clip.
   No interfiere con las órbitas porque éstas viven en kv-hero-layout */
    .kv-hero-bg-layer {
        position: absolute;
        inset: 0;
        overflow: hidden;
        /* clipea solo noise, grid y orbs */
        pointer-events: none;
        z-index: 0;
    }

    /* Los decorativos quedan igual, solo cambia su padre */
    .kv-hero-noise {
        position: absolute;
        inset: 0;
        opacity: 0.022;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 512 512' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)'/%3E%3C/svg%3E");
        background-repeat: repeat;
        pointer-events: none;
        /* z-index eliminado: hereda contexto de bg-layer */
    }

    .kv-hero-grid-bg {
        position: absolute;
        inset: 0;
        opacity: 0.028;
        background-image:
            linear-gradient(rgba(99, 102, 241, 0.8) 1px, transparent 1px),
            linear-gradient(90deg, rgba(99, 102, 241, 0.8) 1px, transparent 1px);
        background-size: 48px 48px;
        pointer-events: none;
        /* z-index eliminado */
        mask-image: radial-gradient(ellipse 80% 80% at 50% 50%, black 20%, transparent 100%);
    }

    .kv-hero-layout {
        display: grid;
        grid-template-columns: 1fr;
        gap: 4rem;
        align-items: center;
        width: 100%;
        max-width: 1400px;
        margin: 0 auto;
        padding: 5rem 1.5rem 4rem;
        position: relative;
        z-index: 1;
        /* encima de bg-layer (z:0), sin competencia */
    }

    @media (min-width: 768px) {
        .kv-hero-layout {
            padding: 5rem 2.5rem 4rem;
        }
    }

    @media (min-width: 1024px) {
        .kv-hero-layout {
            grid-template-columns: 1fr 1fr;
            gap: 5rem;
            padding: 0 3rem;
        }
    }

    /* ── Hero Left ───────────────────────────────────────────────── */
    .kv-hero-left {
        display: flex;
        flex-direction: column;
        gap: 2rem;
        animation: kvFadeUp 1s cubic-bezier(0.22, 1, 0.36, 1) both;
    }

    .kv-hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.625rem;
        width: fit-content;
        padding: 0.625rem 1.125rem;
        border-radius: 9999px;
        background: linear-gradient(135deg, rgba(99, 102, 241, 0.10), rgba(34, 211, 238, 0.08));
        border: 1px solid rgba(99, 102, 241, 0.22);
        backdrop-filter: blur(12px);
        box-shadow: 0 2px 16px rgba(99, 102, 241, 0.08), inset 0 1px 0 rgba(255, 255, 255, 0.6);
        animation: kvBadgePop 0.9s cubic-bezier(0.34, 1.56, 0.64, 1) 0.2s both;
    }

    .kv-hero-badge-icon {
        width: 1rem;
        height: 1rem;
        color: #6366f1;
        animation: kvPulse 2.5s ease-in-out infinite;
    }

    .kv-hero-badge-text {
        font-size: 0.73rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        background: linear-gradient(135deg, #6366f1, #22d3ee);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .kv-hero-badge-dot {
        width: 0.4rem;
        height: 0.4rem;
        border-radius: 9999px;
        background: #22c55e;
        box-shadow: 0 0 0 2px rgba(34, 197, 94, 0.2);
        animation: kvPulse 1.8s ease-in-out infinite;
    }

    .kv-hero-h1 {
        font-size: clamp(2.6rem, 6vw, 4.4rem);
        font-weight: 800;
        line-height: 1.08;
        letter-spacing: -0.04em;
        color: var(--foreground);
        margin: 0;
    }

    .kv-hero-h1-word {
        position: relative;
        display: inline-block;
    }

    .kv-hero-h1-grad {
        background: linear-gradient(135deg, #6366f1 0%, #22d3ee 50%, #6366f1 100%);
        background-size: 200% auto;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: kvGradShift 3.5s ease infinite;
    }

    .kv-hero-underline {
        position: absolute;
        bottom: -0.2rem;
        left: 0;
        width: 100%;
    }

    .kv-hero-desc {
        font-size: clamp(1rem, 1.6vw, 1.1rem);
        color: var(--muted-foreground);
        line-height: 1.8;
        max-width: 500px;
        margin: 0;
    }

    .kv-hero-ctas {
        display: flex;
        flex-wrap: wrap;
        gap: 0.875rem;
        animation: kvFadeUp 1s cubic-bezier(0.22, 1, 0.36, 1) 0.35s both;
    }

    /* ── Feature mini-cards ──────────────────────────────────────── */
    .kv-feat-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 0.75rem;
    }

    @media (min-width: 1024px) {
        .kv-feat-grid {
            grid-template-columns: repeat(4, 1fr);
        }
    }

    .kv-feat-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 0.5rem;
        padding: 1rem 0.75rem;
        border-radius: 1rem;
        border: 1px solid rgba(226, 232, 240, 0.7);
        background: rgba(255, 255, 255, 0.6);
        backdrop-filter: blur(8px);
        transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.3s ease, border-color 0.3s ease;
        cursor: default;
        position: relative;
        overflow: hidden;
    }

    .kv-feat-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, transparent, rgba(255, 255, 255, 0.5));
        opacity: 0;
        transition: opacity 0.3s;
    }

    .kv-feat-card:hover {
        transform: translateY(-4px) scale(1.04);
        box-shadow: 0 12px 32px rgba(99, 102, 241, 0.14);
        border-color: rgba(99, 102, 241, 0.28);
    }

    .kv-feat-card:hover::before {
        opacity: 1;
    }

    .kv-feat-icon {
        width: 3rem;
        height: 3rem;
        border-radius: 9999px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.7);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.06);
        position: relative;
        z-index: 1;
    }

    .kv-feat-icon svg {
        width: 1.5rem;
        height: 1.5rem;
    }

    .kv-feat-title {
        font-size: 0.78rem;
        font-weight: 700;
        color: var(--foreground);
        position: relative;
        z-index: 1;
    }

    .kv-feat-desc {
        font-size: 0.68rem;
        color: var(--muted-foreground);
        margin-top: -0.25rem;
        position: relative;
        z-index: 1;
    }

    /* ── Stats bar ───────────────────────────────────────────────── */
    .kv-stats-bar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1.125rem 1.5rem;
        border-radius: 1rem;
        background: rgba(255, 255, 255, 0.6);
        backdrop-filter: blur(16px);
        border: 1px solid rgba(226, 232, 240, 0.7);
        box-shadow: 0 4px 24px rgba(99, 102, 241, 0.06), inset 0 1px 0 rgba(255, 255, 255, 0.8);
    }

    .kv-stat-item {
        flex: 1;
        text-align: center;
    }

    .kv-stat-val {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.2rem;
        margin-bottom: 0.2rem;
    }

    .kv-stat-num {
        font-size: 1.35rem;
        font-weight: 800;
        letter-spacing: -0.03em;
        animation: kvCountUp 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) 0.6s both;
    }

    .kv-stat-label {
        font-size: 0.67rem;
        color: var(--muted-foreground);
        letter-spacing: 0.02em;
    }

    .kv-stat-divider {
        width: 1px;
        height: 2.5rem;
        background: rgba(226, 232, 240, 0.8);
    }

    /* ── Hero Right: showcase ────────────────────────────────────── */
    .kv-hero-right {
        position: relative;
        min-height: 520px;
        display: flex;
        align-items: center;
        justify-content: center;
        animation: kvFadeUp 1s cubic-bezier(0.22, 1, 0.36, 1) 0.3s both;
        overflow: visible;
        /* explícito: nunca clipear las órbitas */
        padding: 2.5rem 0;
        /* respiro vertical para ring-3 en tablets */
    }

    .kv-ring {
        position: absolute;
        border-radius: 9999px;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        pointer-events: none;
    }

    .kv-ring-1 {
        width: 280px;
        height: 280px;
        border: 1.5px solid rgba(99, 102, 241, 0.18);
        animation: kvOrbitSpin 20s linear infinite;
    }

    .kv-ring-2 {
        width: 380px;
        height: 380px;
        border: 1px dashed rgba(34, 211, 238, 0.14);
        animation: kvOrbitSpin 32s linear infinite reverse;
    }

    .kv-ring-3 {
        width: 480px;
        height: 480px;
        border: 1px solid rgba(99, 102, 241, 0.06);
        animation: kvOrbitSpin 48s linear infinite;
    }

    .kv-ring-glow {
        width: 240px;
        height: 240px;
        background: radial-gradient(circle, rgba(99, 102, 241, 0.16), rgba(34, 211, 238, 0.10), transparent 70%);
        filter: blur(40px);
    }

    .kv-center-badge {
        position: relative;
        z-index: 20;
        width: 128px;
        height: 128px;
        border-radius: 9999px;
        background: linear-gradient(135deg, #6366f1, #22d3ee);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 0.3rem;
        box-shadow:
            0 0 0 8px rgba(99, 102, 241, 0.08),
            0 0 0 16px rgba(99, 102, 241, 0.04),
            0 0 60px rgba(99, 102, 241, 0.35),
            0 20px 60px rgba(99, 102, 241, 0.20);
        animation: kvFloatSlow 6s ease-in-out infinite;
    }

    .kv-orbit-card {
        position: absolute;
        width: 168px;
        background: rgba(255, 255, 255, 0.92);
        backdrop-filter: blur(20px);
        border: 1.5px solid rgba(226, 232, 240, 0.85);
        border-radius: 1rem;
        padding: 0.875rem;
        box-shadow:
            0 8px 32px rgba(99, 102, 241, 0.10),
            0 2px 8px rgba(0, 0, 0, 0.05),
            inset 0 1px 0 rgba(255, 255, 255, 0.9);
        display: flex;
        flex-direction: column;
        gap: 0.625rem;
        cursor: pointer;
        transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.3s ease, border-color 0.3s ease;
        z-index: 15;
    }

    .kv-orbit-card:hover {
        transform: scale(1.08) translateY(-4px) !important;
        box-shadow: 0 20px 48px rgba(99, 102, 241, 0.22), inset 0 1px 0 rgba(255, 255, 255, 1);
        border-color: rgba(99, 102, 241, 0.30);
    }

    .kv-orbit-card-icon {
        width: 2.25rem;
        height: 2.25rem;
        border-radius: 0.625rem;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .kv-orbit-card-icon svg {
        width: 1.1rem;
        height: 1.1rem;
    }

    .kv-pill {
        position: absolute;
        z-index: 22;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        padding: 0.4rem 0.875rem;
        border-radius: 9999px;
        font-size: 0.7rem;
        font-weight: 700;
        backdrop-filter: blur(16px);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08), inset 0 1px 0 rgba(255, 255, 255, 0.7);
    }

    /* ── Benefits Section ────────────────────────────────────────── */
    .kv-benefits-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1.25rem;
    }

    @media (min-width: 640px) {
        .kv-benefits-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (min-width: 1024px) {
        .kv-benefits-grid {
            grid-template-columns: repeat(4, 1fr);
        }
    }

    .kv-benefit-card {
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
        padding: 1.75rem;
        border-radius: 1.25rem;
        border: 1.5px solid rgba(226, 232, 240, 0.7);
        background: rgba(255, 255, 255, 0.55);
        backdrop-filter: blur(10px);
        transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.3s ease, border-color 0.3s ease;
    }

    .kv-benefit-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 48px rgba(99, 102, 241, 0.12);
        border-color: rgba(99, 102, 241, 0.25);
    }

    .kv-benefit-card::after {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 1.25rem;
        background: linear-gradient(135deg, transparent, rgba(99, 102, 241, 0.03));
        opacity: 0;
        transition: opacity 0.3s;
        pointer-events: none;
    }

    .kv-benefit-card:hover::after {
        opacity: 1;
    }

    .kv-benefit-number {
        position: absolute;
        top: 1.5rem;
        right: 1.5rem;
        font-size: 3.5rem;
        font-weight: 900;
        color: rgba(99, 102, 241, 0.05);
        line-height: 1;
        letter-spacing: -0.05em;
        pointer-events: none;
    }

    .kv-benefit-icon {
        width: 3.25rem;
        height: 3.25rem;
        border-radius: 0.875rem;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
    }

    .kv-benefit-icon svg {
        width: 1.6rem;
        height: 1.6rem;
    }

    .kv-benefit-title {
        font-size: 1rem;
        font-weight: 700;
        color: var(--foreground);
        margin: 0;
    }

    .kv-benefit-desc {
        font-size: 0.875rem;
        color: var(--muted-foreground);
        line-height: 1.65;
        margin: 0;
    }

    /* ── CTA final section ───────────────────────────────────────── */
    .kv-cta-section {
        padding: 6rem 0;
        position: relative;
        overflow: hidden;
    }

    .kv-cta-inner {
        max-width: 860px;
        margin: 0 auto;
        padding: 0 1.5rem;
        text-align: center;
        position: relative;
        z-index: 10;
    }

    .kv-cta-card {
        position: relative;
        overflow: hidden;
        padding: 4rem 2.5rem;
        border-radius: 2rem;
        background: linear-gradient(135deg, rgba(99, 102, 241, 0.92), rgba(34, 211, 238, 0.85));
        box-shadow:
            0 24px 80px rgba(99, 102, 241, 0.35),
            0 4px 20px rgba(99, 102, 241, 0.20),
            inset 0 1px 0 rgba(255, 255, 255, 0.20);
    }

    .kv-cta-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, transparent 30%, rgba(255, 255, 255, 0.06));
        pointer-events: none;
    }

    .kv-cta-noise {
        position: absolute;
        inset: 0;
        opacity: 0.04;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
        pointer-events: none;
    }

    .kv-cta-btn-white {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.9rem 2.25rem;
        border-radius: 9999px;
        background: #fff;
        color: #6366f1;
        font-weight: 700;
        font-size: 0.92rem;
        text-decoration: none;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.12);
        transition: transform 0.25s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.25s ease;
    }

    .kv-cta-btn-white:hover {
        transform: translateY(-2px) scale(1.03);
        box-shadow: 0 12px 36px rgba(0, 0, 0, 0.18);
    }

    .kv-cta-btn-outline {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.9rem 2.25rem;
        border-radius: 9999px;
        border: 2px solid rgba(255, 255, 255, 0.5);
        color: #fff;
        font-weight: 700;
        font-size: 0.92rem;
        text-decoration: none;
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(8px);
        transition: all 0.25s ease;
    }

    .kv-cta-btn-outline:hover {
        background: rgba(255, 255, 255, 0.18);
        border-color: rgba(255, 255, 255, 0.8);
        transform: translateY(-2px);
    }

    /* ── Utility ─────────────────────────────────────────────────── */
    .kv-divider {
        height: 1px;
        background: linear-gradient(to right, transparent, rgba(99, 102, 241, 0.15), rgba(34, 211, 238, 0.15), transparent);
        margin: 0;
        border: none;
    }

    /* ════════════════════════════════════════════════════════════
       CARRUSEL DE TESTIMONIOS — prefijo kvh- (sin all:initial)
       Aislado de Alpine y Tailwind mediante selectores específicos
    ════════════════════════════════════════════════════════════ */

    /* Viewport: oculta el desbordamiento horizontal */
    .kvh-viewport {
        display: block;
        width: 100%;
        overflow: hidden;
        position: relative;
    }

    /* Track deslizable */
    .kvh-track {
        display: flex;
        flex-wrap: nowrap;
        align-items: stretch;
        will-change: transform;
    }

    /* Cada slide */
    .kvh-slide {
        flex-shrink: 0;
        flex-grow: 0;
        display: block;
        /* width se asigna via JS */
    }

    /* Tarjeta de testimonio */
    .kvh-card {
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
        height: 100%;
        position: relative;
        overflow: hidden;
        padding: 2rem;
        background: #ffffff;
        border: 1.5px solid rgba(226, 232, 240, 0.85);
        border-radius: 1.25rem;
        box-shadow: 0 4px 24px rgba(99, 102, 241, 0.08), inset 0 1px 0 #fff;
        box-sizing: border-box;
        transition:
            transform 0.28s cubic-bezier(0.34, 1.56, 0.64, 1),
            box-shadow 0.28s ease,
            border-color 0.28s ease;
    }

    .kvh-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 48px rgba(99, 102, 241, 0.16);
        border-color: rgba(99, 102, 241, 0.28);
    }

    /* Botones prev / next */
    .kvh-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 2.75rem;
        height: 2.75rem;
        min-width: 2.75rem;
        min-height: 2.75rem;
        border-radius: 9999px;
        background: rgba(255, 255, 255, 0.92);
        border: 1.5px solid rgba(99, 102, 241, 0.22);
        color: #6366f1;
        box-shadow: 0 2px 12px rgba(99, 102, 241, 0.10);
        padding: 0;
        margin: 0;
        flex-shrink: 0;
        cursor: pointer;
        transition: background 0.2s ease, box-shadow 0.2s ease;
        /* Neutralizar posibles herencias de Tailwind/Alpine */
        appearance: none;
        -webkit-appearance: none;
        line-height: 1;
        font-size: 1rem;
        text-decoration: none;
    }

    .kvh-btn:hover {
        background: #ffffff;
        box-shadow: 0 4px 20px rgba(99, 102, 241, 0.22);
    }

    .kvh-btn:focus-visible {
        outline: 2px solid #6366f1;
        outline-offset: 2px;
    }

    /* Contenedor de dots */
    .kvh-dots-wrap {
        display: flex;
        gap: 0.5rem;
        align-items: center;
    }

    /* Dot individual */
    .kvh-dot {
        display: block;
        height: 0.625rem;
        width: 0.625rem;
        min-width: 0.625rem;
        border-radius: 9999px;
        background: rgba(200, 200, 220, 0.75);
        border: none;
        padding: 0;
        margin: 0;
        flex-shrink: 0;
        cursor: pointer;
        appearance: none;
        -webkit-appearance: none;
        transition: width 0.3s ease, background 0.3s ease, box-shadow 0.3s ease;
    }

    .kvh-dot:focus-visible {
        outline: 2px solid #6366f1;
        outline-offset: 2px;
    }

    .kvh-dot-active {
        width: 2.5rem !important;
        min-width: 2.5rem !important;
        background: linear-gradient(to right, #6366f1, #22d3ee) !important;
        box-shadow: 0 2px 10px rgba(99, 102, 241, 0.40) !important;
    }

    /* Textos internos de la tarjeta — defensivos contra Tailwind */
    .kvh-card p {
        margin: 0;
        padding: 0;
        max-width: none;
        text-align: left;
    }

    .kvh-card svg {
        display: inline-block;
        vertical-align: middle;
        overflow: visible;
    }





    /* SISTEMA SOLAR DINÁMICO — Cápsulas y anillos orbitales
     Prefijo: kv-cap- (cápsula), kv-orbit- (anillo) */



    /* ── Anillo orbital dinámico ─────────────────────────────────── */
    .kv-orbit-ring {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border-radius: 9999px;
        border: 1px solid;
        /* color viene del style inline */
        pointer-events: none;
        transition: border-color 0.6s ease;
    }

    /* ── Cápsula base ────────────────────────────────────────────── */
    .kv-capsule {
        position: absolute;
        width: 158px;
        display: flex;
        flex-direction: column;
        gap: 0.55rem;
        padding: 0.75rem 0.875rem 0.875rem;
        border-radius: 1.25rem;
        background: rgba(255, 255, 255, 0.88);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1.5px solid;
        /* color viene del style inline (orbit_color) */
        cursor: pointer;
        transition:
            transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1),
            box-shadow 0.35s ease,
            filter 0.35s ease,
            opacity 0.35s ease,
            border-color 0.35s ease;
        will-change: transform;
    }

    /* Estado eclipse: cápsulas NO activas se atenúan */
    .kv-solar-eclipsed .kv-capsule:not(.kv-capsule--active) {
        opacity: 0.25;
        filter: blur(2px) !important;
        transform: scale(0.92) !important;
    }

    /* Cápsula activa (hover): crece y emite pulso */
    .kv-capsule--active {
        opacity: 1 !important;
        filter: blur(0px) !important;
        z-index: 50 !important;
        animation: kvEclipsePulse 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) forwards !important;
    }

    @keyframes kvEclipsePulse {
        0% {
            transform: scale(1);
        }

        55% {
            transform: scale(1.28);
        }

        100% {
            transform: scale(1.25);
        }
    }

    /* ── Imagen de producto ──────────────────────────────────────── */
    .kv-cap-img-wrap {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 72px;
        margin: -0.75rem -0.875rem 0;
        /* sangra hasta el borde de la cápsula */
        border-radius: 1rem 1rem 0.5rem 0.5rem;
        background: linear-gradient(135deg,
                color-mix(in srgb, var(--cap-color) 8%, white),
                color-mix(in srgb, var(--cap-color) 4%, white));
        overflow: visible;
        /* permite que la imagen sobresalga */
    }

    .kv-cap-img {
        width: 60px;
        height: 76px;
        object-fit: contain;
        object-position: center bottom;
        transform: translateY(-12px);
        /* efecto 3D: sobresale del borde */
        filter: drop-shadow(0 8px 16px rgba(0, 0, 0, 0.14));
        transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
        border-radius: 0.5rem;
    }

    .kv-capsule:hover .kv-cap-img {
        transform: translateY(-18px) scale(1.06);
    }

    /* ── LED de status ───────────────────────────────────────────── */
    .kv-cap-led {
        position: absolute;
        top: 0.5rem;
        right: 0.5rem;
        width: 0.45rem;
        height: 0.45rem;
        border-radius: 9999px;
        box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.7);
        animation: kvPulse 2s ease-in-out infinite;
    }

    /* ── Meta: nombre + label de órbita ─────────────────────────── */
    .kv-cap-meta {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 0.25rem;
        margin-top: 0.5rem;
    }

    .kv-cap-name {
        font-size: 0.72rem;
        font-weight: 700;
        color: var(--foreground);
        margin: 0;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 90px;
    }

    .kv-cap-label {
        font-size: 0.56rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.07em;
        padding: 0.15rem 0.4rem;
        border-radius: 9999px;
        border: 1px solid;
        /* color viene del style inline */
        white-space: nowrap;
        flex-shrink: 0;
    }

    /* ── Rating ──────────────────────────────────────────────────── */
    .kv-cap-rating {
        display: flex;
        align-items: center;
        gap: 1px;
    }

    /* ── Precio ──────────────────────────────────────────────────── */
    .kv-cap-price-row {
        display: flex;
        align-items: center;
        gap: 0.35rem;
        flex-wrap: wrap;
    }

    .kv-cap-price {
        font-size: 0.85rem;
        font-weight: 800;
        letter-spacing: -0.02em;
    }

    .kv-cap-price-original {
        font-size: 0.65rem;
        font-weight: 500;
        color: var(--muted-foreground);
        text-decoration: line-through;
    }

    .kv-cap-badge-off {
        font-size: 0.58rem;
        font-weight: 700;
        padding: 0.12rem 0.4rem;
        border-radius: 9999px;
        background: rgba(239, 68, 68, 0.10);
        color: #ef4444;
        border: 1px solid rgba(239, 68, 68, 0.18);
    }

    /* ── Stock ───────────────────────────────────────────────────── */
    .kv-cap-stock {
        display: flex;
        align-items: center;
        gap: 0.3rem;
    }

    .kv-cap-stock-dot {
        width: 0.4rem;
        height: 0.4rem;
        border-radius: 9999px;
        animation: kvPulse 1.8s ease-in-out infinite;
    }

    .kv-cap-stock span {
        font-size: 0.62rem;
        font-weight: 600;
        color: #16a34a;
    }

    /* ── Quick Add (oculto por defecto, visible en hover) ────────── */
    .kv-cap-quick-add {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.35rem;
        width: 100%;
        padding: 0.5rem;
        border-radius: 0.625rem;
        background: color-mix(in srgb, var(--cap-color) 12%, white);
        border: 1px solid color-mix(in srgb, var(--cap-color) 25%, transparent);
        color: var(--cap-color);
        font-size: 0.68rem;
        font-weight: 700;
        text-decoration: none;
        letter-spacing: 0.02em;
        opacity: 0;
        transform: translateY(4px);
        transition:
            opacity 0.25s ease,
            transform 0.25s ease,
            background 0.2s ease;
        pointer-events: none;
    }

    .kv-capsule:hover .kv-cap-quick-add,
    .kv-capsule--active .kv-cap-quick-add {
        opacity: 1;
        transform: translateY(0);
        pointer-events: auto;
    }

    .kv-cap-quick-add:hover {
        background: color-mix(in srgb, var(--cap-color) 22%, white);
    }

    /* Evita scrollbar horizontal sin crear un scroll container
   (overflow-x:clip no rompe position:sticky ni otros efectos) */
    body {
        overflow-x: clip;
    }
    @endverbatim
</style>
@endpush
