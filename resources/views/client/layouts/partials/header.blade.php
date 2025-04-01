<header>
    
    <div class="xc-header-one bg-black" id="xc-header-sticky">
        <div class="container">
            <div class="xc-header-one__wrapper">
                <div class="xc-header-one__logo">
                    <a href="index.html"><img src="{{ asset('build/client/assets/img/logo/white-logo.png')}}" alt="logo" width="158"></a>
                </div>
                <div class="xc-header-one__right">
                    <div class="xc-header-one__search d-none d-xl-block">
                        <form action="#">
                            <input type="search" placeholder="Search">
                            <button type="submit">Search</button>
                        </form>
                    </div>
                    <div class="xc-header-one__btns d-none d-lg-flex">

                        <a href="cart.html" class="xc-header-one__btn">
                            <i class="fas fa-shopping-cart"></i>My cart
                        </a>
                        <a href="/logout" class="xc-header-one__btn">
                            <i class="fa fa-user"></i>Logout
                        </a>
                        <!-- mobile drawer  -->
                        <div class="xc-header-one__hamburger d-xl-none">
                            <button type="button" class="xc-offcanvas-btn xc-header-one__btn">
                                <i class="icon-menu"></i>Nav Bar
                            </button>
                        </div>
                    </div>
                </div>
                <!-- mobile drawer  -->
                <div class="xc-header-one__hamburger d-lg-none">
                    <button type="button" class="xc-offcanvas-btn xc-header-one__btn">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="xc-header-one__bottom d-none d-lg-block">
        <div class="container">
            <div class="xc-header-one__bottom-wrapper">
                <div class="xc-header-one__bottom-left">
                    <div class="xc-header-one__cat">
                    </div>
                    <div class="xc-header-one__menu xc-main-menu">
                        <nav id="mobile-menu">
                            <ul class="ul-0">
                                <li class="">
                                    <a href="index.html">Home</a>
                                </li>
                                <li><a href="about.html">About</a></li>
                                <li class="has-dropdown"><a href="shop.html">Shop</a>
                                    <ul class="submenu">
                                        <li><a href="shop.html">Shop</a>
                                        <li><a href="product-details.html">Product Details</a></li>
                                        <li><a href="cart.html">Cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                    </ul>
                                </li>
                                <li class="has-dropdown">
                                    <a href="blog-list.html">Blog</a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="blog-grid.html">Blog Grid</a>
                                        </li>
                                        <li class="has-dropdown">
                                            <a href="blog-list.html">Blog List</a>
                                            <ul class="submenu">
                                                <li><a href="blog-list-no-sidebar.html">No Sidebar</a></li>
                                                <li><a href="blog-list.html">Right Sidebar</a></li>
                                                <li><a href="blog-list-left-sidebar.html">Left Sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="blog-details.html">Blog Details</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="contact.html">Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="xc-header-one__bottom-right">
                    <div class="xc-header-one__lang">

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="xc-body-overlay xc-close-toggler"></div>
<div class="xc-search-popup">
    <div class="xc-search-popup__wrap">
        <a href="#" class="xc-search-popup__close xc-close-toggler"></a>
        <div class="xc-search-popup__form">
            <form role="search" method="get" action="#">
                <input type="search" placeholder="Search Here..." value="" name="s">
                <button type="submit"><i class="icon-search"></i></button>
            </form>
        </div>
    </div>
</div>
<div class="xc-mobile-nav__wrapper">
    <div class="xc-mobile-nav__overlay xc-close-toggler"></div>
    <!-- /.mobile-nav__overlay -->
    <div class="xc-mobile-nav__content">
        <a href="#" class="xc-mobile-nav__close xc-search-popup__close xc-close-toggler"></a>
        <div class="logo-box">
            <a href="index.html"><img src="assets/img/logo/white-logo.png" width="150" alt="" /></a>
        </div>
        <!-- /.logo-box -->
        <div class="xc-mobile-nav__menu"></div>
        <!-- /.mobile-nav__container -->

        <ul class="xc-mobile-nav__contact list-unstyled">
            <li>
                <i class="fa fa-envelope"></i>
                <a href="mailto:needhelp@swiftcart.com">needhelp@corpai.com</a>
            </li>
            <li>
                <i class="fa fa-phone-alt"></i>
                <a href="tel:666-888-0000">666 888 0000</a>
            </li>
        </ul><!-- /.mobile-nav__contact -->
        <div class="xc-mobile-nav__top">
            <div class="xc-mobile-nav__social">
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-facebook-square"></a>
                <a href="#" class="fab fa-pinterest-p"></a>
                <a href="#" class="fab fa-instagram"></a>
            </div><!-- /.mobile-nav__social -->
        </div><!-- /.mobile-nav__top -->
    </div>
    <!-- /.mobile-nav__content -->
</div>
<!-- /.mobile-nav__wrapper -->
<div class="xc-back-to-top-wrapper">
    <button id="xc_back-to-top" type="button" class="xc-back-to-top-btn">
        <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
        <span class="xc-back-to-top-progress"></span>
    </button>
</div>