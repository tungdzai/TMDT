<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\CategoryServices;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryServices;
    public function __construct(CategoryServices $categoryServices){
        $this->categoryServices = $categoryServices;
    }
    public function index(){
        $category = $this->categoryServices->getAll();
        return view('admin.category.index',compact('category'));
    }
    public function create(){
        return view('admin.category.create');
    }
    public function store(Request $request){
        try{
            $category = $this->categoryServices->store($request);
            return redirect()->route('admin.category.list', $category)->withFlashSuccess(__('Thêm danh mục thành công'));
        }catch(Exception $e){
            session()->flash('flash_warning', 'Fail');
            return redirect()->route('admin.category.create', $category);
        }
    }
    public function delete(Request $request){
        try{
            $category = $this->categoryServices->abc($request);
            session()->flash('flash_success', 'Xóa thành công');
            return $category;
        }catch(Exception $e){
            session()->flash('flash_warning', 'Lỗi khi xoá danh mục');
        }
    }
    public function edit(Request $request){
        $category = $this->categoryServices->edit($request);
        return view('admin.category.edit',compact('category'));
    }
    public function update(Request $request){
        try{
            $category = $this->categoryServices->update($request);
            return redirect()->route('admin.category.list', $category)->withFlashSuccess(__('Success'));
        }catch(Exception $e){
            session()->flash('flash_warning', 'Fail');
            return redirect()->route('admin.category.create', $category);
        }
    }
}
