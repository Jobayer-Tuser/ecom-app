<x-app-layout>
    <x-slot:title>Create Product</x-slot>
    @push('css')
        <link href="{{ asset('assets/plugins/summernote/dist/summernote-lite.css')}}" rel="stylesheet" />
        <link href="{{ asset('assets/plugins/tag-it/css/jquery.tagit.css')}}" rel="stylesheet">
    @endpush
    <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row gx-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-xl-8 col-md-6">
                <div class="card mb-4">
                    <div class="card-header bg-none fw-bold d-flex align-items-center">
                        <div class="flex-1">
                            <div>Product Information</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-n3">
                            <x-form class="col-xl-6" :title="'Product Name'">
                                <x-text-input id="product-name-input" name="name" type="text" placeholder="Ex. Macbook Air M1" value="{{ old('name') }}" />
                            </x-form>

                            <x-form class="col-xl-6" :title="'Select Category'">
                                <x-input-select name="category_id" :type="'Category'" id="product-category" >
                                    @foreach($categories as $eachCategory)
                                        <option @selected(old('category_id') == $eachCategory->id) data-category="{{ $eachCategory->name }}" value="{{ $eachCategory->id }}">{{ $eachCategory->name }}</option>
                                    @endforeach
                                </x-input-select>
                            </x-form>

                            <x-form class="col-xl-4" :title="'SKU'">
                                <x-text-input name="sku" type="text" placeholder="#SKU00001" value="{{ old('sku') }}" />
                            </x-form>

                            <x-form class="col-xl-4" :title="'Product Quantity'">
                                <x-text-input name="product_quantity" type="number" placeholder="1" value="{{ old('product_quantity') }}" />
                            </x-form>

                            <x-form class="col-xl-4" :title="'Tags'">
                                <x-text-input class="tagit form-control" name="product_tag" type="text" placeholder="#tag1, #tag2" value="{{ old('product_tag') }}" />
                            </x-form>

                            <x-form class="col-xl-4" :title="'Price'">
                                <x-text-input id="product-price" name="price" type="text" placeholder="99.50" value="{{ old('price') }}" />
                            </x-form>

                            <x-form class="col-xl-4" :title="'Sale price'">
                                <x-text-input id="product-sale-price" name="sale_price" type="text" placeholder="50.04" value="{{ old('sale_price') }}" />
                            </x-form>
                            <x-form class="col-xl-4" :title="'Vendor'">
                                <x-text-input id="product-vendor" name="vendor" type="text" placeholder="e.g : Apple" value="{{ old('vendor') }}" />
                            </x-form>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header bg-none fw-bold d-flex align-items-center">
                        <div class="flex-1">
                            <div>Product Image</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <x-form class="col-xl-12"  :title="'Product Image'">
                            <input class="form-control" id="file-upload" type="file" name="image[]" multiple />
                        </x-form>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header bg-none fw-bold d-flex align-items-center">
                        <div class="flex-1">
                            <div>Product Variants</div>
                        </div>
                    </div>
                    <div class="card-body product-variant-form">
                        <div class="alert alert-success py-2">
                            Add variants if this product comes in multiple versions, like different sizes or colors.
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">Option name</div>
                            <div class="col-8">Option values</div>
                        </div>
                        <div class="row mb-3 gx-3">
                            <div class="col-5">
                                <x-text-input name="variant[0][name]" placeholder="e.g Size" value="{{ old('variant[0][name]') }}" />
                            </div>
                            <div class="col-5">
                                <input type="text" name="variant[0][value]" class="tagit form-control" value="{{ old('value', "S,M,XL,XXL") }}L" />
                            </div>
                            <div class="col-2">
                                <button type="button" aria-label="Add" class="btn btn-default add-product-variant"><i class="fas fa-plus-circle"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header bg-none fw-bold d-flex align-items-center">
                        <div class="flex-1">
                            <div>Product description</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <x-form class="col-xl-12"  :title="'Product Summary'">
                            <x-input-textarea name="summary" placeholder="Ex. Product Summary" >{{ old('summary') }}</x-input-textarea>
                        </x-form>

                        <x-form class="col-xl-12"  :title="'Product Description'">
                            <x-input-textarea name="description" placeholder="Ex. Product Description" >{{ old('description') }}</x-input-textarea>
                        </x-form>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="card mb-4">
                    <div class="card-header bg-none fw-bold d-flex align-items-center">
                        <div class="flex-1">
                            <div>Product Preview</div>
                        </div>
                    </div>
                    <div class="card-body" id="image-preview">
                        <img style="width: 200px;" src="{{ asset("assets/img/product-placeholder.jpg") }}" alt="" class="card-img-top" />
                    </div>
                    <div class="card-body">
                        <h5 class="card-title product-name"></h5>
                        <p class="card-text product-category">Category</p>
                        <p class="card-text product-color">Colors</p>
                        <p class="card-text product-size">Size</p>
                        <p class="card-text product-price">Price</p>
                        <p class="card-text product-sale-price">Sale Price</p>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Create</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @push('script')
        <script src="{{ asset("assets/plugins/summernote/dist/summernote-lite.min.js")}}" type="text/javascript"></script>
        <script src="{{ asset("assets/plugins/tag-it/js/tag-it.min.js")}}" type="text/javascript"></script>
        <script src="{{ asset("assets/js/image-handler/load-image.js")}}" type="text/javascript"></script>

        <script type="text/javascript">
            $(document).ready(function() {

                $('.summernote').summernote({
                    height: 200
                });

                let loadTagLibrary = function () {
                    $('.tagit').tagit({
                        autocomplete: {
                            delay: 0,
                            minLength: 2
                        }
                    });
                }

                loadTagLibrary();

                let id = 1;
                $('.add-product-variant').click(function () {
                    id++;
                    let productVariantForm = `
                        <div class="row mb-3 gx-3" id="product-variant-${id}">
                            <div class="col-5">
                                <x-text-input name="variant[${id}][name]" placeholder="e.g Size" />
                            </div>
                            <div class="col-5">
                                <input type="text" name="variant[${id}][value]" class="tagit form-control"/>
                            </div>
                            <div class="col-2">
                                <button data-id="${id}" aria-label="Remove" class="btn btn-danger remove-product-variant"><i class="fas fa-minus-circle"></i></button>
                            </div>
                        </div>`;

                    $('.product-variant-form').append(productVariantForm);
                    loadTagLibrary();
                });

                $(document).on('click', '.remove-product-variant', function() {
                    let removeButtonId = $(this).data('id');
                    $(`#product-variant-${removeButtonId}`).remove();
                });

                const previewMappings = {
                    '#product-name-input'   : '.product-name',
                    '#product-price'        : '.product-price',
                    '#product-sale-price'   : '.product-price'
                };

                $.each(previewMappings, function (inputSelector, targetSelector) {
                    $(document).on('keyup', inputSelector, function () {
                        const value = $(this).val();
                        $(targetSelector).text(value);
                    });
                });


                $(document).on("change", "#product-category", function() {
                    let productCategory = $(this).data("category");
                    $('.product-category').text(productCategory);
                });


            });

        </script>
    @endpush
</x-app-layout>
