<x-app-layout>
    <div class="row">
        <div class="col-xl-12">
            <div class="card mb-2">
                <div class="card-header bg-none fw-bold d-flex align-items-center">
                    <h5 class="modal-title">Create Role</h5>
                </div>
                <form method="post" action="{{route('role.update', $role)}}">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="row mb-n3">
                            <div class="col-xl-10">
                                <div class="fs-12px text-muted mb-2"><b>Name</b></div>
                                <input name="name" class="form-control mb-3" type="text" placeholder="Ex. Manager" value="{{ old('name', $role->name) }}" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="col-xl-2 mt-4">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                        <div class="row mb-n3">
                            <div class="col-xl-6">
                                <div class="fs-12px text-muted mb-2"><b>Permissions</b></div>
                                @foreach($permissions as $id => $permission)
{{--                            @dd($role->permissions[0]->id)--}}
                                    <div class="form-check">
                                        <input @checked($role->permissions->pluck('id')->contains($permission->id)) name="permissions[]" class="form-check-input" type="checkbox" value="{{ $permission->id }}">
                                        <label class="form-check-label">{{ $permission->slug }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
