
    <nav class="main-header navbar navbar-expand navbar-dark text-sm dropdown-legacy">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route("dashboard")}}" class="nav-link">Dashboard</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route("contact")}}" class="nav-link">Liên hệ</a>
            </li>
            <li class="">
                <a href="{{route("index")}}" class="nav-link">Xem trang người dùng</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="{{asset("public/images/user/". Auth::user()->img )}}" class="user-image img-circle elevation-2" alt="User Image">
                    <span class="d-none d-md-inline"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- User image -->
                    <li class="user-header bg-primary">
                        <img src="{{asset("public/images/user/". Auth::user()->img )}}" class="img-circle elevation-2" alt="User Image">
                        <p>
                            {{Auth::user()->fullname}} - {{Auth::user()->role}}
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <a href="{{route("account_detail")}}" class="btn btn-default btn-flat">Quản lý Thông tin</a>
                        <a href="{{route("logout")}}" class="btn btn-default btn-flat float-right">Đăng xuất</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
