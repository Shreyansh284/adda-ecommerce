@extends('admin.master')
@section('content')
<div class="pagetitle">
    <h1>Edit Slider</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}/admin/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}/admin/slider">slider</a></li>
        <li class="breadcrumb-item active">Edit Slider</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4">Edit slider</h4>
                    <form action="{{route ('update-slider',$slider->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3 col">
                            <label for="image" class="form-label">Slider</label>
                            <input type="file" name="image" id="image" class="form-control">
                            <span class="text-danger">
                                @error('image')
                                    {{ $message }}
                                @enderror
                            </span>
                            @if($slider->image)
                            <div class="mt-3">
                                <img src="{{ asset($slider->image) }}" alt="{{ $slider->member_name }}" style="width: 120px; height: 100px; object-fit: cover;">
                            </div>
                            @endif
                        </div>
                        <!-- Submit Button -->
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">+ Edit Slider </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
  @endsection