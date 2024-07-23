<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div id="stripedRows" class="mb-5">
                    <h5>Category List</h5>
                    <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#modalLg"> <i class="fa fa-plus-circle"></i> Add New</button>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th scope="col">Sl No.</th>
                                    <th scope="col">Parent Category</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="w-auto auto-cols-min">Action</th>
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
                                            <td> <span class="badge bg-{{ $color }}">{{ $status }}</span></td>
                                            <td>
                                                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning btn-sm"> <i class="fa fa-pen-square"></i> Edit </a>
                                                <form method="POST" action="{{ route('category.destroy', $category->id) }}" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> Delete</button>
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
    </div>

    <div class="modal fade" id="modalLg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="post" action="{{route('category.store')}}">
                    @csrf
                    <div class="modal-header border-0">
                        <h5 class="modal-title">Create Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-n3">
                            <div class="col-xl-4">
                                <div class="fs-12px text-muted mb-2"><b>Parent</b></div>
                                <select name="parent_category_id" class="form-select mb-3">
                                    <option>Select a Parent</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xl-4">
                                <div class="fs-12px text-muted mb-2"><b>Name</b></div>
                                <input name="name" class="form-control mb-3" type="text" placeholder="Ex. Male" value="" />
                            </div>
                            <div class="col-xl-4">
                                <div class="fs-12px text-muted mb-2"><b>Status</b></div>
                                <select name="status" class="form-select mb-3">
                                    <option>Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
