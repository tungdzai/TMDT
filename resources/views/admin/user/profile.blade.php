@extends('admin.layouts.app')
@section('content')
    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="{{ asset('img/images.jpg') }}" alt="Profile" class="rounded-circle">
                        <h2>{{ auth()->user()->name }}</h2>
                        <h3>{{ auth()->user()->role }}</h3>
                        <div class="social-links mt-2">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
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
                        </ul>
                        @include('admin.layouts.includes.message')
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form action="{{route('admin.user.update')}}" method="POST" id="form-edit">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Ảnh</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="{{ asset('img/images.jpg') }}" alt="Profile">
                                            {{-- <div class="pt-2">
                                                <a href="#" class="btn btn-primary btn-sm"
                                                    title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                                <a href="#" class="btn btn-danger btn-sm"
                                                    title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                            </div> --}}
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text" class="form-control" id="name"
                                                data-msg="Name Category is required" value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="email"
                                                data-msg="Email is required" value="{{ $user->email }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Country" class="col-md-4 col-lg-3 col-form-label">Quyền sử
                                            dụng</label>
                                        <div class="col-md-8 col-lg-9">

                                            <select class="form-select col-sm-10" id="role" name="role">
                                                {{-- @foreach ($category as $cate) --}}
                                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>admin
                                                </option>
                                                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>user
                                                </option>
                                                {{-- @endforeach --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>
                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form action="{{route('admin.user.updatepassword')}}" id="form-change" method="POST">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current
                                            Mật khẩu</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" id="passowrd" class="form-control"
                                                data-msg="Password is required">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Mật khẩu
                                            mới</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword" type="password" class="form-control" id="newpassword"
                                                data-msg=" New Password is required">
                                        </div>
                                        <span id="newpassword-error"></span>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Xác nhận
                                            mật
                                            khẩu mới</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="renewpassword" type="password" class="form-control"
                                                id="renewpassword" data-msg="">
                                        </div>
                                        <span id="renewpassword-error"></span>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Thay đổi</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
    <script>
        $(document).ready(function() {
            $("#form-change").validate({
                rules: {
                    password: "required",
                    newpassword: "required",
                    renewpassword: {
                        required: true,
                        equalTo: "#newpassword"
                    }
                },
                messages: {
                    renewpassword: {
                        required: "Please confirm your password",
                        equalTo: "New Passwords do not match"
                    },
                },
            });
            $("#form-edit").validate({
                rules: {
                    name: "required",
                    email: "required",
                }
            });
        });
    </script>
@endsection
