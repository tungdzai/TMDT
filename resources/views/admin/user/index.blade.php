@extends('admin.layouts.app')
@section('css')
    <style>
        .hidden {
            display: none;
        }

        input:focus {
            outline: none;
        }

        form input {
            width: 300px;
        }

        .cart-box {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .dataTable-top {
            padding: 0px 10px;
        }

        .icon {
            display: flex;
            justify-content: space-around;
        }
    </style>
@endsection
@section('pageTitle')
    <div class="pagetitle">
        <h1>Danh sách người dùng</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Quản lý người dùng</li>
                <li class="breadcrumb-item active">Danh sách người dùng</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách người dùng</h5>
                        @include('admin.layouts.includes.message')
                        <div class="cart-box">
                            <div class="dataTable-top">
                                <form>
                                    <div class="dataTable-search search" id="dataTables_filter">
                                        <label for="">Tìm kiếm</label>
                                        <input class="dataTable-input" type="search" id="searchInput" name="search">
                                    </div>
                                </form>
                            </div>
                            <div class="dataTable-top">
                                <select id="table-filter" class="form-select form-select-sm" style="height: 36px">
                                    <option value=""> -------- Lọc quyền --------</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                            <a href="{{ route('admin.user.create') }}" class="btn btn-primary">+ Thêm mới Admin</a>
                        </div>
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Quyền</th>
                                <th>Ngày tạo</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>
                                        <div class="icon">
                                            @if($user->id !== auth()->user()->id)
                                                <button class="deleteButton btn " data-id="{{$user->id}}"
                                                        data-name="{{$user->name}}" data-email="{{$user->email}}">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="basicModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Thông tin chi tiết</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên người dùng</label>
                            <input type="text" class="form-control" id="name" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="text" class="form-control" id="email">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Đóng
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            var table = $('#example').DataTable();
            $('.dataTables_length').addClass('hidden')
            $('.dataTables_filter').addClass('hidden')
            $('.dataTables_info').addClass('hidden')
            $('#searchInput').on('keyup', function () {
                table.search(this.value).draw();
            });
            $('#table-filter').on('change', function () {
                table.search(this.value).draw();
            });
            let deleteButtons = $('.deleteButton');
            let modalConfirmDelete = $('#basicModal');
            deleteButtons.on('click', function () {
                let id = $(this).attr('data-id');
                let name = $(this).attr('data-name');
                let email = $(this).attr('data-email');
                //show modal
                $('#name').val(name);
                $('#email').val(email);
                // modalConfirmDelete.find('.btn-yes').attr('data-id', id);
                modalConfirmDelete.modal('toggle');
            })
        });
    </script>
@endsection
