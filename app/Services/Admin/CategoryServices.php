<?php

namespace App\Services\Admin;
use App\Models\Category;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryServices extends BaseService
{
    protected $category;
    public function __construct(Category $category){
        $this->category = $category;
    }
    public function getAll(){
        $categories = $this->category->all();
        return $categories;
    }
    public function store($request){
        $image = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            //$path = $file->storeAs('app/public', $filename);
            $path = Storage::putFileAs('public/category', $file ,$filename);
            $image = $path;
        }
        $data = $request->all();
        $path_image = str_replace("public/", "", $image);
        $data['image'] = $path_image;
//         dd($data);
        DB::beginTransaction();
        try{
            $category = $this->category->create($data);
            DB::commit();
            return $category;
        }catch(Exception $e){
            DB::rollBack();
            throw new Exception( $e->getMessage());
        }
    }
    public function abc($request){
        $id = $request->id;
        $category = $this->category->find($id);
        $res = $category->delete();
        return response()->json($res);;
    }
    public function edit($request){
        $id = $request->id;
        $category = $this->category->find($id);
        return $category;
    }
    public function update($request){
        $category = $this->category->find($request->id);
        $image = null ;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename =  $file->getClientOriginalName();
            //$path = $file->storeAs('app/public', $filename);
            $path = $file->storeAs('public/category', $filename);;
            $image = $path;
        }
        $data = $request->all();
        $path_image = str_replace("public/", "", $image);
        $data['image'] = $path_image;
        DB::beginTransaction();
        try{
            $result = $category->update($data);
            DB::commit();
            return $result;
        }catch(Exception $e){
            DB::rollBack();
            throw new Exception( $e->getMessage());
        }
    }
}
