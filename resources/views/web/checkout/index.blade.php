@extends('web/layouts/app')
@section('content')
    {{-- Checkout --}}
    <div class="container-fluid pt-5">
        <form action="{{route('order')}}" method="POST">
            @csrf
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Địa chỉ nhận hàng</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Họ và tên</label>
                            <input class="form-control" type="text" value="{{ auth()->user()->name }}" disabled>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" value="{{ auth()->user()->email }}" disabled>
                        </div>
                        <div class="col-md-6 form-group">
                            <label> Số điện thoại </label>
                            <input class="form-control" type="text" placeholder="0334463900" name="phone">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Địa chỉ nhận hàng </label>
                            <input class="form-control" type="text" name="address" placeholder="123 Street">
                        </div>
                    </div>
                </div>
                <div class="collapse mb-4" id="shipping-address">
                    <h4 class="font-weight-semi-bold mb-4" style="color:green">Khách hàng nên thanh toán bằng VN_PAY thời gian xử lý đơn hàng sẽ nhanh hơn</h4>
                    <div class="row">
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Thanh toán</h4>
                    </div>
                    <?php
                    $sum = 0; ?>
                        <div class="card-body">
                            <h5 class="font-weight-medium mb-3">Sản phẩm </h5>
                            @foreach ($cartItems as $key => $cartItem)
                            <div class="d-flex justify-content-between">
                                <p>{{$cartItems[$key]['name']}}</p>
                                <p>{{number_format($cartItems[$key]['price'], 0, ".", ",")." VND"}}</p>
                            </div>
                            <hr class="mt-0">
                            <div class="d-flex justify-content-between mb-3 pt-1">
                                <h6 class="font-weight-medium">Subtotal</h6>
                                <h6 class="font-weight-medium"><?php
                                    $cartItemTotalPrice = $cartItems[$key]['price'] * $cartItems[$key]['quantity'];
                                    $sum += $cartItemTotalPrice;

                            ?>
           {{ number_format($cartItemTotalPrice, 0, ".", ",")}}</h6>
                            </div>
                            @endforeach
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <div class="d-flex justify-content-between mt-2">
                                <h5 class="font-weight-bold">Thanh toán</h5>
                                <h5 class="font-weight-bold">{{number_format($sum, 0, ".", ",")}} VND</h5>
                            </div>
                        </div>
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Phương thức thanh toán</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal" value="1">
                                {{-- <label class="custom-control-label" for="paypal">VN-QR Pay</label> --}}
                                <label class="custom-control-label" for="paypal" data-toggle="collapse"
                                data-target="#shipping-address">VN Pay</label>
                            </>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck" value="0">
                                <label class="custom-control-label" for="directcheck" data-toggle="collapse"
                                data-target="#show-bill">Thanh toán khi nhận hàng</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button type= "submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3"> Đặt hàng </button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection
