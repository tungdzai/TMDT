<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\ProductServices;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productServices;
    public function __construct(ProductServices $productServices){
        $this->productServices =$productServices;
    }

    public function index(){
        $product = $this->productServices->getAll();
        return view('admin.product.index',compact('product'));
    }
    public function create(){
        $category = $this->productServices->create();
        return view('admin.product.create',compact('category'));
    }
    public function store(Request $request){
        try{
            $product = $this->productServices->store($request);
            return redirect()->route('admin.product.list', $product)->withFlashSuccess(__('Thêm mới sản phẩm thành công'));
        }catch(Exception $e){
            session()->flash('flash_warning', 'Lỗi thêm sản phẩm');
            return redirect()->route('admin.product.create', $product);
        }
    }
    public function edit($id){
        $data = $this->productServices->edit($id);
        return view('admin.product.edit',$data);
    }
    public function update(Request $request){
        try{
            $product = $this->productServices->update($request);
            return redirect()->route('admin.product.list', $product)->withFlashSuccess(__('Cập nhật thành công'));
        }catch(Exception $e){
            session()->flash('flash_warning', 'Cập nhật thất bại');
            return redirect()->route('admin.product.create', $product);
        }
    }
    public function delete(Request $request){
        try{
            $product = $this->productServices->abc($request);
            session()->flash('flash_success', 'Xóa thành công');
            return $product;
        }catch(Exception $e){
            session()->flash('flash_warning', 'Lỗi không thể xóa');
        }
    }
}
