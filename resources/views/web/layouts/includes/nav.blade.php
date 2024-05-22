<nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0" >
    <a href="#" class="text-decoration-none d-block d-lg-none">
        <h1 class="m-0 display-5 font-weight-semi-bold"><span
                class="text-primary font-weight-bold border px-3 mr-1">E</span>S.U BEBE</h1>
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse" style="background-color: #f5f5f5">
        <div class="navbar-nav mr-auto py-0">
            <a href="{{ route('home') }}" class="nav-item nav-link">Trang chủ</a>
            <a href="{{ route('shop') }}" class="nav-item nav-link">Shop</a>
            {{-- <a href="{{ route('detail') }}" class="nav-item nav-link">Shop Detail</a> --}}
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Trang</a>
                <div class="dropdown-menu rounded-0 m-0">
                    <a href="{{ route('cart.view') }}" class="dropdown-item">Giỏ hàng</a>
                    <a href="{{ route('checkout') }}" class="dropdown-item">Thanh toán</a>
                </div>
            </div>
            <a href="{{route('page.contact')}}" class="nav-item nav-link">Liên hệ</a>
        </div>
        <div class="navbar-nav ml-auto py-0">
            {{-- <a href="{{route('login')}}" class="nav-item nav-link">Login</a>
                <a href="{{route('register')}}" class="nav-item nav-link">Register</a> --}}
            @if (Auth::check())
                <a href="{{route('user.detail')}}" class="nav-item nav-link">
                    <i class="fa-solid fa-user" style="color:blue"> </i>
                    {{ Auth::user()->name }}
                </a>
                <a href="{{ route('logout') }}" class="nav-item nav-link">
                    Logout<i class="fa-solid fa-arrow-right-from-bracket" style="color:red"></i></a>
            @else
                <a href="{{ route('login') }}" class="nav-item nav-link">Đăng nhập</a>
            @endif
        </div>
    </div>
</nav>
