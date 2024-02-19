<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ruiz - Watch Stor</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset("assets/images/favicon.ico") }}">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset("assets/css/vendor/bootstrap.min.css") }}">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ asset("assets/css/vendor/font-awesome.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/vendor/simple-line-icons.css") }}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset("assets/css/plugins/animation.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/plugins/slick.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/plugins/animation.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/plugins/nice-select.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/plugins/fancy-box.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/plugins/jqueryui.min.css") }}">

    <!-- Vendor & Plugins CSS (Please remove the comment from below vendor.min.css & plugins.min.css for better website load performance and remove css files from avobe) -->
    <!--
    <script src="{{ asset("assets/js/vendor/vendor.min.js") }}"></script>
    <script src="{{ asset("assets/js/plugins/plugins.min.js") }}"></script>
    -->

    <!-- Main Style CSS (Please use minify version for better website load performance) -->
    <link rel="stylesheet" href="{{ asset("assets/css/style.css") }}">
    <!--<link rel="stylesheet" href="{{ asset("assets/css/style.min.css") }}">-->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>

<body>

    <input type="hidden" class="auth-value" id="auth-value" value="<?php echo $customer_data['is_login']; ?>">
    <input type="hidden" class="view-value" id="view-value" value="<?php echo $customer_data['view_type'] ?? 0; ?>">
    <div class="main-wrapper">
        <header>

            <div class="header-top-area d-none d-lg-block text-color-white bg-gren border-bm-1">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="header-top-settings">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="top-info-wrap text-end">
                                <ul class="my-account-container">
                                    <?php if ($customer_data['is_login']): ?>  
                                    <li><a href="/profile">{{$customer_data['name']}}</a></li>
                                    <?php else: ?>
                                    <li><a href="/login">My account</a></li>
                                    <?php endif ?> 
                                    <li><a href="/checkout">Checkout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- haeader Mid Start -->
            <div class="haeader-mid-area bg-gren border-bm-1 d-none d-lg-block ">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-4 col-5">
                            <div class="logo-area">
                                <a href="/"><img src="{{ asset("assets/images/logo/logo.png") }}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="search-box-wrapper searchProduct">
                                <div class="search-box-inner-wrap suggest-list">
                                    <form class="search-box-inner">
                                        <div class="search-select-box">
                                            <select class="nice-select">
                                                <optgroup label=" Watch" class="data_category">
                                                    <option value="0">All</option>
                                                </optgroup> 
                                            </select>
                                        </div>
                                        <div class="search-field-wrap">
                                            <input type="text" id="category-search" class="search-field product-search-field" placeholder="Search product...">
                                            <div class="search-btn">
                                                <button><i class="icon-magnifier"></i></button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="right-blok-box text-white d-flex">
                                <div class="shopping-cart-wrap cart-count">
                                    <a href="/cart"><i class="icon-basket-loaded"></i><span class="cart-total count"></span></a> 
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- haeader Mid End -->

            <!-- haeader bottom Start -->
            <div class="haeader-bottom-area bg-gren header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12 d-none d-lg-block">
                            <div class="main-menu-area white_text">
                                <!--  Start Mainmenu Nav-->
                                <nav class="main-navigation text-center">
                                    <ul>
                                        <li><a href="/">HOme</a></li>
                                        <li><a href="/about">About Us</a></li>
                                        <li><a href="/category">Category</a></li>
                                        <li><a href="/blog">Blog</a></li>
                                        <li><a href="/contact-us">Contact</a></li>
                                    </ul>
                                </nav>

                            </div>
                        </div>

                        <div class="col-5 col-md-6 d-block d-lg-none">
                            <div class="logo"><a href="/"><img src="{{ asset("assets/images/logo/logo.png") }}" alt=""></a></div>
                        </div>
                        
                        
                        <div class="col-lg-3 col-md-6 col-7 d-block d-lg-none">
                            <div class="right-blok-box text-white d-flex">

                                <div class="shopping-cart-wrap cart-count">
                                    <a href="/cart"><i class="icon-basket-loaded"></i><span class="cart-total count"></span></a>
                                </div>

                                <div class="mobile-menu-btn d-block d-lg-none">
                                    <div class="off-canvas-btn">
                                        <a href="#"><img src="{{ asset("assets/images/icon/bg-menu.png") }}" alt=""></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- haeader bottom End -->
            
            <!-- off-canvas menu start -->
            <aside class="off-canvas-wrapper">
                <div class="off-canvas-overlay"></div>
                <div class="off-canvas-inner-content">
                    <div class="btn-close-off-canvas">
                        <i class="fa fa-times"></i>
                    </div>

                    <div class="off-canvas-inner">

                        <div class="search-box-offcanvas">
                            <form>
                                <input type="text" placeholder="Search product...">
                                <button class="search-btn"><i class="icon-magnifier"></i></button>
                            </form>
                        </div>

                        <!-- mobile menu start -->
                        <div class="mobile-navigation">

                            <!-- mobile menu navigation start -->
                            <nav>
                                <ul class="mobile-menu">
                                    <li><a href="/">HOme</a></li>
                                    <li><a href="/about">About Us</a></li>
                                    <li><a href="/category">Category</a></li>
                                    <li><a href="/blog">Blog</a></li>
                                    <li><a href="/contact-us">Contact</a></li>
                                </ul>
                            </nav>
                            <!-- mobile menu navigation end -->
                        </div>
                        <!-- mobile menu end -->

 
                        <!-- offcanvas widget area start -->
                        <div class="offcanvas-widget-area">
                            <div class="top-info-wrap text-left text-black">
                                <h5>My Account</h5>
                                <ul class="offcanvas-account-container">
                                    <?php if ($customer_data['is_login']): ?>  
                                    <li><a href="/profile">{{$customer_data['name']}}</a></li>
                                    <?php else: ?>
                                    <li><a href="/login">My account</a></li>
                                    <?php endif ?> 
                                    <li><a href="/cart">Cart</a></li>
                                    <li><a href="/checkout">Checkout</a></li>
                                </ul>
                            </div>

                        </div>
                        <!-- offcanvas widget area end -->
                    </div>
                </div>
            </aside>
            <!-- off-canvas menu end -->
            
        </header>
        <!--  Header Start -->
        

        @yield('body')
       
        <!-- footer Start -->
        <footer>
            <div class="footer-top section-pb section-pt-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">

                            <div class="widget-footer mt-40">
                                <h6 class="title-widget">Contact Info</h6>

                                <div class="footer-addres">
                                    <div class="widget-content mb--20">
                                        <p>Address: Hanoi</p>
                                        <p>Phone: <a href="tel:">(+84) 123 456 789</a></p> 
                                        <p>Email: <a href="tel:">Ruiz@gmail.com</a></p>
                                    </div>
                                </div>

                                <ul class="social-icons">
                                    <li>
                                        <a class="facebook social-icon" href="#" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a class="twitter social-icon" href="#" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a class="instagram social-icon" href="#" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a class="linkedin social-icon" href="#" title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
                                    </li>
                                    <li>
                                        <a class="rss social-icon" href="#" title="Rss" target="_blank"><i class="fa fa-rss"></i></a>
                                    </li>
                                </ul>

                            </div>

                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6">
                            <div class="widget-footer mt-40">
                                <h6 class="title-widget">Information</h6>
                                {{-- <ul class="footer-list">
                                    <li><a href="/">Home</a></li>
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="contact.html">Quick Contact</a></li>
                                    <li><a href="blog.html">Blog Pages</a></li>
                                    <li><a href="#">Concord History</a></li>
                                    <li><a href="#">Client Feed</a></li>
                                </ul> --}}
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6">
                            <div class="widget-footer mt-40">
                                <h6 class="title-widget">Extras</h6>
                                {{-- <ul class="footer-list">
                                    <li><a href="#">Concord History</a></li>
                                    <li><a href="#">Client Feed</a></li>
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="contact.html">Quick Contact</a></li>
                                    <li><a href="blog.html">Blog Pages</a></li>
                                </ul> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="widget-footer mt-40">
                                <h6 class="title-widget">Contact</h6>
                                {{-- <p>GreenLife App is now available on Google Play & App Store. Get it now.</p>
                                <ul class="footer-list">
                                    <li><img src="{{ asset("assets/images/brand/img-googleplay.jpg") }}" alt=""></li>
                                    <li><img src="{{ asset("assets/images/brand/img-appstore.jpg") }}" alt=""></li>
                                </ul> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="copy-left-text">
                                <p>Copyright &copy; <a href="#">Ruiz</a> 2019. All Right Reserved.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="copy-right-image">
                                <img src="{{ asset("assets/images/icon/img-payment.png") }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer End -->
          
           
           
    </div>

    <!-- JS
============================================ -->

    <!-- Modernizer JS -->
    <script src="{{ asset("assets/js/vendor/modernizr-3.6.0.min.js") }}"></script>

    <!-- jquery -->		
    <script src="{{ asset("assets/js/vendor/jquery-3.6.1.min.js") }}"></script>
    <script src="{{ asset("assets/js/vendor/jquery-migrate-3.4.0.min.js") }}"></script>		

    <!-- Bootstrap JS -->
    <script src="{{ asset("assets/js/vendor/bootstrap.min.js") }}"></script>

    <!-- Plugins JS -->
    <script src="{{ asset("assets/js/plugins/slick.min.js") }}"></script>
    <script src="{{ asset("assets/js/plugins/jquery.nice-select.min.js") }}"></script>
    <script src="{{ asset("assets/js/plugins/countdown.min.js") }}"></script>
    <script src="{{ asset("assets/js/plugins/image-zoom.min.js") }}"></script>
    <script src="{{ asset("assets/js/plugins/fancybox.js") }}"></script>
    <script src="{{ asset("assets/js/plugins/scrollup.min.js") }}"></script>
    <script src="{{ asset("assets/js/plugins/jqueryui.min.js") }}"></script> 
    <script src="{{ asset("assets/js/plugins/ajax-contact.js") }}"></script>

    <!-- Vendor & Plugins JS (Please remove the comment from below vendor.min.js") }} & plugins.min.js") }} for better website load performance and remove js files from avobe) -->
    <!--
<script src="{{ asset("assets/js/vendor/vendor.min.js") }}"></script>
<script src="{{ asset("assets/js/plugins/plugins.min.js") }}"></script>
-->

    <!-- Main JS -->
    <script src="{{ asset("assets/js/main.js") }}"></script>
    <script src="{{ asset('assets/js/api.js') }}"></script>
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <script src="{{ asset('assets/js/pagination.js') }}"></script>
    @yield('js')

</body>

</html>