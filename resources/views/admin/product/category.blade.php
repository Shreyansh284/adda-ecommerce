@extends('admin.master')
@section('content')
<div class="pagetitle">
    <h1>Category Table</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}/admin/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ URL::to('/') }}/admin/categories">Category</a></li>

      </ol>
    </nav>
  </div><!-- End Page Title -->


{{--TODO:  MORE Detail IN MODAL  QUANTITY  DETAIL ADDTIONAL INFO.. --}}
 

<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Category</h5>
            <div class="d-flex justify-content-end">
              <a class="btn btn-primary " href="{{ URL::to('/') }}/admin/category/add" >+ Add Category</a>
            </div>
         
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
              </thead>
              <tbody>
                @foreach ($categories as $category )
                <tr>
                  <td>{{$category->id}}</td>
                  <td>{{$category->categoryName}}</td>
                  <td ><div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" 
                    {{($category->status=='active')? 'checked' :''}}>
                  </div></td>
                  <td>
                    <div>
                        <a href="{{ URL::to('/') }}/admin/category/edit/{{$category->id}}">
                          <i class="ri-edit-box-fill text-warning"></i>
                        </a>
                        <i class="ri-delete-bin-6-fill text-danger"></i>
                    </div>
                  </td>
                </tr>
                @endforeach
               
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

@endsection