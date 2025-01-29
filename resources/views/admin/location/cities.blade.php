@extends('admin.master')
@section('content')
    <div class="pagetitle">
        <h1>City Table</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL::to('/') }}/admin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ URL::to('/') }}/admin/cities">Cities</a></li>

            </ol>
        </nav>
    </div><!-- End Page Title -->


    {{-- TODO:  MORE Detail IN MODAL  QUANTITY  DETAIL ADDTIONAL INFO.. --}}


    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cities</h5>
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-primary " href="{{ URL::to('/') }}/admin/city/add">+ Add City</a>
                        </div>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>City ID</th>
                                    <th>City Name</th>
                                    <th>Pincode</th>
                                    <th>State Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cityData as $index => $city)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $city->city }}</td>
                                        <td>{{ $city->pincode }}</td>
                                        <td>{{ $city->state->state }}</td>
                                        <td>
                                            <label class="toggle-switch">
                                                <input type="checkbox" class="toggle-status" data-id="{{ $city->id }}"
                                                    {{ $city->status === 'active' ? 'checked' : '' }}>
                                                <span class="slider"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <div>
                                                <a href="{{ route('edit-city', ['id' => $city->id]) }}">
                                                    <i class="ri-edit-box-fill text-warning"></i>
                                                </a>
                                                <a href="{{ route('delete-city', ['id' => $city->id]) }}">
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

@section('script')
    <script>
        $(document).on('change', '.toggle-status', function() {
            var cityId = $(this).data('id');
            console.log(cityId);

            $.ajax({
                url: '{{ route('toggleCityStatus') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: cityId
                },
                success: function(response) {
                    // window.location.reload();
                },
                error: function(xhr) {
                    alert('Error updating status. Please try again.');
                }
            });
        });
    </script>
@endsection
