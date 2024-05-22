@extends('web/layouts/app')
@section('slider')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="center">
                    <h2>Thanh toán thành công</h2>
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
