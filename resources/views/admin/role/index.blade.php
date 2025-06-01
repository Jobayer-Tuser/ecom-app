<x-app-layout>
        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-2">
                    <div class="card-header bg-none fw-bold d-flex align-items-center">
                        <h5 class="modal-title">Create Role</h5>
                    </div>
                    <form method="post" action="{{route('role.store')}}">
                        @csrf
                        <div class="card-body">
                            <div class="row mb-n3">
                                <div class="col-xl-10">
                                    <div class="fs-12px text-muted mb-2"><b>Name</b></div>
                                    <input name="name" class="form-control mb-3" type="text" placeholder="Ex. Manager" value="{{ old('name') }}" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                                <div class="col-xl-2 mt-4">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                            <div class="row mb-n3">
                                <div class="col-xl-6">
                                    <div class="fs-12px text-muted mb-2"><b>Permissions</b></div>
                                    @foreach($permissions as $permission)
                                        <div class="form-check">
                                            <input name="permissions[]" class="form-check-input" type="checkbox" value="{{ $permission->id }}">
                                            <label class="form-check-label" for="defaultCheck1">{{ $permission->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-2">
                <div class="card-header bg-none fw-bold d-flex align-items-center">
                    <h5 class="modal-title">Create Role</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-n3">
                        <table class="table table-striped">
                            <thead class="">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Permission</th>
                                    <th scope="col" class="d-flex justify-content-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <th scope="row">{{ $role->id }}</th>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @foreach($role->permissions as $permission)
                                            <span class="badge bg-primary">{{ $permission->slug }}</span>
                                        @endforeach
                                    </td>
                                    <td class="d-flex justify-content-end">
                                        <a href="{{ route('role.edit', $role) }}" class="btn btn-warning btn-sm me-2"> <i class="fa fa-pen-square"></i> Edit </a>
                                        <form method="POST" action="{{ route('role.destroy', $role) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
