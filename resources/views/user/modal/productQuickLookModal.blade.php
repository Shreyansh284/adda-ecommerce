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
                                    <span class="pd-detail__price">${{ $product->price }}</span>
                                    @if($product->discount_price)
                                        <span class="pd-detail__discount">({{ round((($product->price - $product->discount_price) / $product->price) * 100) }}% OFF)</span>
                                        <del class="pd-detail__del">${{ $product->price }}</del>
                                    @endif
                                </div>
                            </div>
                            <div class="u-s-m-b-15">
                                <div class="pd-detail__rating gl-rating-style">
                                    @for ($i = 0; $i < 5; $i++)
                                        <i class="{{ $i < round($product->ratings->avg('rating')) ? 'fas' : 'far' }} fa-star"></i>
                                    @endfor
                                    <span class="pd-detail__review u-s-m-l-4">
                                        <a href="product-detail.html">{{ $product->ratings->count() }} Reviews</a>
                                    </span>
                                </div>
                            </div>
                            <div class="u-s-m-b-15">
                                <div class="pd-detail__inline">
                                    <span class="pd-detail__stock">{{ $product->stock }} in stock</span>
                                    @if($product->stock <= 2)
                                        <span class="pd-detail__left">Only {{ $product->stock }} left</span>
                                    @endif
                                </div>
                            </div>
                            <div class="u-s-m-b-15">
                                <span class="pd-detail__preview-desc">{{ Str::limit($product->description, 150) }}</span>
                            </div>
                            <div class="u-s-m-b-15">
                                <div class="pd-detail__inline">
                                    <span class="pd-detail__click-wrap">
                                        <i class="far fa-heart u-s-m-r-6"></i>
                                        <a href="#">Add to Wishlist</a>
                                        <span class="pd-detail__click-count">(222)</span>
                                    </span>
                                </div>
                            </div>
                            <div class="u-s-m-b-15">
                                <form class="pd-detail__form">
                                    <div class="pd-detail-inline-2">
                                        <div class="u-s-m-b-15">
                                            <a href="mycart" class="btn btn--e-brand-b-2">Add to Cart</a>
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
