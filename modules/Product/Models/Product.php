<?php

namespace Modules\Product\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Product\Database\factories\ProductFactory;
use Modules\Product\Events\ProductCreatedEvent;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'summary',
        'description',
        'image',
        'category_id'
    ];

    protected $dispatchesEvents = [
      'created' => ProductCreatedEvent::class,
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class); //->select(['id', 'name',]);
    }

    public function productItems() : HasMany
    {
        return $this->hasMany(ProductItem::class);
    }

    public function productVariants() : HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }

    protected static function newFactory(): ProductFactory|Factory
    {
        return ProductFactory::new();
    }
}
