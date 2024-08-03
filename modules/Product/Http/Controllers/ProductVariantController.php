<?php

namespace Modules\Product\Http\Controllers;

use Modules\JiraBoard\Http\Controllers\Controller;
use Modules\Product\Http\Requests\StoreProductVariantRequest;
use Modules\Product\Http\Requests\UpdateProductVariantRequest;
use Modules\Product\Models\ProductVariant;
use Modules\Product\Services\ProductService;
use Modules\Product\Services\ProductVariantService;

class ProductVariantController extends Controller
{
    public function __construct(private readonly ProductVariantService $productVariantService, private readonly ProductService $productService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productVariants = $this->productVariantService->getVariants();
        return view('product::product-variant.index', compact('productVariants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = $this->productService->getProductNameAndId();
        return view('product::product-variant.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductVariantRequest $request)
    {
        $request->validated();
        $this->productVariantService->storeVariants($request->validated());
        return redirect()->back()->with('status', 'Variant Created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductVariant $productVariant)
    {
        $products = $this->productService->getProductNameAndId();
        return view('product::product-variant.edit', compact('productVariant', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductVariantRequest $request, ProductVariant $productVariant)
    {
        $this->productVariantService->updateProductVariants($request->validated(), $productVariant);
        return redirect()->route('product-variant.index')->with('status', 'Variant updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductVariant $productVariant)
    {
        //
    }
}
