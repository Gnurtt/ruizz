@extends('customer.layout')
@section('title', "")


@section('css')

@endsection()


@section('body')


<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">About Us</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<!-- Page Conttent -->
<main class="about-us-page section-ptb">
    
    <div class="about-us_area section-pb">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-us_img">
                        <img src="assets/images/banner/about-us_bg.jpg" alt="About Us Image">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-us_content">
                        <h3 class="heading mb-20">About Ruiz</h3>
                        <p class="short-desc mb-20">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias rem omnis fugiat dolores tenetur voluptatum explicabo illo vitae pariatur. Accusantium dolorum tempore, ullam assumenda nulla aliquid, voluptatibus veniam rem reprehenderit laboriosam itaque nihil velit doloremque vel! Natus, atque. Nesciunt modi tenetur, excepturi deserunt aperiam velit itaque. Modi, incidunt molestiae perspiciatis ratione error quidem pariatur laborum dignissimos nihil, quos cumque earum eveniet possimus dicta!
                        </p>
                        <div class="munoz-btn-ps_left slide-btn">
                            <a class="btn" href="/category">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="testimonials-area bg-gray section-ptb">
    
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class=" testimonials-area">
                        <div class="row testimonial-two">
                            <div class="col-lg-6 m-auto">
                                <div class="testimonial-wrap-two text-center">
                                    <div class="quote-container">
                                        <div class="quote-image">
                                            <img src="assets/images/testimonial/testimonial-01.jpg" alt="">
                                        </div>
                                        <div class="author">
                                            <h6>Trung Nguyen</h6>
                                            <p>CEO of Ruiz</p>
                                        </div>
                                        <div class="testimonials-text">
                                            <p>Support and response has been amazing, helping me with several issues I came across and got them solved almost the same day. A pleasure to work with them!</p>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
</main>
<!--// Page Conttent -->

<!-- our-brand-area start -->
<div class="our-brand-area section-pb-30">
    <div class="container">
        <div class="row our-brand-active">
            <div class="brand-single-item">
                <a href="#"><img src="assets/images/brand/brand-01.png" alt=""></a>
            </div>
            <div class="brand-single-item">
                <a href="#"><img src="assets/images/brand/brand-01.png" alt=""></a>
            </div>
            <div class="brand-single-item">
                <a href="#"><img src="assets/images/brand/brand-01.png" alt=""></a>
            </div>
            <div class="brand-single-item">
                <a href="#"><img src="assets/images/brand/brand-01.png" alt=""></a>
            </div>
            <div class="brand-single-item">
                <a href="#"><img src="assets/images/brand/brand-01.png" alt=""></a>
            </div>
            <div class="brand-single-item">
                <a href="#"><img src="assets/images/brand/brand-01.png" alt=""></a>
            </div>
            <div class="brand-single-item">
                <a href="#"><img src="assets/images/brand/brand-01.png" alt=""></a>
            </div>
        </div>
    </div>
</div>
<!-- our-brand-area end -->

       
@endsection()

@section('sub_layout')

@endsection()


@section('js')
<script type="text/javascript" src="{{ asset('customer/assets/js/page/index.js') }}"></script>
@endsection()
        
