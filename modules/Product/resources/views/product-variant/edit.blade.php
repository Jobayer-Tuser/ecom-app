<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div id="formGrid" class="mb-5">
                    <h5 class="mb-2">Edit Product Variant</h5>
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ route('product-variant.update', $productVariant->product_id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="row mb-n3">
                                    <x-form class="col-xl-6" :title="'Select Product'">
                                        <x-input-select name="product_id" :type="'Product'" >
                                            @foreach($products as $product)
                                                <option {{ old('product_id', $productVariant->product_id) == $product->id ? 'selected' : '' }} value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </x-input-select>
                                    </x-form>

                                    <x-form class="col-xl-6"  :title="'Colour'">
                                        <x-input-text name="colour" type="text" value="{{ old('colour', $productVariant->colour) }}"/>
                                    </x-form>

                                    <x-form class="col-xl-6"  :title="'Size'">
                                        <x-input-text name="size" type="text" value="{{ old('size', $productVariant->size) }}"/>
                                    </x-form>

                                    <x-form class="col-xl-6"  :title="'Price'">
                                        <x-input-text name="price" type="text" value="{{ old('price', $productVariant->price) }}"/>
                                    </x-form>

                                    <x-form class="col-xl-6" :title="'Stock Quantity'">
                                        <x-input-text name="stock_quantity" type="number" value="{{ old('stock_quantity', $productVariant->stock_quantity) }}" />
                                    </x-form>

                                </div>
                                <div class="row mt-2">
                                    <div class="float-right col-xl-12">
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
