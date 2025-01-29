@extends('admin.master')

@section('css')
    <style>

    </style>
@endsection

@section('content')
    <div class="pagetitle">
        <h1>States Table</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL::to('/') }}/admin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ URL::to('/') }}/admin/states">Cities</a></li>

            </ol>
        </nav>
    </div><!-- End Page Title -->


    {{-- TODO:  MORE Detail IN MODAL  QUANTITY  DETAIL ADDTIONAL INFO.. --}}


    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">State</h5>
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-primary " href="{{ URL::to('/') }}/admin/state/add">+ Add State</a>
                        </div>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>State ID</th>
                                    <th>State Name</th>
                                    <th>State Code</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stateData as $index => $state)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $state->state }}</td>
                                        <td>{{ $state->codeState }}</td>
                                        <td>
                                            <label class="toggle-switch">
                                                <input type="checkbox" class="toggle-status" data-id="{{ $state->id }}"
                                                    {{ $state->status === 'active' ? 'checked' : '' }}>
                                                <span class="slider"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <div>
                                              <a href="{{ route('edit-state', ['id' => $state->id ]) }}">
                                                <i class="ri-edit-box-fill text-warning"></i>
                                              </a>
                                              <a href="{{ route('delete-state', ['id' => $state->id ]) }}">
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
            var stateId = $(this).data('id');
            
            $.ajax({
                url: '{{ route('toggleStateStatus') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: stateId
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
