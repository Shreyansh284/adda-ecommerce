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

                                        <a href="{{ URL::to('/') }}">Home</a></li>
                                    <li class="is-marked">

                                        <a href="{{ URL::to('/') }}/about">About</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section 1 ======-->


            <!--====== Section 2 ======-->
            <div class="u-s-p-b-60">

                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="about">
                                    <div class="about__container">
                                        <div class="about__info">
                                            <h2 class="about__h2">Welcome to Reshop Store!</h2>
                                            <div class="about__p-wrap">
                                                <p class="about__p">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                            </div>

                                            <a class="about__link btn--e-secondary" href="{{ URL::to('/') }}/shop" target="_blank">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Content ======-->
            </div>
            <!--====== End - Section 2 ======-->


            <!--====== Section 3 ======-->
            <div class="u-s-p-b-60">

                <!--====== Section Intro ======-->
                <div class="section__intro u-s-m-b-46">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section__text-wrap">
                                    <h1 class="section__heading u-c-secondary">Our Team Members</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Intro ======-->


                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="row">
                            @foreach ($abouts as $about )
                                
                          
                            <div class="col-lg-3 col-md-4 col-sm-6 u-s-m-b-30">
                                <div class="team-member u-h-100">
                                    <div class="team-member__wrap">
                                        <div class="aspect aspect--bg-grey-fb aspect--square">

                                            <img class="aspect__img team-member__img" src="{{asset($about->image)}}" alt=""></div>
                                        {{-- <div class="team-member__social-wrap">
                                            <ul class="team-member__social-list">
                                                <li>

                                                    <a class="s-tw--bgcolor-hover" href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li>

                                                    <a class="s-fb--bgcolor-hover" href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li>

                                                    <a class="s-insta--bgcolor-hover" href="#"><i class="fab fa-instagram"></i></a></li>
                                                <li>

                                                    <a class="s-linked--bgcolor-hover" href="#"><i class="fab fa-linkedin"></i></a></li>
                                            </ul>
                                        </div> --}}
                                    </div>
                                    <div class="team-member__info">

                                        <span class="team-member__name">{{$about->member_name}}</span>

                                        <span class="team-member__job-title">{{$about->member_role}}</span></div>
                                </div>
                            </div>
                            @endforeach
                          </div>
                    </div>
                </div>
                <!--====== End - Section Content ======-->
            </div>
            <!--====== End - Section 3 ======-->
@endsection