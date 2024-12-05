@extends('FrontEnd.index')

@section('css')
    
@endsection

@section('main')
<section class="main-container">
    <div class="main container">
        <div class="account-login">
            <div class="page-title">
                <h2>Đăng nhập hoặc tạo tài khoản mới</h2>
            </div>
            <fieldset class="col2-set">
                <div class="col-md-5 registered-users">
                    <div class="content text-center">
                        <strong>Bạn chưa có tài khoản</strong>
                        <ul style="font-size:medium;">
                            <li>Nhận quyền truy cập vào các giao dịch và sự kiện.</li>
                            <li>Lưu các mục yêu thích vào danh sách yêu thích của bạn.</li>
                            <li>Lưu các đơn đặt hàng và số theo dõi đơn hàng của bạn.</li>
                        </ul>
                        <div class="buttons-set">
                            <a href="{{route("register")}}"><button class="button create-account" type="button"><span>Đăng ký tài khoản ngay</span></button></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 registered-users"><strong class="text-center">Đăng nhập</strong>
                    <div class="content">
                        @if (Session::get("messenges"))
                            <p class=" text-muted " style="color:red;display: flex"> <strong style="width: 200px">Thông báo : </strong>{{Session::get("messenges")}}</p>
                            {{Session::put("messenges", null)}}
                        @else 
                            <p class="text-center">Chào mừng bạn quay trở lại với chúng tôi.</p>
                        @endif 
                        <form action="{{route("login")}}" method="post">
                            @csrf
                            <ul class="form-list">
                                <li>
                                    <label for="username">Tên tài khoản <span class="required">*</span></label>
                                    <br>
                                    <input type="text" title="username Address" class="input-text required-entry" id="username" name="username" value="{{old("username" ?? "")}}">
                                </li>
                                <li>
                                    <label for="password">Mật khẩu <span class="required">*</span></label>
                                    <br>
                                    <input type="password" title="password" id="password" class="input-text required-entry validate-password" name="password" >
                                </li>
                            </ul>
                            <div class="buttons-set">
                                <button id="send2" name="LOGIN" type="submit" class="button login"><span>Đăng nhập</span></button>
                                <a class="forgot-word" href="{{route('input_email')}}">Quên mật khẩu?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</section>
@endsection

@section('js')
    
@endsection