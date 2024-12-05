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
                            <li>Vui lòng nhập email của bạn vào mẫu bên cạnh.</li>
                            <li>Xong đó kiểm tra email của mình.</li>
                            <li>Lấy mã trong email và nhập vào trang hỗ trợ của web nhé.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-7 registered-users"><strong class="text-center"></strong>
                    <div class="content">
                        @if (Session::get("messenges"))
                            <p class=" text-muted " style="color:red;display: flex"> <strong style="width: 200px">Thông báo : </strong>{{Session::get("messenges")}}</p>
                            {{Session::put("messenges", null)}}
                        @else 
                            <p class="text-center">Vui lòng nhập mail của bạn vào bên dưới.</p>
                        @endif 
                        <form action="{{route("new_password")}}" method="post">
                            @csrf
                            <ul class="form-list">
                                <li>
                                    <label for="email">Email <span class="required">*</span></label>
                                    @error("email")
                                        <div style="color:red">{{ $message }}</div>
                                    @enderror
                                    <br>
                                    <input type="text" title="username Address" class="input-text required-entry" id="email" name="email" value="{{old("email" ?? "")}}">
                                </li>
                            </ul>
                            <div class="buttons-set">
                                <button id="send2" name="LOGIN" type="submit" class="button login"><span>Đăng nhập</span></button>
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