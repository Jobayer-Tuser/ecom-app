<x-app-layout>
    <div class="row justify-content-center">
        <div class="col-xl-12">
            <div class="card mb-2">
                <div class="card-header bg-none fw-bold d-flex align-items-center">
                    <h5 class="modal-title">Create Category</h5>
                </div>
                <form method="post" action="{{route('file.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row mb-n3">

                            <div class="col-xl-4">
                                <div class="fs-12px text-muted mb-2"><b>Name</b></div>
                                <input name="file" class="form-control mb-3" type="file" placeholder="Ex. Male" value="{{ old('file') }}"/>
                                <x-input-error :messages="$errors->get('file')" class="mt-2"/>
                            </div>

                            <div class="col-xl-1 mt-4">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
