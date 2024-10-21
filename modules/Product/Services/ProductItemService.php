<?php

namespace Modules\Product\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Modules\Product\Http\Requests\ProductItemRequest;
use Modules\Product\Http\Requests\ProductRequest;
use Modules\Product\Models\Product;
use Modules\Product\Models\ProductItem;

class ProductItemService
{
    public function getAllProductItems() : Collection
    {
        return ProductItem::query()
            ->with(['product' => function ($query) {
                $query->select('id', 'name');
            }])
            ->orderByDesc('id')
            ->get()
            ->except(['created_at', 'updated_at', 'deleted_at']);
    }

    public function storeProductItem(ProductItemRequest $request)
    {
        $fileName    = $this->storeFile($request->file('product_images'));
        $prepareData = $this->prepareData($request->validated(), $fileName);

        return ProductItem::query()->create($prepareData);
    }

    private function storeFile(UploadedFile $image): string
    {
        $fileName = "PRODUCT_ITEM_" . date('his') . '.'. $image->clientExtension();

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
                'sku'             => Str::upper('SKU-'. Str::random(10)),
                'product_images'  => $fileName,
            ],
        );
    }
}
