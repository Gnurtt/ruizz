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
                            <li class="breadcrumb-item active">Category</li>
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
                <div class="row">
                    <div class="col-lg-3 order-lg-1 order-2">
                        <!-- shop-sidebar-wrap start -->
                        <div class="shop-sidebar-wrap">
                            <div class="shop-box-area">

                                <!--sidebar-categores-box start  -->
                                <div class="sidebar-categores-box shop-sidebar mb-30">
                                    <h4 class="title">Product categories</h4>
                                    <!-- category-sub-menu start -->
                                    <div class="category-sub-menu">
                                        <ul class="brand-list">
                                             
                                        </ul>
                                    </div>
                                    <!-- category-sub-menu end -->
                                </div>
                                <!--sidebar-categores-box end  -->

                                <!-- shop-sidebar start -->
                                <div class="shop-sidebar mb-30">
                                    <h4 class="title">Filter By Price</h4>
                                    <!-- filter-price-content start -->
                                    <div class="filter-price-content">
                                        <div>
                                            <div id="price-slider" class="price-slider"></div>
                                            <div class="filter-price-wapper">
                                                <input type="hidden" class="value-price" value="0-999">
                                                <a class="add-to-cart-button" href="#">
                                                    <span>FILTER</span>
                                                </a>
                                                <div class="filter-price-cont">

                                                    <span>Price:</span>
                                                    <div class="input-type">
                                                        <input type="text" id="min-price" readonly="" />
                                                    </div>
                                                    <span>—</span>
                                                    <div class="input-type">
                                                        <input type="text" id="max-price" readonly="" style="width: 60px;" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- filter-price-content end -->
                                </div>
                                <!-- shop-sidebar end -->

                                <!-- shop-sidebar start -->
                                <!-- <div class="shop-sidebar mb-30">
                                    <h4 class="title">Filter by Color</h4>

                                    <ul class="category-widget-list color-list">
                                        
                                    </ul>

                                </div> -->
                                <!-- shop-sidebar end -->
 
                            </div>
                        </div>
                        <!-- shop-sidebar-wrap end -->
                    </div>
                    <div class="col-lg-9 order-lg-2 order-1">

                        <!-- shop-product-wrapper start -->
                        <div class="shop-product-wrapper">
                            <div class="row align-itmes-center">
                                <div class="col">
                                    <!-- shop-top-bar start -->
                                    <div class="shop-top-bar">
                                        <!-- product-view-mode start -->

                                        <div class="product-mode">
                                            <!--shop-item-filter-list-->
                                            <ul class="nav shop-item-filter-list" role="tablist">
                                                <li class="active"><a class="active grid-view" data-bs-toggle="tab" href="#grid"><i class="fa fa-th"></i></a></li>
                                                <li><a class="list-view" data-bs-toggle="tab" href="#list"><i class="fa fa-th-list"></i></a></li>
                                            </ul>
                                            <!-- shop-item-filter-list end -->
                                        </div>
                                        <!-- product-view-mode end -->
                                        <!-- product-short start -->
                                        <div class="product-short">
                                            <p>Sort By :</p>
                                            <select class="nice-select" name="sortby">
                                                <option value="trending">Relevance</option>
                                                <option value="sales">Name(A - Z)</option>
                                                <option value="sales">Name(Z - A)</option>
                                                <option value="rating">Price(Low > High)</option>
                                                <option value="date">Rating(Lowest)</option>
                                            </select>
                                        </div>
                                        <!-- product-short end -->
                                    </div>
                                    <!-- shop-top-bar end -->
                                </div>
                            </div>

                            <!-- shop-products-wrap start -->
                            <div class="shop-products-wrap">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="grid">
                                        <div class="shop-product-wrap">
                                            <div class="row grid-item">
                                                 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane list-item" id="list">

                                    </div>
                                </div>
                            </div>
                            <!-- shop-products-wrap end -->

                            <!-- paginatoin-area start -->
                            <!-- <div class="paginatoin-area">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <ul class="pagination-box">
                                            <li class="active"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li>
                                                <a class="Next" href="#">Next</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div> -->
                            
                            <nav class="d-md-flex justify-content-between align-items-center border-top pt-3" aria-label="Page navigation example">
                                <div class="text-center text-md-left mb-3 mb-md-0">Hiển thị <span class="count-start"></span> - <span class="count-end"></span> trong <span class="count-total"></span> kết quả</div>
                                <div class="woocommerce-pagination"> </div>
                            </nav>
                            <!-- paginatoin-area end -->
                        </div>
                        <!-- shop-product-wrapper end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- main-content-wrap end -->

       
@endsection()

@section('sub_layout')

@endsection()


@section('js')
<script type="text/javascript" src="{{ asset('assets/js/page/category.js') }}"></script>
@endsection()
        
