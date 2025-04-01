@extends('client.layouts.main')

@section('content')

{{-- Banner --}}
<div class="xc-banner-one pt-20 pb-40">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-xxl-2 d-none d-xl-block">
                <div class="xc-banner-one__cat">
                    <ul>
                        <li><a href="#">Fashion & Accessories</a></li>
                        <li><a href="#">Sports & Entertainment</a></li>
                        <li><a href="#">Health & Beauty</a></li>
                        <li><a href="#">Digital & Electronics</a></li>
                        <li><a href="#">Tools, Equipment</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-xl-9 col-xxl-9">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('build/client/assets/img/banner/baner-05.jpg') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('build/client/assets/img/banner/banner-01.jpg') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('build/client/assets/img/banner/banner-02.jpg') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('build/client/assets/img/banner/banner-03.jpg') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('build/client/assets/img/banner/banner-04.jpg') }}" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- product two start -->
<div class="xc-product-two pb-80">
    <div class="container">
        <div class="xc-sec-heading">
            <h3 class="xc-sec-heading__title"><span><i class="icon-power"></i></span>Recommended Items</h3>
        </div>
        <div class="row gutter-y-20 row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-5 ">
            <div class="col">
                <div class="xc-product-two__item">
                    <span class="xc-product-two__deal d-none">BEST DEALS</span>
                    <div class="xc-product-two__img">
                        <img src="{{ asset('build/client/assets/img/products/product-2-1.png') }}" alt="product">
                    </div>
                    <div class="xc-product-two__ratting">
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        (125)
                    </div>
                    <h3 class="xc-product-two__title"><a href="#">Basics High-Speed HDMI Cable 18 Gbps,
                            4K/6</a></h3>
                    <h4 class="xc-product-two__price">$360</h4>
                    <div class="xc-product-two__btn">
                        <a href="product-details.html"><i class="fas fa-eye"></i></a>
                        <a href="cart.html"><i class="fas fa-shopping-cart"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col">
                <div class="xc-product-two__item">
                    <span class="xc-product-two__deal">BEST DEALS</span>
                    <div class="xc-product-two__img">
                        <img src="{{ asset('build/client/assets/img/products/product-2-2.png') }}" alt="product">
                    </div>
                    <div class="xc-product-two__ratting">
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        (125)
                    </div>
                    <h3 class="xc-product-two__title"><a href="#">Basics High-Speed HDMI Cable 18 Gbps,
                            4K/6</a></h3>
                    <h4 class="xc-product-two__price">$360</h4>
                    <div class="xc-product-two__btn">
                        <a href="product-details.html"><i class="fas fa-eye"></i></a>
                        <a href="cart.html"><i class="fas fa-shopping-cart"></i></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="xc-product-two__item">
                    <span class="xc-product-two__deal">BEST DEALS</span>
                    <div class="xc-product-two__img">
                        <img src="{{ asset('build/client/assets/img/products/product-2-2.png') }}" alt="product">
                    </div>
                    <div class="xc-product-two__ratting">
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        (125)
                    </div>
                    <h3 class="xc-product-two__title"><a href="#">Basics High-Speed HDMI Cable 18 Gbps,
                            4K/6</a></h3>
                    <h4 class="xc-product-two__price">$360</h4>
                    <div class="xc-product-two__btn">
                        <a href="product-details.html"><i class="fas fa-eye"></i></a>
                        <a href="cart.html"><i class="fas fa-shopping-cart"></i></a>
                    </div>
                </div>
            </div>
            
            <!-- Các sản phẩm khác -->
            
        </div>
    </div>
</div>

<!-- product two end -->

