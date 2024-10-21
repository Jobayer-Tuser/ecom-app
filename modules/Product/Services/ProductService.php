<?php

namespace Modules\Product\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Modules\Product\Http\Requests\ProductRequest;
use Modules\Product\Models\Product;
use Nette\Utils\Image;

class ProductService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
    }

    public function getAllProducts() : LengthAwarePaginator
    {
//        Product::with('category:id, name, category_id')->get();
        return Product::query()->select(['id', 'name', 'image', 'category_id'])
            ->with(['category' => function($query) {
                $query->select('id', 'name');
            }])
            ->orderByDesc('id')
            ->paginate(20);
    }

    public function getProductNameAndId() : Collection
    {
        return Product::query()->get(['id', 'name']);
    }

    public function storeProduct(ProductRequest $request): bool
    {
        $fileName    = $this->storeProductImage($request->file('image'));
        $prepareData = $this->prepareData($request->except('_token'), $fileName);
        return Product::query()->insert($prepareData);
    }

    private function storeProductImage(UploadedFile $image): string
    {
        $prepareImageName = "PRODUCT_" . date('his') . '.'. $image->clientExtension();

        if ( !file_exists(public_path('storage/products') . $prepareImageName ) ){
            $image->storeAs(public_path('storage/products'), $prepareImageName);
        }

        return $prepareImageName;
    }

    private function resizeImage(UploadedFile $image)
    {

    }

    private function prepareData(array $requestData, string $fileName): array
    {
        return array_merge( $requestData,
            [
                'image'      => $fileName,
                'created_at' => date('Y-m-d H:i:s'),
            ],
        );
    }
}
