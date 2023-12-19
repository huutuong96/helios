@extends('FrontEnd.index')

@section('css')
    
@endsection

@section('main')
    <!-- breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul>
                    <li class="home"> <a title="Về trang chủ" href="index.php">Trang chủ</a> <span>/</span></li>
                    <li> <strong>Liên hệ</strong> </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- main-container -->
<div class="main-container col2-right-layout">
    <div class="container">
        <div class="row">
            <section class="col-sm-7">
                <div class="col-main">
                    <div class="static-inner">
                        <div class="page-title">
                            <h2>Liên hệ với chúng tôi</h2>
                        </div>
                        <div class="static-contain">
                            <form action="{{route("contact")}}" method="post">
                                @csrf
                                <fieldset class="group-select">
                                    <div class="form-group">
                                        <label for="fullname"> Họ tên <span class="required">*</span></label>
                                        <input type="text" id="fullname" name="fullname" placeholder="Nguyễn Văn A" class="input-text form-control" value="{{Auth::user()->fullname ?? ""}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email"> Địa chỉ Email <span class="required">*</span></label>
                                        <input type="email" id="email" name="email" placeholder="example@gmail.com" class="input-text form-control validate-email" value="{{Auth::user()->email ?? ""}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone"> Số điện thoại <span class="required">*</span></label>
                                        <input type="phone" id="phone" name="phone" placeholder="example@gmail.com" class="input-text form-control"  value="{{Auth::user()->phone ?? ""}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Tiêu đề <span class="required">*</span></label>
                                        <input type="text" id="title" name="title" placeholder="Nhập tiêu đề" class="input-text form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="detail">Nội dung liên hệ</label>
                                        <textarea id="detail" name="detail" placeholder="Nhập nội dung liên hệ" class="input-text form-control" rows="4"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <p class="require"><em class="required">* </em>Trường bắt buộc</p>
                                        <div class="buttons-set">
                                            <button type="submit" title="Gửi" class="button submit"> <span> Gửi </span></button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <aside class="col-right sidebar col-sm-5 wow">
                <iframe style="width: 100%; height: 250px;" src="{{$config->map}}" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

            </aside>
        </div>
    </div>
</div>
<!--End main-container -->
@endsection

@section('js')
    
@endsection