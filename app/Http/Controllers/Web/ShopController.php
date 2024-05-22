<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Web\ProductServices;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    protected $productServices;
    public function __construct(ProductServices $productServices)
    {
        $this->productServices = $productServices;
    }
    public function index(){
        $products = $this->productServices->getAll();
        return view('web.shop.index',compact('products'));
    }
    public function detail(){
        return view('web.shop.detail');
    }
    public function search(){
        return view('web.shop.search');
    }
    public function sortByTime(){
        $products = $this->productServices->sortProductByTime();
        return view('web.shop.index',compact('products'));
    }
    public function sortBySmall(){
        $products = $this->productServices->sortProductBySmall();
        return view('web.shop.index',compact('products'));
    }
    public function sortByBig(){
        $products = $this->productServices->sortProductByBig();
        return view('web.shop.index',compact('products'));
    }
}
