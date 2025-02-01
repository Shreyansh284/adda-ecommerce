@extends('user.master')
@section('content')
    <style>
        /* Hide default radio */
        input[type="radio"] {
            display: none;
        }

        /* Custom radio styling */
        .custom-radio {
            display: inline-block;
            width: 25px;
            height: 25px;
            background-color: lightgray;
            border-radius: 50%;
            cursor: pointer;
            transition: 0.2s;
            position: relative;
        }

        /* Selected state */
        input[type="radio"]:checked+.custom-radio {
            background-color: gold;
            border: 2px solid #ffcc00;
        }

        /* Add a checkmark when selected */
        input[type="radio"]:checked+.custom-radio::after {
            content: '★';
            font-size: 20px;
            color: white;
            position: absolute;
            top: 2px;
            left: 5px;
        }
    </style>

    <div class="u-s-p-t-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="pd u-s-m-b-30">
                        <div class="slider-fouc pd-wrap">
                            <div id="pd-o-initiate">
                                @foreach ($product->images as $image)
                                    <div class="pd-o-img-wrap" data-src="{{ asset($image->image) }}">
                                        <img class="u-img-fluid" src="{{ asset($image->image) }}"
                                            data-zoom-image="{{ asset($image->image) }}" alt="Product Image">
                                    </div>
                                @endforeach
                            </div>
                            <span class="pd-text">Click for larger zoom</span>
                        </div>
                        <div class="u-s-m-t-15">
                            <div class="slider-fouc">
                                <div id="pd-o-thumbnail">
                                    @foreach ($product->images as $image)
                                        <div>
                                            <img class="u-img-fluid" src="{{ asset($image->image) }}" alt="Thumbnail">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="pd-detail">
                        <div>
                            <span class="pd-detail__name">{{ $product->productName }}</span>
                        </div>
                        <div>
                            <div class="pd-detail__inline">
                                <!-- Show discounted price or original price -->
                                <span
                                    class="pd-detail__price">₹{{ number_format($product->price - ($product->price * $product->discount) / 100, 2) }}</span>

                                <!-- Show discount percentage if applicable -->
                                @if ($product->discount)
                                    <span class="pd-detail__discount">
                                        ({{ $product->discount }}% OFF)
                                    </span>
                                    <!-- Show original price crossed out -->
                                    <del class="pd-detail__del">₹{{ number_format($product->price, 2) }}</del>
                                @endif
                            </div>



                        </div>
                        <div class="u-s-m-b-15">
                            <div class="pd-detail__rating gl-rating-style">
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
                                <span class="pd-detail__review u-s-m-l-4">
                                    <a data-click-scroll="#view-review">{{ $product->ratings->count() }} Reviews</a>
                                </span>
                            </div>

                        </div>
                        <div class="u-s-m-b-15">
                            <div class="pd-detail__inline">
                                <span class="pd-detail__stock">{{ $product->stock }} in stock</span>
                                @if ($product->sizes->sum('quantity') <= 2)
                                    <span class="pd-detail__left">Only {{ $product->stock }} left</span>
                                @endif
                            </div>
                        </div>
                        <div class="u-s-m-b-15">
                            <span class="pd-detail__preview-desc">{{ Str::limit($product->description, 150) }}</span>
                        </div>
                        <div class="u-s-m-b-15">
                            <span class="pd-detail__label u-s-m-b-8">Available Colors:</span>
                            <div class="pd-detail__color">
                                @foreach ($product->sizes->unique('colorId') as $size)
                                    <div class="color-box" style="background-color: {{ $size->color->hexcode }};"></div>
                                @endforeach
                            </div>
                        </div>

                        <div class="u-s-m-b-15">
                            <span class="pd-detail__label u-s-m-b-8">Available Sizes:</span>
                            <div class="pd-detail__sizes">
                                @foreach ($product->sizes as $size)
                                    <span class="size-option">{{ $size->size }}</span>
                                @endforeach
                            </div>
                        </div>
                        @php
                            $isInWishlist = \App\Models\Wishlist::where('userId', auth()->id())
                                ->where('productId', $product->id)
                                ->first();

                        @endphp
                        <div class="u-s-m-b-15">
                            <div class="pd-detail__inline">
                                <span class="pd-detail__click-wrap">
                                    @if ($isInWishlist != null)
                                        <a href="{{ URL::to('/') }}/wishlist/remove/{{ $isInWishlist->id }}"
                                            style="color: rgb(189, 17, 57);"><i class="fas fa-heart u-s-m-r-6"
                                                style="color: rgb(189, 17, 57);"></i>Added to Wishlist</a>
                                    @else
                                        <i class="far fa-heart u-s-m-r-6"></i>
                                        <a href="{{ URL::to('/') }}/wishlist/add/{{ $product->id }}">Add to Wishlist</a>
                                    @endif
                                </span>
                            </div>
                        </div>
                        <!-- Add to Cart Section -->
                        <div class="u-s-m-b-15">
                            <form class="pd-detail__form" method="POST" action="{{ route('cart.add') }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <div class="pd-detail-inline-2">
                                    <div class="u-s-m-b-15">
                                        <button type="submit" class="btn btn--e-brand-b-2">Add to Cart</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="u-s-m-b-15">
                            <span class="pd-detail__label u-s-m-b-8">Product Policy:</span>
                            <ul class="pd-detail__policy-list">
                                <li><i class="fas fa-check-circle u-s-m-r-8"></i> <span>Buyer Protection.</span></li>
                                <li><i class="fas fa-check-circle u-s-m-r-8"></i> <span>Full Refund if you don't receive
                                        your order.</span></li>
                                <li><i class="fas fa-check-circle u-s-m-r-8"></i> <span>Returns accepted if product not as
                                        described.</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== Product Detail Tab ======-->
    <div class="u-s-p-y-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pd-tab">
                        <div class="u-s-m-b-30">
                            <ul class="nav pd-tab__list">
                                <li class="nav-item">

                                    <a class="nav-link active" data-toggle="tab" href="#pd-desc">DESCRIPTION</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="view-review" data-toggle="tab" href="#pd-rev">REVIEWS

                                        <span>({{ $product->ratings->count() }}) </span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">

                            <!--====== Tab 1 ======-->
                            <div class="tab-pane fade show active" id="pd-desc">
                                <div class="pd-tab__desc">
                                    <div class="u-s-m-b-15">
                                        <p>{{ $product->description }}</p>
                                    </div>
                                    <div class="u-s-m-b-30">
                                        <ul>
                                            <li><i class="fas fa-check u-s-m-r-8"></i>
                                                <span>Buyer Protection.</span>
                                            </li>
                                            <li><i class="fas fa-check u-s-m-r-8"></i>
                                                <span>Full Refund if you don't receive your order.</span>
                                            </li>
                                            <li><i class="fas fa-check u-s-m-r-8"></i>
                                                <span>Returns accepted if product not as described.</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--====== End - Tab 1 ======-->

                            <!--====== Tab 3 ======-->
                            <div class="tab-pane" id="pd-rev">
                                <div class="pd-tab__rev">
                                    <div class="u-s-m-b-30">
                                        <div class="pd-tab__rev-score">
                                            <div class="u-s-m-b-8">
                                                <h2>{{ $product->ratings->avg('rating') }}</h2>
                                            </div>
                                            <div class="gl-rating-style-2 u-s-m-b-8">
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
                                            </div>
                                            <div class="u-s-m-b-8">
                                                <h4>We want to hear from you!</h4>
                                            </div>

                                            <span class="gl-text">Tell us what you think about this item</span>
                                        </div>
                                    </div>
                                    <div class="u-s-m-b-30">
                                        <form class="pd-tab__rev-f1">
                                            <div class="rev-f1__group">
                                                <div class="u-s-m-b-15">
                                                    <h2>{{ $product->ratings->count() }} Reviews for
                                                        {{ $product->productName }}</h2>
                                                </div>
                                                <div class="u-s-m-b-15">

                                                    <label for="sort-review"></label><select
                                                        class="select-box select-box--primary-style" id="sort-review">
                                                        <option selected>Sort by: Best Rating</option>
                                                        <option>Sort by: Worst Rating</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="rev-f1__review">

                                                @foreach ($product->ratings as $rating)
                                                    @foreach ($rating->users as $user)
                                                        <div class="review-o u-s-m-b-15">
                                                            <div class="review-o__info u-s-m-b-8">

                                                                <span class="review-o__name">{{ $user->name }}</span>

                                                                <span
                                                                    class="review-o__date">{{ $rating->created_at }}</span>
                                                            </div>
                                                            <div class="review-o__rating gl-rating-style u-s-m-b-8">
                                                                @for ($i = 0; $i < $rating->rating; $i++)
                                                                    <i class="fas fa-star"></i>
                                                                @endfor

                                                                <span>({{ $rating->rating }})</span>
                                                            </div>
                                                            <p class="review-o__text">{{ $rating->description }}</p>
                                                        </div>
                                                    @endforeach
                                                @endforeach
                                            </div>
                                            {{-- <div id="reviews-container">
                                                @foreach ($product->ratings as $rating)
                                                    <div class="review-o u-s-m-b-15">
                                                        <div class="review-o__info u-s-m-b-8">
                                                            <span class="review-o__name">{{ $rating->user->name }}</span>
                                                            <span class="review-o__date">{{ $rating->created_at }}</span>
                                                        </div>
                                                        <div class="review-o__rating gl-rating-style u-s-m-b-8">
                                                            @for ($i = 0; $i < $rating->rating; $i++)
                                                                <i class="fas fa-star"></i>
                                                            @endfor
                                                            <span>({{ $rating->rating }})</span>
                                                        </div>
                                                        <p class="review-o__text">{{ $rating->description }}</p>
                                                    </div>
                                                @endforeach
                                            </div> --}}
                                        </form>
                                    </div>
                                    <div class="u-s-m-b-30">
                                        {{-- <form class="pd-tab__rev-f2">
                                        <h2 class="u-s-m-b-15">Add a Review</h2>

                                        <span class="gl-text u-s-m-b-15">Your email address will not be published. Required fields are marked *</span>
                                        <div class="u-s-m-b-30">
                                            <div class="rev-f2__table-wrap gl-scroll">
                                                <table class="rev-f2__table">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <div class="gl-rating-style-2"><i class="fas fa-star"></i>

                                                                    <span>(1)</span></div>
                                                            </th>
                                                            <th>
                                                                <div class="gl-rating-style-2"><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

                                                                    <span>(1.5)</span></div>
                                                            </th>
                                                            <th>
                                                                <div class="gl-rating-style-2"><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                                                    <span>(2)</span></div>
                                                            </th>
                                                            <th>
                                                                <div class="gl-rating-style-2"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

                                                                    <span>(2.5)</span></div>
                                                            </th>
                                                            <th>
                                                                <div class="gl-rating-style-2"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                                                    <span>(3)</span></div>
                                                            </th>
                                                            <th>
                                                                <div class="gl-rating-style-2"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

                                                                    <span>(3.5)</span></div>
                                                            </th>
                                                            <th>
                                                                <div class="gl-rating-style-2"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                                                    <span>(4)</span></div>
                                                            </th>
                                                            <th>
                                                                <div class="gl-rating-style-2"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

                                                                    <span>(4.5)</span></div>
                                                            </th>
                                                            <th>
                                                                <div class="gl-rating-style-2"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                                                    <span>(5)</span></div>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>

                                                                <!--====== Radio Box ======-->
                                                                <div class="radio-box">

                                                                    <input type="radio" id="star-1" name="rating">
                                                                    <div class="radio-box__state radio-box__state--primary">

                                                                        <label class="radio-box__label" for="star-1"></label></div>
                                                                </div>
                                                                <!--====== End - Radio Box ======-->
                                                            </td>
                                                            <td>

                                                                <!--====== Radio Box ======-->
                                                                <div class="radio-box">

                                                                    <input type="radio" id="star-1.5" name="rating">
                                                                    <div class="radio-box__state radio-box__state--primary">

                                                                        <label class="radio-box__label" for="star-1.5"></label></div>
                                                                </div>
                                                                <!--====== End - Radio Box ======-->
                                                            </td>
                                                            <td>

                                                                <!--====== Radio Box ======-->
                                                                <div class="radio-box">

                                                                    <input type="radio" id="star-2" name="rating">
                                                                    <div class="radio-box__state radio-box__state--primary">

                                                                        <label class="radio-box__label" for="star-2"></label></div>
                                                                </div>
                                                                <!--====== End - Radio Box ======-->
                                                            </td>
                                                            <td>

                                                                <!--====== Radio Box ======-->
                                                                <div class="radio-box">

                                                                    <input type="radio" id="star-2.5" name="rating">
                                                                    <div class="radio-box__state radio-box__state--primary">

                                                                        <label class="radio-box__label" for="star-2.5"></label></div>
                                                                </div>
                                                                <!--====== End - Radio Box ======-->
                                                            </td>
                                                            <td>

                                                                <!--====== Radio Box ======-->
                                                                <div class="radio-box">

                                                                    <input type="radio" id="star-3" name="rating">
                                                                    <div class="radio-box__state radio-box__state--primary">

                                                                        <label class="radio-box__label" for="star-3"></label></div>
                                                                </div>
                                                                <!--====== End - Radio Box ======-->
                                                            </td>
                                                            <td>

                                                                <!--====== Radio Box ======-->
                                                                <div class="radio-box">

                                                                    <input type="radio" id="star-3.5" name="rating">
                                                                    <div class="radio-box__state radio-box__state--primary">

                                                                        <label class="radio-box__label" for="star-3.5"></label></div>
                                                                </div>
                                                                <!--====== End - Radio Box ======-->
                                                            </td>
                                                            <td>

                                                                <!--====== Radio Box ======-->
                                                                <div class="radio-box">

                                                                    <input type="radio" id="star-4" name="rating">
                                                                    <div class="radio-box__state radio-box__state--primary">

                                                                        <label class="radio-box__label" for="star-4"></label></div>
                                                                </div>
                                                                <!--====== End - Radio Box ======-->
                                                            </td>
                                                            <td>

                                                                <!--====== Radio Box ======-->
                                                                <div class="radio-box">

                                                                    <input type="radio" id="star-4.5" name="rating">
                                                                    <div class="radio-box__state radio-box__state--primary">

                                                                        <label class="radio-box__label" for="star-4.5"></label></div>
                                                                </div>
                                                                <!--====== End - Radio Box ======-->
                                                            </td>
                                                            <td>

                                                                <!--====== Radio Box ======-->
                                                                <div class="radio-box">

                                                                    <input type="radio" id="star-5" name="rating">
                                                                    <div class="radio-box__state radio-box__state--primary">

                                                                        <label class="radio-box__label" for="star-5"></label></div>
                                                                </div>
                                                                <!--====== End - Radio Box ======-->
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="u-s-m-b-30">

                                                <label class="gl-label" for="reviewer-name">Feedback</label>

                                                <input name="" class="input-text input-text--primary-style" type="text" id="reviewer-name"></p>
                                                                                  </div>
                                        <div class="rev-f2__group">
                                            <div class="u-s-m-b-15">

                                                <label class="gl-label" name='description' for="reviewer-text">YOUR REVIEW *</label><textarea name='description' class="text-area text-area--primary-style" id="reviewer-text" ></textarea></div>
                                
                                        </div>
                                        <div>

                                            <button class="btn btn--e-brand-shadow" type="submit">SUBMIT</button></div>
                                    </form> --}}
                                        <form class="pd-tab__rev-f2" action="{{ route('review.store') }}"
                                            method="POST">
                                            @csrf
                                            <input type="hidden" name="productId" value="{{ $product->id }}">

                                            <h2 class="u-s-m-b-15">Add a Review</h2>
                                            <span class="gl-text u-s-m-b-15">Your email address will not be published.
                                                Required fields are marked *</span>

                                            <!-- ⭐ Star Rating Selection -->
                                            <div class="u-s-m-b-30">
                                                <div class="rev-f2__table-wrap gl-scroll">
                                                    <table class="rev-f2__table">
                                                        <thead>
                                                            <tr>
                                                                @foreach ([1, 1.5, 2, 2.5, 3, 3.5, 4, 4.5, 5] as $star)
                                                                    <th>
                                                                        <div class="gl-rating-style-2">
                                                                            @for ($i = 1; $i <= floor($star); $i++)
                                                                                <i class="fas fa-star"></i>
                                                                            @endfor
                                                                            @if ($star - floor($star) > 0)
                                                                                <i class="fas fa-star-half-alt"></i>
                                                                            @endif
                                                                            <span>({{ $star }})</span>
                                                                        </div>
                                                                    </th>
                                                                @endforeach
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                @foreach ([1, 1.5, 2, 2.5, 3, 3.5, 4, 4.5, 5] as $star)
                                                                    <td style="text-align: center;">
                                                                        <input type="radio"
                                                                            id="star-{{ $star }}" name="rating"
                                                                            value="{{ $star }}" required hidden>
                                                                        <label for="star-{{ $star }}"
                                                                            class="custom-radio"></label>
                                                                    </td>
                                                                @endforeach
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <!-- Review Title -->
                                            <div class="u-s-m-b-30">
                                                <label class="gl-label" for="review-title">Review Title *</label>
                                                <input name="title" class="input-text input-text--primary-style"
                                                    type="text" id="review-title" required>
                                            </div>

                                            <!-- Review Description -->
                                            <div class="u-s-m-b-30">
                                                <label class="gl-label" for="review-description">Your Review *</label>
                                                <textarea name="description" class="text-area text-area--primary-style" id="review-description" required></textarea>
                                            </div>

                                            <!-- Submit Button -->
                                            <button class="btn btn--e-brand-shadow" type="submit">SUBMIT</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <!--====== End - Tab 3 ======-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Product Detail Tab ======-->
    <div class="u-s-p-b-90">

        <!--====== Section Intro ======-->
        <div class="section__intro u-s-m-b-46">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__text-wrap">
                            <h1 class="section__heading u-c-secondary u-s-m-b-12">CUSTOMER ALSO VIEWED</h1>

                            <span class="section__span u-c-grey">PRODUCTS THAT CUSTOMER VIEWED</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Intro ======-->


        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="slider-fouc">
                    <div class="owl-carousel product-slider" data-item="4">
                        @foreach ($products as $product)
                            <div class="u-s-m-b-30">
                                <div class="product-o product-o--hover-on">
                                    <div class="product-o__wrap">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                            href="{{ route('product.detail', $product->id) }}">

                                            <img class="aspect__img" src="{{ asset($product->images->first()->image) }}"
                                                alt="">
                                        </a>
                                    </div>

                                    <span class="product-o__category">

                                        {{ $product->category->categoryName }}</span>

                                    <span class="product-o__name">

                                        <a href="product-detail.html">{{ $product->productName }}</a></span>
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
                                        <span class="pd-detail__review u-s-m-l-4">
                                            <a data-click-scroll="#view-review">{{ $product->ratings->count() }}
                                                Reviews</a>
                                        </span>
                                    </div>
                                    <div class="pd-detail__inline">

                                        <span
                                            class="product-m__price">₹{{ number_format($product->price - ($product->price * $product->discount) / 100, 2) }}</span>

                                        @if ($product->discount)
                                            <span class="product-m__price">
                                                ({{ $product->discount }}% OFF)
                                            </span>
                                            <del class="pd-detail__del">₹{{ number_format($product->price, 2) }}</del>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>

    <script>
        document.getElementById("sort-review").addEventListener("change", function() {
            let sortValue = this.value === "Sort by: Best Rating" ? "desc" : "asc";
            let productId = "{{ $product->id }}";

            fetch(`/reviews/${productId}/sort?order=${sortValue}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json();
                })
                .then(data => {
                    console.log("Sorted Reviews:", data);

                    let reviewsContainer = document.getElementById("reviews-container");
                    reviewsContainer.innerHTML = "";

                    data.forEach(rating => {
                        let reviewHtml = `
                            <div class="review-o u-s-m-b-15">
                                <div class="review-o__info u-s-m-b-8">
                                    <span class="review-o__name">${rating.user.name}</span>
                                    <span class="review-o__date">${rating.created_at}</span>
                                </div>
                                <div class="review-o__rating gl-rating-style u-s-m-b-8">
                                    ${'★'.repeat(Math.floor(rating.rating))} 
                                    ${rating.rating % 1 !== 0 ? '☆' : ''}
                                    <span>(${rating.rating})</span>
                                </div>
                                <p class="review-o__text">${rating.description}</p>
                            </div>
                        `;
                        reviewsContainer.innerHTML += reviewHtml;
                    });
                })
                .catch(error => {
                    console.error("Error:", error);
                    alert("Failed to load reviews. Please try again.");
                });
        });
    </script>



@endsection
