<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Modules\Product\Services\ProductService;
use App\Http\Controllers\Misc\JsonController;

class HomepageController extends Controller
{
    public function index(ProductService $productService) : View
    {
        $products = $productService->getAllProducts();

        return view('front.home', compact('products'));
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
