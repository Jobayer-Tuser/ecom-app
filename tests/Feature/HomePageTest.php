<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Product\Models\Product;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    use RefreshDatabase;
    public function test_home_page_exist(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_home_page_contains()
    {
        $response = $this->get('/');
        $response->assertSee('Fashion Trending');
    }

    public function test_home_page_view_contains_value()
    {
        $category = Category::query()->create([
            'name' => 'Men',
            'slug' => 'men',
            'status' => 1,
        ]);
        $product = Product::query()->create([
            'category_id'   => 1,
            'name'          => 'Colorful Pattern Shirts',
            'slug'          => 'colourful-pattern-shirts',
            'summary'       => 'summary',
            'description'   => 'description',
            'image'         => 'product-shirt.jpg',
        ]);
        $response = $this->get('/');
        $response->assertSee('Colorful Pattern Shirts');
        $response->assertViewHas('products', function ($collection) use ($product){
            return $collection->contain($product);
        });
    }
}
