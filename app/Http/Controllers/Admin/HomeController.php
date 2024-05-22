<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\OrderServices;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $orderServices;
    public function __construct(OrderServices $orderServices){
        $this->orderServices = $orderServices;
    }
    public function index(){
        $data = $this->orderServices->dasboard();
        return view('admin.analysis.dasboard',$data);
    }
    public function analysis(){
        $orderDetail = $this->orderServices->orderDetailAnalysis();
        return view('admin.analysis.analysis',$orderDetail);
    }
}
