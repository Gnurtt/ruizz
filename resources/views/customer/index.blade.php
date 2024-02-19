@extends('customer.layout')
@section('title', "")


@section('css')

@endsection()


@section('body')

        <!-- Hero Section Start -->
        <div class="hero-slider hero-slider-one">

            <!-- Single Slide Start -->
            <div class="single-slide" style="background-image: url({{ asset("assets/images/slider/slide-bg-2.jpg") }})">
                <!-- Hero Content One Start -->
                <div class="hero-content-one container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="slider-content-text text-left">
                                <h5>Exclusive Offer -20% Off This Week</h5>
                                <h1>H-Vault Classico</h1>
                                <p>H-Vault Watches Are A Lot Like Classic American Muscle Cars - Expect For The American Part That Is. </p>
                                <p>Starting At <strong>$1.499.00</strong></p>
                                <div class="slide-btn-group">
                                    <a href="category" class="btn btn-bordered btn-style-1">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Hero Content One End -->
            </div>
            <!-- Single Slide End -->
            
            <!-- Single Slide Start -->
            <div class="single-slide" style="background-image: url({{ asset("assets/images/slider/slide-bg-1.jpg") }})">
                <!-- Hero Content One Start -->
                <div class="hero-content-one container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="slider-content-text text-left">
                                <h5>Exclusive Offer -20% Off This Week</h5>
                                <h1>H-Vault Classico</h1>
                                <p>H-Vault Watches Are A Lot Like Classic American Muscle Cars - Expect For The American Part That Is. </p>
                                <p>Starting At <strong>$1.499.00</strong></p>
                                <div class="slide-btn-group">
                                    <a href="shop.html" class="btn btn-bordered btn-style-1">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Hero Content One End -->
            </div>
            <!-- Single Slide End -->

        </div>
        <!-- Hero Section End -->
        
        <!-- Banner Area Start -->
        <div class="banner-area section-pt">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="single-banner mb-30">
                            <a href="#"><img src="{{ asset("assets/images/banner/banner-01.jpg") }}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-6  col-md-6">
                        <div class="single-banner mb-30">
                            <a href="#"><img src="{{ asset("assets/images/banner/banner-02.jpg") }}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Area End -->
       
        <!-- Product Area Start -->
        <div class="product-area section-pb section-pt-30">
            <div class="container">
               
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h4>Best seller products</h4>
                        </div>
                    </div>
                </div>
                <div class="row product-active-lg-4 data-list">

                </div>
            </div>
        </div>
        <!-- Product Area End -->
        
        <!-- Banner Area Start -->
        <div class="banner-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="single-banner mb-30">
                            <a href="#"><img src="{{ asset("assets/images/banner/banner-03.jpg") }}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-6  col-md-6">
                        <div class="single-banner mb-30">
                            <a href="#"><img src="{{ asset("assets/images/banner/banner-04.jpg") }}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Area End -->
        
        
        <!-- Product Area Start -->
        <div class="product-area section-pb section-pt-30">
            <div class="container">
               
                <div class="row">
                    <div class="col-12 text-center">
                        <ul class="nav product-tab-menu" role="tablist"> 
                            <li class="product-tab__item nav-item active">
                                <a class="product-tab__link active" id="nav-new-tab" data-bs-toggle="tab" href="#nav-new" role="tab" aria-selected="false">New Arrivals</a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                
                <div class="tab-content product-tab__content" id="product-tabContent">
                    
                    
                    <div class="tab-pane fade show active" id="nav-new" role="tabpanel">
                        <div class="product-carousel-group">
                            <div class="row product-active-row-4 new-products">
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- Product Area End -->
        
        <!-- letast blog area Start -->
        <div class="letast-blog-area section-pb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h4>Blog sharing</h4>
                        </div>
                    </div>
                </div>
                <div class="row blog-list">
                     
                    
                </div>
            </div>
        </div>
        <!-- letast blog area End -->
         
       

@endsection()

@section('sub_layout')

@endsection()


@section('js')
<script type="text/javascript" src="{{ asset('assets/js/page/index.js') }}"></script>
@endsection()
        
