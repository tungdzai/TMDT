<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\OrderServices;
use Illuminate\Http\Request;
use TheSeer\Tokenizer\Exception;

class OrderController extends Controller
{

    protected $orderServices;
    public function __construct(OrderServices $orderServices){
        $this->orderServices = $orderServices;
    }
    public function index(){
        $order = $this->orderServices->getAllOrderOK();
        return view('admin.order.index',compact('order'));
    }
    public function confirm(){
        $order = $this->orderServices->getAllOrderConfirm();
        return view('admin.order.confirm',compact('order'));
    }
    public function accept($id){
        try{
            $order = $this->orderServices->confirmed($id);
            return redirect()->route('admin.order.confirm')->withFlashSuccess(__('Success'));
        }catch(Exception $e){
            session()->flash('flash_warning', 'Fail');
            return redirect()->route('admin.order.confirm');
        }
    }
}
