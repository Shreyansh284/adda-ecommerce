@extends('admin.master')
@section('content')
<div class="pagetitle">
    <h1>Edit About</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}/admin/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}/admin/aboutUs/">About</a></li>
        <li class="breadcrumb-item active"><a href="{{ URL::to('/') }}/admin/aboutUs/edit/{{$aboutUs->id}}">Edit About</a></li>
      </ol>
    </nav>
</div><!-- End Page Title -->

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4">Edit About</h4>
                    <form action="{{ route('update-about', $aboutUs->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                     
                        <div class="d-flex g-2 justify-content-between">
                            <div class="mb-3 col-5">
                                <label for="member_name" class="form-label">Member Name</label>
                                <input type="text" name="member_name" id="member_name" class="form-control" value="{{ $aboutUs->member_name }}" placeholder="Enter member name">
                                <span class="text-danger">
                                    @error('member_name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="mb-3 col-5">
                                <label for="member_role" class="form-label">Member Role</label>
                                <input type="text" name="member_role" id="member_role" class="form-control" value="{{ $aboutUs->member_role }}" placeholder="Enter member role">
                                <span class="text-danger">
                                    @error('member_role')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="mb-3 col">
                            <label for="image" class="form-label">Member Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                            <span class="text-danger">
                                @error('image')
                                    {{ $message }}
                                @enderror
                            </span>
                            @if($aboutUs->image)
                            <div class="mt-3">
                                <img src="{{ asset($aboutUs->image) }}" alt="{{ $aboutUs->member_name }}" style="width: 100px; height: 100px; object-fit: cover;">
                            </div>
                            @endif
                        </div>
                        <!-- Submit Button -->
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Update About</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
