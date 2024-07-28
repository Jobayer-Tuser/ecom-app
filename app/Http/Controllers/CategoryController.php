<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\Factory;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function __construct(private readonly CategoryService $categoryService){}

    public function index() : Application|Factory|View
    {
        $categories = $this->categoryService->categories();
        return view('admin.category.index', compact('categories'));
    }

    public function store(CategoryRequest $request) : RedirectResponse
    {
        $request->validated();
        $this->categoryService->storeCategory(storeData: $request->validationData());
        return redirect()->back();
    }

    public function edit(Category $category): Application|Factory|View
    {
        $categories = $this->categoryService->categories();
        return view('admin.category.edit', compact('category', 'categories'));
    }

    public function update(CategoryRequest $request, Category $category) : RedirectResponse
    {
        $request->validated();
        $updateData = $this->categoryService->updateCategory(dataToUpdate: $request->validationData(), category: $category );
        if ($updateData){
            return redirect(route('category.index'));
        }

        return redirect()->back()->with('message', 'Can not update category');
    }

    public function destroy(Category $category) : RedirectResponse
    {
        $category->delete();
        return redirect()->back();
    }
}
