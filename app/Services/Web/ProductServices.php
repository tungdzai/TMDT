<?php

namespace App\Services\Web;

use App\Models\Comment;
use App\Models\Product;
use App\Services\BaseService;
use Carbon\Carbon;

class ProductServices extends BaseService
{
    protected $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    public function detail($id){
        $product = $this->product->with(['comments','comments.user'])->find($id);

        return $product;
    }
    public function getAll(){
        $products = $this->product->all();
        return $products;
    }
    public function newProduct(){
        $products = $this->product->whereBetween('created_at', [Carbon::now()->subDays(2), Carbon::now()])->get();
        return $products;
    }
    public function findById($id){
        $product = $this->product->find($id);
        return $product;
    }
    public function search($name){
        $products = $this->product->where('name', 'like', '%'.$name.'%')->paginate(10);
        return $products;
    }
    public function sortProductByTime(){
        $products = Product::orderBy('created_at', 'desc')->get();
        return $products;
    }
    public function sortProductBySmall(){
        $products = Product::orderBy('price', 'desc')->get();
        return $products;
    }
    public function sortProductByBig(){
        $products = Product::orderBy('price', 'asc')->get();
        return $products;
    }
}
