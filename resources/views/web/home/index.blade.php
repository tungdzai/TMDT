@extends('web/layouts/app')
@section('category')
    @include('web/layouts/includes/category')
@endsection
@section('slider')
    <div id="header-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="height: 500px;">
                <img class="img-fluid" src="{{ asset('img/carousel-1.jpg') }}" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 700px;">
                        <h4 class="text-light text-uppercase font-weight-medium mb-3">Giảm 10% cho đơn hàng đầu tiên của
                            bạn</h4>
                        <h3 class="display-4 text-white font-weight-semi-bold mb-4">Thời trang nữ</h3>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="height: 500px;">
                <img class="img-fluid" src="{{ asset('img/carousel-2.jpg') }}" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 700px;">
                        <h4 class="text-light text-uppercase font-weight-medium mb-3">Giảm 50% cho đơn hàng đầu tiên của
                            bạn</h4>
                        <h3 class="display-4 text-white font-weight-semi-bold mb-4">Giá cả hợp lý</h3>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                <span class="carousel-control-prev-icon mb-n2"></span>
            </div>
        </a>
        <a class="carousel-control-next" href="#header-carousel" data-slide="next">
            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                <span class="carousel-control-next-icon mb-n2"></span>
            </div>
        </a>
    </div>
@endsection
@section('feature')
    <div class="container-fluid">
        <div class="row px-xl-5 pb-3" style="background-color: #f5f5f5">
            <div class="col-lg-2 col-md-4 col-sm-6 pb-1">
                <div class="d-flex align-items-center mb-4" style=" flex-direction: column;">
                    <div class="iconSupport" style="width: 45px;height: 45px;border-radius: 50%;">
                        <div style="height: 100%;border-radius: 0;">
                            <div
                                style="background-image: url(https://cf.shopee.vn/file/vn-50009109-f6c34d719c3e4d33857371458e7a7059_xhdpi);background-size: contain;background-repeat: no-repeat; height: 100%"></div>
                        </div>
                    </div>
                    <div style="
                         font-size: .8125rem;
                         line-height: .875rem;
                         max-width: 150px;
                         margin-bottom: 8px;
                         word-wrap: break-word;
                         overflow: hidden;
                         white-space: pre-line;
                         color: #222;
                         letter-spacing: 0;
                         text-align: center;
                         "
                    >
                        Voucher Giảm Đến 1 Triệu
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 pb-1">
                <div class="d-flex align-items-center mb-4" style=" flex-direction: column;">
                    <div class="iconSupport" style="width: 45px;height: 45px;border-radius: 50%;">
                        <div style="height: 100%;border-radius: 0;">
                            <div
                                style="background-image: url(https://cf.shopee.vn/file/vn-50009109-c7a2e1ae720f9704f92f72c9ef1a494a_xhdpi);background-size: contain;background-repeat: no-repeat; height: 100%"></div>
                        </div>
                    </div>
                    <div style="
                         font-size: .8125rem;
                         line-height: .875rem;
                         max-width: 150px;
                         margin-bottom: 8px;
                         word-wrap: break-word;
                         overflow: hidden;
                         white-space: pre-line;
                         color: #222;
                         letter-spacing: 0;
                         text-align: center;
                         "
                    >
                        Miễn phí ship
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 pb-1">
                <div class="d-flex align-items-center mb-4" style=" flex-direction: column;">
                    <div class="iconSupport" style="width: 45px;height: 45px;border-radius: 50%;">
                        <div style="height: 100%;border-radius: 0;">
                            <div
                                style="background-image: url(https://cf.shopee.vn/file/vn-50009109-8a387d78a7ad954ec489d3ef9abd60b4_xhdpi);background-size: contain;background-repeat: no-repeat; height: 100%"></div>
                        </div>
                    </div>
                    <div style="
                         font-size: .8125rem;
                         line-height: .875rem;
                         max-width: 150px;
                         margin-bottom: 8px;
                         word-wrap: break-word;
                         overflow: hidden;
                         white-space: pre-line;
                         color: #222;
                         letter-spacing: 0;
                         text-align: center;
                         "
                    >
                        Mã giảm giá
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 pb-1">
                <div class="d-flex align-items-center mb-4" style=" flex-direction: column;">
                    <div class="iconSupport" style="width: 45px;height: 45px;border-radius: 50%;">
                        <div style="height: 100%;border-radius: 0;">
                            <div
                                style="background-image: url(https://cf.shopee.vn/file/vn-50009109-852300c407c5e79bf5dc1854aa0cfeef_xhdpi);background-size: contain;background-repeat: no-repeat; height: 100%"></div>
                        </div>
                    </div>
                    <div style="
                         font-size: .8125rem;
                         line-height: .875rem;
                         max-width: 150px;
                         margin-bottom: 8px;
                         word-wrap: break-word;
                         overflow: hidden;
                         white-space: pre-line;
                         color: #222;
                         letter-spacing: 0;
                         text-align: center;
                         "
                    >
                        Hàng Hiệu Outlet Giảm 50%
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 pb-1">
                <div class="d-flex align-items-center mb-4" style=" flex-direction: column;">
                    <div class="iconSupport" style="width: 45px;height: 45px;border-radius: 50%;">
                        <div style="height: 100%;border-radius: 0;">
                            <div
                                style="background-image: url(https://cf.shopee.vn/file/a08ab28962514a626195ef0415411585_xhdpi);background-size: contain;background-repeat: no-repeat; height: 100%"></div>
                        </div>
                    </div>
                    <div style="
                         font-size: .8125rem;
                         line-height: .875rem;
                         max-width: 150px;
                         margin-bottom: 8px;
                         word-wrap: break-word;
                         overflow: hidden;
                         white-space: pre-line;
                         color: #222;
                         letter-spacing: 0;
                         text-align: center;
                         "
                    >
                       Hàng quốc tế
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 pb-1">
                <div class="d-flex align-items-center mb-4" style=" flex-direction: column;">
                    <div class="iconSupport" style="width: 45px;height: 45px;border-radius: 50%;">
                        <div style="height: 100%;border-radius: 0;">
                            <div
                                style="background-image: url(https://cf.shopee.vn/file/9df57ba80ca225e67c08a8a0d8cc7b85_xhdpi);background-size: contain;background-repeat: no-repeat; height: 100%"></div>
                        </div>
                    </div>
                    <div style="
                         font-size: .8125rem;
                         line-height: .875rem;
                         max-width: 150px;
                         margin-bottom: 8px;
                         word-wrap: break-word;
                         overflow: hidden;
                         white-space: pre-line;
                         color: #222;
                         letter-spacing: 0;
                         text-align: center;
                         "
                    >
                       Dịch Vụ
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            @include('web/layouts/includes/category-detail')
        </div>
    </div>
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <span class="titleProducts">Gợi ý hôm nay</span>
        </div>
    </div>
    {{-- Product-Start --}}
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            @foreach ($newProduct as $item)
                <div class="col-lg-2 col-md-3 col-sm-6 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div
                            class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="{{ asset('storage/' . $item->image) }}" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-3">
                            <h6 class="text-truncate mb-3">{{ $item->name }}</h6>
                            <div class="d-flex justify-content-between">
                                <h6>Giá: {{ number_format($item->price / 1000, 3, '.', '') }}</h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="{{ route('product.detail', ['id' => $item->id]) }}"
                               class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Chi tiết </a>
                            <a href="{{route('cart.add',['id'=> $item->id])}}" class="btn btn-sm text-dark p-0"><i
                                    class="fas fa-shopping-cart text-primary mr-1"></i>Thêm Vào Giỏ Hàng </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
