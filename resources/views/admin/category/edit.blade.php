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
                        <h5 class="card-title">Sửa danh mục</h5>
                        <!-- General Form Elements -->
                        {{-- 'name','description','image','slug' --}}
                        @include('admin.layouts.includes.message')
                        <form action="{{route('admin.category.update',['id'=> $category->id])}}" enctype="multipart/form-data" id="myForm" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Tên danh mục</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="name"
                                        data-msg="Name Category is required" value="{{ $category->name }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Mô tả ngắn</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="slug" id="slug"
                                        data-msg="Slug is required" value="{{ $category->slug }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Hình ảnh</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="formFile" name="image" accept=".jpg"
                                        value="{{ $category->image }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Mô tả cụ thể</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="description" id="description"
                                        data-msg="Description is required" value="{{ $category->description }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Lưu thông tin</label>
                                <div class="col-sm-10">
                                    <button type="button"
                                        onclick="window.location.href='{{ route('admin.category.list') }}'"class="btn btn-warning">Quay trở về</button>
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
                    description: "required"
                }
            });
        });
    </script>
@endsection

