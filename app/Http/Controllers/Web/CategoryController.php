<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Web\CategoryServices;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryServices ;
    public function __construct(CategoryServices $categoryServices){
        $this->categoryServices = $categoryServices;
    }
    public function getAll(){
        $category = $this->categoryServices->getAll();
        // dd($category);
        return view('web.layouts.includes.category',['category' => $category]);
    }
    public function showProduct($id){
        $category = $this->categoryServices->showProduct($id);
        return view('web.category.show', ['products' => $category]);
    }
    public function getAllCate(){
        $category = $this->categoryServices->getAll();
        return view('web.catgory-detail',compact('category'));
    }
}
