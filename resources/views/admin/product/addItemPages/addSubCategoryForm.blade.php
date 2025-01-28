@extends('admin.master')
@section('content')
<div class="pagetitle"> 
    <h1>Add Sub Category</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}/admin/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ URL::to('/') }}/admin/subCategory/add">Add Category</a></li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4">Add Sub Category</h4>
                    <form action="{{route ('store-subCategory')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex g-2 justify-content-evenly">
                            <div class="col-md-5 mb-3">
                                <label for="productStatus" class="form-label">Category</label>
                                <select  name="categoryId" id="productStatus" class="form-select" required>
                                    @foreach ($categories as $category )
                                    <option value="{{$category->id}}">{{$category->categoryName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-5">
                                <label for="categoryName" class="form-label">Sub Category Name</label>
                                <input type="text" name="subCategoryName" id="subCategoryName" class="form-control" placeholder="Enter Sub Category name" >
                                <span class="text-danger">
                                    @error('subCategoryName')
                                        {{ $message }}
                                    @enderror
                                </span>       
                            </div>
                        </div>
                    
                        <!-- Submit Button -->
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">+ Add Sub Category </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
  @endsection