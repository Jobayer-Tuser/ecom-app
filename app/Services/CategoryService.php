<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CategoryService
{
    public function categories(): Collection
    {
        return $this->category()->with('parentCategory')->get();
    }

    public function category(): Builder
    {
        return Category::query()
            ->orderByDesc('id')
            ->select('id', 'name', 'parent_category_id', 'status');
    }

    public function categoriesForHomepage(): Collection
    {
        return $this->category()
            ->with('childCategories.childCategories')
            ->whereNull('parent_category_id')
            ->get();
    }

    public function categoriesForProductDetailsPage(): Collection
    {
        return $this->category()
            ->whereNull('parent_category_id')
            ->limit(8)
            ->get();
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
