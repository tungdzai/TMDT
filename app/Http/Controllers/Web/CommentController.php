<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Web\CommentServices;
use Exception;
use Illuminate\Http\Request;

use function PHPUnit\Framework\throwException;

class CommentController extends Controller
{
    protected $commentServices;
    public function __construct(CommentServices $commentServices){
        $this->commentServices = $commentServices;
    }
    public function post(Request $request){
        $comment = $this->commentServices->comment($request);
        return $comment;
    }
}
