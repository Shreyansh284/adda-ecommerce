@extends('admin.master')
@section('content')
<div class="pagetitle">
    <h1>Sub Category Table</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}/admin/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ URL::to('/') }}/admin/subCategories">Sub Category</a></li>

      </ol>
    </nav>
  </div><!-- End Page Title -->


{{--TODO:  MORE Detail IN MODAL  QUANTITY  DETAIL ADDTIONAL INFO.. --}}
 

<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Sub Catagory</h5>
            <div class="d-flex justify-content-end">

                <button class="btn btn-primary ">+ Add Sub Category</button>
            </div>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                    <th>Sub Category ID</th>
                    <th>Sub Category Name</th>
                    <th>Category Name</th>

                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>SCU121235</td>
                  <td>Kurti</td>
                  <td>Female</td>
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