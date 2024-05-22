<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Web\CategoryServices;
use App\Services\Web\ProductServices;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $categoryServices ;
    protected $productServices;
    public function __construct(CategoryServices $categoryServices, ProductServices $productServices){
        $this->categoryServices = $categoryServices;
        $this->productServices = $productServices;
    }
    public function index(){
        $category = $this->categoryServices->getAll();
        $products = $this->productServices->getAll();
        $newProduct = $this->productServices->newProduct();
        return view('web.home.index',['category' => $category,'products' =>$products],compact('newProduct'));
    }
    public function getAllCate(){
        $category = $this->categoryServices->getAll();
        return view('web.layouts.includes.category-detail',['category' => $category]);
    }
}
