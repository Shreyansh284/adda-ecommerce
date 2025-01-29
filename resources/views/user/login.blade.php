@extends('user.master')
@section('content')
    <!--====== Section 1 ======-->
    <div class="u-s-p-y-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="breadcrumb">
                    <div class="breadcrumb__wrap">
                        <ul class="breadcrumb__list">
                            <li class="has-separator">

                                <a href="index.html">Home</a>
                            </li>
                            <li class="is-marked">

                                <a href="signin.html">Signin</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section 1 ======-->


    <!--====== Section 2 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Intro ======-->
        <div class="section__intro u-s-m-b-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__text-wrap">
                            <h1 class="section__heading u-c-secondary">ALREADY REGISTERED?</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Intro ======-->


        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row row--center">
                    <div class="col-lg-6 col-md-8 u-s-m-b-30">
                        <div class="l-f-o">
                            <div class="l-f-o__pad-box">
                                <h1 class="gl-h1">I'M NEW CUSTOMER</h1>

                                <span class="gl-text u-s-m-b-30">By creating an account with our store, you will be able to
                                    move through the checkout process faster, store shipping addresses, view and track your
                                    orders in your account and more.</span>
                                <div class="u-s-m-b-15">

                                    <a class="l-f-o__create-link btn--e-transparent-brand-b-2"
                                        href="{{ route('registration') }}">CREATE AN ACCOUNT</a>
                                </div>
                                <h1 class="gl-h1">SIGNIN</h1>

                                <form class="l-f-o__form" id="loginForm" method="POST" action="{{ route('login_action') }}">
                                    @csrf
                                
                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="login-email">E-MAIL *</label>
                                        <input class="input-text input-text--primary-style" type="email" id="login-email" name="email" 
                                               placeholder="Enter E-mail" value="{{ old('email') }}">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                
                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="login-password">PASSWORD *</label>
                                        <input class="input-text input-text--primary-style" type="password" id="login-password" 
                                               name="password" placeholder="Enter Password">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                
                                    <div class="gl-inline">
                                        <div class="u-s-m-b-30">
                                            <button class="btn btn--e-transparent-brand-b-2" type="submit">LOGIN</button>
                                        </div>
                                        <div class="u-s-m-b-30">
                                            <a class="gl-link" href="{{ route('forgot_password') }}">Lost Your Password?</a>
                                        </div>
                                    </div>
                                
                                    <div class="u-s-m-b-30">
                                        <div class="check-box">
                                            <input type="checkbox" id="remember-me" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <div class="check-box__state check-box__state--primary">
                                                <label class="check-box__label" for="remember-me">Remember Me</label>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                
                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 2 ======-->
@endsection


@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#loginForm').validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 6
                    }
                },
                messages: {
                    email: {
                        required: "Please enter your email.",
                        email: "Please enter a valid email address."
                    },
                    password: {
                        required: "Please enter your password.",
                        minlength: "Password must be at least 6 characters long."
                    }
                },
                errorClass: "text-danger",
                errorElement: "span"
            });
        });
    </script>
@endsection
