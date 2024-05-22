@extends('web/layouts/app')

@section('slider')
    <!-- Register Start -->
    <div class="container-fluid pt-5 text-align">
        <div class="text-center mb-4">
            <h3 class="px-5">Đăng kí tài khoản mới</h3>
        </div>
        <div class="row justify-content-md-center px-xl-5">
            <form class="col-md-6 col-12" action="{{route('register.store')}}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">Email </label>
                    <input type="text" class="form-control" name="email" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Tên</label>
                    <input type="text" class="form-control" name="name" id="exampleInputPassword1">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mật khẩu</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Xác nhận mật khẩu</label>
                    <input type="password" class="form-control" name="password_confirmation" id="exampleInputPassword1">
                    @error('password_confirmation')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Đăng kí</button>
            </form>
        </div>
    </div>
    <!-- Register End -->
@endsection
