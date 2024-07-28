<?php

namespace Modules\Product\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Product\Models\Product;
use Modules\Product\Models\ProductItem;

/**
 * @extends Factory<ProductItem>
 */
class ProductItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id'        => Product::query()->inRandomOrder()->first()->id,
            'sku'               => strtoupper(fake()->unique()->bothify('SKU-??#####')),
            'product_quantity'  => 10,
            'product_images'    => '',
            'price'             => fake()->numberBetween(1, 500),
            'sale_price'        => fake()->numberBetween(1, 500),
        ];
    }
}
