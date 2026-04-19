<?php

namespace App\Repositories;

use Webkul\Product\Repositories\ProductRepository;

class SolarSystemRepository
{
    protected ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /*
    |--------------------------------------------------------------------------
    | Órbita 1 — Destacados
    |--------------------------------------------------------------------------
    */
public function getFeaturedProducts(int $limit)
{
    return $this->productRepository
        ->scopeQuery(function ($query) {
            return $query
                ->join('product_flat as pf', 'pf.product_id', '=', 'products.id')
                ->where('pf.status', 1)
                ->where('pf.visible_individually', 1)
                ->select('products.*');
        })
        ->get()
        ->take($limit);
}

    /*
    |--------------------------------------------------------------------------
    | Órbita 2 — Mejor calificados
    |--------------------------------------------------------------------------
    */
public function getTopRatedProducts(int $limit)
{
    return $this->productRepository
        ->scopeQuery(function ($query) {
            return $query
                ->join('product_flat as pf', 'pf.product_id', '=', 'products.id')
                ->where('pf.status', 1)
                ->where('pf.visible_individually', 1)
                ->select('products.*');
        })
        ->get()
        ->sortByDesc(fn ($p) => $p->avg_rating ?? 0)
        ->take($limit);
}
    /*
    |--------------------------------------------------------------------------
    | Órbita 3 — Ofertas
    |--------------------------------------------------------------------------
    */
   public function getDiscountedProducts(int $limit)
{
    return $this->productRepository->scopeQuery(function ($query) {
        return $query
            ->join('product_flat as pf', 'pf.product_id', '=', 'products.id')
            ->where('pf.status', 1)
            ->where('pf.visible_individually', 1)
            ->select('products.*');
    })
    ->get()
    ->filter(fn ($product) => $product->getTypeInstance()->haveDiscount())
    ->take($limit);
}

    /*
    |--------------------------------------------------------------------------
    | Órbita 4 — Nuevos
    |--------------------------------------------------------------------------
    */
public function getNewProducts(int $limit)
{
    return $this->productRepository
        ->scopeQuery(function ($query) {
            return $query
                ->join('product_flat as pf', 'pf.product_id', '=', 'products.id')
                ->where('pf.status', 1)
                ->where('pf.visible_individually', 1)
                ->select('products.*')
                ->orderBy('products.created_at', 'desc');
        })
        ->get()
        ->take($limit);
}
}
