@extends('customer.layout')
@section('title', "")


@section('css')

@endsection()


@section('body')

    <input type="hidden" class="product-id" value="{{ $data_response["data"]->id }}">
        <!-- breadcrumb-area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">{{ $data_response["data"]->name }}</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->

        <!-- main-content-wrap start -->
        <div class="main-content-wrap shop-page section-ptb">
            <div class="container">
                <div class="row product-details-inner">
                    <div class="col-lg-5 col-md-6">
                        <!-- Product Details Left -->
                        <div class="product-large-slider">
                            <?php foreach (explode(",", $data_response["data"]->images) as $key => $value): ?>
                                <div class="pro-large-img img-zoom">
                                    <img src="/{{ $value }}" alt="product-details" />
                                    <a href="/{{ $value }}" data-fancybox="images"><i class="fa fa-search"></i></a>
                                </div>
                            <?php endforeach ?>  
                        </div>
                        <div class="product-nav">
                            <?php foreach (explode(",", $data_response["data"]->images) as $key => $value): ?>
                                <div class="pro-nav-thumb">
                                    <img src="/{{ $value }}" alt="product-details" />
                                </div>
                            <?php endforeach ?>   
                        </div>
                        <!--// Product Details Left -->
                    </div>

                    <div class="col-lg-7 col-md-6 product-data">
                        <div class="product-details-view-content">
                            <div class="product-info">
                                <h3>{{ $data_response["data"]->name }}</h3>
                                {{-- <div class="product-rating d-flex">
                                    <ul class="d-flex">
                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                    </ul>
                                    <a href="#reviews">(<span class="count">0</span> customer review)</a>
                                </div> --}}
                                <div class="price-box">
                                    <span class="new-price">${{ $data_response["data"]->prices }}</span>
                                    {{-- <span class="old-price">$78.00</span> --}}
                                </div>
                                <p>{{ $data_response["data"]->description }}</p>

                                <ul class="stock-cont my-3"> 
                                    <li class="product-stock-status">Sex: <a href="#">{{ $data_response["data"]->sex == 0 ? "Mans" : "Womans" }}</a></li> 
                                    <li class="product-stock-status">Brand: <a href="#">{{ $data_response["data"]->brand_name }}</a></li> 
                                </ul> 
                                <input type="hidden" class="product-id" value="{{ $data_response["data"]->id }}">
                                
                                <div class="single-add-to-cart">
                                    <div class="cart-quantity d-flex">
                                        <div class="quantity">
                                            <div class="cart-plus-minus">
                                                <input type="number" class="input-text product-quantity" name="quantity" value="1" title="Qty" style="width: 70px;">
                                            </div>
                                        </div>
                                        <div class="quantity">
                                            <div class="cart-plus-minus">
                                                <select name="" class="input-text product-color" id="" style="width: 80px;height: 40px; border: 1px solid #ddd; padding: 0 0 0 10px; background-color: #fff;">
                                                    <?php foreach ($data_response["color"] as $key => $value): ?>
                                                        <option value="<?php echo($value->color_id) ; ?>"><?php echo($value->name) ; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <button 
                                            class="add-to-cart action-add-to-card" 
                                            atr="Add to card" 
                                            type="submit" 
                                            data-id="{{ $data_response["data"]->id }}" 
                                            style="width: 70px;"
                                        >
                                            Add To Cart
                                        </button>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-description-area section-pt">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product-details-tab">
                                <ul role="tablist" class="nav">
                                    <li class="active" role="presentation">
                                        <a data-bs-toggle="tab" role="tab" href="#description" class="active">Description</a>
                                    </li>
                                    <li role="presentation">
                                        <a data-bs-toggle="tab" role="tab" href="#reviews">Reviews</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="product_details_tab_content tab-content">
                                <!-- Start Single Content -->
                                <div class="product_tab_content tab-pane active" id="description" role="tabpanel">
                                    <div class="product_description_wrap  mt-30">
                                        <div class="product_desc mb-30">
                                            <p>{{ $data_response["data"]->description }}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content -->
                                <!-- Start Single Content -->
                                <div class="product_tab_content tab-pane" id="reviews" role="tabpanel">
                                    <div class="review_address_inner mt-30">

                                    </div>
                                    <?php if($data_response["comment"]): ?>
                                        <!-- Start RAting Area -->
                                        <div id="half-stars-example">
                                            <div class="rating-group">
                                                <input class="rating__input rating__input--none" name="rating2" id="rating2-0" value="0" type="radio">
                                                <label aria-label="0 stars" class="rating__label" for="rating2-0">&nbsp;</label>
                                                <label aria-label="1 star" class="rating__label" for="rating2-10">
                                                    <i class="rating__icon rating__icon--star fa fa-star"></i>
                                                </label>
                                                <input class="rating__input" name="rating2" id="rating2-10" value="1" type="radio">
                                                <label aria-label="2 stars" class="rating__label" for="rating2-20">
                                                    <i class="rating__icon rating__icon--star fa fa-star"></i>
                                                </label>
                                                <input class="rating__input" name="rating2" id="rating2-20" value="2" type="radio">
                                                <label aria-label="3 stars" class="rating__label" for="rating2-30">
                                                    <i class="rating__icon rating__icon--star fa fa-star"></i>
                                                </label>
                                                <input class="rating__input" name="rating2" id="rating2-30" value="3" type="radio">
                                                <label aria-label="4 stars" class="rating__label" for="rating2-40">
                                                    <i class="rating__icon rating__icon--star fa fa-star"></i>
                                                </label>
                                                <input class="rating__input" name="rating2" id="rating2-40" value="4" type="radio">
                                                <label aria-label="5 stars" class="rating__label" for="rating2-50">
                                                    <i class="rating__icon rating__icon--star fa fa-star"></i>
                                                </label>
                                                <input class="rating__input" name="rating2" id="rating2-50" value="5" type="radio" checked="">
                                            </div>
                                        </div>
                                        <!-- End RAting Area -->
                                        <div class="comments-area comments-reply-area">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="comment-form-area">
                                                        <div class="comment-form-comment mt-15">
                                                            <label>Comment</label>
                                                            <textarea id="comment" class="comment-notes data_comment" required="required"></textarea>
                                                        </div>
                                                        <div class="comment-form-submit mt-15">
                                                            <button type="button" class="btn btn-primary-dark btn-wide transition-3d-hover comment-submit" atr="Comment Submit">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <p class="mt-3">You can't comment now</p>
                                    <?php endif; ?>
                                </div>
                                <!-- End Single Content -->
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="related-product-area section-pt">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h3> Related Product</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row related-product">
                        
                    </div>
                </div>                                            

            </div>
        </div>
        <!-- main-content-wrap end -->
@endsection()

@section('sub_layout')

@endsection()


@section('js')
<script type="text/javascript" src="{{ asset('assets/js/page/product.js') }}"></script>
@endsection()
        
