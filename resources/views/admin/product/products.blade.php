@extends('admin.master')
@section('content')
    <div class="pagetitle">
        <h1>Products Table</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL::to('/') }}/admin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ URL::to('/') }}/admin/products">Product</a></li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                @if (count($products) == 0)
                    <h5 class="card-title">No Products</h5>
                @else
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Product</h5>
                            <div class="d-flex justify-content-end">
                                <a class="btn btn-primary " href="{{ URL::to('/') }}/admin/product/add">+ Add Product</a>
                            </div>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Product ID</th>
                                        <th>
                                            <b>Product N</b>ame
                                        </th>
                                        <th>Price</th>
                                        {{-- <th>Image</th> --}}
                                        <th>Status</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $idx => $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->productName }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>
                                                @if ($product->status == 'active')
                                                    <a href="{{ URL::to('/') }}/admin/product/status/{{ $product->id }}"><span
                                                            class="badge text-bg-success">Active</span></a>
                                                @elseif($product->status == 'inactive')
                                                    <a href="{{ URL::to('/') }}/admin/product/status/{{ $product->id }}"><span
                                                            class="badge text-bg-warning">Inactive</span></a>
                                                @endif
                                            </td>
                                            <td>
                                                <div>
                                                    <i class="ri-eye-fill text-primary" data-bs-toggle="modal"
                                                        data-bs-target="#productDetailModal"></i>

                                                    {{-- <i class="ri-edit-box-fill text-warning"></i>
                                                <i class="ri-delete-bin-6-fill text-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteProductConfirm"></i> --}}
                                                    <a href="{{ URL::to('/') }}/admin/product/edit/{{ $product->id }}">
                                                        <i class="ri-edit-box-fill text-warning"></i>
                                                    </a>
                                                    <a
                                                        href="{{ URL::to('/') }}/admin/product/delete/{{ $product->id }}">
                                                        <i class="ri-delete-bin-6-fill text-danger"></i>
                                                    </a>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>

    @include('admin.product.modal.productDetailModal')
    @include('admin.product.modal.deleteProductConfirmModal')
@endsection
