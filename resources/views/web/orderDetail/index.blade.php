@extends('web/layouts/app')
@section('css')
    <style>
        .hidden {
            display: none;
        }
    </style>
@endsection
@section('slider')
    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="{{ asset('img/images.jpg') }}" alt="Profile" class="rounded-circle">
                        <h2>{{ auth()->user()->name }}</h2>
                        @include('web.layouts.includes.message')
                    </div>
                </div>

            </div>
            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Chỉnh sửa
                                    thông tin cá nhân</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Thay
                                    đổi mật khẩu</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#order-detail">Lịch sử đặt
                                    hàng</button>
                            </li>
                        </ul>
                        {{-- @include('admin.layouts.includes.message') --}}
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form action="{{route('user.update-info')}}" method="POST">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Ảnh</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="{{ asset('img/images.jpg') }}" alt="Profile">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Họ và tên </label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text" class="form-control" value="{{$user->name}}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" value="{{$user->email}}">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>
                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form action="{{route('user.update-password')}}" id="form-change" method="POST">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Mật khẩu hiện tại </label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Mật khẩu
                                            mới</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword" type="password" class="form-control">
                                        </div>
                                        <span id="newpassword-error"></span>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Xác nhận
                                            mật
                                            khẩu mới</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="renewpassword" type="password" class="form-control">
                                        </div>
                                        <span id="renewpassword-error"></span>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Thay đổi</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>
                            <div class="tab-pane fade pt-3" id="order-detail">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- Table with stripped rows -->
                                        <form>
                                            <div class="dataTable-search search" id="dataTables_filter">
                                                <label for="">Tìm kiếm</label>
                                                <input class="dataTable-input" type="search" id="searchInput"
                                                    name="search">
                                            </div>
                                        </form>
                                        <div
                                            class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">

                                            <div class="dataTable-container">
                                                <table id="example" class="table datatable dataTable-table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col text-center">
                                                                Tên sản
                                                                phẩm</th>
                                                            <th scope="col text-center">Số lượng
                                                            </th>
                                                            <th scope="col text-center">Số tiền
                                                            </th>
                                                            <th scope="col text-center">Hình thức
                                                                thanh toán</th>
                                                            <th scope="col text-center">Địa chỉ nhận</th>
                                                            <th scope="col text-center">Ngày mua</th>
                                                            <th scope="col text-center">Tình trạng</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($dataOrder as $order)
                                                            @foreach ($order->order as $item)
                                                                <tr>
                                                                    <td>{{ $item->product->name }}</td>
                                                                    <td>{{ $item->quantity }}</td>
                                                                    <td>{{ $item->total }}</td>
                                                                    @if ($order->payment == '0')
                                                                        <td>Tiền mặt</td>
                                                                    @else
                                                                        <td>VNPAY</td>
                                                                    @endif
                                                                    <td>{{ $order->address }}</td>
                                                                    <td>{{ $order->created_at }}</td>
                                                                    @if ($order->status == '0')
                                                                        <td>Chờ xác nhận</td>
                                                                    @else
                                                                        <td>Đã xác nhận</td>
                                                                    @endif
                                                                </tr>
                                                            @endforeach
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
@endsection
@section('script')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable();
            $('.dataTables_length').addClass('hidden')
            $('.dataTables_filter').addClass('hidden')
            $('.dataTables_info').addClass('hidden')
            $('#searchInput').on('keyup', function() {
                table.search(this.value).draw();
            });
        });
    </script>
@endsection
