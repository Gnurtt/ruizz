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
                            <li class="breadcrumb-item active">Checkout Page</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->

        <!-- main-content-wrap start -->
        <div class="main-content-wrap section-ptb checkout-page">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="coupon-area">
                            <!-- coupon-accordion start -->
                            <div class="coupon-accordion">
                                <h3>Returning customer? <span class="coupon" id="showlogin"><a href="/login">Click here to login</a></span></h3>
                                 
                            </div>
                            <!-- coupon-accordion end -->
                        </div>
                    </div>
                </div>
                <!-- checkout-details-wrapper start -->
                <div class="checkout-details-wrapper">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <!-- billing-details-wrap start -->
                            <div class="billing-details-wrap">
                                <div class="cart-form-data js-validate">
                                    <h3 class="shoping-checkboxt-title">Billing Details</h3>
                                    <input type="hidden" name="First name" class="data-id" value="<?php echo $customer_data['id']; ?>">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <p class="single-form-row">
                                                <label>Username <span class="required">*</span></label>
                                                <input type="text" name="First name" class="data-name" value="<?php echo $customer_data['name']; ?>">
                                            </p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p class="single-form-row">
                                                <label>Email <span class="required">*</span></label>
                                                <input type="text" name="Last name" class="data-email" value="<?php echo $customer_data['email']; ?>">
                                            </p>
                                        </div> 
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Town / City <span class="required">*</span></label>
                                                <input type="text" name="address" class="data-address" value="<?php echo $customer_data['address']; ?>">
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Phone <span class="required">*</span></label>
                                                <input type="text" name="phone" class="data-phone" value="<?php echo $customer_data['phone']; ?>">
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row m-0">
                                                <label>Order notes</label>
                                                <textarea placeholder="Notes about your order, e.g. special notes for delivery." class="checkout-mess data-description" rows="2" cols="5"></textarea>
                                            </p>
                                        </div>
                                        <div class="error-log mt-3"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- billing-details-wrap end -->
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <!-- your-order-wrapper start -->
                            <div class="your-order-wrapper">
                                <h3 class="shoping-checkboxt-title">Your Order</h3>
                                <!-- your-order-wrap start-->
                                <div class="your-order-wrap">
                                    <!-- your-order-table start -->
                                    <div class="your-order-table table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="product-name">Product</th>
                                                    <th class="product-total">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody class="cart-list">
                                                
                                            </tbody>
                                            <tfoot>
                                                <tr class="order-total">
                                                    <th>Order Total</th>
                                                    <td><strong><span class="amount cart-total-price"></span></strong>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- your-order-table end -->

                                    <!-- your-order-wrap end -->
                                    <div class="payment-method">

                                        <img src="{{ asset("qr.jpg") }}" alt="" class="mb-3">
                                        <div class="payment-accordion">
                                            <p>
                                                <input type="radio" value="bank" name="payment">
                                                Banking
                                            </p>    
                                            <p>
                                                <input type="radio" value="cod" name="payment">
                                                COD
                                            </p>    
                                        </div>
                                        <div class="order-button-payment">
                                            <input type="button" value="Place order" class="button-payment" />
                                        </div>
                                    </div>
                                    <!-- your-order-wrapper start -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- checkout-details-wrapper end -->
            </div>
        </div>
        <!-- main-content-wrap end -->
       
@endsection()

@section('sub_layout')

@endsection()


@section('js')
<script type="text/javascript" src="{{ asset('assets/js/page/checkout.js') }}"></script>
@endsection()
        
