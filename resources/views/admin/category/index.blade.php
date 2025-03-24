@php
    use App\Enums\Status;
    use App\Models\Category;
 @endphp
<x-app-layout>
    <div class="row justify-content-center">
        <div class="col-xl-12">
            <div class="card mb-2">
                <div class="card-header bg-none fw-bold d-flex align-items-center">
                    <h5 class="modal-title">Create Category</h5>
                </div>
                @can('create', Category::class)
                @endcan
                <form method="post" action="{{route('category.store')}}">
                    @csrf
                    <div class="card-body">
                        <div class="row mb-n3">
                            <div class="col-xl-4">
                                <div class="fs-12px text-muted mb-2"><b>Parent</b></div>
                                <select name="parent_category_id" class="form-select mb-3">
                                    <option value="">Select a Parent</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('parent_category_id')" class="mt-2"/>
                            </div>

                            <div class="col-xl-4">
                                <div class="fs-12px text-muted mb-2"><b>Name</b></div>
                                <input name="name" class="form-control mb-3" type="text" placeholder="Ex. Male"
                                       value="{{ old('name') }}"/>
                                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                            </div>

                            <div class="col-xl-3">
                                <div class="fs-12px text-muted mb-2"><b>Status</b></div>
                                <select name="status" class="form-select mb-3">
                                    <option value="">Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                <x-input-error :messages="$errors->get('status')" class="mt-2"/>
                            </div>

                            <div class="col-xl-1 mt-4">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div id="stripedRows" class="mb-5">
                <div class="card">
                    <div class="card-header bg-none fw-bold d-flex align-items-center">
                        <h5 class="modal-title">Category list</h5>
                    </div>
                    <div class="card-body">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th scope="col">Sl No.</th>
                                <th scope="col">Parent Category</th>
                                <th scope="col">Name</th>
                                <th scope="col">Status</th>
                                <th scope="col" class="d-flex justify-content-end">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                @php
                                    $status = ($category->status === 1) ? 'Active' : 'Inactive';
                                    $color = ($category->status === 1) ? 'success' : 'secondary';
                                @endphp
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{ $category->parentCategory->name ?? '' }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td><span
                                            class="badge bg-{{ Status::from($category->status)->colour() }}">{{ Status::from($category->status)->toString()  }}</span>
                                    </td>
                                    <td class="d-flex justify-content-end">
                                        @can('update', $category)
                                            <a href="{{ route('category.edit', $category) }}"
                                               class="btn btn-warning btn-sm mr-2">
                                                <i class="fa fa-pen-square"></i> Edit
                                            </a>
                                        @endcan
                                        <form method="POST" action="{{ route('category.destroy', $category) }}"
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm ml-2"><i
                                                    class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{--                            {{ $categories->paginate() }}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
