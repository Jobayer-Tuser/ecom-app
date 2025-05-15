<?php

namespace Modules\Product\Services;

use App\Services\TagService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Modules\Product\Http\Requests\ProductRequest;
use Modules\Product\Models\Product;
use Modules\Product\Models\ProductItem;
use Nette\Utils\Image;
use function Clue\StreamFilter\fun;

readonly class ProductService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private ProductItemService    $productItemService,
        private ProductVariantService $productVariantService,
        private TagService $tagService
    ){}

    public function getAllProducts() : LengthAwarePaginator
    {
        return Product::with([
                'productItems:id,price,sale_price,product_id',
                'category:id'
            ])->select(['id', 'name', 'category_id', 'slug'])
            ->orderByDesc('id')
            ->paginate(20);
    }

    public function getProductBySlugName(string $slug)
    {
        return Product::with([
            'category:id,name',
            'productItems',
            'productVariants'
        ])->where('slug', $slug)->first();
    }

    public function getProductNameAndId() : Collection
    {
        return Product::query()->get(['id', 'name']);
    }

    public function storeProduct(ProductRequest $request): void
    {
        DB::transaction(function () use ($request) {
            $product = Product::query()->create([
                'name'        => $request['name'],
                'slug'        => $request['slug'],
                'summary'     => $request['summary'],
                'category_id' => $request['category_id'],
                'description' => $request['description'],
            ]);

            $this->tagService->store($request->only('product_tag'), $product->id);
            $this->productItemService->storeProductItems($request->only('sku', 'product_quantity', 'price', 'sale_price'), $product->id);
            $this->productVariantService->storeProductVariants($request->only('variant'), $product->id);
        });
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
}
