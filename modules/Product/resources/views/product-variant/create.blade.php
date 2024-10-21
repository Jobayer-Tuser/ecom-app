<x-app-layout>
    @push('css')
        <link href="{{ asset('assets/plugins/tag-it/css/jquery.tagit.css')}}" rel="stylesheet" />
        <link href="{{ asset('assets/plugins/summernote/dist/summernote-lite.css')}}" rel="stylesheet" />
    @endpush
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div id="formGrid" class="mb-5">
                    <h5 class="mb-2">Add Product Variant</h5>
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ route('product-variant.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-n3">
                                    <x-form class="col-xl-6" :title="'Select Product'">
                                        <x-input-select name="product_id" :type="'Product'" >
                                            @foreach($products as $product)
                                                <option {{ old('product_id') == $product->id ? 'selected' : '' }} value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </x-input-select>
                                    </x-form>

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
                                <div class="row mb-2">
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
