<ul class="links pull-left">
    <li><a title="Trang chủ" href="{{route("index")}}">Trang chủ</a></li>
    <li><a title="Sản phẩm" href="{{route("shop")}}">Sản phẩm</a></li>
    <li><a title="Về chúng tôi" href="{{route("wishlist")}}">DS yêu thích</a></li>
    <li><a title="Liên hệ" href="{{route("contact")}}">Liên hệ</a></li>
</ul>
<ul class="links pull-right">
    @if (Auth::check())
        <li><a title="Tài khoản" href="{{route("account")}}">Xin chào, {{Auth::user()->username}}</a></li>
        <li><a title="Đăng xuất" href="{{route("logout")}}">Đăng xuất</a></li>
    @else
        <li><a title="Đăng nhập" href="{{route("login")}}">Đăng nhập</a></li>
        <li><a title="Đăng ký" href="{{route("register")}}">Đăng ký</a></li>
    @endif
</ul>