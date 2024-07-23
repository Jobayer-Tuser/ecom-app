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
    public function __construct(private readonly CategoryService $service){}
    public function index() : Application|Factory|View
    {
        $categories = $this->service->categories();
        return view('admin.category.index', compact('categories'));
    }

    public function store(CategoryRequest $request) : RedirectResponse
    {
        $storeData = $this->service->storeAndUpdateCategory($request);
        Category::query()->create($storeData);
        return redirect()->back();
    }

    public function edit(Category $category): Application|Factory|View
    {
        $categories = $this->service->categories();
        return view('admin.category.edit', compact('category', 'categories'));
    }

    public function update(CategoryRequest $request, Category $category) : RedirectResponse
    {
        $updateData = $this->service->storeAndUpdateCategory($request);

        if ($category->update($updateData)){
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
