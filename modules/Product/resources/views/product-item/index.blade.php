<x-app-layout>
    @push('css')
        <link href="{{ asset('assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet"/>
        <link href="{{ asset('assets/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css')}}" rel="stylesheet" />
        <link href="{{ asset('assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}" rel="stylesheet" />
        <link href="{{ asset('assets/plugins/bootstrap-table/dist/bootstrap-table.min.css')}}" rel="stylesheet" />
    @endpush
    <div class="container">
        <div class="d-flex align-items-center mb-2">
            <div>
                <h5 class="mb-0">Product Items</h5>
            </div>
            <div class="ms-auto">
                <a href="{{ route('product-item.create') }}" class="btn btn-primary mb-2"> <i class="fa fa-plus-circle fa-fw me-1"></i> Add New</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div id="stripedRows" class="mb-5">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatableDefault" class="table table-striped mb-0 text-nowrap w-100">
                                <thead>
                                <tr>
                                    <th scope="col">Sl No.</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Sale Price</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">SKU</th>
                                    <th scope="col" class="w-auto auto-cols-min">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($productItems as $productItem)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{ $productItem->product->name }}</td>
                                        <td>{{ $productItem->product_quantity }}</td>
                                        <td>{{ $productItem->price }}</td>
                                        <td>{{ $productItem->sale_price }}</td>
                                        <td>{{ $productItem->product_image }}</td>
                                        <td>{{ $productItem->sku }}</td>
                                        <td>
                                            <a href="{{ route('product-item.edit', $productItem->id) }}" class="btn btn-warning btn-sm"> <i class="fa fa-pen-square"></i> Edit </a>
                                            <form method="POST" action="{{ route('product-item.destroy', $productItem->id) }}" class="d-inline">
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
    </div>

    @push('script')
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
    @endpush
</x-app-layout>
