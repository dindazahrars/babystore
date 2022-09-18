<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <img class="img-80 img-radius" src="{{asset('bck/assets/images/avatar-4.jpg')}}" alt="User-Profile-Image">
                <div class="user-details">
                    @if (Auth::check())
                    <span id="more-details">{{Auth::user()->name}}<i class="fa fa-caret-down"></i></span>
                    @endif
                </div>
            </div>
            <div class="main-menu-content">
                <ul>
                    <li class="more-details">
                        <a ><i class="ti-user"></i>{{Auth::user()->level}}</a>
                        <a ><i class="ti-google"></i>{{Auth::user()->email}}</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="pcoded-navigation-label">Navigation</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="active">
                <a href="/home" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <div class="pcoded-navigation-label">Joy's Menu</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i><b>BC</b></span>
                    <span class="pcoded-mtext">Menu</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="{{route('user.index')}}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Admin & Pelanggan</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{route('barang.index')}}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Product</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{route('order.index')}}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Order</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{route('transaksi.index')}}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Transaksi</span>
                            <span class="pcoded-mcaret"></span>
                        </a>

                </ul>
            </li>
        </ul>
        <div class="pcoded-navigation-label">Laporan</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                    <span class="pcoded-mtext">Laporan</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
    </div>
</nav>
