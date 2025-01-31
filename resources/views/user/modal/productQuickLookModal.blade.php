<div class="modal fade" id="quick-look-{{ $product->id }}">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal--shadow">

            <button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="pd u-s-m-b-30">
                            <div class="pd-wrap">
                                <div id="js-product-detail-modal">
                                    @foreach ($product->images as $image)
                                        <div>
                                            <img class="u-img-fluid" src="{{ asset($image->image) }}" alt="Product Image">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="u-s-m-t-15">
                                <div id="js-product-detail-modal-thumbnail">
                                    @foreach ($product->images as $image)
                                        <div>
                                            <img class="u-img-fluid" src="{{ asset($image->image) }}" alt="Thumbnail">
                                        </div>
                                    @endforeach
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
                                    <!-- Show the original product price -->
                                    {{-- <div class="product-m__price">₹{{ number_format($product->price, 2) }}</div> --}}
                                    
                                    <!-- Show discounted price or original price -->
                                    <span class="pd-detail__price">₹{{ number_format($product->price - ($product->price * $product->discount / 100), 2) }}</span>
                                    
                                    <!-- Show discount percentage if applicable -->
                                    @if($product->discount)
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
                            <div class="u-s-m-b-15">
                                <div class="pd-detail__inline">
                                    <span class="pd-detail__stock">{{ $product->stock }} In stock</span>
                                    @if($product->sizes->sum('quantity') <= 2)
                                        <span class="pd-detail__left">Only {{ $product->stock }} left</span>
                                    @endif
                                </div>
                            </div>
                            <div class="u-s-m-b-15">
                                <span class="pd-detail__label u-s-m-b-8">Available Colors:</span>
                                <div class="pd-detail__color">
                                                               @foreach($product->sizes->unique('colorId') as $size)
                                        <div class="color-box" style="background-color: {{ $size->color->hexcode }};"></div>
                                    @endforeach
                                </div>
                            </div>
                            
                            <div class="u-s-m-b-15">
                                <span class="pd-detail__label u-s-m-b-8">Available Sizes:</span>
                                <div class="pd-detail__sizes">
                                    @foreach($product->sizes as $size)
                                        <span class="size-option">{{ $size->size }}</span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="u-s-m-b-15">
                                <span class="pd-detail__preview-desc">{{ Str::limit($product->description, 150) }}</span>
                            </div>
                            <div class="u-s-m-b-15">
                                <div class="pd-detail__inline">
                                    <span class="pd-detail__click-wrap">
                                        <i class="far fa-heart u-s-m-r-6"></i>
                                        <a href="{{ URL::to('/') }}/wishlist/add/{{ $product->id }}">Add to Wishlist</a>
                                       
                                    </span>
                                </div>
                            </div>
                            <div class="u-s-m-b-15">
                                <form method="POST" action="{{ route('cart.add') }}">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" value="1"> <!-- Default quantity is 1 -->
                                    <div class="pd-detail-inline-2">
                                        <div class="u-s-m-b-15 " style="padding-top: 1rem">
                                            <button type="submit" style="padding: 10px; border-radius: 6px;" class="btn btn--e-brand-b-2">Add to Cart</button>
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
