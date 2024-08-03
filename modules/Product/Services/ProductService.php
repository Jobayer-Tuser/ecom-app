<?php

namespace Modules\Product\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Modules\Product\Http\Requests\ProductRequest;
use Modules\Product\Models\Product;

class ProductService
{
    private string $storagePath;
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $this->storagePath = config('product.file_upload_dir', 'public/admin/product/');
    }

    public function getAllProducts() : Collection
    {
//        Product::with('category:id, name, category_id')->get();
        return Product::with(['category' => function($query) {
            $query->select('id', 'name');
        }])->orderByDesc('id')->get(['id', 'name', 'image', 'category_id']);
    }

    public function getProductNameAndId() : Collection
    {
        return Product::query()->get(['id', 'name']);
    }

    public function storeProduct(ProductRequest $request): bool
    {
        $fileName    = $this->storeFile($request->file('image'));
        $prepareData = $this->prepareData($request->validated(), $fileName);

        return Product::query()->insert($prepareData);
    }

    private function storeFile(UploadedFile $image): string
    {
        $fileName = "PRODUCT_" . date('his') . '.'. $image->clientExtension();

        if (!file_exists($this->storagePath .$fileName )){
            $image->storeAs($this->storagePath, $fileName);
        }
        return $fileName;
    }

    private function prepareData(array $requestData, string $fileName): array
    {
        return array_merge(
            $requestData,
            [
                'image'      => $fileName,
                'created_at' => date('Y-m-d H:i:s'),
            ],
        );
    }
}
