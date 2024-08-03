<?php

namespace App\Services;

use App\Http\Requests\CategoryRequest;
use Modules\JiraBoard\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
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

    public function storeCategory(array $storeData) : Builder|Model
    {
        return Category::query()->create($storeData);
    }

    public function updateCategory(array $dataToUpdate, Category $category) : bool
    {
        return $category->update($dataToUpdate);
    }
}
