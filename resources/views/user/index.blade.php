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
                                    data-filter="*" data-target="trending">Trending</button>
                            </div>
                            <div class="filter__category-wrapper">

                                <button class="btn filter__btn filter__btn--style-1" type="button" data-filter=""
                                    data-target="new-arrivals">New Arrivals</button>
                            </div>

                        </div>
                        <div class="filter__grid-wrapper u-s-m-t-30">
                            <div class="row" >
                                @foreach ($newArrivals as $product)
                                    <div id="trending"
                                        class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item filter-content ">
                                        <div class="product-o product-o--hover-on product-o--radius">
                                            <div class="product-o__wrap">

                                                <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                                    href="{{ route('product.detail', $product->id) }}">

                                                    <img class="aspect__img"
                                                        src="{{ asset($product->images->first()->image) }}"
                                                        alt=""></a>
                                                <div class="product-o__action-wrap">
                                                    <ul class="product-o__action-list">

                                                        <li>
                                                            <form id="cart-form-{{ $product->id }}" class="pd-detail__form"
                                                                method="POST" action="{{ route('cart.add') }}">
                                                                @csrf
                                                                <input type="hidden" name="product_id"
                                                                    value="{{ $product->id }}">
                                                                <input type="hidden" name="quantity" value="1">
                                                            </form>
                                                            <a href="#"
                                                                onclick="event.preventDefault(); document.getElementById('cart-form-{{ $product->id }}').submit();">
                                                                <i class="fas fa-plus-circle"></i>
                                                            </a>
                                                        </li>

                                                        <li>

                                                            <a href="{{ URL::to('/') }}/wishlist/add/{{ $product->id }}"><i
                                                                    class="fas fa-heart"></i></a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>

                                            <span class="product-o__category">

                                                <a
                                                    href="{{ route('product.detail', $product->id) }}">{{ $product->category->categoryName }}</a></span>

                                            <span class="product-o__name">

                                                <a
                                                    href="{{ route('product.detail', $product->id) }}">{{ $product->productName }}</a></span>
                                            <div class="product-o__rating gl-rating-style"><i>
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

                                                    <span class="product-o__review">{{ $product->ratings->count() }}
                                                        Reviews</span>
                                            </div>

                                            <span
                                                class="product-o__price">₹{{ number_format($product->price - ($product->price * $product->discount) / 100, 2) }}

                                                @if ($product->discount)
                                                    <span class="product-m__price">
                                                        ({{ $product->discount }}% OFF)
                                                    </span>
                                                    <del
                                                        class="pd-detail__del">₹{{ number_format($product->price, 2) }}</del>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row"  >
                                @foreach ($newArrivals as $product)
                                    <div id="new-arrivals" class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item filter-content "
                                        style="display: none">
                                        <div class="product-o product-o--hover-on product-o--radius">
                                            <div class="product-o__wrap">

                                                <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                                    href="{{ route('product.detail', $product->id) }}">

                                                    <img class="aspect__img"
                                                        src="{{ asset($product->images->first()->image) }}"
                                                        alt=""></a>
                                                <div class="product-o__action-wrap">
                                                    <ul class="product-o__action-list">

                                                        <li>
                                                            <form id="cart-form-{{ $product->id }}"
                                                                class="pd-detail__form" method="POST"
                                                                action="{{ route('cart.add') }}">
                                                                @csrf
                                                                <input type="hidden" name="product_id"
                                                                    value="{{ $product->id }}">
                                                                <input type="hidden" name="quantity" value="1">
                                                            </form>
                                                            <a href="#"
                                                                onclick="event.preventDefault(); document.getElementById('cart-form-{{ $product->id }}').submit();">
                                                                <i class="fas fa-plus-circle"></i>
                                                            </a>
                                                        </li>

                                                        <li>

                                                            <a
                                                                href="{{ URL::to('/') }}/wishlist/add/{{ $product->id }}"><i
                                                                    class="fas fa-heart"></i></a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>

                                            <span class="product-o__category">

                                                <a
                                                    href="{{ route('product.detail', $product->id) }}">{{ $product->category->categoryName }}</a></span>

                                            <span class="product-o__name">

                                                <a
                                                    href="{{ route('product.detail', $product->id) }}">{{ $product->productName }}</a></span>
                                            <div class="product-o__rating gl-rating-style"><i>
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

                                                    <span class="product-o__review">{{ $product->ratings->count() }}
                                                        Reviews</span>
                                            </div>

                                            <span
                                                class="product-o__price">₹{{ number_format($product->price - ($product->price * $product->discount) / 100, 2) }}

                                                @if ($product->discount)
                                                    <span class="product-m__price">
                                                        ({{ $product->discount }}% OFF)
                                                    </span>
                                                    <del
                                                        class="pd-detail__del">₹{{ number_format($product->price, 2) }}</del>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
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
    <script>
        document.querySelectorAll('.filter__btn').forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                alert(targetId);
                // Hide all sections
                document.querySelectorAll('.filter-content').forEach(section => {
                    section.style.display = 'none';
                });

                // Show the selected section
                document.getElementById(targetId).style.display = 'block';
            });
        });
    </script>
@endsection
