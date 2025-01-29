@extends('admin.master')
@section('content')
<div class="pagetitle">
    <h1>Add Slider</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}/admin/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}/admin/slider">slider</a></li>
        <li class="breadcrumb-item active">Add Slider</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4">Add slider</h4>
                    <form action="{{route ('store-slider')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3 col-5">
                            <label for="slider" class="form-label">Slider</label>
                            <input type="file" name="image" id="categoryName" class="form-control" >
                            <span class="text-danger">
                                @error('image')
                                    {{ $message }}
                                @enderror
                            </span>       
                        </div>
                        <!-- Submit Button -->
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">+ Add Slider </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
  @endsection