<!-- top sale product start -->
{{-- <div class="xc-product-four pb-80">
    <div class="container">
        <div class="xc-sec-heading xc-has-btn">
            <h3 class="xc-sec-heading__title"><span><i class="icon-power"></i></span>Top Sale Product</h3>
            <div class="xc-sec-heading__btn">
                <a href="shop.html" class="xc-sec-heading-btn">show all</a>
            </div>
        </div>
        <div class="row gutter-y-60">
            <!-- <div class="col-xl-3">
                <div class="xc-banner-four">
                    <div class="xc-banner-four__img">
                        <img src="assets/img/banner/banner-4-1.jpg" alt="banner4">
                        <h3 class="xc-banner-four__title">Xiaomi True Wireless Earbuds</h3>
                        <p class="xc-banner-four__info">Escape the noise, It’s time to hear the magic with Xiaomi
                            Earbuds.</p>
                        <p class="xc-banner-four__price">Only for: <span> $299 USD </span></p>
                        <a href="shop.html" class="swiftcart-btn w-100">Shop now <i class="icon-next"></i></a>
                    </div>
                </div>
            </div> -->
            <div class="col-xl-12">
                <div class="xc-product-four__wrapper">
                    <div class="row gutter-y-20">
                        <div class="col-md-6 col-lg-4">
                            <div class="xc-product-list__item xc-product-list__item-two">
                                <div class="xc-product-list__thumb">
                                    <img src="assets/img/products/product-sm-1-1.png" alt="">
                                </div>
                                <div class="xc-product-list__content">
                                    <h3 class="xc-product-list__title"><a href="product-details.html">27-inch
                                            FHD 1080p
                                            IPS GamingLED Monitor</a></h3>
                                    <div class="xc-product-list__ratting">
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        (25)
                                    </div>
                                    <span class="xc-product-list__price">$360</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="xc-product-list__item xc-product-list__item-two">
                                <div class="xc-product-list__thumb">
                                    <img src="assets/img/products/product-sm-1-2.png" alt="">
                                </div>
                                <div class="xc-product-list__content">
                                    <h3 class="xc-product-list__title"><a href="product-details.html">27-inch
                                            FHD 1080p
                                            IPS GamingLED Monitor</a></h3>
                                    <div class="xc-product-list__ratting">
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        (25)
                                    </div>
                                    <span class="xc-product-list__price">$360</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="xc-product-list__item xc-product-list__item-two">
                                <div class="xc-product-list__thumb">
                                    <img src="assets/img/products/product-sm-1-3.png" alt="">
                                </div>
                                <div class="xc-product-list__content">
                                    <h3 class="xc-product-list__title"><a href="product-details.html">27-inch
                                            FHD 1080p
                                            IPS GamingLED Monitor</a></h3>
                                    <div class="xc-product-list__ratting">
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        (25)
                                    </div>
                                    <span class="xc-product-list__price">$360</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="xc-product-list__item xc-product-list__item-two">
                                <div class="xc-product-list__thumb">
                                    <img src="assets/img/products/product-sm-1-4.png" alt="">
                                </div>
                                <div class="xc-product-list__content">
                                    <h3 class="xc-product-list__title"><a href="product-details.html">27-inch
                                            FHD 1080p
                                            IPS GamingLED Monitor</a></h3>
                                    <div class="xc-product-list__ratting">
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        (25)
                                    </div>
                                    <span class="xc-product-list__price">$360</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="xc-product-list__item xc-product-list__item-two">
                                <div class="xc-product-list__thumb">
                                    <img src="assets/img/products/product-sm-1-5.png" alt="">
                                </div>
                                <div class="xc-product-list__content">
                                    <h3 class="xc-product-list__title"><a href="product-details.html">27-inch
                                            FHD 1080p
                                            IPS GamingLED Monitor</a></h3>
                                    <div class="xc-product-list__ratting">
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        (25)
                                    </div>
                                    <span class="xc-product-list__price">$360</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="xc-product-list__item xc-product-list__item-two">
                                <div class="xc-product-list__thumb">
                                    <img src="assets/img/products/product-sm-1-6.png" alt="">
                                </div>
                                <div class="xc-product-list__content">
                                    <h3 class="xc-product-list__title"><a href="product-details.html">27-inch
                                            FHD 1080p
                                            IPS GamingLED Monitor</a></h3>
                                    <div class="xc-product-list__ratting">
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        (25)
                                    </div>
                                    <span class="xc-product-list__price">$360</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="xc-product-list__item xc-product-list__item-two">
                                <div class="xc-product-list__thumb">
                                    <img src="assets/img/products/product-sm-1-7.png" alt="">
                                </div>
                                <div class="xc-product-list__content">
                                    <h3 class="xc-product-list__title"><a href="product-details.html">27-inch
                                            FHD 1080p
                                            IPS GamingLED Monitor</a></h3>
                                    <div class="xc-product-list__ratting">
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        (25)
                                    </div>
                                    <span class="xc-product-list__price">$360</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="xc-product-list__item xc-product-list__item-two">
                                <div class="xc-product-list__thumb">
                                    <img src="assets/img/products/product-sm-1-8.png" alt="">
                                </div>
                                <div class="xc-product-list__content">
                                    <h3 class="xc-product-list__title"><a href="product-details.html">27-inch
                                            FHD 1080p
                                            IPS GamingLED Monitor</a></h3>
                                    <div class="xc-product-list__ratting">
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        (25)
                                    </div>
                                    <span class="xc-product-list__price">$360</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="xc-product-list__item xc-product-list__item-two">
                                <div class="xc-product-list__thumb">
                                    <img src="assets/img/products/product-sm-1-9.png" alt="">
                                </div>
                                <div class="xc-product-list__content">
                                    <h3 class="xc-product-list__title"><a href="product-details.html">27-inch
                                            FHD 1080p
                                            IPS GamingLED Monitor</a></h3>
                                    <div class="xc-product-list__ratting">
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        (25)
                                    </div>
                                    <span class="xc-product-list__price">$360</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection