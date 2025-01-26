@extends('admin.master')
@section('content')
<div class="pagetitle">
    <h1>Size Table</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}/admin/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ URL::to('/') }}/admin/sizes">Size</a></li>

      </ol>
    </nav>
  </div><!-- End Page Title -->


{{--TODO:  MORE Detail IN MODAL  QUANTITY  DETAIL ADDTIONAL INFO.. --}}
 

<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Catagory</h5>
            <div class="d-flex justify-content-end">

                <button class="btn btn-primary ">+ Add Size</button>
            </div>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                    <th>Size ID</th>
                    <th>Size Name</th>

                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>CU121235</td>
                  <td>Male</td>
                  {{-- <td ><span class="badge text-bg-success">Active</span></td> --}}
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