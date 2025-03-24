<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = ['view', 'create', 'update', 'delete'];
        foreach ($permissions as $permission) {
            Permission::query()->create(['name' => $permission, 'slug' => Str::slug($permission)]);
        }
    }
}
