<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>

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
                            <div class="col-lg-6 p-5 right">
                                <h3 class="mb-4 text-center">Forgot Password</h3>

                                <form method="post" action="{{ route('forgot_password_action') }}">
                                    @csrf
                                    <div class="form-outline mb-3">
                                        <label class="form-label" for="forgotEmail">Enter your email address</label>
                                        <input type="email" id="forgotEmail" class="form-control form-control-lg"  value="{{ old('email') }}"
                                            name="email" placeholder="Enter a valid email address" />
                                        @error('email')
                                            <!-- Display error message for 'email' -->
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-danger btn-lg w-100">Send Reset
                                            Link</button>
                                    </div>

                                    <div class="text-center mt-3">
                                        <p class="mb-0">Remembered your password?
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
                    email: {
                        required: true,
                        email: true
                    }
                },
                messages: {
                    email: {
                        required: "Please enter your email address",
                        email: "Please enter a valid email address"
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
