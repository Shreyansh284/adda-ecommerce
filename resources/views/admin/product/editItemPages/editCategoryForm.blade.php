@extends('admin.master')
@section('content')
<div class="pagetitle">
    <h1>Edit Category</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}/admin/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ URL::to('/') }}/admin/category/edit">Edit Category</a></li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4">Edit Category</h4>
                    <form action="{{route ('update-category')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 col-5">
                            <label for="categoryName" class="form-label">Category Name</label>
                            <input type="text" name="categoryName" id="categoryName" class="form-control" value="{{$getCategoryById->categoryName}}" placeholder="Enter category name" >
                            <span class="text-danger">
                                @error('categoryName')
                                    {{ $message }}
                                @enderror
                            </span>       
                        </div>
                        <!-- Submit Button -->
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">+ Edit Category </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
  @endsection