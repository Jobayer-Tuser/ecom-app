<?php

namespace App\Services;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class CategoryService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
    }

    public function categories() : Collection
    {
        return Category::with('parentCategory')->orderByDesc('id')->get(['id', 'name', 'parent_category_id', 'status']);
    }

    public function storeAndUpdateCategory(CategoryRequest $request) : array
    {
        return array_merge_recursive(
            $request->validated(),
            ['slug' => Str::slug($request->input('name'))]
        );
    }
}
