<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'name',
        'slug',
    ];

    protected string $sluggable = "name";

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(related: Role::class, table: 'permission_role');
    }
}
