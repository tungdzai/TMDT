@extends('admin.layouts.app')
@section('css')
    <style>
        label.error {
            color: red;
        }
    </style>
@endsection
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Chỉnh sửa sản phẩm</h5>
                        <!-- General Form Elements -->
                        {{-- 'name','description','image','slug' --}}
                        {{-- name	image	description	size	price	quantity	note_use	category_id	 --}}
                        @include('admin.layouts.includes.message')
                        <form action="{{route('admin.product.update',['id' => $product->id])}}" enctype="multipart/form-data" id="myForm"  method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Thuộc danh mục</label>
                                <div class="col-sm-10">
                                    <select class="form-select col-sm-10" id="category_id" name="category_id">
                                        @foreach($category as $cate)
                                            <option value="{{ $cate->id }}" {{ $product->category_id == $cate->id ? 'selected' : '' }}>{{ $cate->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Tên sản phẩm</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="name"
                                        data-msg="Name Category is required" value="{{ $product->name }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Hình ảnh</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="formFile" name="image" accept=".jpg"
                                        value="{{ old('image') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Mô tả sản phẩm</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="description" id="description"
                                        data-msg="Description is required" value="{{ $product->description }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Kích thước</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="size" id="size"
                                        data-msg="Slug is required" value="{{ $product->size }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Giá</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="price" id="price"
                                        data-msg="Slug is required" value="{{ $product->price }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Số lượng</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="quantity" id="quantity"
                                        data-msg="quantity is required" value="{{ $product->quantity }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Cách sử dụng</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="note_use" id="note_use"
                                        data-msg="Slug is required" value="{{ $product->note_use }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Lưu sản phẩm</label>
                                <div class="col-sm-10">
                                    <button type="button"
                                        onclick="window.location.href='{{ route('admin.product.list') }}'"class="btn btn-warning">Quay
                                        trở về</button>
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                </div>
                            </div>
                        </form><!-- End General Form Elements -->
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
            $("#myForm").validate({
                rules: {
                    name: "required",
                    slug: "required",
                    description: "required",
                    size: "required",
                    price: "required",
                    quantity: "required",
                    note_use: "required",
                    category_id: "required",
                }
            });
        });
    </script>
@endsection
