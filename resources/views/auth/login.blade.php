@extends('web.layouts.app')
@section('slider')
    <!-- Contact Start -->
    <div class="container-fluid pt-5 text-align">
        <div class="text-center mb-4">
            <h3 class=" px-5">Đăng nhập</h3>
        </div>

        <div class="row justify-content-md-center px-xl-5">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="col-md-6 col-12" action="{{route('login.store')}}" method="POST"
                  style="display: flex; flex-direction: column;">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" name="email"
                           id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password"
                           id="exampleInputPassword1">
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="remember_me" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Nhớ mật khẩu</label>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <a href="{{ route('register') }}" style="margin: 20px; text-decoration: none">Bạn chưa có tài khoản ?</a>
            </form>
        </div>
    </div>
    <!-- Contact End -->
@endsection
