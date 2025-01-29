@extends('admin.master')
@section('content')
<div class="pagetitle">
    <h1>Edit Contact</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ URL::to('/') }}/admin/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ URL::to('/') }}/admin/contactUs/">Contact</a></li>
            <li class="breadcrumb-item active">Edit Contact</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4">Edit Contact</h4>
                    <form action="{{ route('update-contact', $contact->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                                           <div class="d-flex g-2 justify-content-between">
                            <div class="mb-3 col-5">
                                <label for="mobile" class="form-label">Mobile</label>
                                <input type="text" name="mobile" id="mobile" class="form-control" 
                                       placeholder="Enter mobile number"  minlength="10" 
                                       maxlength="10" value="{{ old('mobile', $contact->mobile) }}">
                                <span class="text-danger">
                                    @error('mobile') {{ $message }} @enderror
                                </span>       
                            </div>
                            <div class="mb-3 col-5">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" name="location" id="location" class="form-control" 
                                       placeholder="Enter location" value="{{ old('location', $contact->location) }}">
                                <span class="text-danger">
                                    @error('location') {{ $message }} @enderror
                                </span>       
                            </div>
                        </div>

                        <div class="mb-3 col-5">
                            <label for="timeing" class="form-label">Timing</label>
                            <input type="text" name="timeing" id="timeing" class="form-control" 
                                   placeholder="Enter timing" value="{{ old('timeing', $contact->timeing) }}">
                            <span class="text-danger">
                                @error('timeing') {{ $message }} @enderror
                            </span>       
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Update Contact</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
