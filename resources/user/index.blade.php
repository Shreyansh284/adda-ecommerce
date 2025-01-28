@extends('user.master')
@section('content')
    <!--====== Primary Slider ======-->
    <div class="s-skeleton s-skeleton--h-600 s-skeleton--bg-grey">
        <div class="owl-carousel primary-style-1" id="hero-slider">
            <div class="hero-slide hero-slide--1">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider-content slider-content--animation">

                                <span class="content-span-1 u-c-secondary">Latest Update Stock</span>

                                <span class="content-span-2 u-c-secondary">30% Off On Electronics</span>

                                <span class="content-span-3 u-c-secondary">Find electronics on best prices, Also Discover
                                    most selling products of electronics</span>

                                <span class="content-span-4 u-c-secondary">Starting At

                                    <span class="u-c-brand">$1050.00</span></span>

                                <a class="shop-now-link btn--e-brand" href="shop-side-version-2.html">SHOP NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-slide hero-slide--2">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider-content slider-content--animation">

                                <span class="content-span-1 u-c-white">Find Top Brands</span>

                                <span class="content-span-2 u-c-white">10% Off On Electronics</span>

                                <span class="content-span-3 u-c-white">Find electronics on best prices, Also Discover most
                                    selling products of electronics</span>

                                <span class="content-span-4 u-c-white">Starting At

                                    <span class="u-c-brand">$380.00</span></span>

                                <a class="shop-now-link btn--e-brand" href="shop-side-version-2.html">SHOP NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-slide hero-slide--3">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider-content slider-content--animation">

                                <span class="content-span-1 u-c-secondary">Find Top Brands</span>

                                <span class="content-span-2 u-c-secondary">10% Off On Electronics</span>

                                <span class="content-span-3 u-c-secondary">Find electronics on best prices, Also Discover
                                    most selling products of electronics</span>

                                <span class="content-span-4 u-c-secondary">Starting At

                                    <span class="u-c-brand">$550.00</span></span>

                                <a class="shop-now-link btn--e-brand" href="shop-side-version-2.html">SHOP NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Primary Slider ======-->

    <!--====== Section 2 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Intro ======-->
        <div class="section__intro u-s-m-b-16 ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__text-wrap">
                            <h1 class="section__heading u-c-secondary u-s-m-b-12 ">PRODUCTS IN HIKE</h1>

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
                    <div class="col-lg-12">
                        <div class="filter-category-container">
                            <div class="filter__category-wrapper">

                                <button class="btn filter__btn filter__btn--style-1 js-checked" type="button"
                                    data-filter="*">Trending</button>
                            </div>
                            <div class="filter__category-wrapper">

                                <button class="btn filter__btn filter__btn--style-1" type="button"
                                    data-filter=".headphone">New Arrivals</button>
                            </div>

                        </div>
                        <div class="filter__grid-wrapper u-s-m-t-30">
                            <div class="row">
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item headphone">
                                    <div class="product-o product-o--hover-on product-o--radius">
                                        <div class="product-o__wrap">

                                            <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                                href="product-detail.html">

                                                <img class="aspect__img" src="images/product/electronic/product2.jpg"
                                                    alt=""></a>
                                            <div class="product-o__action-wrap">
                                                <ul class="product-o__action-list">
                                                    <li>

                                                        <a data-modal="modal" data-modal-id="#quick-look"
                                                            data-tooltip="tooltip" data-placement="top"
                                                            title="Quick View"><i class="fas fa-search-plus"></i></a>
                                                    </li>
                                                    <li>

                                                        <a data-modal="modal" data-modal-id="#add-to-cart"
                                                            data-tooltip="tooltip" data-placement="top"
                                                            title="Add to Cart"><i class="fas fa-plus-circle"></i></a>
                                                    </li>
                                                    <li>

                                                        <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                            title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                                    </li>
                                                    <li>

                                                        <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                            title="Email me When the price drops"><i
                                                                class="fas fa-envelope"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <span class="product-o__category">

                                            <a href="shop-side-version-2.html">Electronics</a></span>

                                        <span class="product-o__name">

                                            <a href="product-detail.html">Red Wireless Headphone</a></span>
                                        <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

                                            <span class="product-o__review">(23)</span>
                                        </div>

                                        <span class="product-o__price">$125.00

                                            <span class="product-o__discount">$160.00</span></span>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item headphone">
                                    <div class="product-o product-o--hover-on product-o--radius">
                                        <div class="product-o__wrap">

                                            <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                                href="product-detail.html">

                                                <img class="aspect__img" src="images/product/electronic/product3.jpg"
                                                    alt=""></a>
                                            <div class="product-o__action-wrap">
                                                <ul class="product-o__action-list">
                                                    <li>

                                                        <a data-modal="modal" data-modal-id="#quick-look"
                                                            data-tooltip="tooltip" data-placement="top"
                                                            title="Quick View"><i class="fas fa-search-plus"></i></a>
                                                    </li>
                                                    <li>

                                                        <a data-modal="modal" data-modal-id="#add-to-cart"
                                                            data-tooltip="tooltip" data-placement="top"
                                                            title="Add to Cart"><i class="fas fa-plus-circle"></i></a>
                                                    </li>
                                                    <li>

                                                        <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                            title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                                    </li>
                                                    <li>

                                                        <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                            title="Email me When the price drops"><i
                                                                class="fas fa-envelope"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <span class="product-o__category">

                                            <a href="shop-side-version-2.html">Electronics</a></span>

                                        <span class="product-o__name">

                                            <a href="product-detail.html">Yellow Wireless Headphone</a></span>
                                        <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i><i class="fas fa-star-half-alt"></i><i
                                                class="far fa-star"></i><i class="far fa-star"></i>

                                            <span class="product-o__review">(23)</span>
                                        </div>

                                        <span class="product-o__price">$125.00

                                            <span class="product-o__discount">$160.00</span></span>
                                    </div>
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
@endsection
