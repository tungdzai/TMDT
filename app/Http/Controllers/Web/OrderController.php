<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Web\OrderServices;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderServices;
    public function __construct(OrderServices $orderServices)
    {
        $this->orderServices = $orderServices;
    }
    public function index(Request $request)
    {
        $order = $this->orderServices->create($request);
        return view('web.order.success', ['cartItems' => $order]);
    }
    public function back()
    {
        $this->orderServices->backDetail();
        return redirect()->route('home');
    }
    public function backVNPAY()
    {
        $this->orderServices->backDetail();
        return view('web.order.vnpay');;
    }
}