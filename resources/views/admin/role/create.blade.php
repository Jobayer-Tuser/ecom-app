<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div id="formGrid" class="mb-5">
                    <h5>Edit Category</h5>
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ route('role.store', $category->id) }}">
                                @method('patch')
                                @csrf
                                <div class="row mb-n3">
{{--                                    <div class="col-xl-4">--}}
{{--                                        <div class="fs-12px text-muted mb-2"><b>Parent</b></div>--}}
{{--                                        <select name="parent_category_id" class="form-select mb-3">--}}
{{--                                            <option value="">Select a Parent</option>--}}
{{--                                            @foreach($categories as $eachCategory)--}}
{{--                                                <option {{ ($eachCategory->id == $category->parent_category_id) ? 'selected' : '' }}  value="{{ $eachCategory->id }}">{{ $eachCategory->name }}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
                                    <div class="col-xl-4">
                                        <div class="fs-12px text-muted mb-2"><b>Name</b></div>
                                        <input name="name" class="form-control mb-3" type="text" placeholder="Ex. Admin" value="{{ old('name') }}" />
                                    </div>
                                </div>
                                <div class="row mt-1">
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
</x-app-layout>
