<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use Sluggable;

    protected $fillable = ['name', 'slug'];

    protected string $sluggable = "name";

    public function users() : BelongsToMany
    {
        return $this->belongsToMany(related: User::class, table: 'role_user', foreignPivotKey: 'role_id', relatedPivotKey: 'user_id')
            ->withTimestamps();
    }

    public function permissions() : BelongsToMany
    {
        return $this->belongsToMany(related: Permission::class, table: 'permission_role');
    }

    public function hasPermission( $permission )
    {
        return $this->permissions->contains('name', $permission);
    }
}
