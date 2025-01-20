<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::to('/') }}/user/css/login-register.css">

</head>

<body>
    <section class="vh-100 d-flex align-items-center justify-content-center">
        <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-12">
                    <div class="card card-custom overflow-hidden">
                        <div class="row g-0">
                            <div class="col-lg-6 image-container">
                                <img src="{{ URL::to('/') }}/user/img/login-register/Fashion-girl.jpg"
                                    class="img-fluid" alt="Fashion Girl">
                            </div>
                            <div class="col-lg-6 p-4">
                                <h3 class="text-center">Registration</h3>

                                <form method="post" action="{{ route('registration_action') }}">
                                    @csrf
                                    <div class="form-outline mb-1">
                                        <label class="form-label" for="form3Example1">Full Name</label>
                                        <input type="text" id="form3Example1" name="name" class="form-control"
                                            placeholder="Enter your full name" required/>
                                    </div>

                                    <div class="form-outline mb-1">
                                        <label class="form-label" for="form3Example2">Phone number</label>
                                        <input type="text" id="form3Example2" name="number" class="form-control"
                                            placeholder="Enter your Phone number" minlength="10" maxlength="10" required/>
                                    </div>

                                    <div class="form-outline mb-1">
                                        <label class="form-label" for="form3Example3">Email address</label>
                                        <input type="email" id="form3Example3" name="email" class="form-control"
                                            placeholder="Enter a valid email address" required />
                                    </div>

                                    <div class="form-outline mb-1">
                                        <label class="form-label" for="form3Example4">Password</label>
                                        <input type="password" id="form3Example4" name="pwd" class="form-control"
                                            placeholder="Enter password" required/>
                                    </div>

                                    <div class="divider d-flex align-items-center my-2">
                                        <p class="text-center fw-bold mx-3 mb-0">Or</p>
                                    </div>

                                    <div class="d-flex flex-row align-items-center justify-content-center mb-3">
                                        <p class="lead fw-normal mb-0 me-3">Sign up with</p>

                                        <button
                                            class="btn bg-danger btn-floating mx-1 align-items-center  justify-content-center">
                                            <img src="{{ URL::to('/') }}/user/img/login-register/google.svg"
                                                alt="" width="20px">
                                        </button>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-danger btn-lg w-100">Register</button>
                                        <p class="mt-3 mb-0">Already have an account?
                                            <a href="{{ route('login') }}" class="link-danger">Login</a>
                                        </p>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- jQuery Validation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $("form").validate({
                rules: {
                    name: {
                        required: true,
                    },
                    number: {
                        required: true,
                        digits: true, // Only digits allowed
                        minlength: 10, // Adjust the length as required
                        maxlength: 10 // Adjust the length as required
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    pwd: {
                        required: true,
                        minlength: 8
                    }
                },
                messages: {
                    name: {
                        required: "Please enter your full name",
                        minlength: "Your name must be at least 3 characters long"
                    },
                    number: {
                        required: "Please enter your phone number",
                        digits: "Please enter only digits",
                        minlength: "Phone number must be at least 10 digits",
                        maxlength: "Phone number cannot exceed 15 digits"
                    },
                    email: {
                        required: "Please enter your email address",
                        email: "Please enter a valid email address"
                    },
                    pwd: {
                        required: "Please enter a password",
                        minlength: "Password must be at least 8 characters"
                    }
                },
                errorPlacement: function(error, element) {
                    // Custom error placement: Show the error message inside the placeholder
                    element.attr("placeholder", error.text());
                },
                highlight: function(element) {
                    // Highlight the field if it's invalid
                    $(element).addClass("is-invalid");
                },
                unhighlight: function(element) {
                    // Remove the highlight if the field becomes valid
                    $(element).removeClass("is-invalid");
                }
            });
        });
    </script>

</body>

</html>
