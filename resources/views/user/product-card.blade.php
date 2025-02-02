<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item">
    <div class="product-o product-o--hover-on product-o--radius">
        <div class="product-o__wrap">
            <a class="aspect aspect--bg-grey aspect--square u-d-block" href="{{ route('product.detail', $product->id) }}">
                <img class="aspect__img" src="{{ asset($product->images->first()->image) }}" alt="">
            </a>
            <div class="product-o__action-wrap">
                <ul class="product-o__action-list">
                    <li>
                        <form id="cart-form-{{ $product->id }}" method="POST" action="{{ route('cart.add') }}">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="quantity" value="1">
                        </form>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('cart-form-{{ $product->id }}').submit();">
                            <i class="fas fa-plus-circle"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('/') }}/wishlist/add/{{ $product->id }}"><i class="fas fa-heart"></i></a>
                    </li>
                </ul>
            </div>
        </div>

        <span class="product-o__category">
            <a href="{{ route('product.detail', $product->id) }}">{{ $product->category->categoryName }}</a>
        </span>

        <span class="product-o__name">
            <a href="{{ route('product.detail', $product->id) }}">{{ $product->productName }}</a>
        </span>

        <div class="product-o__rating gl-rating-style">
            @for ($i = 0; $i < 5; $i++)
                @if ($i < floor($product->ratings->avg('rating')))
                    <i class="fas fa-star"></i>
                @elseif ($i == floor($product->ratings->avg('rating')) && $product->ratings->avg('rating') - floor($product->ratings->avg('rating')) >= 0.5)
                    <i class="fas fa-star-half-alt"></i>
                @else
                    <i class="far fa-star"></i>
                @endif
            @endfor
            <span class="product-o__review">{{ $product->ratings->count() }} Reviews</span>
        </div>

        <span class="product-o__price">
            ₹{{ number_format($product->price - ($product->price * $product->discount) / 100, 2) }}
            @if ($product->discount)
                <span class="product-m__price">({{ $product->discount }}% OFF)</span>
                <del class="pd-detail__del">₹{{ number_format($product->price, 2) }}</del>
            @endif
        </span>
    </div>
</div>
