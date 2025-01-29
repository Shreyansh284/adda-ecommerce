@extends('admin.master')
@section('content')
<div class="pagetitle">
    <h1>Add Contact</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}/admin/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item "><a href="{{ URL::to('/') }}/admin/contactUs/">Contact</a></li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4">Add Contact</h4>
                    <form action="{{route ('store-contact')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex g-2 justify-content-between">

                        <div class="mb-3 col-5">
                            <label for="mobile" class="form-label">mobile</label>
                            <input type="text" name="mobile"  minlength="10" 
                            maxlength="10" id="member_name" class="form-control" placeholder="Enter member name" >
                            <span class="text-danger">
                                @error('mobile')
                                    {{ $message }}
                                @enderror
                            </span>       
                        </div>
                        <div class="mb-3 col-5">
                            <label for="member_role" class="form-label">Loaction</label>
                            <input type="text" name="location" id="location" class="form-control" placeholder="Enter member role" >
                            <span class="text-danger">
                                @error('location')
                                    {{ $message }}
                                @enderror
                            </span>       
                        </div>
                        </div>
                        <div class="mb-3 col-5">
                            <label for="member_role" class="form-label">Timeing</label>
                            <input type="text" name="timeing" id="location" class="form-control" placeholder="Enter member role" >
                            <span class="text-danger">
                                @error('timeing')
                                    {{ $message }}
                                @enderror
                            </span>       
                        </div>
                        <!-- Submit Button -->
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">+ Add Contact </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
  @endsection