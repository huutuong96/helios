@extends('FrontEnd.index')

@section('css')
    
@endsection

@section('main')
    <section class="main-container col1-layout">
        <div class="main container">
            <div class="account-login">
                <div class="page-title">
                    <h2>My Account</h2>
                </div>
                <div class="my-account-page">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-xs-12">
                                    <div class="col-md-5">
                                        <div class="text-center">
                                            <img class="img img-fluid img-circle" style="margin-top: 15px;" height="250px" width="250px" src="{{asset("public/images/user/".(Auth::user()->img ?? user.jpg))}}">
                                            <div>
                                                <h3>{{Auth::user()->username}}</h3>
                                            </div>
                                            <div class="service-desc text-center" style="margin: 15px 0 0 30px;display:flex;width:100%">
                                                <h4 style="margin-top: 30px; ">Cấp thành viên:</h4>
                                                <img class="img-responsive" style="margin-top: -10px;width:50%;height:50%" src="{{asset("public/images/member_card/".$member_rank->img)}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="service-box">
                                            <div class="service-desc">
                                                <strong>Họ tên:</strong>{{auth::user()->fullname}}
                                            </div>
                                        </div>
                                        <div class="service-box">
                                            <div class="service-desc">
                                                <strong>Email:</strong>{{auth::user()->email}}
                                            </div>
                                        </div>
                                        <div class="service-box">
                                            <div class="service-desc">
                                                <strong>Địa chỉ:</strong>{{auth::user()->address}}
                                            </div>
                                        </div>
                                        <div class="service-box">
                                            <div class="service-desc">
                                                <strong>Số điện thoại:</strong>{{auth::user()->phone}}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4" style="border: unset">
                            <div class="col-sm-12 col-md-12 col-xs-12">
                                <a href="{{route("account_orders")}}">
                                    <div class="account-box">
                                        <div class="service-box">
                                            <div class="service-icon"> <i class="fa fa-gift"></i> </div>
                                            <div class="service-desc">
                                                <h4>Lịch sử đơn hàng</h4>
                                                <p>Quản lý đơn hàng của bạn</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-12 col-md-12 col-xs-12">
                                <a href="{{route("account_detail")}}">
                                    <div class="account-box">
                                        <div class="service-box">
                                            <div class="service-icon"> <i class="fa fa-user"></i> </div>
                                            <div class="service-desc">
                                                <h4>Cập nhật thông tin</h4>
                                                <p>Quản lý thông tin của bạn</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-12 col-md-12 col-xs-12">
                                <a href="{{route("wishlist")}}">
                                    <div class="account-box">
                                        <div class="service-box">
                                            <div class="service-icon"> <i class="fa fa-heart"></i> </div>
                                            <div class="service-desc">
                                                <h4>Danh sách yêu thích</h4>
                                                <p>Quản lý danh sách yêu thích của bạn</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @if (auth::user()->role !== 'customer') 
                            <div class="col-sm-12 col-md-12 col-xs-12">
                                <a href="{{route("dashboard")}}">
                                    <div class="account-box">
                                        <div class="service-box">
                                            <div class="service-icon"> <i class="fa fa-lock"></i> </div>
                                            <div class="service-desc">
                                                <h4>Trang quản lý</h4>
                                                <p>Đi tới trang quản lý</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    
@endsection