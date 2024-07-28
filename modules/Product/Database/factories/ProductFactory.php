<?php

namespace Modules\Product\Database\factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Modules\Product\Models\Product;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->words(nb: 4, asText: true);
        return [
            'name'          => $name,
            'category_id'   => Category::query()->inRandomOrder()->first()->id, // or Category::factory()->create()->id
            'slug'          => Str::slug($name),
            'summary'       => fake()->text(),
            'description'   => fake()->paragraphs(asText: true),
            'image'         => fake()->imageUrl(category: 't-shirt'),
        ];
    }
}
