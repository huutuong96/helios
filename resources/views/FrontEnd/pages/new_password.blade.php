@extends('FrontEnd.index')

@section('css')
    
@endsection

@section('main')
<section class="main-container">
    <div class="main container">
        <div class="account-login">
            <div class="page-title">
                <h2>Lấy lại mật khẩu</h2>
            </div>
            <fieldset class="col2-set">
                <div class="col-md-5 registered-users">
                    <div class="content text-center">
                        <strong>Bạn bị quên mật khẩu</strong>
                        <ul style="font-size:medium;">
                            <li>Vui lòng nhập token của bạn vào mẫu bên cạnh.</li>
                            <li>Xong đó nhập mật khẩu mới của bạn vào</li>
                            <li>Chú ý mật khẩu mới phải trùng nhau nhé.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-7 registered-users"><strong class="text-center"></strong>
                    <div class="content">
                        @if (Session::get("messenges"))
                            <p class=" text-muted " style="color:red;display: flex"> <strong style="width: 200px">Thông báo : </strong>{{Session::get("messenges")}}</p>
                            {{Session::put("messenges", null)}}
                        @else 
                            <p class="text-center">Vui lòng nhập mã token và mật khẩu mới của bạn vào bên dưới.</p>
                        @endif 
                        <form action="{{route("update_new_password")}}" method="post">
                            @csrf
                            <ul class="form-list">
                                <li>
                                    <label for="token">token <span class="required">*</span></label>
                                    @error('token')
                                        <div style="color:red">{{ $message }}</div>
                                    @enderror
                                    <br>
                                    <input type="text" title="username Address" class="input-text required-entry" id="token" name="token" value="{{old("token" ?? "")}}">
                                </li>
                                <li>
                                    <label for="password">password <span class="required">*</span></label>
                                    @error('password')
                                            <div style="color:red">{{ $message }}</div>
                                    @enderror
                                    <br>
                                    <input type="password" title="username Address" class="input-text required-entry" id="password" name="password" value="{{old("password" ?? "")}}">
                                </li>
                                <li>
                                    <label for="password_confirmation">Repeat Password <span class="required">*</span></label>
                                    <br>
                                    <input type="password" title="username Address" class="input-text required-entry" id="password_confirmation" name="password_confirmation" value="{{old("password_confirmation" ?? "")}}">
                                </li>
                            </ul>
                            <div class="buttons-set">
                                <button id="send2" name="LOGIN" type="submit" class="button login"><span>Tạo ngay</span></button>
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