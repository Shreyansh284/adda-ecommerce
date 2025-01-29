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

                                <a href="signup.html">Signup</a>
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
                            <h1 class="section__heading u-c-secondary">CREATE AN ACCOUNT</h1>
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
                                <h1 class="gl-h1">PERSONAL INFORMATION</h1>
                                <form class="l-f-o__form" id="userRegistrationForm" method="POST" action="{{ route('registration_action') }}">
                                    @csrf
                                
                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="first_name">FIRST NAME *</label>
                                        <input class="input-text input-text--primary-style" type="text" name="first_name" id="first_name" placeholder="First Name">
                                        @error('first_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                
                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="mobile_number">MOBILE NUMBER *</label>
                                        <input class="input-text input-text--primary-style" type="text" name="mobile_number" id="mobile_number" placeholder="Mobile Number">
                                        @error('mobile_number')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                
                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="email">E-MAIL *</label>
                                        <input class="input-text input-text--primary-style" type="email" name="email" id="email" placeholder="Enter E-mail">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                
                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="password">PASSWORD *</label>
                                        <input class="input-text input-text--primary-style" type="password" name="password" id="password" placeholder="Enter Password">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                
                                    <div class="u-s-m-b-15">
                                        <button class="btn btn--e-transparent-brand-b-2" type="submit">CREATE</button>
                                    </div>
                                
                                    <a class="gl-link" href="{{ URL::to('/') }}">Return to Store</a>
                                </form>
                                
                                @if(session('success'))
                                    <div class="text-success">{{ session('success') }}</div>
                                @endif
                                


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

