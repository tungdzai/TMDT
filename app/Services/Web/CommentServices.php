<?php

namespace App\Services\Web;

use App\Models\Comment;
use App\Models\Product;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

class CommentServices extends BaseService
{
    protected $comment;
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }
    public function comment($request){
        $id = $request->input('id');
        $user_id = auth()->user()->id;
        $data = $request->all();
        $data['user_id'] = $user_id;
        $data['product_id'] = (int)$id;
        unset($data['id']);
        DB::beginTransaction();
        try{
            $comment = $this->comment->create($data);
            DB::commit();
            return response()->json($comment);
        }catch(Exception $e){
            DB::rollBack();
        }
    }
}
