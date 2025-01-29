@extends('admin.master')
@section('content')
    <div class="pagetitle">
        <h1>Add Color</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL::to('/') }}/admin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ URL::to('/') }}/admin/category/add">Add Color</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center mb-4">Add Color</h4>
                        <form id="colorForm" action="{{ route('store-color') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row">

                                <!-- Color Name Input -->
                                <div class="mb-3 col-6">
                                    <label for="colorName" class="form-label">Color Name</label>
                                    <input type="text" name="colorName" id="colorName" class="form-control"
                                        placeholder="Enter color name">
                                    <span class="text-danger" id="colorNameError"></span>
                                </div>

                                <!-- Color Picker Input -->
                                <div class="mb-3 col-6">
                                    <label for="colorCode" class="form-label">Select Color</label>
                                    <input type="color" name="colorCode" id="colorCode"
                                        class="form-control form-control-color">
                                    <span class="text-danger" id="colorCodeError"></span>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">+ Add Color</button>
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
            $('#colorForm').submit(function(e) {
                let isValid = true;
                let colorName = $('#colorName').val().trim();
                let colorCode = $('#colorCode').val();

                // Clear previous errors
                $('#colorNameError').text('');
                $('#colorCodeError').text('');

                // Color Name Validation
                if (colorName === '') {
                    $('#colorNameError').text('Color name is required.');
                    isValid = false;
                }

                // Color Code Validation
                if (colorCode === '' || !/^#[0-9A-Fa-f]{6}$/.test(colorCode)) {
                    $('#colorCodeError').text('Please select a valid color.');
                    isValid = false;
                }

                if (!isValid) {
                    e.preventDefault();
                }
            });
        });
    </script>
@endsection
