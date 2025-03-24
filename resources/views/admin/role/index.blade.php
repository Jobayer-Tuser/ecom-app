<x-app-layout>
        <div class="row">
            <div class="col-xl-6">
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
                                <div class="col-xl-1 mt-4">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="card mb-2">
                    <div class="card-header bg-none fw-bold d-flex align-items-center">
                        <h5 class="modal-title">Assign User</h5>
                    </div>
                    <form method="post" action="{{route('role.assign')}}">
                        @csrf
                        <div class="card-body">
                            <div class="row mb-n3">
                                <div class="col-xl-10">
                                    <x-input-label for="email" :value="__('User')"/>
                                    <x-input-select name="user_id" :type="'User'" >
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </x-input-select>
                                    <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                                </div>
                                <div class="col-xl-10">
                                    <x-input-label for="email" :value="__('Role')"/>
                                    <x-input-select multiple name="role_id[]" :type="'Role'" >
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </x-input-select>
                                    <x-input-error :messages="$errors->get('role_id')" class="mt-2" />
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
                            <h5 class="modal-title">List of User</h5>
                        </div>
                        <div class="card-body">
                            <table id="datatableDefault" class="table mb-0 text-nowrap w-100">
                                <thead>
                                <tr>
                                    <th scope="col">Sl No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Role</th>
                                    <th scope="col" class="d-flex justify-content-end">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($users as $user)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{ $user->name }}</td>
{{--                                        <td>{{ $user->roles->name }}</td>--}}
                                        <td class="d-flex justify-content-end">
                                            <a href="{{ route('role.edit', $user) }}" class="btn btn-warning btn-sm"> <i class="fa fa-pen-square"></i> Edit </a>
                                            <form method="POST" action="{{ route('role.destroy', $user) }}" class="d-inline">
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
            <div class="col-xl-6">
                <div id="stripedRows" class="mb-5">
                    <div class="card">
                        <div class="card-header bg-none fw-bold d-flex align-items-center">
                            <h5 class="modal-title">List of Roles</h5>
                        </div>
                        <div class="card-body">
                            <table id="datatableDefault" class="table mb-0 text-nowrap w-100">
                                <thead>
                                <tr>
                                    <th scope="col">Sl No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Role</th>
                                    <th scope="col" class="d-flex justify-content-end">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{ $role->name }}</td>
                                        <td><span class="badge bg-primary">{{ $role->name }}</span></td>
                                        <td class="d-flex justify-content-end">
                                            <a href="{{ route('role.edit', $role->id) }}" class="btn btn-warning btn-sm"> <i class="fa fa-pen-square"></i> Edit </a>
                                            <form method="POST" action="{{ route('role.destroy', $role->id) }}" class="d-inline">
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
