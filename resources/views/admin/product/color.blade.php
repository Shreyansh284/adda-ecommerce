@extends('admin.master')
@section('content')
    <div class="pagetitle">
        <h1>Color Table</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL::to('/') }}/admin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ URL::to('/') }}/admin/colors">Color</a></li>

            </ol>
        </nav>
    </div><!-- End Page Title -->


    {{-- TODO:  MORE Detail IN MODAL  QUANTITY  DETAIL ADDTIONAL INFO.. --}}


    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Color</h5>
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-primary " href="{{ URL::to('/') }}/admin/color/add">+ Add Color</a>
                        </div>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Color ID</th>
                                    <th>Color Name</th>
                                    <th>Color</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($colors as $index => $color)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $color->color }}</td>
                                        <td>
                                          <span class="badge" style="background-color: {{ $color->hexcode }}; color: {{ getContrastColor($color->hexcode) }};">
                                              {{ $color->hexcode }}
                                          </span>
                                      </td>
                                      
                                      
                                        <td>
                                            <div>
                                                <a href="{{ route('edit-color', ['id' => $color->id]) }}">
                                                    <i class="ri-edit-box-fill text-warning"></i>
                                                </a>
                                                <a href="{{ route('delete-color', ['id' => $color->id]) }}">
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
