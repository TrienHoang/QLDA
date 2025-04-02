@extends('client.layouts.main')

@push('styles')
<style>
    .xc-product-eight__img {
    width: 100%;
    height: 200px; /* Chiều cao cố định */
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
}

.xc-product-eight__img img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Cắt ảnh để lấp đầy khung */
}
</style>
@endpush
@section('content')
    <div class="xc-breadcrumb__area base-bg">
        <div class="xc-breadcrumb__bg w-img xc-breadcrumb__overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="xc-breadcrumb__content p-relative z-index-1">
                        <div class="xc-breadcrumb__list">
                            <span><a href="{{ route('client.home') }}">Home</a></span>
                            <span class="dvdr"><i class="icon-arrow-right"></i></span>
                            <span>Product Details</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Chi tiết sản phẩm --}}
    <section class="product__details-area pt-80 pb-80">
        <div class="container">
            <div class="row gutter-y-30">
                <div class="col-xl-6 col-lg-6">
                    <div class="product__details-thumb-tab">
                        <div class="product__details-thumb-content w-img">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6">
                    <div class="product__details-wrapper">
                        <div class="product__details-stock">
                            <span>{{ $product->quantity }} In Stock</span>
                        </div>
                        <h3 class="product__details-title">{{ $product->name }}</h3>

                        @if ($product->reviews_count > 0)
                            <div class="product__details-rating">
                                @for ($i = 0; $i < 5; $i++)
                                    <i class="icon-star {{ $i < $product->rating ? 'filled' : '' }}"></i>
                                @endfor
                                <span>({{ $product->reviews_count }} reviews)</span>
                            </div>
                        @endif

                        <p>{{ $product->description }}</p>

                        <div class="product__details-price">
                            @if ($product->discount_price)
                                <span
                                    class="product__details-ammount old-ammount">${{ number_format($product->price, 2) }}</span>
                                <span
                                    class="product__details-ammount new-ammount">${{ number_format($product->discount_price, 2) }}</span>
                            @else
                                <span
                                    class="product__details-ammount new-ammount">${{ number_format($product->price, 2) }}</span>
                            @endif
                        </div>

                        <div class="product__details-action d-flex flex-wrap align-items-center">
                            <a href="cart.html" class="product-add-cart-btn swiftcart-btn">
                                Add to Cart
                            </a>
                            <button type="button" class="product-action-btn">
                                <i class="fas fa-heart"></i> <!-- Icon yêu thích -->
                            </button>
                            <button type="button" class="product-action-btn">
                                <i class="fas fa-eye"></i> <!-- Icon mắt -->
                            </button>
                        </div>

                        <div class="product__details-share">
                            <span>Category:</span>

                            <span><a href="#">{{ $product->category->name }}</a></span>
                        </div>

                        <div class="product__details-share">
                            <span>Share:</span>

                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Sản phẩm liên quan --}}
    <div class="xc-related-product pb-80">
    <div class="container">
        <h3 class="xc-section-title mb-30">Related Products</h3>
        <div class="row gutter-y-30">
            @foreach ($relatedProducts as $related)
                <div class="col-xl-3 col-md-6">
                    <div class="xc-product-eight__item">
                        <div class="xc-product-eight__img">
                            <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->name }}">
                            <span class="xc-product-eight__offer">-{{ rand(5, 30) }}% off</span>
                        </div>
                        <div class="xc-product-eight__content">
                            <h3 class="xc-product-eight__title">
                                <a href="{{ route('client.showProduct', $product->id) }}">{{ $related->name }}</a>
                            </h3>
                            <h5 class="xc-product-eight__price">${{ number_format($related->price, 2) }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
