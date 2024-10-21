<x-app-layout>
    {{--@push('css')
        <link href="{{ asset('assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet"/>
        <link href="{{ asset('assets/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css')}}" rel="stylesheet" />
        <link href="{{ asset('assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}" rel="stylesheet" />
        <link href="{{ asset('assets/plugins/bootstrap-table/dist/bootstrap-table.min.css')}}" rel="stylesheet" />
    @endpush--}}
        <div class="d-flex align-items-center mb-3">
            <div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">PAGES</a></li>
                    <li class="breadcrumb-item active">PRODUCTS</li>
                </ul>
                <h1 class="page-header mb-0">Products</h1>
            </div>
            <div class="ms-auto">
                <a href="{{ route('product.create') }}" class="btn btn-primary"><i class="fa fa-plus-circle fa-fw me-1"></i> Add Product</a>
            </div>
        </div>
        <div class="mb-sm-4 mb-3 d-sm-flex">
            <div class="mt-sm-0 mt-2"><a href="#" class="text-dark text-decoration-none"><i class="fa fa-download fa-fw me-1 text-muted"></i> Export</a></div>
            <div class="ms-sm-4 mt-sm-0 mt-2"><a href="#" class="text-dark text-decoration-none"><i class="fa fa-upload fa-fw me-1 text-muted"></i> Import</a></div>
            <div class="ms-sm-4 mt-sm-0 mt-2 dropdown-toggle">
                <a href="#" data-bs-toggle="dropdown" class="text-dark text-decoration-none">More Actions</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div role="separator" class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>
                </div>
            </div>
        </div>
        <div class="card">
            <ul class="nav nav-tabs nav-tabs-v2 px-4">
                <li class="nav-item me-3"><a href="#allTab" class="nav-link active px-2" data-bs-toggle="tab">All</a></li>
                <li class="nav-item me-3"><a href="#publishedTab" class="nav-link px-2" data-bs-toggle="tab">Published</a></li>
                <li class="nav-item me-3"><a href="#expiredTab" class="nav-link px-2" data-bs-toggle="tab">Expired</a></li>
                <li class="nav-item me-3"><a href="#deletedTab" class="nav-link px-2" data-bs-toggle="tab">Deleted</a></li>
            </ul>
            <div class="tab-content p-4">
                <div class="tab-pane fade show active" id="allTab">
                    <div class="input-group mb-4">
                        <button class="btn btn-default dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter products &nbsp;</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div role="separator" class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                        <div class="flex-fill position-relative">
                            <div class="input-group">
                                <div class="input-group-text position-absolute top-0 bottom-0 bg-none border-0" style="z-index: 1020;">
                                    <i class="fa fa-search opacity-5"></i>
                                </div>
                                <input type="text" class="form-control ps-35px" placeholder="Search products" />
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="datatableDefault" class="table table-hover mb-2 text-nowrap w-100">
                            <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Product</th>
                                <th scope="col">Category</th>
                                <th scope="col" class="align-content-end">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td class="w-10px align-middle">
                                        <div class="form-check">
                                            <input type="checkbox" name="product_id" value="{{ $product->id }}" class="form-check-input">
                                            <label class="form-check-label" for="product1"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="w-60px h-60px bg-gray-100 d-flex align-items-center justify-content-center">
                                                <img class="mw-100 mh-100" src="{{ asset("storage/products/" . $product->image) }}"  alt="product"/>
                                            </div>
                                            <div class="ms-3">
                                                <a href="#">{{ $product->name }}</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">{{ $product->category->name }}</td>
                                    <td>
                                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning btn-sm"> <i class="fa fa-pen-square"></i> Edit </a>
                                        <form method="POST" action="{{ route('product.destroy', $product->id) }}" class="d-inline">
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
                    {{ $products->links('admin.layouts.pagination') }}
                </div>
            </div>
        </div>

   {{-- @push('script')
        <script src="{{ asset('assets/plugins/datatables.net/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/datatables.net-buttons/js/buttons.colVis.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/datatables.net-buttons/js/buttons.flash.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/datatables.net-buttons/js/buttons.html5.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/datatables.net-buttons/js/buttons.print.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/bootstrap-table/dist/bootstrap-table.min.js')}}" type="text/javascript"></script>
    @endpush--}}
</x-app-layout>
