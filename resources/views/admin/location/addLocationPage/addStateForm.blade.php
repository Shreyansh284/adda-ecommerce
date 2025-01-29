@extends('admin.master')
@section('content')
    <div class="pagetitle">
        <h1>Add State</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL::to('/') }}/admin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ URL::to('/') }}/admin/state/add">Add State</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center mb-4">Add State</h4>
                        <form id="stateForm" action="{{ route('store-state') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="mb-3 col-6">
                                    <label for="stateName" class="form-label">State Name</label>
                                    <input type="text" name="stateName" id="stateName" class="form-control"
                                        placeholder="Enter state name">
                                    <span class="text-danger" id="stateNameError"></span>
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="stateCode" class="form-label">State Code</label>
                                    <input type="text" name="stateCode" id="stateCode" class="form-control"
                                        placeholder="Enter state code">
                                    <span class="text-danger" id="stateCodeError"></span>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">+ Add State </button>
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
         $(document).ready(function () {
        $("#stateForm").on("submit", function (e) {
            let stateName = $("#stateName").val().trim();
            let stateCode = $("#stateCode").val().trim().toUpperCase();
            let isValid = true;

            $("#stateNameError").text("");
            $("#stateCodeError").text("");

            // State Name Validation
            if (stateName === "") {
                $("#stateNameError").text("State name is required.");
                isValid = false;
            } else if (stateName.length < 3) {
                $("#stateNameError").text("State name must be at least 3 characters.");
                isValid = false;
            }

            // State Code Validation (exactly 2 alphabetic characters)
            if (stateCode === "") {
                $("#stateCodeError").text("State code is required.");
                isValid = false;
            } else if (!/^[A-Za-z]{2}$/.test(stateCode)) {
                $("#stateCodeError").text("State code must be exactly 2 alphabetic characters.");
                isValid = false;
            } else {
                $("#stateCode").val(stateCode); // Convert to uppercase
            }

            if (!isValid) {
                e.preventDefault();
            }
        });
    });
    </script>
@endsection
