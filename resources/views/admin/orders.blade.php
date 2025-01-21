@extends('admin.master')
@section('content')
<div class="pagetitle">
    <h1>Orders Table</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}/admin/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ URL::to('/') }}/admin/orders">Orders</a></li>
        {{-- <li class="breadcrumb-item active">Data</li> --}}
      </ol>
    </nav>
  </div><!-- End Page Title -->


{{--TODO:  MORE Detail IN MODAL  QUANTITY  DETAIL ADDTIONAL INFO.. --}}
 

<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Orders</h5>
            <div class="d-flex justify-content-end">

                <button class="btn btn-primary ">+ Add Order</button>
            </div>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Product ID</th>
                    <th>Customer ID</th>
                    <th>Price</th>
                  <th>Order Date</th>
                  <th>Order Time</th>
                  <th>Quantity</th>
                  <th>PaymentMode</th>
                  <th>Actions</th>

                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>ORD121235</td>
                  <td>PD121235</td>
                  <td>CU121235</td>
                      <td>2000</td>
                      <td>26/1/11</td>
                      <td>12.00</td>
                      <td>2</td>
                  <td ><span class="badge text-bg-success">Online</span></td>
                  <td>
                    <div>
                        {{-- <i class="ri-eye-fill text-primary"></i> --}}
                        <i class="ri-edit-box-fill text-warning"></i>
                        <i class="ri-delete-bin-6-fill text-danger"></i>
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

@endsection