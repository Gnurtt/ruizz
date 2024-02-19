@extends('admin.layout')
@section('title', 'Đơn hàng')
@section('menu-data')
<input type="hidden" name="" class="menu-data" value="order-group | order">
@endsection()


@section('css')
    <link href="{{ asset('manager/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">
@endsection()


@section('body')

    
<div class="page-header no-gutters has-tab">
    <div class="d-md-flex m-b-15 align-items-center justify-content-between notification relative" id="notification">
        <div class="media align-center justify-content-between m-b-15 w-100">
            <div class="m-l-15">
                <h4 class="m-b-0">Đơn hàng</h4>
            </div>
            @include('admin.alert')
        </div>
    </div>
</div>


<div class="row I-warehouse">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
        <div class="card">
            <div class="card-body">
                <div class="status-list">
                <div class="status-event" atr="All" data-id="">
                        <div class="d-flex align-items-center">
                            <div class="badge badge-primary badge-dot m-r-10"></div>
                            <div>Tất cả đơn hàng</div>
                        </div>
                    </div>
                    <div class="status-event is-select" atr="Pending" data-id="0">
                        <div class="d-flex align-items-center">
                            <div class="badge badge-warning badge-dot m-r-10"></div>
                            <div>Chờ xử lí</div>
                        </div>
                    </div>
                    <div class="status-event" atr="Unfulfilled" data-id="1">
                        <div class="d-flex align-items-center">
                            <div class="badge badge-secondary badge-dot m-r-10"></div>
                            <div>Chưa hoàn thiện</div>
                        </div>
                    </div>
                    <div class="status-event" atr="Fulfilled" data-id="2">
                        <div class="d-flex align-items-center">
                            <div class="badge badge-info badge-dot m-r-10"></div>
                            <div>Đã hoàn thiện</div>
                        </div>
                    </div>
                    <div class="status-event" atr="Shipped" data-id="3">
                        <div class="d-flex align-items-center">
                            <div class="badge badge-purple badge-dot m-r-10"></div>
                            <div>Chờ giao hàng</div>
                        </div>
                    </div>
                    <div class="status-event" atr="Shipped" data-id="4">
                        <div class="d-flex align-items-center">
                            <div class="badge badge-cyan badge-dot m-r-10"></div>
                            <div>Đang giao hàng</div>
                        </div>
                    </div>
                    <div class="status-event" atr="Shipped" data-id="5">
                        <div class="d-flex align-items-center">
                            <div class="badge badge-geekblue badge-dot m-r-10"></div>
                            <div>Đã giao hàng</div>
                        </div>
                    </div>
                    <div class="status-event" atr="Shipped" data-id="6">
                        <div class="d-flex align-items-center">
                            <div class="badge badge-success badge-dot m-r-10"></div>
                            <div>Kêt thúc</div>
                        </div>
                    </div>
                    <div class="status-event" atr="Refund" data-id="7">
                        <div class="d-flex align-items-center">
                            <div class="badge badge-danger badge-dot m-r-10"></div>
                            <div>Hoàn trả</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
        <div class="card">
            <div class="card-body">
                <div class="m-t-25 data-table-wrapper">
                    <table id="data-table" class="table"> </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection()


@section('sub_layout')

<div class="modal-fullscreen" id="update-modal">
    <div class="fs-wrapper">
        <div class="fs-body">
            <div class="fs-title">
                <h4 class="modal-title"> </h4>
                <div class="modal-close">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="fs-content is-scrolling">
                <div class="fs-content-wrapper">
                </div>
            </div>
            <div class="fs-footer">
                <button type="button" class="btn btn-default close-modal m-r-10" ></button>
                <button type="button" class="btn btn-primary push-modal" atr="Push"></button>
            </div>
        </div>
    </div>
</div>

@endsection()

@section('js')
    
    <script src="{{ asset('manager/assets/js/page/order.js') }}"></script>

@endsection()