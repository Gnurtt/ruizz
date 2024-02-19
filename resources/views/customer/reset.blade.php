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
                        <li class="breadcrumb-item active">reset</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->

    <!-- main-content-wrap start -->
    <div class="main-content-wrap section-ptb lagin-and-register-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 m-auto">
                    <div class="login-register-wrapper"> 
                        <div class="login-register-tab-list nav"> 
                            <a class="active" >
                                <h4> Reset Password </h4>
                            </a>
                        </div>
                        <!-- login-register-tab-list end -->
                        <div class="tab-content">
                            <div id="forgotPassword" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form"> 
                                        <div  >
                                            <div class="js-validate"></div>
                                            <div class="login-input-box">
                                                <input type="email" name="user-name" placeholder="Email" class="data-email">
                                                <div style="position: relative;">
                                                    <input type="password" name="user-password" placeholder="New Password" class="data-password">
                                                    <img class="show-password"
                                                        style="position: absolute; width: 30px; height: 30px; top: 5px; right:  5px; cursor: pointer;" 
                                                        src="https://static.vecteezy.com/system/resources/previews/000/637/727/original/vector-eye-icon-symbol-sign.jpg" 
                                                        alt="">
                                                </div>
                                                <input type="text" name="user-name" placeholder="Code Verify" class="data-code">
                                            </div>
                                            <div class="button-box"> 
                                                <div class="button-box">
                                                    <button class="login-btn btn form-submit"  atr="Reset"><span>Update Password</span></button>
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
        </div>
    </div>
    <!-- main-content-wrap end -->
@endsection()

@section('sub_layout')

@endsection()


@section('js')

@endsection()
        