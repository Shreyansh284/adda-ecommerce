@extends('admin.master')
@section('content')
    <div class="pagetitle">
        <h1>AboutUs Table</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL::to('/') }}/admin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ URL::to('/') }}/admin/aboutUs">About Us</a></li>

            </ol>
        </nav>
    </div><!-- End Page Title -->


    {{-- TODO:  MORE Detail IN MODAL  QUANTITY  DETAIL ADDTIONAL INFO.. --}}


    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">About Us</h5>
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-primary " href="{{ URL::to('/') }}/admin/aboutUs/add">+ Add About</a>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Member ID</th>
                                    <th>Member Name</th>
                                    <th>Role</th>
                                    <th>image</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($abouts as $about)
                                    <tr>
                                        <td>{{ $about->id }}</td>
                                        <td>{{ $about->member_name }}</td>
                                        {{-- <td>{{$about->image}}</td> --}}
                                        <td>{{ $about->member_role }}</td>

                                        <td><img src="{{ asset($about->image) }}" alt=""
                                                style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                                        </td>

                                        <td>
                                            @if ($about->status == 'active')
                                                <a href="{{ URL::to('/') }}/admin/aboutUs/status/{{ $about->id }}"><span
                                                        class="badge text-bg-success">Active</span></a>
                                            @elseif($about->status == 'inactive')
                                                <a href="{{ URL::to('/') }}/admin/aboutUs/status/{{ $about->id }}"><span
                                                        class="badge text-bg-warning">Inactive</span></a>
                                            @endif
                                        </td>
                                        <td>
                                            <div>
                                                <a href="{{ URL::to('/') }}/admin/aboutUs/edit/{{ $about->id }}">
                                                    <i class="ri-edit-box-fill text-warning"></i>
                                                </a>
                                                <a href="{{ URL::to('/') }}/admin/aboutUs/delete/{{ $about->id }}">
                                                    <i class="ri-delete-bin-6-fill text-danger"></i>
                                                </a>
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
