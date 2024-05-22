<?php

namespace App\Services\Web;

use App\Models\Category;
use App\Services\BaseService;

class CategoryServices extends BaseService
{
    protected $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function getAll()
    {
        $category = $this->category->all();
        return $category;
    }
    public function showProduct($id)
    {
        $category = $this->category->with(['products'])->where('id', $id)->get();
        $data = [];
        foreach($category as $cate){
            if(!empty($cate->products)){
                foreach($cate->products as $product){
                    $data[$cate->name][] = $product;
                }
            }
        }
        // dd($data);
        return $data;
    }
}