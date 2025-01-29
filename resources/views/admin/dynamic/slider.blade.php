@extends('admin.master')
@section('content')
    <div class="pagetitle">
        <h1>Slider Table</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL::to('/') }}/admin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ URL::to('/') }}/admin/slider">Slider</a></li>

            </ol>
        </nav>
    </div><!-- End Page Title -->


    {{-- TODO:  MORE Detail IN MODAL  QUANTITY  DETAIL ADDTIONAL INFO.. --}}


    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sliders</h5>
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-primary " href="{{ URL::to('/') }}/admin/slider/add">+ Add slider</a>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Slider ID</th>
                                    
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $slider)
                                    <tr>
                                        <td>{{ $slider->id }}</td>
                                           <td><img src="{{ asset($slider->image) }}" alt=""
                                                style="width: 120px; height: 100px; object-fit: cover; border-radius: 5px;">
                                        </td>

                                        <td>
                                            @if ($slider->status == 'active')
                                                <a href="{{ URL::to('/') }}/admin/slider/status/{{ $slider->id }}"><span
                                                        class="badge text-bg-success">Active</span></a>
                                            @elseif($slider->status == 'inactive')
                                                <a href="{{ URL::to('/') }}/admin/slider/status/{{ $slider->id }}"><span
                                                        class="badge text-bg-warning">Inactive</span></a>
                                            @endif
                                        </td>
                                        <td>
                                            <div>
                                                <a href="{{ URL::to('/') }}/admin/slider/edit/{{ $slider->id }}">
                                                    <i class="ri-edit-box-fill text-warning"></i>
                                                </a>
                                                <a href="{{ URL::to('/') }}/admin/slider/delete/{{ $slider->id }}">
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
