<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Solar System Orbit Configuration — KillaVibes
    |--------------------------------------------------------------------------
    |
    | Cada órbita define:
    |   - max:   Número máximo de productos a mostrar en esta órbita
    |   - color: Color neón asignado (glassmorphism, bordes, sombras)
    |   - label: Etiqueta visible en el status badge de la cápsula
    |
    */

    'orbits' => [

        'orbit_1' => [
            'max'   => 2,
            'color' => '#A855F7',
            'label' => 'Destacado',
        ],

        'orbit_2' => [
            'max'   => 3,
            'color' => '#3B82F6',
            'label' => 'Top Rated',
        ],

        'orbit_3' => [
            'max'   => 4,
            'color' => '#F97316',
            'label' => 'Oferta',
        ],

        'orbit_4' => [
            'max'   => 3,
            'color' => '#22C55E',
            'label' => 'Nuevo',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Review Thresholds — Órbita 2
    |--------------------------------------------------------------------------
    |
    | Umbrales mínimos para que un producto califique como "Top Rated".
    | Ajustar según volumen real de reviews de la tienda.
    |
    */

    'reviews' => [
        'min_count'  => 2,
        'min_rating' => 4.0,
    ],

];
