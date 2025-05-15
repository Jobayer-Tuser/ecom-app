<?php

namespace App\Services;

use App\Models\Tag;
use Illuminate\Support\Str;

class TagService
{
    public function store(array $tags, int $productId): void
    {
        foreach (explode(',', $tags['product_tag']) as $tag) {
            Tag::query()->create([
                'product_id' => $productId,
                'name' => $tag,
                'slug' => Str::slug($tag),
            ]);
        }
    }
}
