@extends('admin.layouts.app')
@section('pageTitle')
    <div class="pagetitle">
        <h1>Dasboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dasboard</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Số đơn trong ngày</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$data['quantity']}}</h6>
                                        <span class="text-success small pt-1 fw-bold"> {{$data['percent']}} %</span><span
                                            class="text-muted small pt-2 ps-1">
                                            @if($data['percent'] >= 100)
                                                Tăng
                                            @else
                                                Giảm
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Doanh thu trong ngày</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bx bxs-badge-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$data['total']}}</h6>
                                        <span class="text-success small pt-1 fw-bold">{{$data['percentTotal']}}%</span> <span
                                            class="text-muted small pt-2 ps-1">
                                            @if($data['percent'] >= 100)
                                                Tăng
                                            @else
                                                Giảm
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Danh mục sản phẩm</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="ri-align-justify"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$category}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Số lượng sản phẩm</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="ri-bank-card-2-line"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$product1}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card top-selling overflow-auto">
                            <div class="card-body pb-0">
                                <h5 class="card-title">Top sản phẩm bán chạy trong ngày</h5>

                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Hình ảnh</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Giá</th>
                                            <th scope="col">Số lượng bán</th>
                                            <th scope="col">Tổng tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($bestSellToDay as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <th scope="row"><a href="#"><img src="{{ asset('storage/'.$item['image'])}}"
                                                        alt=""></a></th>
                                            <td><a href="#" class="text-primary fw-bold">{{$item['name']}}</a></td>
                                            <td>{{$item['price']}}</td>
                                            <td class="fw-bold">{{$item['total']}}</td>
                                            <td>{{$item['sale']}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
