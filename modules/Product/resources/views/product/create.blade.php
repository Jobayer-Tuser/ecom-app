<x-app-layout>
    @push('css')
        <link href="{{ asset('assets/plugins/summernote/dist/summernote-lite.css')}}" rel="stylesheet" />
    @endpush
        <div class="row gx-4">
            <div class="col-xl-8 col-md-6">
                    <div class="card mb-4">
                        <div class="card-header bg-none fw-bold d-flex align-items-center">
                            <div class="flex-1">
                                <div>Product Information</div>
                            </div>
                            <div><a href="#" class="text-decoration-none fw-normal link-secondary">Manage</a></div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-n3">
                                    <x-form class="col-xl-6" :title="'Product Name'">
                                        <x-input-text name="name" type="text" placeholder="Ex. Macbook Air M1" value="{{ old('name') }}" />
                                    </x-form>

                                    <x-form class="col-xl-6" :title="'Select Category'">
                                        <x-input-select name="category_id" :type="'Category'" >
                                            @foreach($categories as $eachCategory)
                                                <option {{ old('category_id') == $eachCategory->id ? 'selected' : '' }} value="{{ $eachCategory->id }}">{{ $eachCategory->name }}</option>
                                            @endforeach
                                        </x-input-select>
                                    </x-form>

                                    <x-form class="col-xl-12"  :title="'Product Summary'">
                                        <x-input-textarea name="summary" placeholder="Ex. Product Summary" >{{ old('summary') }}</x-input-textarea>
                                    </x-form>

                                    <x-form class="col-xl-12"  :title="'Product Description'">
                                        <x-input-textarea name="description" placeholder="Ex. Product Description" >{{ old('description') }}</x-input-textarea>
                                    </x-form>

                                    <x-form class="col-xl-12"  :title="'Product Image'">
                                        <x-input-text id="fileupload" type="file" name="image" multiple />
                                    </x-form>
                                </div>
                                <div class="row mt-2">
                                    <div class="float-right col-xl-12">
                                        <button type="submit" class="btn btn-success">Create</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-4">
                    <div class="card-header bg-none fw-bold d-flex align-items-center">
                        <div class="flex-1">
                            <div>Product Items</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-n3">
                            <x-form class="col-xl-6" :title="'Stock Quantity'">
                                <x-input-text name="product_quantity" type="number" value="{{ old('product_quantity') }}" />
                            </x-form>

                            <x-form class="col-xl-6"  :title="'Price'">
                                <x-input-text name="price" type="text" value="{{ old('price') }}"/>
                            </x-form>

                            <x-form class="col-xl-6"  :title="'Sale Price'">
                                <x-input-text name="sale_price" type="text" value="{{ old('sale_price') }}"/>
                            </x-form>

                            <x-form class="col-xl-12"  :title="'Product Image'">
                                <x-input-text name="product_images" type="file" value="{{ old('product_images') }}" />
                            </x-form>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header bg-none fw-bold d-flex align-items-center">
                        <div class="flex-1">
                            <div>Product Variants</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <x-form class="col-xl-6"  :title="'Colour'">
                                <x-input-text name="colour" type="text" value="{{ old('colour') }}"/>
                            </x-form>

                            <x-form class="col-xl-6"  :title="'Size'">
                                <x-input-text name="size" type="text" value="{{ old('size') }}"/>
                            </x-form>

                            <x-form class="col-xl-6"  :title="'Price'">
                                <x-input-text name="price" type="text" value="{{ old('price') }}"/>
                            </x-form>

                            <x-form class="col-xl-6" :title="'Stock Quantity'">
                                <x-input-text name="stock_quantity" type="number" value="{{ old('stock_quantity') }}" />
                            </x-form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    @push('script')
        <script src="{{ asset('assets/plugins/tag-it/js/tag-it.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/summernote/dist/summernote-lite.min.js')}}" type="text/javascript"></script>
        <script>
            $('.summernote').summernote({
                height: 200
            });
        </script>
    @endpush
</x-app-layout>
