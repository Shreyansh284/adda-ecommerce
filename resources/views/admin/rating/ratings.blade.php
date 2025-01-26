@extends('admin.master')
@section('content')
<div class="pagetitle">
    <h1>Rating Table</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}/admin/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ URL::to('/') }}/admin/ratings">Rating</a></li>

      </ol>
    </nav>
  </div><!-- End Page Title -->


{{--TODO:  MORE Detail IN MODAL  QUANTITY  DETAIL ADDTIONAL INFO.. --}}
 

<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Rating</h5>
            <div class="d-flex justify-content-end">

                <button class="btn btn-primary ">+ Add Rating</button>
            </div>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                    <th>Rating ID</th>
                    <th>User ID</th>
                    <th>Product ID</th>
                    <th>Tilte</th>
                    <th>Descripton</th>
                    <th>Rating</th>
                    <th>Status</th>

                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>CU121235</td>
                  <td>CU121235</td>
                  <td>CU121235</td>
                  <td>Good</td>
                  <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae nulla .</td>
                  <td>4</td>
                  <td ><span class="badge text-bg-success">Active</span></td>
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