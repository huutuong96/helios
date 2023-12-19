
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route("dashboard")}}" class="brand-link">
            <img src="{{asset("public/images/config/logo.png")}}" alt="Fabulous Logo" class="brand-image mx-auto my-auto" style="opacity: .8">
            <span class="brand-text font-weight-light">admin</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">

            <!-- SidebarSearch Form -->
            <div class="form-inline mt-2">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar nav-child-indent nav-legacy flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{route("dashboard")}}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-box"></i>
                            <p>
                                Quản lý sản phẩm
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route("product_list")}}" class="nav-link">
                                    <i class="fa fa-box-open nav-icon"></i>
                                    <p>Tất cả cả sản phẩm</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route("categori_list")}}" class="nav-link">
                                    <i class="fa fa-code-branch nav-icon"></i>
                                    <p>Loại sản phẩm</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route("brand_list")}}" class="nav-link">
                                    <i class="fa fa-copyright nav-icon"></i>
                                    <p>Thương hiệu</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route("size_list")}}" class="nav-link">
                                    <i class="fa fa-list nav-icon"></i>
                                    <p>size</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-book"></i>
                            <p>
                                Quản lý bài viết
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route("post_list")}}" class="nav-link">
                                    <i class="fa fa-list nav-icon"></i>
                                    <p>Tất cả bài viết</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route("topic_list")}}" class="nav-link">
                                    <i class="fa fa-quote-left nav-icon"></i>
                                    <p>Chủ đề</p>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="index.php?option=single_page" class="nav-link">
                                    <i class="fa fa-clipboard nav-icon"></i>
                                    <p>Trang đơn</p>
                                </a>
                            </li> --}}
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-parachute-box"></i>
                            <p>
                                Quản lý bán hàng
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route("list_order")}}" class="nav-link">
                                    <i class="fa fa-list nav-icon"></i>
                                    <p>Tất cả đơn hàng</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route("user_list",["role"=>"user"])}}" class="nav-link">
                                    <i class="fa fa-users nav-icon"></i>
                                    <p>Danh sách khách hàng</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route("membercard_list")}}" class="nav-link">
                                    <i class="fa fa-user-shield nav-icon"></i>
                                    <p>Ds thẻ thành viên</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{route("show_contact")}}" class="nav-link">
                            <i class="nav-icon fa fa-phone"></i>
                            <p>
                                Liên hệ
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-desktop"></i>
                            <p>
                                Giao diện
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route("show_menu")}}" class="nav-link">
                                    <i class="fa fa-list nav-icon"></i>
                                    <p>Menu</p>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="index.php?option=slider" class="nav-link">
                                    <i class="fa fa-list nav-icon"></i>
                                    <p>Slider</p>
                                </a>
                            </li> --}}
                            <li class="nav-item">
                                <a href="{{route("banner_list")}}" class="nav-link">
                                    <i class="fa fa-list nav-icon"></i>
                                    <p>Banner quảng cáo</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-server"></i>
                            <p>
                                Hệ thống
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route("show_config")}}" class="nav-link">
                                    <i class="fa fa-tv nav-icon"></i>
                                    <p>Cấu hình website</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route("user_list")}}" class="nav-link">
                                    <i class="fa fa-users nav-icon"></i>
                                    <p>Danh sách quản trị viên</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?option=user" class="nav-link">
                                    
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li class="nav-header">Trang đơn</li> -->
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div> 
    </aside>

