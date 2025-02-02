@extends('user.master')
@section('content')
    <!--====== Primary Slider ======-->
    <div class="s-skeleton s-skeleton--h-600 s-skeleton--bg-grey">
        <div class="owl-carousel primary-style-1" id="hero-slider">
            @foreach ($sliders as $slider)
                <div class="hero-slide" style="background-image: url('{{ $slider->image }}');">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                {{-- <div class="slider-content slider-content--animation">

                                <span class="content-span-1 u-c-secondary">Latest Update Stock</span>

                                <span class="content-span-2 u-c-secondary">30% Off On Electronics</span>

                                <span class="content-span-3 u-c-secondary">Find electronics on best prices, Also Discover
                                    most selling products of electronics</span>
                                    
                                    <span class="content-span-4 u-c-secondary">Starting At

                                    <span class="u-c-brand">$1050.00</span></span>

                                <a class="shop-now-link btn--e-brand" href="shop-side-version-2.html">SHOP NOW</a>
                            </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- <div class="hero-slide hero-slide--2">
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
            </div> --}}
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
                                    data-filter=".newarrival">New Arrivals</button>
                            </div>

                            <div class="filter__category-wrapper">

                                <button class="btn filter__btn filter__btn--style-1" type="button"
                                    data-filter=".discount">Top Discounts</button>
                            </div>
                    
                        </div>
                        <div class="filter__grid-wrapper u-s-m-t-30">
                            <div class="row">
        
                                    @foreach ($newArrivals as $product)
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item newarrival">
                                        <div class="product-o product-o--hover-on product-o--radius">
                                            <div class="product-o__wrap">
                                                <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                                href="{{ route('product.detail', $product->id) }}">

                                                <img class="aspect__img"
                                                    src="{{ asset($product->images->first()->image) }}" alt=""></a>
                                           
                                            </div>

                                            <span class="product-o__category">

                                                <a>{{ $product->category->categoryName }}</a></span>

                                            <span class="product-o__name">
                                                <a
                                                href="{{ route('product.detail', $product->id) }}">{{ $product->productName }}
                                            </a></span>
                                            <div class="product-o__rating gl-rating-style">
                                                @for ($i = 0; $i < 5; $i++)
                                                <!-- Check for fractional star -->
                                                @if ($i < floor($product->ratings->avg('rating')))
                                                    <i class="fas fa-star"></i>
                                                @elseif (
                                                    $i == floor($product->ratings->avg('rating')) &&
                                                        $product->ratings->avg('rating') - floor($product->ratings->avg('rating')) >= 0.5)
                                                    <i class="fas fa-star-half-alt"></i>
                                                @else
                                                    <i class="far fa-star"></i>
                                                @endif
                                            @endfor

                                                <span class="product-o__review">{{$product->ratings->count()}}</span>
                                            </div>

                                            <span
                                            class="product-m__price">₹{{ number_format($product->price - ($product->price * $product->discount) / 100, 2) }}</span>

                                        @if ($product->discount)
                                            <span class="product-m__price">
                                                ({{ $product->discount }}% OFF)
                                            </span>
                                            <del
                                                class="pd-detail__del">₹{{ number_format($product->price, 2) }}</del>
                                        @endif
                                                @php
                                                $isInWishlist = \App\Models\Wishlist::where(
                                                    'userId',
                                                    auth()->id(),
                                                )
                                                    ->where('productId', $product->id)
                                                    ->first();
                                            @endphp

                                            <div class="product-m__wishlist">
                                                @if ($isInWishlist != null)
                                                    <a class="fas fa-heart"
                                                        href="{{ URL::to('/') }}/wishlist/remove/{{ $isInWishlist->id }}"
                                                        data-tooltip="tooltip" data-placement="top"
                                                        title="Added to Wishlist"
                                                        style="color: rgb(189, 17, 57);"></a>
                                                @else
                                                    <a class="far fa-heart"
                                                        href="{{ URL::to('/') }}/wishlist/add/{{ $product->id }}"
                                                        data-tooltip="tooltip" data-placement="top"
                                                        title="Add to Wishlist"></a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                        @endforeach
                                     
                                @foreach ($topDiscount as $product)
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item discount">
                                        <div class="product-o product-o--hover-on product-o--radius">
                                            <div class="product-o__wrap">
                                                <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                                href="{{ route('product.detail', $product->id) }}">

                                                <img class="aspect__img"
                                                    src="{{ asset($product->images->first()->image) }}" alt=""></a>
                                           
                                            </div>

                                            <span class="product-o__category">

                                                <a>{{ $product->category->categoryName }}</a></span>

                                            <span class="product-o__name">
                                                <a
                                                href="{{ route('product.detail', $product->id) }}">{{ $product->productName }}
                                            </a></span>
                                            <div class="product-o__rating gl-rating-style">
                                                @for ($i = 0; $i < 5; $i++)
                                                <!-- Check for fractional star -->
                                                @if ($i < floor($product->ratings->avg('rating')))
                                                    <i class="fas fa-star"></i>
                                                @elseif (
                                                    $i == floor($product->ratings->avg('rating')) &&
                                                        $product->ratings->avg('rating') - floor($product->ratings->avg('rating')) >= 0.5)
                                                    <i class="fas fa-star-half-alt"></i>
                                                @else
                                                    <i class="far fa-star"></i>
                                                @endif
                                            @endfor

                                                <span class="product-o__review">{{$product->ratings->count()}}</span>
                                            </div>

                                            <span
                                            class="product-m__price">₹{{ number_format($product->price - ($product->price * $product->discount) / 100, 2) }}</span>

                                        @if ($product->discount)
                                            <span class="product-m__price">
                                                ({{ $product->discount }}% OFF)
                                            </span>
                                            <del
                                                class="pd-detail__del">₹{{ number_format($product->price, 2) }}</del>
                                        @endif
                                                @php
                                                $isInWishlist = \App\Models\Wishlist::where(
                                                    'userId',
                                                    auth()->id(),
                                                )
                                                    ->where('productId', $product->id)
                                                    ->first();
                                            @endphp

                                            <div class="product-m__wishlist">
                                                @if ($isInWishlist != null)
                                                    <a class="fas fa-heart"
                                                        href="{{ URL::to('/') }}/wishlist/remove/{{ $isInWishlist->id }}"
                                                        data-tooltip="tooltip" data-placement="top"
                                                        title="Added to Wishlist"
                                                        style="color: rgb(189, 17, 57);"></a>
                                                @else
                                                    <a class="far fa-heart"
                                                        href="{{ URL::to('/') }}/wishlist/add/{{ $product->id }}"
                                                        data-tooltip="tooltip" data-placement="top"
                                                        title="Add to Wishlist"></a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                  
                    </div>

                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 2 ======-->
@endsection
