@extends('admin.master')
@section('content')
<div class="pagetitle">
    <h1>Payment Table</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}/admin/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ URL::to('/') }}/admin/payments">Payments</a></li>

      </ol>
    </nav>
  </div><!-- End Page Title -->


{{--TODO:  MORE Detail IN MODAL  QUANTITY  DETAIL ADDTIONAL INFO.. --}}
 

<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Payments</h5>
            <div class="d-flex justify-content-end">

                <button class="btn btn-primary ">+ Add Payments</button>
            </div>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                    <th>ID</th>
                    <th>Payments ID By RazorPay</th>
                    <th>RazorPay ID  </th>
                    <th>User Email </th>
                    <th>Amount </th>
                    <th>Status </th>
                    <th>Payment Date </th>
                     </tr>
              </thead>
              <tbody>
                <tr>
                  <td>p121235</td>
                  <td>rp13456</td>
                  <td>rp13456</td>
                  <td>sh@ga</td>
                  <td>13000</td>
                  <td>2025/5/5</td>
                  <td ><span class="badge text-bg-success">Completed</span></td>
                  <td>
                    <div>
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