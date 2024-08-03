<?php

namespace Database\Factories;

use Modules\JiraBoard\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->word();
        return [
//            'parent_category_id' => Category::inRandomOrder()->first()->id ?? Category::factory()->create()->id,
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
