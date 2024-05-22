<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function index(){
        $cart=session()->get('cart',[]);
        return view('web.checkout.index',['cartItems' => $cart]);
    }
}
