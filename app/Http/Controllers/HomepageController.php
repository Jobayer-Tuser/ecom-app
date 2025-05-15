<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;
use Illuminate\Contracts\View\View;
use Modules\Product\Models\Product;
use Modules\Product\Services\ProductService;
use App\Http\Controllers\Misc\JsonController;

class HomepageController extends Controller
{
    public function index(ProductService $productService, CategoryService $categoryService): View
    {
        $products = $productService->getAllProducts();
        $categories = $categoryService->categoriesForHomepage();

        return view('frontend.home', compact('products', 'categories'));
    }

    public function productDetails(Product $product, CategoryService $categoryService, ProductService $productService)//: View
    {
       $product = $productService->getProductBySlugName(slug: $product->slug);
       $categories = $categoryService->categoriesForHomepage();
       $relatedCategories = $categoryService->categoriesForProductDetailsPage();

       return view('product::product.frontend.product-details', compact('product', 'categories', 'relatedCategories'));
    }
    public function checkJson(): JsonController
    {
        return self::convertJson(name: "Jobayer", email: "email", phone: "01770301202");
    }

    private static function convertJson(mixed ...$args) : JsonController
    {
        return new JsonController($args);
    }
}
