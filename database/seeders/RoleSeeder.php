<?php

namespace Database\Seeders;

use Modules\JiraBoard\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = ['Admin', 'User', 'Manager'];
        array_map(fn($role) => Role::query()->create(['name' => $role]) ,$role);
//        Role::factory()->create();
    }
}
