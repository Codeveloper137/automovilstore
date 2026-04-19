
<style>
/* ──────────────────────────────────────────────────────────────
   0. DESIGN TOKENS
   ────────────────────────────────────────────────────────────── */
:root {
    --kv-primary:      #6366f1;
    --kv-primary-light:rgba(99,102,241,0.10);
    --kv-primary-glow: rgba(99,102,241,0.25);
    --kv-accent:       #22d3ee;
    --kv-accent-light: rgba(34,211,238,0.10);
    --kv-success:      #22c55e;
    --kv-success-bg:   rgba(34,197,94,0.08);
    --kv-warning:      #f59e0b;
    --kv-warning-bg:   rgba(245,158,11,0.08);
    --kv-danger:       #ef4444;
    --kv-danger-bg:    rgba(239,68,68,0.08);
    --kv-bg:           var(--background, #ffffff);
    --kv-surface:      rgba(255,255,255,0.82);
    --kv-surface-hover:rgba(255,255,255,0.96);
    --kv-text:         var(--foreground, #0f172a);
    --kv-text-muted:   var(--muted-foreground, #64748b);
    --kv-text-subtle:  #94a3b8;
    --kv-border:       rgba(226,232,240,0.85);
    --kv-border-hover: rgba(99,102,241,0.30);
    --kv-radius-pill:  9999px;
    --kv-radius:       1.25rem;
    --kv-radius-sm:    0.875rem;
    --kv-radius-xs:    0.5rem;
    --kv-ease-spring:  cubic-bezier(0.34,1.56,0.64,1);
    --kv-ease-out:     cubic-bezier(0.22,1,0.36,1);
    --kv-shadow-sm:    0 2px 8px rgba(0,0,0,0.06);
    --kv-shadow-md:    0 8px 32px rgba(99,102,241,0.10);
    --kv-shadow-lg:    0 20px 60px rgba(99,102,241,0.16);
    --kv-shadow-inset: inset 0 1px 0 rgba(255,255,255,0.70);
    --kv-max-width:    1200px;
    --kv-max-prose:    860px;
    --kv-section-py:   5rem;
}

/* ── KEYFRAMES ── */
@keyframes kvpFadeUp {
    from { opacity:0; transform:translateY(28px); }
    to   { opacity:1; transform:translateY(0); }
}
@keyframes kvpFadeIn {
    from { opacity:0; } to { opacity:1; }
}
@keyframes kvpPulse {
    0%,100% { opacity:1; } 50% { opacity:0.5; }
}
@keyframes kvpSlideDown {
    from { opacity:0; transform:translateY(-8px); }
    to   { opacity:1; transform:translateY(0); }
}
@keyframes kvpGradShift {
    0%   { background-position:0%   50%; }
    50%  { background-position:100% 50%; }
    100% { background-position:0%   50%; }
}
@keyframes kvpShimmer {
    0%   { transform:translateX(-100%); }
    100% { transform:translateX(100%); }
}
@keyframes kvpScaleIn {
    from { opacity:0; transform:scale(0.92); }
    to   { opacity:1; transform:scale(1); }
}

/* ── BASE ── */
*, *::before, *::after { box-sizing:border-box; }
body { overflow-x:clip; }

/* ── LAYOUT ── */
.kvp-main {
    max-width: var(--kv-max-width);
    margin: 0 auto;
    padding: 0 1.5rem;
}
@media (min-width:768px)  { .kvp-main { padding:0 2.5rem; } }
@media (min-width:1280px) { .kvp-main { padding:0 3rem; } }

.kvp-section    { padding: var(--kv-section-py) 0; }
.kvp-section--sm{ padding: calc(var(--kv-section-py) * 0.65) 0; }

/* ── HERO ── */
.kvp-hero {
    position: relative; overflow: hidden;
    padding: 5.5rem 1.5rem 5rem;
    text-align: center; isolation: isolate;
}
@media (min-width:768px) { .kvp-hero { padding:6.5rem 2.5rem 6rem; } }
.kvp-hero::before {
    content:''; position:absolute; inset:0; opacity:.04;
    background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 512 512' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
    pointer-events:none; z-index:-1;
}
.kvp-hero::after {
    content:''; position:absolute; inset:0;
    background:radial-gradient(ellipse 70% 80% at 50% 50%, rgba(255,255,255,0.10) 0%, transparent 70%);
    pointer-events:none; z-index:0;
}
.kvp-hero-inner { position:relative; z-index:1; max-width:700px; margin:0 auto; }
.kvp-hero-eyebrow {
    display:inline-flex; align-items:center; gap:.5rem;
    background:rgba(255,255,255,0.18); backdrop-filter:blur(12px);
    border:1px solid rgba(255,255,255,0.28);
    border-radius:var(--kv-radius-pill);
    padding:.45rem 1.1rem; margin-bottom:1.5rem;
    font-size:.71rem; font-weight:700;
    text-transform:uppercase; letter-spacing:.11em; color:#fff;
    animation: kvpFadeUp .7s var(--kv-ease-out) both;
}
.kvp-hero-eyebrow-dot {
    width:.42rem; height:.42rem; border-radius:50%;
    background:#fff; box-shadow:0 0 0 3px rgba(255,255,255,.25);
    animation:kvpPulse 1.8s ease-in-out infinite;
}
.kvp-hero h1 {
    font-size:clamp(2.2rem,5vw,3.8rem);
    font-weight:800; line-height:1.08; letter-spacing:-.04em;
    color:#fff; margin:0 0 1.25rem;
    animation:kvpFadeUp .8s var(--kv-ease-out) .1s both;
}
.kvp-hero-sub {
    font-size:clamp(.97rem,1.4vw,1.1rem);
    color:rgba(255,255,255,.88); line-height:1.75;
    max-width:520px; margin:0 auto;
    animation:kvpFadeUp .9s var(--kv-ease-out) .2s both;
}
.kvp-hero--about   { background:linear-gradient(135deg,#6366f1 0%,#4f46e5 45%,#7c3aed 100%); }
.kvp-hero--cookies { background:linear-gradient(135deg,#0891b2 0%,#0e7490 50%,#0369a1 100%); }
.kvp-hero--returns { background:linear-gradient(135deg,#dc2626 0%,#b91c1c 50%,#c2410c 100%); }
.kvp-hero--shipping{ background:linear-gradient(135deg,#2563eb 0%,#1d4ed8 50%,#0ea5e9 100%); }
.kvp-hero--faq     { background:linear-gradient(135deg,#6366f1 0%,#4f46e5 45%,#2563eb 100%); }
.kvp-hero--warranty{ background:linear-gradient(135deg,#059669 0%,#047857 50%,#10b981 100%); }
.kvp-hero--privacy { background:linear-gradient(135deg,#059669 0%,#047857 60%,#065f46 100%); }
.kvp-hero--terms   { background:linear-gradient(135deg,#dc2626 0%,#b91c1c 50%,#9f1239 100%); }

/* ── SECTION HEADER ── */
.kvp-sh { margin-bottom:2.75rem; }
.kvp-sh--center { text-align:center; }
.kvp-sh-eyebrow {
    display:inline-flex; align-items:center; gap:.625rem;
    font-size:.7rem; font-weight:700;
    text-transform:uppercase; letter-spacing:.12em;
    color:var(--kv-primary); margin-bottom:.875rem;
}
.kvp-sh-eyebrow-line {
    display:block; height:1.5px; width:2rem;
    background:linear-gradient(to right,var(--kv-primary),var(--kv-accent));
    border-radius:9999px; flex-shrink:0;
}
.kvp-sh h2 {
    font-size:clamp(1.75rem,3.5vw,2.6rem);
    font-weight:800; letter-spacing:-.035em; line-height:1.12;
    color:var(--kv-text); margin:0 0 .75rem;
}
.kvp-sh p {
    font-size:1rem; color:var(--kv-text-muted);
    line-height:1.75; max-width:44rem; margin:0;
}
.kvp-sh--center p { margin:0 auto; }

/* ── CARD BASE ── */
.kvp-card {
    background:var(--kv-surface); border:1.5px solid var(--kv-border);
    border-radius:var(--kv-radius); backdrop-filter:blur(10px);
    box-shadow:var(--kv-shadow-sm),var(--kv-shadow-inset);
    transition: transform .32s var(--kv-ease-spring), box-shadow .28s ease, border-color .25s ease;
}
.kvp-card:hover {
    transform:translateY(-5px);
    box-shadow:var(--kv-shadow-lg);
    border-color:var(--kv-border-hover);
}
.kvp-info-block {
    padding:2rem 2.25rem; border-radius:var(--kv-radius);
    border:1.5px solid var(--kv-border);
    background:var(--kv-surface); backdrop-filter:blur(8px);
    box-shadow:var(--kv-shadow-sm); border-left-width:4px;
}
.kvp-info-block--indigo { border-left-color:var(--kv-primary); }
.kvp-info-block--green  { border-left-color:var(--kv-success); }
.kvp-info-block--cyan   { border-left-color:var(--kv-accent); }
.kvp-info-block--amber  { border-left-color:var(--kv-warning); }
.kvp-info-block--red    { border-left-color:var(--kv-danger); }
.kvp-info-block h3 { font-size:1.1rem; font-weight:700; color:var(--kv-text); margin:0 0 .875rem; }
.kvp-info-block p  { font-size:.93rem; color:var(--kv-text-muted); line-height:1.8; margin:0 0 .875rem; }
.kvp-info-block p:last-child { margin-bottom:0; }

/* ── DIVIDER ── */
.kvp-divider {
    border:none; height:1px; margin:0;
    background:linear-gradient(to right, transparent, rgba(99,102,241,.15), rgba(34,211,238,.12), transparent);
}

/* ── ICON WRAP ── */
.kvp-icon-wrap {
    width:3rem; height:3rem; border-radius:.875rem;
    display:flex; align-items:center; justify-content:center;
    flex-shrink:0; transition:transform .28s var(--kv-ease-spring);
}
.kvp-card:hover .kvp-icon-wrap { transform:scale(1.08); }
.kvp-icon--indigo { background:rgba(99,102,241,.12); color:#6366f1; }
.kvp-icon--cyan   { background:rgba(34,211,238,.12); color:#0891b2; }
.kvp-icon--violet { background:rgba(124,58,237,.10); color:#7c3aed; }
.kvp-icon--green  { background:rgba(34,197,94,.12);  color:#16a34a; }
.kvp-icon--amber  { background:rgba(245,158,11,.12); color:#d97706; }
.kvp-icon--red    { background:rgba(239,68,68,.10);  color:#dc2626; }
.kvp-icon--blue   { background:rgba(37,99,235,.10);  color:#2563eb; }

/* ── BADGES ── */
.kvp-badge {
    display:inline-flex; align-items:center; gap:.3rem;
    font-size:.65rem; font-weight:700;
    text-transform:uppercase; letter-spacing:.09em;
    padding:.3rem .75rem; border-radius:var(--kv-radius-pill);
    border:1px solid; white-space:nowrap; flex-shrink:0;
}
.kvp-badge--required { background:rgba(99,102,241,.10); color:var(--kv-primary); border-color:rgba(99,102,241,.25); }
.kvp-badge--optional { background:rgba(245,158,11,.08); color:#d97706; border-color:rgba(245,158,11,.25); }
.kvp-badge--new      { background:rgba(34,197,94,.10);  color:#16a34a; border-color:rgba(34,197,94,.25); }

/* ── STATS BAND ── */
.kvp-stats-band {
    display:grid; grid-template-columns:repeat(2,1fr);
    gap:1px; border-radius:var(--kv-radius); overflow:hidden;
    border:1.5px solid var(--kv-border); background:var(--kv-border);
    box-shadow:var(--kv-shadow-sm);
}
@media (min-width:640px) { .kvp-stats-band { grid-template-columns:repeat(4,1fr); } }
.kvp-stat-cell {
    background:var(--kv-surface); backdrop-filter:blur(8px);
    padding:2rem 1.25rem; text-align:center;
    display:flex; flex-direction:column; align-items:center; gap:.5rem;
    transition:background .2s ease;
}
.kvp-stat-cell:hover { background:var(--kv-surface-hover); }
.kvp-stat-icon { width:2.5rem; height:2.5rem; border-radius:var(--kv-radius-xs); display:flex; align-items:center; justify-content:center; }
.kvp-stat-num   { font-size:1.8rem; font-weight:800; letter-spacing:-.04em; line-height:1; color:var(--kv-text); }
.kvp-stat-label { font-size:.73rem; color:var(--kv-text-muted); letter-spacing:.02em; line-height:1.4; }

/* ── TABLE ── */
.kvp-table-wrap { border-radius:var(--kv-radius); overflow:hidden; border:1.5px solid var(--kv-border); box-shadow:var(--kv-shadow-sm); }
.kvp-table      { width:100%; border-collapse:collapse; font-size:.88rem; }
.kvp-table thead { background:linear-gradient(135deg,rgba(99,102,241,.06),rgba(34,211,238,.04)); }
.kvp-table th {
    padding:.875rem 1.25rem; font-size:.72rem; font-weight:700;
    text-transform:uppercase; letter-spacing:.09em;
    color:var(--kv-text-muted); text-align:left;
    border-bottom:1.5px solid var(--kv-border); white-space:nowrap;
}
.kvp-table td {
    padding:.875rem 1.25rem; color:var(--kv-text-muted);
    border-bottom:1px solid var(--kv-border); vertical-align:middle; line-height:1.6;
}
.kvp-table tbody tr:last-child td { border-bottom:none; }
.kvp-table tbody tr { background:var(--kv-surface); transition:background .2s ease; }
.kvp-table tbody tr:hover { background:rgba(99,102,241,.025); }

/* ── CHECK LIST ── */
.kvp-check-list { list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:.75rem; }
.kvp-check-item {
    display:flex; align-items:flex-start; gap:.875rem;
    padding:1rem 1.25rem;
    background:var(--kv-surface); border:1.5px solid var(--kv-border);
    border-radius:var(--kv-radius-sm); backdrop-filter:blur(6px);
    transition: transform .28s var(--kv-ease-spring), border-color .22s ease, box-shadow .22s ease;
}
.kvp-check-item:hover { transform:translateX(4px); border-color:var(--kv-border-hover); box-shadow:var(--kv-shadow-md); }
.kvp-check-item p { font-size:.9rem; color:var(--kv-text-muted); line-height:1.7; margin:0; padding-top:.05rem; }
.kvp-check-icon { width:1.35rem; height:1.35rem; border-radius:50%; display:flex; align-items:center; justify-content:center; flex-shrink:0; margin-top:.15rem; }
.kvp-check-icon--indigo { background:rgba(99,102,241,.12); color:var(--kv-primary); }
.kvp-check-icon--green  { background:rgba(34,197,94,.14);  color:#16a34a; }
.kvp-check-icon--red    { background:rgba(239,68,68,.12);  color:#dc2626; }
.kvp-check-icon--amber  { background:rgba(245,158,11,.12); color:#d97706; }

/* ── TIMELINE ── */
.kvp-timeline { display:flex; flex-direction:column; max-width:680px; gap:0; }
.kvp-tl-item  { display:grid; grid-template-columns:5.5rem 1fr; gap:1.5rem; position:relative; }
.kvp-tl-item:not(:last-child)::after {
    content:''; position:absolute; left:2.65rem; top:2.75rem; bottom:-1.5rem;
    width:1.5px; background:linear-gradient(to bottom,var(--kv-primary),rgba(99,102,241,.06));
}
.kvp-tl-year-wrap { display:flex; flex-direction:column; align-items:center; gap:.5rem; padding-top:.25rem; }
.kvp-tl-dot   { width:.9rem; height:.9rem; border-radius:50%; background:linear-gradient(135deg,var(--kv-primary),var(--kv-accent)); box-shadow:0 0 0 4px rgba(99,102,241,.14), 0 0 0 8px rgba(99,102,241,.05); flex-shrink:0; }
.kvp-tl-year  { font-size:.72rem; font-weight:700; color:var(--kv-primary); letter-spacing:.05em; text-align:center; }
.kvp-tl-content { padding:.1rem 0 2.75rem; }
.kvp-tl-content h4 { font-size:1rem; font-weight:700; color:var(--kv-text); margin:0 0 .4rem; }
.kvp-tl-content p  { font-size:.88rem; color:var(--kv-text-muted); line-height:1.75; margin:0; }

/* ── FAQ ACORDEÓN ── */
.kvp-faq-list { max-width:var(--kv-max-prose); margin:0 auto; display:flex; flex-direction:column; gap:.625rem; }
.kvp-faq-item {
    border:1.5px solid var(--kv-border); border-radius:var(--kv-radius-sm);
    background:var(--kv-surface); overflow:hidden;
    box-shadow:var(--kv-shadow-sm);
    transition:border-color .25s ease, box-shadow .25s ease;
}
.kvp-faq-item.kvp-faq-open { border-color:rgba(99,102,241,.30); box-shadow:var(--kv-shadow-md); }
.kvp-faq-btn {
    width:100%; display:flex; align-items:center;
    justify-content:space-between; gap:1rem;
    padding:1.125rem 1.5rem; background:none; border:none;
    cursor:pointer; text-align:left;
    font-size:.95rem; font-weight:600; color:var(--kv-text);
    transition:color .2s ease, background .2s ease;
    -webkit-appearance:none;
}
.kvp-faq-btn:hover          { color:var(--kv-primary); background:rgba(99,102,241,.025); }
.kvp-faq-open .kvp-faq-btn  { color:var(--kv-primary); }
.kvp-faq-btn span:first-child { flex:1; }
.kvp-faq-chevron {
    width:1.1rem; height:1.1rem; color:var(--kv-text-subtle); flex-shrink:0;
    transition:transform .3s var(--kv-ease-spring), color .2s ease;
}
.kvp-faq-open .kvp-faq-chevron { transform:rotate(180deg); color:var(--kv-primary); }
.kvp-faq-body {
    display:grid; grid-template-rows:0fr;
    transition:grid-template-rows .32s var(--kv-ease-out);
}
.kvp-faq-open .kvp-faq-body { grid-template-rows:1fr; }
.kvp-faq-body-inner {
    overflow:hidden; font-size:.9rem; color:var(--kv-text-muted);
    line-height:1.8; padding:0 1.5rem;
    transition:padding .32s var(--kv-ease-out);
}
.kvp-faq-open .kvp-faq-body-inner { padding:.25rem 1.5rem 1.375rem; }

/* ── CTA ── */
.kvp-cta {
    position:relative; overflow:hidden; border-radius:1.75rem;
    padding:4rem 2.5rem; text-align:center;
    box-shadow:0 24px 80px rgba(0,0,0,.22), 0 4px 20px rgba(0,0,0,.12);
}
.kvp-cta::before {
    content:''; position:absolute; inset:0;
    background:linear-gradient(135deg,transparent 30%,rgba(255,255,255,.06));
    pointer-events:none;
}
.kvp-cta::after {
    content:''; position:absolute; inset:0; opacity:.04;
    background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
    pointer-events:none;
}
.kvp-cta h2 { font-size:clamp(1.6rem,3.5vw,2.4rem); font-weight:800; letter-spacing:-.035em; color:#fff; margin:0 0 .875rem; position:relative; z-index:1; }
.kvp-cta p  { font-size:1rem; color:rgba(255,255,255,.88); line-height:1.75; margin:0; position:relative; z-index:1; }
.kvp-cta-actions { display:flex; flex-wrap:wrap; gap:.75rem; justify-content:center; margin-top:2.25rem; position:relative; z-index:1; }
.kvp-cta-btn-white {
    display:inline-flex; align-items:center; gap:.5rem;
    padding:.85rem 2rem; border-radius:var(--kv-radius-pill);
    background:#fff; font-weight:700; font-size:.9rem;
    text-decoration:none; letter-spacing:.01em;
    box-shadow:0 4px 20px rgba(0,0,0,.15);
    transition:transform .25s var(--kv-ease-spring), box-shadow .25s ease;
}
.kvp-cta-btn-white:hover { transform:translateY(-2px) scale(1.03); box-shadow:0 12px 36px rgba(0,0,0,.22); }
.kvp-cta-btn-ghost {
    display:inline-flex; align-items:center; gap:.5rem;
    padding:.85rem 2rem; border-radius:var(--kv-radius-pill);
    border:1.5px solid rgba(255,255,255,.45);
    background:rgba(255,255,255,.10); color:#fff;
    font-weight:700; font-size:.9rem;
    text-decoration:none; letter-spacing:.01em;
    backdrop-filter:blur(8px); transition:all .25s ease;
}
.kvp-cta-btn-ghost:hover { background:rgba(255,255,255,.22); border-color:rgba(255,255,255,.75); transform:translateY(-2px); }

/* ── TOGGLE SWITCH ── */
.kvp-toggle { position:relative; flex-shrink:0; width:2.75rem; height:1.5rem; display:inline-block; }
.kvp-toggle input { position:absolute; opacity:0; width:0; height:0; }
.kvp-toggle-track {
    position:absolute; inset:0; border-radius:var(--kv-radius-pill);
    background:rgba(200,208,225,.7); border:1.5px solid rgba(180,190,210,.6);
    cursor:pointer; transition:background .25s ease, border-color .25s ease;
}
.kvp-toggle input:checked + .kvp-toggle-track   { background:var(--kv-primary); border-color:var(--kv-primary); }
.kvp-toggle input:disabled + .kvp-toggle-track  { opacity:.5; cursor:not-allowed; }
.kvp-toggle-thumb {
    position:absolute; top:3px; left:3px;
    width:1rem; height:1rem; border-radius:50%;
    background:#fff; box-shadow:0 1px 4px rgba(0,0,0,.2);
    transition:transform .25s var(--kv-ease-spring); pointer-events:none;
}
.kvp-toggle input:checked ~ .kvp-toggle-thumb { transform:translateX(1.25rem); }

/* ── NOTICE BOX ── */
.kvp-notice { padding:1.25rem 1.5rem; border-radius:var(--kv-radius-sm); margin-bottom:2rem; display:flex; gap:.875rem; align-items:flex-start; }
.kvp-notice--info { background:rgba(99,102,241,.06); border:1px solid rgba(99,102,241,.18); color:var(--kv-text-muted); }
.kvp-notice--warn { background:rgba(245,158,11,.07); border:1px solid rgba(245,158,11,.22); color:#92400e; }
.kvp-notice--ok   { background:rgba(34,197,94,.07);  border:1px solid rgba(34,197,94,.22);  color:#065f46; }
.kvp-notice strong { display:block; font-weight:700; color:inherit; margin-bottom:.3rem; }
.kvp-notice p      { margin:0; font-size:.88rem; line-height:1.7; }

/* ── SECTION BADGE ── */
.kvp-section-badge {
    width:2.25rem; height:2.25rem; border-radius:50%;
    display:flex; align-items:center; justify-content:center;
    font-size:.82rem; font-weight:700; color:#fff;
    background:linear-gradient(135deg,var(--kv-primary),var(--kv-accent));
    box-shadow:0 4px 14px var(--kv-primary-glow);
    flex-shrink:0; margin-bottom:.875rem;
}

/* ── PROSE CARD ── */
.kvp-prose-card {
    padding:2rem 2.25rem; background:var(--kv-surface);
    border:1.5px solid var(--kv-border); border-radius:var(--kv-radius);
    box-shadow:var(--kv-shadow-sm); margin-bottom:1.25rem;
    animation:kvpFadeUp .5s var(--kv-ease-out) both;
    transition:border-color .25s ease, box-shadow .25s ease;
}
.kvp-prose-card:hover { border-color:var(--kv-border-hover); box-shadow:var(--kv-shadow-md); }
.kvp-prose-card h3 { font-size:1.05rem; font-weight:700; color:var(--kv-text); margin:0 0 .875rem; }
.kvp-prose-card p  { font-size:.91rem; color:var(--kv-text-muted); line-height:1.82; margin:0; }

/* ── SEARCH BAR ── */
.kvp-search-wrap { position:relative; margin-bottom:2.5rem; }
.kvp-search-icon { position:absolute; left:1.125rem; top:50%; transform:translateY(-50%); color:var(--kv-text-subtle); pointer-events:none; }
.kvp-search-icon svg { width:1.1rem; height:1.1rem; }
.kvp-search-input {
    width:100%; padding:.95rem 1.25rem .95rem 3rem;
    border:1.5px solid var(--kv-border); border-radius:var(--kv-radius-sm);
    background:var(--kv-surface); font-size:.95rem; color:var(--kv-text);
    backdrop-filter:blur(8px); box-shadow:var(--kv-shadow-sm);
    transition:border-color .25s ease, box-shadow .25s ease; -webkit-appearance:none;
}
.kvp-search-input::placeholder { color:var(--kv-text-subtle); }
.kvp-search-input:focus { outline:none; border-color:var(--kv-primary); box-shadow:0 0 0 3px var(--kv-primary-light), var(--kv-shadow-sm); }

/* ── CATEGORY NAV ── */
.kvp-cat-nav { display:flex; flex-wrap:wrap; gap:.625rem; margin-bottom:3rem; }
.kvp-cat-btn {
    display:inline-flex; align-items:center; gap:.4rem;
    padding:.55rem 1.125rem; border-radius:var(--kv-radius-pill);
    border:1.5px solid var(--kv-border); background:var(--kv-surface);
    color:var(--kv-text-muted); font-size:.82rem; font-weight:600;
    cursor:pointer; transition:all .22s ease; -webkit-appearance:none; backdrop-filter:blur(6px);
}
.kvp-cat-btn:hover      { border-color:var(--kv-border-hover); color:var(--kv-primary); background:rgba(99,102,241,.05); }
.kvp-cat-btn.kvp-cat-active {
    background:linear-gradient(135deg,var(--kv-primary),var(--kv-accent));
    color:#fff; border-color:transparent;
    box-shadow:0 4px 16px var(--kv-primary-glow);
}

/* ── FAQ CATEGORY HEADER ── */
.kvp-cat-header { display:flex; align-items:center; gap:1rem; margin-bottom:1.75rem; padding-bottom:1rem; border-bottom:2px solid var(--kv-border); }
.kvp-cat-icon   { width:2.75rem; height:2.75rem; border-radius:.75rem; background:var(--kv-primary-light); display:flex; align-items:center; justify-content:center; flex-shrink:0; color:var(--kv-primary); }
.kvp-cat-icon svg    { width:1.25rem; height:1.25rem; }
.kvp-cat-header h2   { font-size:1.3rem; font-weight:700; color:var(--kv-text); margin:0; }

/* ── FAQ GRID ── */
.kvp-faq-grid { display:grid; grid-template-columns:1fr; gap:.625rem; }
@media (min-width:900px) { .kvp-faq-grid { grid-template-columns:repeat(2,1fr); } }

/* ── ANIMATE ── */
.kvp-animate { animation:kvpFadeUp .8s var(--kv-ease-out) both; }
.kvp-animate-delay-1 { animation-delay:.12s; }
.kvp-animate-delay-2 { animation-delay:.24s; }
.kvp-animate-delay-3 { animation-delay:.36s; }

/* ── LAST UPDATED ── */
.kvp-last-updated {
    display:flex; flex-wrap:wrap; gap:1.5rem; align-items:center;
    padding:1.125rem 1.5rem; background:var(--kv-surface);
    border:1.5px solid var(--kv-border); border-left:4px solid var(--kv-primary);
    border-radius:var(--kv-radius-sm); margin-bottom:2.75rem;
    font-size:.85rem; color:var(--kv-text-muted);
}
.kvp-last-updated strong { color:var(--kv-text); }

/* ── RIGHTS GRID ── */
.kvp-rights-grid { display:grid; grid-template-columns:1fr; gap:.75rem; }
@media (min-width:640px) { .kvp-rights-grid { grid-template-columns:repeat(2,1fr); } }
.kvp-rights-item {
    display:flex; gap:.875rem; align-items:flex-start;
    padding:1.125rem 1.25rem; background:var(--kv-surface);
    border:1.5px solid var(--kv-border); border-left:3px solid var(--kv-primary);
    border-radius:var(--kv-radius-sm);
    transition:border-left-color .2s ease, box-shadow .2s ease;
}
.kvp-rights-item:hover { border-left-color:var(--kv-accent); box-shadow:var(--kv-shadow-md); }
.kvp-rights-item strong { display:block; font-size:.88rem; font-weight:700; color:var(--kv-text); margin-bottom:.25rem; }
.kvp-rights-item p { margin:0; font-size:.83rem; color:var(--kv-text-muted); line-height:1.65; }

/* ── BROWSER GRID ── */
.kvp-browser-grid { display:grid; grid-template-columns:repeat(2,1fr); gap:1.25rem; }
@media (max-width:480px) { .kvp-browser-grid { grid-template-columns:1fr; } }
.kvp-browser-card    { padding:1.625rem; }
.kvp-browser-card h4 { font-size:.92rem; font-weight:700; color:var(--kv-text); margin:0 0 .875rem; }
.kvp-browser-steps   { counter-reset:step; list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:.5rem; }
.kvp-browser-steps li { display:flex; gap:.65rem; align-items:center; font-size:.85rem; color:var(--kv-text-muted); counter-increment:step; }
.kvp-browser-steps li::before {
    content:counter(step); width:1.5rem; height:1.5rem; border-radius:50%;
    background:var(--kv-primary-light); color:var(--kv-primary);
    font-size:.72rem; font-weight:700;
    display:flex; align-items:center; justify-content:center; flex-shrink:0;
}

/* ── RESPONSIVE ── */
@media (max-width:480px) {
    .kvp-hero         { padding:4rem 1.25rem 3.5rem; }
    .kvp-section      { padding:3.5rem 0; }
    .kvp-cta          { padding:2.75rem 1.5rem; }
    .kvp-info-block   { padding:1.5rem 1.25rem; }
    .kvp-stats-band   { grid-template-columns:repeat(2,1fr); }
    .kvp-faq-btn      { padding:1rem 1.125rem; font-size:.9rem; }
    .kvp-cta-btn-white,
    .kvp-cta-btn-ghost{ padding:.8rem 1.5rem; font-size:.87rem; }
}
</style>

