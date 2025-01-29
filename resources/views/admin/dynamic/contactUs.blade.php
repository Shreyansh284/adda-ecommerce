@extends('admin.master')
@section('content')
    <div class="pagetitle">
        <h1>Contact Us Table</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL::to('/') }}/admin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ URL::to('/') }}/admin/aboutUs">Contact Us</a></li>

            </ol>
        </nav>
    </div><!-- End Page Title -->


    {{-- TODO:  MORE Detail IN MODAL  QUANTITY  DETAIL ADDTIONAL INFO.. --}}


    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Contact Us</h5>
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-primary " href="{{ URL::to('/') }}/admin/contactUs/add">+ Add Contact Us</a>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Mobile</th>
                                    <th>Location</th>
                                    <th>Timing</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->id }}</td>
                                        <td>{{ $contact->mobile }}</td>
                                        {{-- <td>{{$about->image}}</td> --}}
                                        
                                        <td>{{ $contact->location }}</td>
                                        <td>{{ $contact->timeing }}</td>
                                        
                                        <td>
                                            @if ($contact->status == 'active')
                                                <a href="{{ URL::to('/') }}/admin/contactUs/status/{{ $contact->id }}"><span
                                                        class="badge text-bg-success">Active</span></a>
                                            @elseif($contact->status == 'inactive')
                                                <a href="{{ URL::to('/') }}/admin/contactUs/status/{{ $contact->id }}"><span
                                                        class="badge text-bg-warning">Inactive</span></a>
                                            @endif
                                        </td>
                                        <td>
                                            <div>
                                                <a href="{{ URL::to('/') }}/admin/contactUs/edit/{{ $contact->id }}">
                                                    <i class="ri-edit-box-fill text-warning"></i>
                                                </a>
                                                <a href="{{ URL::to('/') }}/admin/contactUs/delete/{{ $contact->id }}">
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
