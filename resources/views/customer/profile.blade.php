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
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">My Account Page</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->


        <!-- main-content-wrap start -->
        <div class="main-content-wrap section-ptb my-account-page">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="account-dashboard">
                            <div class="dashboard-upper-info">
                                <div class="row align-items-center no-gutters">
                                    <div class="col-lg-3 col-md-12">
                                        <div class="d-single-info">
                                            <p class="user-name">Hello <span>{{$customer_data['name']}}</span></p>
                                            <p>(not yourmail@info? <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit(); localStorage.removeItem('ruiz-cart')">Log Out</a>)</p>
                                            <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" class="d-none"> @csrf </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="d-single-info">
                                            <p>Need Assistance? Customer service at.</p>
                                            <p>admin@ruiz.com.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-12">
                                        <div class="d-single-info">
                                            <p>E-mail them at </p>
                                            <p>support@ruiz.com</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-12">
                                        <div class="d-single-info text-lg-center">
                                            <a href="/cart" class="view-cart"><i class="fa fa-cart-plus"></i>view cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-2">
                                    <!-- Nav tabs -->
                                    <ul role="tablist" class="nav flex-column dashboard-list">
                                        <li><a href="#dashboard" data-bs-toggle="tab" class="nav-link active">Dashboard</a></li>
                                        <li> <a href="#orders" data-bs-toggle="tab" class="nav-link">Orders</a></li>  
                                        <li><a href="#account-details" data-bs-toggle="tab" class="nav-link">Change Password</a></li>
                                        <li><a href="#" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit(); localStorage.removeItem('ruiz-cart')">logout</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-12 col-lg-10">
                                    <!-- Tab panes -->
                                    <div class="tab-content dashboard-content">
                                        <div class="tab-pane active" id="dashboard">
                                            <h3>Dashboard </h3>
                                            <p>Showing information in here</a></p>
                                        </div>
                                        <div class="tab-pane fade" id="orders">
                                            <h3>Orders</h3>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Order</th>
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="order-list">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div> 
                                        <div class="tab-pane fade" id="account-details">
                                            <h3>Account details </h3>
                                            <div class="login">
                                                <div class="login-form-container">
                                                    <div class="account-login-form">
                                                        <div> 
                                                            <div class="account-input-box">
                                                                <label>Password</label>
                                                                <input type="password" name="user-password" class="data-password">
                                                            </div>  
                                                            <div class="button-box">
                                                                <button class="btn default-btn password-update" atr="Update" >Save</button>
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
            </div>
        </div>
        <!-- main-content-wrap end -->


@endsection()

@section('sub_layout')

@endsection()


@section('js')
<script type="text/javascript" src="{{ asset('assets/js/page/profile.js') }}"></script>
@endsection()
        
