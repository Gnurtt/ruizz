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
                    <li class="breadcrumb-item active">Large Blog  Page</li>
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
            
        
            <div class="col-lg-12 order-1">

                <div class="blog-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- single-blog-wrap Start -->
                            <div class="single-blog-wrap mb-40">
                                <div class="latest-blog-content mt-0">
                                    <h4><a href="blog-details.html">{{ $data->title }}</a></h4>
                                    <ul class="post-meta">
                                        <li class="post-author">By <a href="#">admin </a></li>
                                        <li class="post-date">{{ $data->created_at }}</li>
                                    </ul>
                                </div>
                                <div class="latest-blog-image">
                                    <a href="#"><img src="/{{ $data->banner }}" alt="" style="width: 100%"></a>
                                </div>
                                <div class="latest-blog-content mt-20">
                                    {!! $data->detail !!}
                                </div>
 
                            </div>
                            <!-- single-blog-wrap End -->

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
        
XZ8rp8RzF{$O