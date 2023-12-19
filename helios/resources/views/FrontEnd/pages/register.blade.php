@extends('FrontEnd.index')

@section('css')
    
@endsection

@section('main')
    <section class="main-container">
    <div class="main container">
        <div class="account-login">
            <div class="page-title" style="text-align: center">
                <h2>Thông tin đăng ký tài khoản</h2>
            </div>
            <fieldset class="col2-set">
                <form action="{{route("register")}}" method="post" enctype="multipart/form-data" class="col-md-7 form-horizontal">
                    @csrf
                    <div class="col-2 registered-users">
                        <strong class="text-center">Thông tin đăng ký tài khoản: </strong>
                        <div class="form-group">
                            <label for="email" class="control-label col-sm-3" style="font-size:14px;padding:13px 0px;text-align:left">Email <span class="required">*</span></label>
                            <div class="col-sm-9">
                                <input type="email" title="Email Address" class="form-control" id="email" name="email" placeholder="Ví dụ: example@gmail.com"  value="{{old("email")}}">
                                <span class="error-message" id="email-error" style="color: red">
                                    @error('email')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="control-label col-sm-3" style="font-size:14px;padding:13px 0px;text-align:left">Tên đăng nhập <span class="required">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" title="username" class="form-control" id="username" name="username" value="{{old("username")}}">
                                <span class="error-message" id="username-error" style="color: red">
                                    @error('username')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fullname" class="control-label col-sm-3" style="font-size:14px;padding:13px 0px;text-align:left">Họ tên <span class="required">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" title="fullname" class="form-control" id="fullname" name="fullname" value="{{old("fullname")}}">
                                <span class="error-message" id="fullname-error" style="color: red">
                                    @error('fullname')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="control-label col-sm-3" style="font-size:14px;padding:13px 0px;text-align:left">Số điện thoại <span class="required">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" title="phone" class="form-control" id="phone" name="phone"  value="{{old("phone")}}">
                                <span class="error-message" id="phone-error" style="color: red">
                                    @error('phone')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gender-radio" class="control-label col-sm-3" style="font-size:14px;padding:13px 0px;text-align:left">Giới tính <span class="required">*</span></label>
                            <div class="col-sm-9">
                                <label class="radio-inline"><input type="radio" name="gender" value="1" checked> Nam</label>
                                <label class="radio-inline"><input type="radio" name="gender" value="0"> Nữ</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="control-label col-sm-3" style="font-size:14px;padding:13px 0px;text-align:left">Địa chỉ</label>
                            <div class="col-sm-9">
                                <input type="text" title="address" class="form-control" id="address" name="address"  value="{{old("address")}}">
                                <span class="error-message" id="phone-error" style="color: red">
                                    @error('address')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Password" class="control-label col-sm-3" style="font-size:14px;padding:13px 0px;text-align:left">Mật khẩu <span class="required">*</span></label>
                            <div class="col-sm-9">
                                <input type="password" title="Password" id="Password" class="form-control" name="password"  value="{{old("password")}}">
                                <h4><span>Mật khẩu phải dài ít nhất 8 ký tự và có ít nhất 1 chữ hoa, 1 ký tự đặc biệt và 1 ký tự số </span></h4>
                                <span class="error-message" id="password-error" style="color: red">
                                    @error('Password')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="repass" class="control-label col-sm-3" style="font-size:14px;padding:13px 0px;text-align:left">Xác nhận mật khẩu <span class="required">*</span></label>
                            <div class="col-sm-9">
                                <input type="password" title="password_confirmation" id="password_confirmation" class="form-control" name="password_confirmation"  value="{{old("password_confirmation")}}">
                                <span class="error-message" id="repassword-error" style="color: red">
                                    @error('email')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <div class="checkbox">
                                    <label style="font-size:14px;"><input type="checkbox" required> Tôi đã đọc và đồng ý với điều khoản sử dụng của Helios</label>
                                    <span class="error-message" id="checkbox-error" style="color: red">
                                        @error('email')
                                        {{$message}}
                                    @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="buttons-set col-sm-offset-3 col-sm-9">
                                <button id="login-button" name="BTN_REGISTER" type="submit" class="button login" style="width:100%">
                                    <span>Đăng ký</span>
                                </button>
                                <h4><span>Bạn đã có tài khoản? <a href="?option=user&act=login">Đăng nhập ngay</a></span></h4>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="col-md-5 registered-users text-center">
                    <strong>Các đặc quyền khi đăng ký tài khoản: </strong>
                    <ul style="font-size:medium;">
                        <li>Nhận quyền truy cập vào các giao dịch và sự kiện.</li>
                        <li>Lưu các mục yêu thích vào danh sách yêu thích của bạn.</li>
                        <li>Lưu các đơn đặt hàng và số theo dõi đơn hàng của bạn.</li>
                        <br>
                        <br>
                        <li>Dịch vụ khách hàng</li>
                        <li>Bạn cần giúp đỡ? Xin hãy gọi điện đến Hotline: 093.934.8888</li>
                    </ul>
                </div>
            </fieldset>
        </div>
    </div>
    </section>
@endsection

@section('js')
    
@endsection
