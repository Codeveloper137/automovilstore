<?php

/**
 * ─────────────────────────────────────────────────────────────
 * INSTRUCCIÓN DE INTEGRACIÓN — EventServiceProvider
 * ─────────────────────────────────────────────────────────────
 *
 * NO reemplaces tu EventServiceProvider completo.
 * Solo añade las entradas marcadas con ← AÑADIR al array $listen
 * dentro de tu app/Providers/EventServiceProvider.php existente.
 *
 * Si tu proyecto NO tiene EventServiceProvider, crea el archivo
 * completo que aparece debajo de la línea de instrucción.
 * ─────────────────────────────────────────────────────────────
 */

// ═══════════════════════════════════════════════════════════════
// OPCIÓN A — Solo añade estas líneas a tu $listen existente:
// ═══════════════════════════════════════════════════════════════

/*
protected $listen = [

    // ... tus listeners existentes ...

    // ← AÑADIR: Invalidación de caché del sistema solar
    'catalog.product.create.after' => [
        \App\Listeners\ProductCacheInvalidator::class,
    ],
    'catalog.product.update.after' => [
        \App\Listeners\ProductCacheInvalidator::class,
    ],
    'catalog.product.delete.before' => [
        \App\Listeners\ProductCacheInvalidator::class,
    ],
];
*/


// ═══════════════════════════════════════════════════════════════
// OPCIÓN B — Archivo completo si no tienes EventServiceProvider:
// ═══════════════════════════════════════════════════════════════

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Mapa de eventos → listeners.
     *
     * Los eventos 'catalog.product.*' son string-events disparados
     * por Bagisto con Event::dispatch() — NO requieren tocar el core.
     */
    protected $listen = [

        // Producto creado desde el panel admin
        'catalog.product.create.after' => [
            \App\Listeners\ProductCacheInvalidator::class,
        ],

        // Producto actualizado (precio, stock, nombre, featured, etc.)
        'catalog.product.update.after' => [
            \App\Listeners\ProductCacheInvalidator::class,
        ],

        // Producto eliminado
        'catalog.product.delete.before' => [
            \App\Listeners\ProductCacheInvalidator::class,
        ],
    ];

    /**
     * Registrar eventos y listeners.
     */
    public function boot(): void
    {
        parent::boot();
    }
}
