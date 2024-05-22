<?php

namespace App\Services\Admin;
use App\Models\Category;
use App\Models\Product;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use TheSeer\Tokenizer\Exception;

class ProductServices extends BaseService
{
    protected $product;
    public function __construct(Product $product){
        $this->product = $product;
    }
    public function getAll(){
       $product = $this->product->all();
       return $product;
    }
    public function create(){
        $category = Category::all();
        return $category;
    }
    public function store($request){
        $image = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            //$path = $file->storeAs('app/public', $filename);
            $path = Storage::putFileAs('public/product', $file ,$filename);
            $image = $path;
        }
        $data = $request->all();
        $path_image = str_replace("public/", "", $image);
        $data['image'] = $path_image;
//        dd($data);
        DB::beginTransaction();
        try{
            $product = $this->product->create($data);
            DB::commit();
            return $product;
        }catch(Exception $e){
            DB::rollBack();
            throw new Exception( $e->getMessage());
        }
    }
    public function edit($id){
        $product = $this->product->find($id);
        $category = Category::all();
        return compact('product','category');
    }
    public function update($request){
        $product = $this->product->find($request->id);
        $image = null ;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename =  $file->getClientOriginalName();
            //$path = $file->storeAs('app/public', $filename);
            $path = $file->storeAs('public/product', $filename);;
            $image = $path;
        }
        $data = $request->all();
        $path_image = str_replace("public/", "", $image);
        $data['image'] = $path_image;
        DB::beginTransaction();
        try{
            $result = $product->update($data);
            DB::commit();
            return $result;
        }catch(Exception $e){
            DB::rollBack();
            throw new Exception( $e->getMessage());
        }
    }
    public function abc($request){
        $id = $request->id;
        $product = $this->product->find($id);
        $res = $product->delete();
        return response()->json($res);;
    }
}
