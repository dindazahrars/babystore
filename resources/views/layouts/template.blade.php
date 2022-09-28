@if(Auth::user()->level == 'admin')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Baby Joy's Dashboard</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="Codedthemes" />
    <!-- Favicon icon -->
    {{-- CDN bootsrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="icon" href="{{asset('bck/assets/images/favicon.ico')}}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="{{asset('bck/assets/pages/waves/css/waves.min.css')}}" type="text/css" media="all">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{asset('bck/assets/css/bootstrap/css/bootstrap.min.css')}}">
    <!-- waves.css -->
    <link rel="stylesheet" href="{{asset('bck/assets/pages/waves/css/waves.min.css')}}" type="text/css" media="all">
    <!-- themify icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('bck/assets/icon/themify-icons/themify-icons.css')}}">
    <!-- font-awesome-n -->
    <link rel="stylesheet" type="text/css" href={{asset('bck/assets/css/font-awesome-n.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bck/assets/css/font-awesome.min.css')}}">
    <!-- scrollbar.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('bck/assets/css/jquery.mCustomScrollbar.css')}}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('bck/assets/css/style.css')}}">
</head>

<body>
    <!-- Pre-loader start -->
    @include('sweetalert::alert')
    <div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <a href="index.html">
                            <img class="img-fluid" src="{{asset('bck/assets/images/logo.png')}}" width="80%" alt="Theme-Logo" />
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="ti-more"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">

                            <li class="user-profile header-notification">
                                <a href="#!" class="waves-effect waves-light">
                                    <img src="{{asset('bck/assets/images/avatar-4.jpg')}}" class="img-radius" alt="User-Profile-Image">
                                    @if (Auth::check())
                                    <span>{{Auth::user()->name}}</span>
                                    @endif
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">

                                    <li class="waves-effect waves-light">
                                        <a href="user-profile.html">
                                            <i class="ti-user"></i> Profile
                                        </a>
                                    </li>

                                    <li class="waves-effect waves-light">

                                        <form action="{{route('logout')}}" method="post">
                                            @csrf
                                        <button type="submit" class="btn btn-danger">LogOut</button>
                                    </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    @include('body.header')
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">@yield('title')</h5>
                                            <p class="m-b-0">Welcome to Joy's Baby</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">@yield('title')</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        @yield('content')
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Required Jquery -->
    <script type="text/javascript" src="{{asset('bck/assets/js/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('bck/assets/js/jquery-ui/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('bck/assets/js/popper.js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('bck/assets/js/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- waves js -->
    <script src="{{asset('bck/assets/pages/waves/js/waves.min.js')}}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{asset('bck/assets/js/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <!-- slimscroll js -->
    <script src="{{asset('bck/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>

    <!-- menu js -->
    <script src="{{asset('bck/assets/js/pcoded.min.js')}}"></script>
    <script src="{{asset('bck/assets/js/vertical/vertical-layout.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('bck/assets/js/script.js')}}"></script>
</body>

</html>
@endif
