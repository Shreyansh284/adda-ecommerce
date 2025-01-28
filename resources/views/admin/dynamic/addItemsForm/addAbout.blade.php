@extends('admin.master')
@section('content')
<div class="pagetitle">
    <h1>Add About</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}/admin/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item "><a href="{{ URL::to('/') }}/admin/aboutUs/">About</a></li>
        <li class="breadcrumb-item active"><a href="{{ URL::to('/') }}/admin/aboutUs/add">Add About</a></li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4">Add About</h4>
                    <form action="{{route ('store-about')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex g-2 justify-content-between">

                        <div class="mb-3 col-5">
                            <label for="member_name" class="form-label">Member Name</label>
                            <input type="text" name="member_name" id="member_name" class="form-control" placeholder="Enter member name" >
                            <span class="text-danger">
                                @error('member_name')
                                    {{ $message }}
                                @enderror
                            </span>       
                        </div>
                        <div class="mb-3 col-5">
                            <label for="member_role" class="form-label">Member Role</label>
                            <input type="text" name="member_role" id="member_role" class="form-control" placeholder="Enter member role" >
                            <span class="text-danger">
                                @error('member_role')
                                    {{ $message }}
                                @enderror
                            </span>       
                        </div>
                        </div>
                        <div class="mb-3 col">
                            <label for="member_role" class="form-label">Member Image</label>
                            <input type="file" name="image" id="member_role" class="form-control" placeholder="Enter member role" >
                            <span class="text-danger">
                                @error('image')
                                    {{ $message }}
                                @enderror
                            </span>       
                        </div>
                        <!-- Submit Button -->
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">+ Add About </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
  @endsection