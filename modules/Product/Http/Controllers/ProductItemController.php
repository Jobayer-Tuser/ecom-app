<?php

namespace Modules\Product\Http\Controllers;

use Modules\JiraBoard\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Product\Http\Requests\ProductItemRequest;
use Modules\Product\Models\ProductItem;
use Modules\Product\Services\ProductItemService;
use Modules\Product\Services\ProductService;

class ProductItemController extends Controller
{
    public function __construct(private readonly ProductItemService $productItemService, private readonly ProductService $productService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productItems = $this->productItemService->getAllProductItems();
        return view('product::product-item.index', compact('productItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = $this->productService->getProductNameAndId();
        return view('product::product-item.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductItemRequest $request)
    {
        $request->validated();
        $this->productItemService->storeProductItem($request);
        return redirect()->back()->with('message', 'Product Item Added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductItem $productItem)
    {
        $products = $this->productService->getProductNameAndId();
        return view('product::product-item.edit', compact('products', 'productItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
