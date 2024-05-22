<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Web\ProductServices;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productServices ;
    public function __construct(ProductServices $productServices){
        $this->productServices = $productServices;
    }
    public function detail($id){
        $product = $this->productServices->detail($id);
        return view('web.product.detail',compact('product'));
    }
    public function getAll(){
        $products = $this->productServices->getAll();
        return view('web.layouts.includes.products',compact('products'));
    }
    public function search(Request $request){
       $products = $this->productServices->search($request->key);
       return view('web.product.search', compact('products'));
    }
}
