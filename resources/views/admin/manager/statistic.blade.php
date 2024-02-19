@extends('admin.layout')
@section('title', 'Thống kê')
@section('menu-data')
<input type="hidden" name="" class="menu-data" value="statistic-group | statistic">
@endsection()


@section('css')
    <link href="{{ asset('manager/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">
@endsection()


@section('body')

    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-blue">
                            <i class="anticon anticon-dollar"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0 data-turnover"> </h2>
                            <p class="m-b-0 text-muted">Doanh thu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-cyan">
                            <i class="anticon anticon-line-chart"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0 data-item_sell"> </h2>
                            <p class="m-b-0 text-muted">Sản phẩm đã bán</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-gold">
                            <i class="anticon anticon-profile"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0 data-order_time"> </h2>
                            <p class="m-b-0 text-muted">Đơn hàng</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-purple">
                            <i class="anticon anticon-user"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0 data-customer_buy"> </h2>
                            <p class="m-b-0 text-muted">Khách hàng</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        
        <div class="col-md-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                   <div class="d-flex justify-content-between align-items-center">
                        <h5>Top Sản phẩm</h5>
                    </div>
                    <div class="m-t-30">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID sản phẩm</th>
                                        <th>Sản phẩm</th>
                                        <th>Đã bán</th>
                                        <th style="max-width: 70px">Còn lại</th>
                                    </tr>
                                </thead>
                                <tbody class="sale-list">
                                     
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div> 
@endsection()


@section('sub_layout')
 

@endsection()
@section('js')

    <script src="{{ asset('manager/assets/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('manager/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    

    <script src="{{ asset('manager/assets/js/page/index.js') }}"></script>
@endsection()