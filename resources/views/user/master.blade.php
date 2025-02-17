<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{ URL::to('/') }}/logo.png" rel="shortcut icon">
    <title>@yield('title')</title>
    <meta name="theme-color" content="#000000"/>

    <!--====== Google Font ======-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--====== Vendor Css ======-->
    <link rel="stylesheet" href="/user/css/vendor.css">

    <!--====== Utility-Spacing ======-->
    <link rel="stylesheet" href="/user/css/utility.css">

    <!--====== App ======-->
    <link rel="stylesheet" href="/user/css/app.color9.css">
    <!-- PWA  -->
<link rel="apple-touch-icon" href="{{URL::to('/')}}/logo.png">
<link rel="manifest" href="{{ asset('/manifest.json') }}">
    @yield('css')
</head>

<body class="config">
    <div class="preloader is-active">
        <div class="preloader__wrap">

            <img class="preloader__img" src="{{ asset('/logo.png') }}" alt="">
        </div>
    </div>

    <!--====== Main App ======-->
    <div id="app">

        <!--====== Main Header ======-->
        <header class="header--style-1">
            <!--====== Nav 2 ======-->
            <nav class="secondary-nav-wrapper">
                <div class="container">

                    <!--====== Secondary Nav ======-->
                    <div class="secondary-nav">

                        <!--====== Dropdown Main plugin ======-->
                        <a class="main-logo" href="{{ URL::to('/') }}">

                            <img src="{{ asset('/logo.png') }}" width="130" height="70" alt=""></a>

                        <!--====== Dropdown Main plugin ======-->
                        <div class="menu-init" id="navigation2">

                            <button class="btn btn--icon toggle-button toggle-button--secondary fa fa-sliders"
                                type="button"></button>

                            <!--====== Menu ======-->
                            <div class="ah-lg-mode">

                                <span class="ah-close">✕ Close</span>

                                <!--====== List ======-->
                                <ul class="ah-list ah-list--design2 ah-list--link-color-secondary">
                                    <li>

                                        <a href="/">Home</a>
                                    </li>
                                    <li>

                                        <a href="{{ URL::to('/') }}/shop">Products</a>
                                    </li>

                                    <li>

                                        <a href="about">About Us</a>
                                    </li>
                                    <li>

                                        <a href="contact">Contact Us</a>
                                    </li>
                                </ul>
                                <!--====== End - List ======-->
                            </div>
                            <!--====== End - Menu ======-->
                        </div>
                        <!--====== End - Dropdown Main plugin ======-->


                        <!--====== Dropdown Main plugin ======-->
                        <div class="menu-init" id="navigation3">

                            <button
                                class="btn btn--icon toggle-button toggle-button--secondary fas fa-user-circle toggle-button-shop"
                                type="button"></button>

                          

                            <!--====== Menu ======-->
                            <div class="ah-lg-mode">

                                <span class="ah-close">✕ Close</span>

                                <!--====== List ======-->
                                <ul class="ah-list ah-list--design1 ah-list--link-color-secondary">
                                    <li class="has-dropdown" data-tooltip="tooltip" data-placement="left"
                                        title="Account">

                                        <a><i class="far fa-user-circle"></i></a>

                                        <!--====== Dropdown ======-->

                                        <span class="js-menu-toggle"></span>
                                        <ul style="width:120px">

                                            @if (Auth::check())
                                                <li>

                                                    <a href="myProfile"><i class="fas fa-user-circle u-s-m-r-6"></i>

                                                        <span>Account</span></a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('logout') }}"
                                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        <i class="fas fa-lock u-s-m-r-6"></i>
                                                        <span>Signout</span>
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                        class="d-none">
                                                        @csrf
                                                    </form>
                                                </li>
                                            @else
                                                <li>

                                                    <a href="registration"><i class="fas fa-user-plus u-s-m-r-6"></i>

                                                        <span>Signup</span>
                                                    </a>
                                                </li>
                                                <li>

                                                    <a href="{{ route('login') }}"><i
                                                            class="fas fa-lock-open u-s-m-r-6"></i>
                                                        <span>Signin</span>
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                        <!--====== End - Dropdown ======-->
                                    </li>
                                    <li>

                                        <a href="{{ URL::to('/') }}/wishlist"><i class="far fa-heart"></i></a>
                                    </li>
                                    <li class="has-dropdown">

                                        <a class="mini-cart-shop-link" href="{{ URL::to('/') }}/myCart"><i
                                                class="fas fa-shopping-bag"></i>

                                            @php
                                                $cartCount = \App\Models\Cart::where('userId', auth()->id())->count();
                                            @endphp
                                            <span class="total-item-round">{{ $cartCount }}</span></a>

                                        <!--====== Dropdown ======-->

                                        <!--====== End - Dropdown ======-->
                                    </li>
                                </ul>
                                <!--====== End - List ======-->
                            </div>
                            <!--====== End - Menu ======-->
                        </div>
                        <!--====== End - Dropdown Main plugin ======-->
                    </div>
                    <!--====== End - Secondary Nav ======-->
                </div>
            </nav>
            <!--====== End - Nav 2 ======-->
        </header>
        <!--====== End - Main Header ======-->

        <!--====== App Content ======-->
        <div class="app-content">

            @yield('content')
            <!--====== Main Footer ======-->
            <footer>
                <div class="outer-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="outer-footer__content u-s-m-b-40">

                                    <span class="outer-footer__content-title">Contact Us</span>
                                    <div class="outer-footer__text-wrap"><i class="fas fa-home"></i>
                                        <span>Jaipur Adaa</span>
                                    </div>
                                    <div class="outer-footer__text-wrap"><i class="fas fa-phone-volume"></i>

                                        <span>(+91) 900 901 9045</span>
                                    </div>
                                    <div class="outer-footer__text-wrap"><i class="far fa-envelope"></i>

                                        <span>contact@domain.com</span>
                                    </div>
                                    {{-- <div class="outer-footer__social">
                                        <ul>
                                            <li>

                                                <a class="s-fb--color-hover" href="#"><i
                                                        class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li>

                                                <a class="s-tw--color-hover" href="#"><i
                                                        class="fab fa-twitter"></i></a>
                                            </li>
                                            <li>

                                                <a class="s-youtube--color-hover" href="#"><i
                                                        class="fab fa-youtube"></i></a>
                                            </li>
                                            <li>

                                                <a class="s-insta--color-hover" href="#"><i
                                                        class="fab fa-instagram"></i></a>
                                            </li>
                                            <li>

                                                <a class="s-gplus--color-hover" href="#"><i
                                                        class="fab fa-google-plus-g"></i></a>
                                            </li>
                                        </ul>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="outer-footer__content u-s-m-b-40">

                                            <span class="outer-footer__content-title">Useful Links</span>
                                            <div class="outer-footer__list-wrap">
                                                <ul>
                                                    <li>
                                                        <a href="{{ URL::to('/') }}/myCart">Cart</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ URL::to('/') }}/wishlist">Wishlist</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ URL::to('/') }}/myProfile">Account</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ URL::to('/') }}/shop">Shop</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-lg-4 col-md-12">
                                <div class="outer-footer__content">

                                    <span class="outer-footer__content-title">Join our Newsletter</span>
                                    <form class="newsletter">
                                        <div class="u-s-m-b-15">
                                            <div class="radio-box newsletter__radio">

                                                <input type="radio" id="male" name="gender">
                                                <div class="radio-box__state radio-box__state--primary">

                                                    <label class="radio-box__label" for="male">Male</label>
                                                </div>
                                            </div>
                                            <div class="radio-box newsletter__radio">

                                                <input type="radio" id="female" name="gender">
                                                <div class="radio-box__state radio-box__state--primary">

                                                    <label class="radio-box__label" for="female">Female</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="newsletter__group">

                                            <label for="newsletter"></label>

                                            <input class="input-text input-text--only-white" type="text"
                                                id="newsletter" placeholder="Enter your Email">

                                            <button class="btn btn--e-brand newsletter__btn"
                                                type="submit">SUBSCRIBE</button>
                                        </div>

                                        <span class="newsletter__text">Subscribe to the mailing list to receive updates
                                            on promotions, new arrivals, discount and coupons.</span>
                                    </form>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="lower-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="">
                                    <div class="lower-footer__copyright">
                                        <span>Copyright © 2025</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="lower-footer__copyright">
                                    <span>All Right Reserved</span>
                                </div>

                            </div>
                        </div>
                    </div>
            </footer>

            <!--====== Modal Section ======-->


            <!--====== Quick Look Modal ======-->
            {{-- <div class="modal fade" id="quick-look">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content modal--shadow">

                        <button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-5">

                                    <!--====== Product Breadcrumb ======-->
                                    <div class="pd-breadcrumb u-s-m-b-30">
                                        <ul class="pd-breadcrumb__list">
                                            <li class="has-separator">

                                                <a href="index.hml">Home</a>
                                            </li>
                                            <li class="has-separator">

                                                <a href="shop-side-version-2.html">Electronics</a>
                                            </li>
                                            <li class="has-separator">

                                                <a href="shop-side-version-2.html">DSLR Cameras</a>
                                            </li>
                                            <li class="is-marked">

                                                <a href="shop-side-version-2.html">Nikon Cameras</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--====== End - Product Breadcrumb ======-->


                                    <!--====== Product Detail ======-->
                                    <div class="pd u-s-m-b-30">
                                        <div class="pd-wrap">
                                            <div id="js-product-detail-modal">
                                                <div>

                                                    <img class="u-img-fluid"
                                                        src="/user/images/product/product-d-1.jpg" alt="">
                                                </div>
                                                <div>

                                                    <img class="u-img-fluid"
                                                        src="/user/images/product/product-d-2.jpg" alt="">
                                                </div>
                                                <div>

                                                    <img class="u-img-fluid"
                                                        src="/user/images/product/product-d-3.jpg" alt="">
                                                </div>
                                                <div>

                                                    <img class="u-img-fluid"
                                                        src="/user/images/product/product-d-4.jpg" alt="">
                                                </div>
                                                <div>

                                                    <img class="u-img-fluid"
                                                        src="/user/images/product/product-d-5.jpg" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="u-s-m-t-15">
                                            <div id="js-product-detail-modal-thumbnail">
                                                <div>

                                                    <img class="u-img-fluid"
                                                        src="/user/images/product/product-d-1.jpg" alt="">
                                                </div>
                                                <div>

                                                    <img class="u-img-fluid"
                                                        src="/user/images/product/product-d-2.jpg" alt="">
                                                </div>
                                                <div>

                                                    <img class="u-img-fluid"
                                                        src="/user/images/product/product-d-3.jpg" alt="">
                                                </div>
                                                <div>

                                                    <img class="u-img-fluid"
                                                        src="/user/images/product/product-d-4.jpg" alt="">
                                                </div>
                                                <div>

                                                    <img class="u-img-fluid"
                                                        src="/user/images/product/product-d-5.jpg" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--====== End - Product Detail ======-->
                                </div>
                                <div class="col-lg-7">

                                    <!--====== Product Right Side Details ======-->
                                    <div class="pd-detail">
                                        <div>

                                            <span class="pd-detail__name">Nikon Camera 4k Lens Zoom Pro</span>
                                        </div>
                                        <div>
                                            <div class="pd-detail__inline">

                                                <span class="pd-detail__price">$6.99</span>

                                                <span class="pd-detail__discount">(76% OFF)</span><del
                                                    class="pd-detail__del">$28.97</del>
                                            </div>
                                        </div>
                                        <div class="u-s-m-b-15">
                                            <div class="pd-detail__rating gl-rating-style"><i
                                                    class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                    class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                    class="fas fa-star-half-alt"></i>

                                                <span class="pd-detail__review u-s-m-l-4">

                                                    <a href="product-detail.html">23 Reviews</a></span>
                                            </div>
                                        </div>
                                        <div class="u-s-m-b-15">
                                            <div class="pd-detail__inline">

                                                <span class="pd-detail__stock">200 in stock</span>

                                                <span class="pd-detail__left">Only 2 left</span>
                                            </div>
                                        </div>
                                        <div class="u-s-m-b-15">

                                            <span class="pd-detail__preview-desc">Lorem Ipsum is simply dummy text of
                                                the printing and typesetting industry. Lorem Ipsum has been the
                                                industry's standard dummy text ever since the 1500s, when an unknown
                                                printer took a galley of type and scrambled it to make a type specimen
                                                book.</span>
                                        </div>
                                        <div class="u-s-m-b-15">
                                            <div class="pd-detail__inline">

                                                <span class="pd-detail__click-wrap"><i
                                                        class="far fa-heart u-s-m-r-6"></i>

                                                    <a href="signin.html">Add to Wishlist</a>

                                                    <span class="pd-detail__click-count">(222)</span></span>
                                            </div>
                                        </div>
                                        <div class="u-s-m-b-15">
                                            <div class="pd-detail__inline">

                                                <span class="pd-detail__click-wrap"><i
                                                        class="far fa-envelope u-s-m-r-6"></i>

                                                    <a href="signin.html">Email me When the price drops</a>

                                                    <span class="pd-detail__click-count">(20)</span></span>
                                            </div>
                                        </div>
                                        <div class="u-s-m-b-15">
                                            <ul class="pd-social-list">
                                                <li>

                                                    <a class="s-fb--color-hover" href="#"><i
                                                            class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li>

                                                    <a class="s-tw--color-hover" href="#"><i
                                                            class="fab fa-twitter"></i></a>
                                                </li>
                                                <li>

                                                    <a class="s-insta--color-hover" href="#"><i
                                                            class="fab fa-instagram"></i></a>
                                                </li>
                                                <li>

                                                    <a class="s-wa--color-hover" href="#"><i
                                                            class="fab fa-whatsapp"></i></a>
                                                </li>
                                                <li>

                                                    <a class="s-gplus--color-hover" href="#"><i
                                                            class="fab fa-google-plus-g"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="u-s-m-b-15">
                                            <form class="pd-detail__form">
                                                <div class="pd-detail-inline-2">
                                                    <div class="u-s-m-b-15">

                                                        <!--====== Input Counter ======-->
                                                        <div class="input-counter">

                                                            <span class="input-counter__minus fas fa-minus"></span>

                                                            <input
                                                                class="input-counter__text input-counter--text-primary-style"
                                                                type="text" value="1" data-min="1"
                                                                data-max="1000">

                                                            <span class="input-counter__plus fas fa-plus"></span>
                                                        </div>
                                                        <!--====== End - Input Counter ======-->
                                                    </div>
                                                    <div class="u-s-m-b-15">

                                                        <button class="btn btn--e-brand-b-2" type="submit">Add to
                                                            Cart</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="u-s-m-b-15">

                                            <span class="pd-detail__label u-s-m-b-8">Product Policy:</span>
                                            <ul class="pd-detail__policy-list">
                                                <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                                    <span>Buyer Protection.</span>
                                                </li>
                                                <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                                    <span>Full Refund if you don't receive your order.</span>
                                                </li>
                                                <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                                    <span>Returns accepted if product not as described.</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--====== End - Product Right Side Details ======-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!--====== End - Quick Look Modal ======-->




            <!--====== Newsletter Subscribe Modal ======-->
            {{-- <div class="modal fade new-l" id="newsletter-modal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content modal--shadow">

                        <button class="btn new-l__dismiss fas fa-times" type="button" data-dismiss="modal"></button>
                        <div class="modal-body">
                            <div class="row u-s-m-x-0">
                                <div class="col-lg-6 new-l__col-1 u-s-p-x-0">

                                    <a class="new-l__img-wrap u-d-block" href="shop-side-version-2.html">

                                        <img class="u-img-fluid u-d-block"
                                            src="/user/images/newsletter/newsletter.jpg" alt=""></a>
                                </div>
                                <div class="col-lg-6 new-l__col-2">
                                    <div class="new-l__section u-s-m-t-30">
                                        <div class="u-s-m-b-8 new-l--center">
                                            <h3 class="new-l__h3">Newsletter</h3>
                                        </div>
                                        <div class="u-s-m-b-30 new-l--center">
                                            <p class="new-l__p1">Sign up for emails to get the scoop on new arrivals,
                                                special sales and more.</p>
                                        </div>
                                        <form class="new-l__form">
                                            <div class="u-s-m-b-15">

                                                <input class="news-l__input" type="text"
                                                    placeholder="E-mail Address">
                                            </div>
                                            <div class="u-s-m-b-15">

                                                <button class="btn btn--e-brand-b-2" type="submit">Sign up!</button>
                                            </div>
                                        </form>
                                        <div class="u-s-m-b-15 new-l--center">
                                            <p class="new-l__p2">By Signing up, you agree to receive Reshop
                                                offers,<br />promotions and other commercial messages. You may
                                                unsubscribe at any time.</p>
                                        </div>
                                        <div class="u-s-m-b-15 new-l--center">

                                            <a class="new-l__link" data-dismiss="modal">No Thanks</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!--====== End - Newsletter Subscribe Modal ======-->
            <!--====== End - Modal Section ======-->
        </div>
        <!--====== End - Main App ======-->
        <script src="{{ asset('/sw.js') }}"></script>
        <script>
           if ("serviceWorker" in navigator) {
              // Register a service worker hosted at the root of the
              // site using the default scope.
              navigator.serviceWorker.register("/sw.js").then(
              (registration) => {
                 console.log("Service worker registration succeeded:", registration);
              },
              (error) => {
                 console.error(`Service worker registration failed: ${error}`);
              },
            );
          } else {
             console.error("Service workers are not supported.");
          }
        </script>

        <!--====== Google Analytics: change UA-XXXXX-Y to be your site's ID ======-->
        <script>
            window.ga = function() {
                ga.q.push(arguments)
            };
            ga.q = [];
            ga.l = +new Date;
            ga('create', 'UA-XXXXX-Y', 'auto');
            ga('send', 'pageview')
        </script>
        <script src="https://www.google-analytics.com/analytics.js" async defer></script>

        <!--====== Vendor Js ======-->
        <script src="/user/js/vendor.js"></script>

        <!--====== jQuery Shopnav plugin ======-->
        <script src="/user/js/jquery.shopnav.js"></script>

        <!--====== App ======-->
        <script src="/user/js/app.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        @yield('script')
        <!--====== Noscript ======-->
        <noscript>
            <div class="app-setting">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="app-setting__wrap">
                                <h1 class="app-setting__h1">JavaScript is disabled in your browser.</h1>

                                <span class="app-setting__text">Please enable JavaScript in your browser or upgrade to
                                    a JavaScript-capable browser.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </noscript>
</body>

</html>
