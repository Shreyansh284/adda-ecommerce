@extends('admin.master')
@section('content')
    <div class="pagetitle">
        <h1>Add City</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL::to('/') }}/admin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ URL::to('/') }}/admin/state/add">Add City</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center mb-4">Add City</h4>
                        <form id="cityForm" action="{{ route('store-city') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- State Dropdown -->
                                <div class="mb-3 col-6">
                                    <label for="stateId" class="form-label">Select State</label>
                                    <select name="stateId" id="stateId" class="form-control">
                                        <option value="">-- Select State --</option>
                                        @forelse ($states as $state)
                                            <option value="{{ $state->id }}">{{ $state->state }}</option>
                                        @empty
                                            <option value="" disabled>No states available</option>
                                        @endforelse
                                    </select>

                                    <span class="text-danger" id="stateIdError"></span>
                                </div>

                                <!-- City Name -->
                                <div class="mb-3 col-6">
                                    <label for="cityName" class="form-label">City Name</label>
                                    <input type="text" name="cityName" id="cityName" class="form-control"
                                        placeholder="Enter city name">
                                    <span class="text-danger" id="cityNameError"></span>
                                </div>

                                <!-- Pincode -->
                                <div class="mb-3 col-6">
                                    <label for="pincode" class="form-label">Pincode</label>
                                    <input type="text" name="pincode" id="pincode" class="form-control"
                                        placeholder="Enter pincode" >
                                    <span class="text-danger" id="pincodeError"></span>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">+ Add City</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#cityForm').submit(function(e) {
                let isValid = true;

                // Validate state selection
                if ($('#stateId').val().trim() === '') {
                    $('#stateIdError').text('Please select a state.');
                    isValid = false;
                } else {
                    $('#stateIdError').text('');
                }

                // Validate city name
                if ($('#cityName').val().trim() === '') {
                    $('#cityNameError').text('City name is required.');
                    isValid = false;
                } else {
                    $('#cityNameError').text('');
                }

                // Validate pincode (only 6-digit numbers)
                let pincode = $('#pincode').val().trim();
                let pincodePattern = /^[0-9]{6}$/; // 6 digits only

                if (pincode === '') {
                    $('#pincodeError').text('Pincode is required.');
                    isValid = false;
                } else if (!pincodePattern.test(pincode)) {
                    $('#pincodeError').text('Pincode must be exactly 6 digits.');
                    isValid = false;
                } else {
                    $('#pincodeError').text('');
                }

                // Prevent form submission if validation fails
                if (!isValid) {
                    e.preventDefault();
                }
            });
        });
    </script>
@endsection
