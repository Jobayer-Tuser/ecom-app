<?php

namespace App\Models;

use App\Casts\GenerateSlug;
use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Product\Models\Product;

class Category extends Model
{
    use HasFactory, Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'status',
        'parent_category_id',
    ];

    protected array $filterable = [
        'name',
    ];

    public function products() : HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function parentCategory() : BelongsTo
    {
        return $this->belongsTo(__CLASS__, 'parent_category_id', 'id');
    }

    public function childCategories(): HasMany
    {
        return $this->hasMany(__CLASS__, 'parent_category_id', 'id');
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'slug' => GenerateSlug::class,
        ];
    }
}
