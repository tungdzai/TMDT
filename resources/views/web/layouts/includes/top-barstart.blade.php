<div class="container-fluid shop_top">
    <div class="row bg-secondary py-2 px-xl-5 ">
        <div class="col-lg-8 d-none d-lg-block">
            <div class="d-inline-flex align-items-center">
                <a class="text-dark" href="">Hỗ trợ trực tuyến</a>
                <span class="text-muted px-2">|</span>
                <a class="text-dark px-2" href="https://www.facebook.com/132453648394v?locale=vi_VN">
                    <i class="fab fa-facebook-f"></i> Việt Tùng
                </a>
                <span class="text-muted px-2">|</span>
                <a class="text-dark px-2" href="">
                    <i class="far fa-envelope"></i> tungnguyen0603202@gmail.com
                </a>
            </div>
        </div>
    </div>
    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="" class="text-decoration-none">
                <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold px-3 mr-1">S.U BEBE</span></h1>
            </a>
        </div>
        <div class="col-lg-6 col-6 text-left">
            {{-- Search Product --}}
            <form action="{{route('product.search')}}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm...." name="key" style="border-radius: 15px 0 0 15px">
                    <div class="input-group-append">
                        <button class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-3 col-6 text-right">
            <a href="{{route('cart.view')}}" class="btn">
                <i class="fas fa-shopping-cart text-primary"></i>
                <span class="badge">{{count(Session::get('cart', array()))}}</span>
            </a>
        </div>
    </div>
</div>
