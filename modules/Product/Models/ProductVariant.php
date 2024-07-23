<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'colour',
        'size',
        'price',
        'stock_quantity'
    ];

    public function product() : BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
