@props([
    'name'   => '',
    'entity' => null,
])

@push('styles')
<style>
    .kv-breadcrumb {
        display: flex;
        align-items: center;
        gap: 0;
        flex-wrap: wrap;
    }

    /* Cada ítem generado por Breadcrumbs::view hereda estos estilos */
    .kv-breadcrumb a {
        font-size: 0.72rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: rgba(99,102,241,0.55);
        text-decoration: none;
        transition: color 0.2s;
        white-space: nowrap;
    }
    .kv-breadcrumb a:hover {
        color: #6366f1;
    }

    /* Separador entre ítems */
    .kv-breadcrumb li + li::before {
        content: '/';
        margin: 0 0.4rem;
        font-size: 0.68rem;
        font-weight: 700;
        color: rgba(226,232,240,0.9);
    }

    /* Último ítem (página actual) */
    .kv-breadcrumb li:last-child a,
    .kv-breadcrumb li:last-child span {
        background: linear-gradient(135deg, #6366f1, #22d3ee);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        pointer-events: none;
        cursor: default;
    }

    .kv-breadcrumb li {
        list-style: none;
        display: flex;
        align-items: center;
    }

    .kv-breadcrumb ul {
        display: flex;
        align-items: center;
        gap: 0;
        margin: 0;
        padding: 0;
        list-style: none;
    }
</style>
@endpush

<div class="mt-[34px] flex justify-start max-lg:hidden">
    <div
        class="kv-breadcrumb"
        style="
            background: rgba(255,255,255,0.92);
            border: 1.5px solid rgba(226,232,240,0.55);
            border-radius: 0.65rem;
            box-shadow: 0 2px 8px -2px rgba(99,102,241,0.08);
            padding: 0.45rem 1rem;
            display: inline-flex;
            align-items: center;
        "
    >
        {{ Breadcrumbs::view('shop::partials.breadcrumbs', $name, $entity) }}
    </div>
</div>
