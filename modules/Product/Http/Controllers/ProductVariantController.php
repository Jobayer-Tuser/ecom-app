<?php

namespace Modules\Product\Http\Controllers;

use App\Http\Controllers\Controller;
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
        return view('product::product-variant.creat', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductVariantRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductVariant $productVariant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductVariant $productVariant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductVariantRequest $request, ProductVariant $productVariant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductVariant $productVariant)
    {
        //
    }
}
