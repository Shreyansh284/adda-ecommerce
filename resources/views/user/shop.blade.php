@extends('user.master')
@section('content')
    <div class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop-p">
                        <div class="shop-p__toolbar u-s-m-b-30">

                            <div class="shop-p__tool-style">
                                <div class="tool-style__group u-s-m-b-8">

                                    <span class="js-shop-filter-target" data-side="#side-filter">Filters</span>

                                    <span class="js-shop-grid-target is-active">Grid</span>

                                    {{-- <span class="js-shop-list-target">List</span> --}}
                                </div>
                                <form>
                                    <div class="tool-style__form-wrap">
                                        <div class="u-s-m-b-8"><select class="select-box select-box--transparent-b-2">
                                                <option>Show: 8</option>
                                                <option selected>Show: 12</option>
                                                <option>Show: 16</option>
                                                <option>Show: 28</option>
                                            </select></div>
                                        <div class="u-s-m-b-8"><select class="select-box select-box--transparent-b-2">
                                                <option selected>Sort By: Newest Items</option>
                                                <option>Sort By: Latest Items</option>
                                                <option>Sort By: Best Selling</option>
                                                <option>Sort By: Best Rating</option>
                                                <option>Sort By: Lowest Price</option>
                                                <option>Sort By: Highest Price</option>
                                            </select></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="shop-p__collection">
                            <div class="row is-grid-active">
                                @foreach ($products as $product)
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="product-m">
                                            <div class="product-m__thumb">

                                                <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                                    href="{{route('product.detail',$product->id)}}">

                                                    <img class="aspect__img"
                                                        src="{{ asset($product->images->first()->image) }}"
                                                        alt=""></a>
                           
                                                <div class="product-m__content">
                                                    <div class="product-m__category">

                                                        <a
                                                            href="shop-side-version-2.html">{{ $product->category->categoryName }}</a>
                                                    </div>
                                                    <div class="product-m__name">

                                                        <a href="product-detail.html">{{ $product->productName }}</a>
                                                    </div>
                                                    <div class="product-m__rating gl-rating-style">
                                                        <div class="pd-detail__rating gl-rating-style">
                                                            @for ($i = 0; $i < 5; $i++)
                                                                <!-- Check for fractional star -->
                                                                @if ($i < floor($product->ratings->avg('rating')))
                                                                    <i class="fas fa-star"></i>
                                                                @elseif ($i == floor($product->ratings->avg('rating')) && $product->ratings->avg('rating') - floor($product->ratings->avg('rating')) >= 0.5)
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
                                                    <div class="pd-detail__inline">
                                                       
                                                        <span class="product-m__price">₹{{ number_format($product->price - ($product->price * $product->discount / 100), 2) }}</span>
                                                        
                                                        @if($product->discount)
                                                            <span class="product-m__price">
                                                                ({{ $product->discount }}% OFF)
                                                            </span>
                                                            <del class="pd-detail__del">₹{{ number_format($product->price, 2) }}</del>
                                                        @endif
                                                    </div>
                                                    
                                                    <div class="product-m__hover">
                                                        <div class="product-m__preview-description">

                                                            <span>{{ Str::limit($product->description, 100) }}</span>
                                                        </div>
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
                                            </div>
                                            {{-- @endforeach --}}
                                            {{-- <div class="product-m">
                                                <div class="product-m__thumb">
                                                    <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                                        href="product-detail.html">
                                                        <!-- Show only the first image -->
                                                        <img class="aspect__img"
                                                            src="{{ asset($product->images->first()->image) }}"
                                                            alt="">
                                                    </a>
                                                    <!-- Quick look with all images -->
                                                    <div class="product-m__quick-look">
                                                        <a class="fas fa-search" data-modal="modal"
                                                            data-modal-id="#quick-look-{{ $product->id }}"
                                                            data-tooltip="tooltip" data-placement="top"
                                                            title="Quick Look"></a>
                                                    </div>
                                                </div>
                                                <div class="product-m__content">
                                                    <div class="product-m__category">
                                                        <a
                                                            href="shop-side-version-2.html">{{ $product->category->categoryName }}</a>
                                                    </div>
                                                    <div class="product-m__name">
                                                        <a href="product-detail.html">{{ $product->productName }}</a>
                                                    </div>
                                                    <div class="product-m__rating gl-rating-style">
                                                        @foreach ($product->ratings as $rating)
                                                            <i class="fas fa-star"></i>
                                                        @endforeach
                                                        <span
                                                            class="product-m__review">({{ $product->ratings->count() }})</span>
                                                    </div>
                                                    <div class="product-m__price">${{ $product->price }}</div>
                                                </div>
                                                <div class="product-m__hover">
                                                    <div class="product-m__preview-description">
                                                        <span>{{ Str::limit($product->description, 100) }}</span>
                                                    </div>
                                                    <div class="product-m__wishlist">
                                                        <a class="far fa-heart" href="#" data-tooltip="tooltip"
                                                            data-placement="top" title="Add to Wishlist"></a>
                                                    </div>
                                                </div>
                                            </div> --}}


                                        </div>

                                    </div>
                                   
                                @endforeach
                            </div>
                            {{-- <div class="u-s-p-y-60">

                        <!--====== Pagination ======-->
                        <ul class="shop-p__pagination">
                            <li class="is-active">

                                <a href="shop-grid-full.html">1</a></li>
                            <li>

                                <a href="shop-grid-full.html">2</a></li>
                            <li>

                                <a href="shop-grid-full.html">3</a></li>
                            <li>

                                <a href="shop-grid-full.html">4</a></li>
                            <li>

                                <a class="fas fa-angle-right" href="shop-grid-full.html"></a></li>
                        </ul>
                        <!--====== End - Pagination ======-->
                    </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
