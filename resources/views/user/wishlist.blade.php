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

                                <a href="wishlist.html">Wishlist</a>
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
                            @if (count($wishlists) == 0)
                                <h1 class="section__heading u-c-secondary">Wishlist Is Empty</h1>
                            @else
                                <h1 class="section__heading u-c-secondary">Wishlist</h1>
                            @endif

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
                    <div class="col-lg-12 col-md-12 col-sm-12">

                        <!--====== Wishlist Product ======-->
                        @foreach ($wishlists as $wishlist)
                            <div class="w-r u-s-m-b-30">
                                <div class="w-r__container">
                                    @foreach ($wishlist->products as $product)
                                        <div class="w-r__wrap-1">
                                            <div class="w-r__img-wrap">

                                                <img class="u-img-fluid" src="{{ asset($product->images->first()->image) }}"
                                                    alt="">

                                            </div>
                                            <div class="w-r__info">

                                                <span class="w-r__name">

                                                    <a href="product-detail.html">{{ $product->productName }}</a></span>

                                                <span class="w-r__category">

                                                    <a
                                                        href="shop-side-version-2.html">{{ $product->category->categoryName }}</a></span>

                                                <span class="w-r__price">{{ $product->price }}
                                                    {{-- <span class="w-r__discount">$160.00</span> --}}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="w-r__wrap-2">
                                            <form class="pd-detail__form" method="POST" action="{{ route('cart.add') }}">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="quantity" value="1">
                                                <div class="pd-detail-inline-2">
                                                    <div class="u-s-m-b-15">
                                                        <button type="submit" class="w-r__link btn--e-brand-b-2">Add to Cart</button>
                                                    </div>
                                                </div>
                                            </form>
                                            {{-- <a class="w-r__link btn--e-brand-b-2" href="{{route('cart.add')}}">ADD TO CART</a> --}}

                                            <a class="w-r__link btn--e-transparent-platinum-b-2"
                                                href="{{route('product.detail',$product->id)}}">VIEW</a>

                                            <a class="w-r__link btn--e-transparent-platinum-b-2"
                                                href="{{ URL::to('/') }}/wishlist/remove/{{ $wishlist->id }}">REMOVE</a>
                                        </div>
                                </div>
                            </div>
                        @endforeach
                        @endforeach
                        <!--====== End - Wishlist Product ======-->


                        {{-- <!--====== Wishlist Product ======-->
                                <div class="w-r u-s-m-b-30">
                                    <div class="w-r__container">
                                        <div class="w-r__wrap-1">
                                            <div class="w-r__img-wrap">

                                                <img class="u-img-fluid" src="images/product/women/product8.jpg" alt=""></div>
                                            <div class="w-r__info">

                                                <span class="w-r__name">

                                                    <a href="product-detail.html">New Dress D Nice Elegant</a></span>

                                                <span class="w-r__category">

                                                    <a href="shop-side-version-2.html">Women Clothing</a></span>

                                                <span class="w-r__price">$125.00

                                                    <span class="w-r__discount">$160.00</span></span></div>
                                        </div>
                                        <div class="w-r__wrap-2">

                                            <a class="w-r__link btn--e-brand-b-2" data-modal="modal" data-modal-id="#add-to-cart">ADD TO CART</a>

                                            <a class="w-r__link btn--e-transparent-platinum-b-2" href="product-detail.html">VIEW</a>

                                            <a class="w-r__link btn--e-transparent-platinum-b-2" href="#">REMOVE</a></div>
                                    </div>
                                </div>
                                <!--====== End - Wishlist Product ======-->


                                <!--====== Wishlist Product ======-->
                                <div class="w-r u-s-m-b-30">
                                    <div class="w-r__container">
                                        <div class="w-r__wrap-1">
                                            <div class="w-r__img-wrap">

                                                <img class="u-img-fluid" src="images/product/men/product8.jpg" alt=""></div>
                                            <div class="w-r__info">

                                                <span class="w-r__name">

                                                    <a href="product-detail.html">New Fashion D Nice Elegant</a></span>

                                                <span class="w-r__category">

                                                    <a href="shop-side-version-2.html">Men Clothing</a></span>

                                                <span class="w-r__price">$125.00

                                                    <span class="w-r__discount">$160.00</span></span></div>
                                        </div>
                                        <div class="w-r__wrap-2">

                                            <a class="w-r__link btn--e-brand-b-2" data-modal="modal" data-modal-id="#add-to-cart">ADD TO CART</a>

                                            <a class="w-r__link btn--e-transparent-platinum-b-2" href="product-detail.html">VIEW</a>

                                            <a class="w-r__link btn--e-transparent-platinum-b-2" href="#">REMOVE</a></div>
                                    </div>
                                </div> --}}
                        <!--====== End - Wishlist Product ======-->
                    </div>
                    <div class="col-lg-12">
                        <div class="route-box">
                            <div class="route-box__g">

                                <a class="route-box__link" href="{{ URL::to('/') }}/shop"><i
                                        class="fas fa-long-arrow-alt-left"></i>

                                    <span>CONTINUE SHOPPING</span></a>
                            </div>
                            <div class="route-box__g">

                                <a class="route-box__link" href="{{ URL::to('/') }}/wishlist/clear">
                                    <i class="fas fa-trash"></i>
                                    <span>CLEAR WISHLIST</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
@endsection
