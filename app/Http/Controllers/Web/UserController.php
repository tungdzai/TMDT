<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Web\UserServices;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userServices;
    public function __construct(UserServices $userServices){
        $this->userServices = $userServices;
    }
    public function index(){
        $data = $this->userServices->detail();
        // dd($data);
        return view('web.orderDetail.index',$data);
    }
    public function update(Request $request){
        $user = $this->userServices->update($request);
        return $this->index();
    }
    public function updatePass(Request $request){
        $user = $this->userServices->updatePassword($request);
        // dd($user);
        if($user!= null){
            return redirect()->route('login')->withFlashSuccess(__('Thành công!!!!'));
        }else{
            session()->flash('flash_warning', 'Lỗi sai mật khẩu');
            return redirect()->route('user.detail');
        }
    }
}
