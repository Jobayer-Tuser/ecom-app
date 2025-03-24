<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = [
            'User',
            'Admin',
            'Manager',
            'Customer'
        ];

        array_map( fn($role) => Role::query()->create([
            'name' => $role,
            'slug' => Str::slug($role),
        ]), $role);
    }
}
