<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = ['Admin', 'Vendor', 'User'];
        array_map(
            fn($role) => Role::query()->create(['name' => $role])
        ,$role);
    }
}
