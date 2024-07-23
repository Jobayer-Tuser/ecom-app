<?php

namespace Modules\Product\Database\seeders;

use Illuminate\Database\Seeder;
use Modules\Product\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory(40)->create();
    }
}
