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
  </div><!-- End Page Title -->




<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Product</h5>
            <div class="d-flex justify-content-end">
                <a class="btn btn-primary " href="{{ URL::to('/') }}/admin/product/add" >+ Add Product</a>
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
                  <th>Image</th>
                  <th>Status</th>
                  <th>Actions</th>

                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>PD121235</td>
                  <td>Stripped Kurti </td>
                  <td>2000</td>
                  <td > <img src="/user/img/product/product-4.jpg" height="80px"></td>
                  <td ><span class="badge text-bg-success">Active</span></td>
                  <td>
                    <div>
                        <i class="ri-eye-fill text-primary" data-bs-toggle="modal" data-bs-target="#productDetailModal" ></i>
                        <i class="ri-edit-box-fill text-warning"></i>
                        <i class="ri-delete-bin-6-fill text-danger" data-bs-toggle="modal" data-bs-target="#deleteProductConfirm" ></i>
                    </div>
                  </td>
                </tr>

              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

  @include('admin.product.modal.productDetailModal')
  @include('admin.product.modal.deleteProductConfirmModal')

@endsection