<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function users() : BelongsToMany
    {
        return self::belongsToMany(related: User::class, table: 'role_user', foreignPivotKey: 'role_id', relatedPivotKey: 'user_id')
            ->withTimestamps();
    }

    public function permissions() : BelongsToMany
    {
        return self::belongsToMany(related: Permission::class, table: 'permission_role');
    }

    public function hasPermission( $permission )
    {
        return $this->permissions->contains('name', $permission);
    }
}
