<?php

namespace App\Services;

use App\Repositories\SolarSystemRepository;
use Illuminate\Support\Facades\Cache;

class SolarSystemService
{
    public function __construct(
        protected SolarSystemRepository $repository
    ) {}

    /*
    |----------------------------------------------------------------------
    | Método principal
    |----------------------------------------------------------------------
    */
    public function getSolarSystemData(): array
    {
        $useCache = config('solar-system.use_cache', false);

        if ($useCache) {
            return Cache::remember('solar_system.home', now()->addMinutes(10), function () {
                return $this->buildSolarSystem();
            });
        }

        return $this->buildSolarSystem();
    }

    /*
    |----------------------------------------------------------------------
    | Construcción del sistema solar
    |----------------------------------------------------------------------
    */
    private function buildSolarSystem(): array
    {
        $orbits  = config('solar-system.orbits');
        $usedIds = [];

        $raw = [
            'orbit_1' => $this->repository->getFeaturedProducts($orbits['orbit_1']['max'] * 2),
            'orbit_2' => $this->repository->getTopRatedProducts($orbits['orbit_2']['max'] * 2),
            'orbit_3' => $this->repository->getDiscountedProducts($orbits['orbit_3']['max'] * 2),
            'orbit_4' => $this->repository->getNewProducts($orbits['orbit_4']['max'] * 2),
        ];

        $fallbackPool = $raw['orbit_3']->merge($raw['orbit_4']);

        $solarSystem = [];

        foreach ($orbits as $orbitKey => $orbitConfig) {
            $products = $raw[$orbitKey];

            // Deduplicación
            $deduplicated = $products
                ->filter(fn($p) => ! in_array($p->id, $usedIds))
                ->take($orbitConfig['max']);

            // Fallback
            if ($deduplicated->count() < $orbitConfig['max']) {
                $needed   = $orbitConfig['max'] - $deduplicated->count();
                $existing = $deduplicated->pluck('id')->toArray();

                $fallback = $fallbackPool
                    ->filter(
                        fn($p) =>
                        ! in_array($p->id, $usedIds) &&
                            ! in_array($p->id, $existing)
                    )
                    ->take($needed);

                $deduplicated = $deduplicated->merge($fallback);
            }

            // Registrar usados
            $deduplicated->each(fn($p) => $usedIds[] = $p->id);

            // Transformar
            $solarSystem[$orbitKey] = $deduplicated
                ->map(fn($p) => $this->transform($p, $orbitKey, $orbitConfig))
                ->values()
                ->toArray();
        }

        return $solarSystem;
    }

    /*
    |----------------------------------------------------------------------
    | Transformación correcta con Bagisto
    |----------------------------------------------------------------------
    */
    private function transform($product, string $orbitKey, array $orbitConfig): array
    {
        return [
            'id'   => $product->id,
            'name' => $product->name,
            'slug' => $product->url_key,

            'price_html' => $product->getTypeInstance()->getPriceHtml(),

            'avg_rating' => app(\Webkul\Product\Helpers\Review::class)
                ->getAverageRating($product),

            'reviews_count' => app(\Webkul\Product\Helpers\Review::class)
                ->getTotalReviews($product),

            'image_url' => (function () use ($product) {
                $baseImage = product_image()->getProductBaseImage($product);

                // Preferir large_image_url (cache), si falla usar original_image_url
                return $baseImage['large_image_url']
                    ?? $baseImage['original_image_url']
                    ?? asset('vendor/webkul/ui/assets/images/product/large-product-placeholder.png');
            })(),

            'is_in_stock' => $product->isSaleable(),

            'orbit_key'   => $orbitKey,
            'orbit_color' => $orbitConfig['color'],
            'orbit_label' => $orbitConfig['label'],
        ];
    }
}
