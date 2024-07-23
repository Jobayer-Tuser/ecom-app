<?php

namespace Modules\Product\Database\seeders;

use Illuminate\Database\Seeder;
use Modules\Product\Models\ProductItem;

class ProductItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductItem::factory(40)->create();
    }
}
