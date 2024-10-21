<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Product\Database\seeders\ProductItemSeeder;
use Modules\Product\Database\seeders\ProductSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
//            ProductSeeder::class,
//            ProductItemSeeder::class,
            RoleSeeder::class,
        ]);

        # Seeding for HasMany Relation
        /*Customer::factory(100)
                ->has(Order::factory(3)
                    ->has(Product::factory(3)
                        ->has(Ingredient::factory(4))))
            ->create();*/
    }
}
