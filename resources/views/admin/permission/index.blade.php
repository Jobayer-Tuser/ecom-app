<x-app-layout>
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-2">
                <div class="card-header bg-none fw-bold d-flex align-items-center">
                    <h5 class="modal-title">Create Permission</h5>
                </div>
                <form method="post" action="{{route('permission.store')}}">
                    @csrf
                    <div class="card-body">
                        <div class="row mb-n3">
                            <div class="col-xl-8">
                                <div class="fs-12px text-muted mb-2"><b>Permission name</b></div>
                                <input name="name" class="form-control mb-3" type="text" placeholder="Ex. Update, delete" value="{{ old('name') }}" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div class="col-xl-1 mt-4">
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-xl-6">
            <div id="stripedRows" class="mb-5">
                <div class="card">
                    <div class="card-header bg-none fw-bold d-flex align-items-center">
                        <h5 class="modal-title">List of Permissions</h5>
                    </div>
                    <div class="card-body">
                        <table id="datatableDefault" class="table table-striped mb-0 text-nowrap w-100">
                            <thead>
                            <tr>
                                <th scope="col">Sl No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col" class="d-flex justify-content-end">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permissions as $permission)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->slug }}</td>
                                    <td class="d-flex justify-content-end">
                                        <a href="{{ route('permission.edit', $permission) }}" class="btn btn-warning btn-sm me-2"> <i class="fa fa-pen-square"></i> Edit </a>
                                        <form method="POST" action="{{ route('permission.destroy', $permission) }}">
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
</x-app-layout>
