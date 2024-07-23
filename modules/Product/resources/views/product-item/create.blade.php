<x-app-layout>
    @push('css')
        <link href="{{ asset('assets/plugins/tag-it/css/jquery.tagit.css')}}" rel="stylesheet" />
        <link href="{{ asset('assets/plugins/summernote/dist/summernote-lite.css')}}" rel="stylesheet" />
    @endpush
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div id="formGrid" class="mb-5">
                    <h5>Add Product Items</h5>
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ route('product-item.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-n3">
                                    <x-form class="col-xl-6" :title="'Select Product'">
                                        <x-input-select name="product_id" :type="'Product'" >
                                            @foreach($products as $product)
                                                <option {{ old('product_id') == $product->id ? 'selected' : '' }} value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </x-input-select>
                                    </x-form>

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
                                <div class="row mt-2">
                                    <div class="float-right col-xl-12">
                                        <button type="submit" class="btn btn-success">Create</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script src="{{ asset('assets/plugins/jquery-migrate/dist/jquery-migrate.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/tag-it/js/tag-it.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/summernote/dist/summernote-lite.min.js')}}" type="text/javascript"></script>
    @endpush
</x-app-layout>
