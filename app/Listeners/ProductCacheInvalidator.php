<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Cache;

class ProductCacheInvalidator
{
    const CACHE_KEY = 'solar_system.home';

    public function handle(mixed $event): void
    {
        // Limpia cache específica del sistema solar
        Cache::forget(self::CACHE_KEY);

        // Opcional: si usas tags
        if (method_exists(Cache::getStore(), 'tags')) {
            Cache::tags(['products', 'solar'])->flush();
        }
    }
}