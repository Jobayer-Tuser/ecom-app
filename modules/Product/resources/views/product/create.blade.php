<x-app-layout>
    @push('css')
        <link href="{{ asset('assets/plugins/tag-it/css/jquery.tagit.css')}}" rel="stylesheet" />
        <link href="{{ asset('assets/plugins/summernote/dist/summernote-lite.css')}}" rel="stylesheet" />
    @endpush
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div id="formGrid" class="mb-5">
                    <h5>Create Product</h5>
                    <div class="card">
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
                                        <x-input-text name="image" type="file" placeholder="Ex. Macbook Air M1" value="{{ old('name') }}" />
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
