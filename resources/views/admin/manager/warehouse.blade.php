@extends('admin.layout')
@section('title', 'Kho hàng')
@section('menu-data')
<input type="hidden" name="" class="menu-data" value="warehouse-group | warehouse">
@endsection()


@section('css')
    <link href="{{ asset('manager/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">
@endsection()


@section('body')

    
<div class="page-header no-gutters has-tab">
    <div class="d-md-flex m-b-15 align-items-center justify-content-between notification relative" id="notification">
        <div class="media align-center justify-content-between m-b-15 w-100">
            <div class="m-l-15">
                <h4 class="m-b-0">Kho hàng</h4>
            </div>
            @include('admin.alert')
        </div>
    </div>
</div>


<div class="row I-warehouse">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
        <div class="card">
            <div class="card-body">
                <a href="#" class="btn btn-default btn-sm flex-right modal-fs-control w-100" atr="Create">Nhập kho<i class="fas fa-plus m-l-5"></i></a> 
                <div class="status-list">
                    <p>Danh mục</p>
                    <div class="status-event" atr="Item" data-id="">
                        <div class="d-flex align-items-center">
                            <div class="badge badge-primary badge-dot m-r-10"></div>
                            <div>Kho hàng</div>
                        </div>
                    </div>
                    <div class="status-event is-select" atr="History" data-id="">
                        <div class="d-flex align-items-center">
                            <div class="badge badge-success badge-dot m-r-10"></div>
                            <div>Lịch sử nhập kho</div>
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


<div class="modal-fullscreen" id="create-modal">
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
            </div>
        </div>
    </div>
</div>
<div class="modal-fullscreen" id="delete-modal">
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
    
    <script src="{{ asset('manager/assets/js/page/warehouse.js') }}"></script>

@endsection()