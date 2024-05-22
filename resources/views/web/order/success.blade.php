@extends('web/layouts/app')
@section('slider')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="center">
                    <h3> Đặt hàng thành công </h3>
                </div>
            </div>
        </div>
        <div class="card border-secondary mb-5">
            <div class="card-header bg-secondary border-0">
                <h4 class="font-weight-semi-bold m-0">Chi tiết đơn hàng</h4>
            </div>
            <?php
            $sum = 0; ?>
            @foreach ($cartItems as $key => $cartItem)
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <p>{{ $cartItems[$key]['name'] }}</p>
                        <p>{{ number_format($cartItems[$key]['price'], 0, '.', ',') . ' VND' }}</p>
                    </div>

                    <hr class="mt-0">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Subtotal</h6>
                        <h6 class="font-weight-medium"><?php
                        $cartItemTotalPrice = $cartItems[$key]['price'] * $cartItems[$key]['quantity'];
                        $sum += $cartItemTotalPrice;
                        ?>
                            {{ number_format($cartItemTotalPrice, 0, '.', ',') }}VND</h6>
                    </div>
                </div>
            @endforeach
            <div class="card-footer border-secondary bg-transparent">
                <div class="d-flex justify-content-between mt-2">
                    <h5 class="font-weight-bold">Tổng thanh toán</h5>
                    <h5 class="font-weight-bold"><span>{{ number_format($sum + 10000, 0, '.', ',') }} VND</span>
                    </h5>
                </div>
            </div>
        </div>
        <div class="btn btn-success btn-sm">
            <a href="{{route('order.back')}}">
                <input value="Quay về trang chủ" class="btn btn-success">
            </a>
        </div>
    </div>
@endsection
