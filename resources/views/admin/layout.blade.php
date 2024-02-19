<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin - @yield('title')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="">

    <!-- page css -->
    <link href="{{ asset('manager/assets/vendors/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    @yield('css')

    <!-- Core css -->
    <link href="{{ asset('manager/assets/css/app.min.css') }}" rel="stylesheet">
    <link href="{{ asset('manager/assets/css/custom.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>

<body>
    <div class="app">
        <div class="layout">
            <div class="header">
                <div class="logo logo-dark">
                    <a href="/" class="logo-title">
                        {{-- <img src="{{ asset('icon/logo.png') }}" style="width: 150px;" alt="Logo"> --}}
                        {{-- <img class="logo-fold" src="{{ asset('icon/slogo.png') }}" style="width: 40px;" alt="Logo"> --}}

                        <span class="logo-full">Ruiz</span>
                        <span class="logo-part">R</span>
                        
                    </a>
                </div>
                <div class="nav-wrap">
                    <ul class="nav-left">
                        <li class="desktop-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon"></i>
                            </a>
                        </li>
                        <li class="mobile-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="dropdown dropdown-animated scale-left">
                            <div class="pointer" data-toggle="dropdown">
                                <div class="avatar avatar-image  m-h-10 m-r-15">
                                    <img src="manager/assets/images/avatars/thumb-3.jpg"  alt="">
                                </div>
                            </div>
                            <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                                <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                                    <div class="d-flex m-r-50">
                                        <div class="avatar avatar-lg avatar-image">
                                            <img src="manager/assets/images/avatars/thumb-3.jpg" alt="">
                                        </div>
                                        <div class="m-l-10">
                                            <p class="m-b-0 text-dark font-weight-semibold">Admin</p>
                                            <p class="m-b-0 opacity-07">@super-admin</p>
                                        </div>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-lock"></i>
                                            <span class="m-l-10">Cài đặt tài khoản</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                                <a href="javascript:void(0);"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                            <span class="m-l-10">Đăng xuất</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>    
            @yield('menu-data')
            @include('admin.sidebar')
            <div class="page-container">
                <div class="main-content">
                    @yield('body')
                </div>
            </div>
            @yield('sub_layout')
            @yield('modal')
            @include('admin.toast')
        </div>
    </div>

    
    <!-- Core Vendors JS -->
    <script src="{{ asset('manager/assets/js/vendors.min.js') }}"></script>

    <!-- page js -->
    <script src="{{ asset('manager/assets/js/api.js') }}"></script>

    <script src="{{ asset('manager/assets/js/lazy-load/jquery.lazy.min.js') }}"></script>
    <script src="{{ asset('manager/assets/js/lazy-load/jquery.lazy.plugins.min.js') }}"></script>

    <script src="{{ asset('manager/assets/js/summernote/summernote-lite.min.js') }}"></script>

    <script src="{{ asset('manager/assets/vendors/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('manager/assets/vendors/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('manager/assets/js/pages/datatables.js') }}"></script>

    {{-- Custom library js --}}
    <script src="{{ asset('manager/assets/js/layout.js') }}"></script>
    {{-- Modal Template JS --}}
    <script src="{{ asset('manager/assets/js/template.js') }}"></script>

    <!-- page js --> 
    @yield('js')

    <!-- Core JS -->
    <script src="{{ asset('manager/assets/js/app.min.js') }}"></script>

</body>

</html>