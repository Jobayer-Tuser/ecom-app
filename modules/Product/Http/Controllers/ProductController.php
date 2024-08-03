<?php

namespace Modules\Product\Http\Controllers;

use Modules\JiraBoard\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Modules\Product\Http\Requests\ProductRequest;
use Modules\Product\Models\Product;
use Modules\Product\Services\ProductService;

class ProductController extends Controller
{
    public function __construct(private readonly ProductService $productService, private readonly CategoryService $categoryService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index() : Application|View
    {
        $products = $this->productService->getAllProducts();
        return view('product::product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : Application|View
    {
        $categories = $this->categoryService->categories();
        return view('product::product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request) : RedirectResponse
    {
        $request->validated();
        $this->productService->storeProduct($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): Application|View|Factory
    {
        $categories = $this->categoryService->categories();
        return view('product::product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
