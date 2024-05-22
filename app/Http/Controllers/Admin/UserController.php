<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\UserServices;
use Illuminate\Http\Request;
use TheSeer\Tokenizer\Exception;

class UserController extends Controller
{
    protected $userServices;
    public function __construct(UserServices $userServices){
        $this->userServices = $userServices;
    }
    public function index(){
        $users = $this->userServices->getAll();
        return view('admin.user.index',compact('users'));
    }
    public function create(){
        return view('admin.user.create');
    }
    public function store(Request $request){
        try{
            $user = $this->userServices->store($request);
            return redirect()->route('admin.user.list', $user)->withFlashSuccess(__('Thêm mới admin thành công'));
        }catch(Exception $e){
            session()->flash('flash_warning', 'Lỗi khi thêm admin');
            return redirect()->route('admin.user.create', $user);
        }
    }
    public function show(){
        $user = $this->userServices->show();
        return view('admin.user.profile',compact('user'));
    }
    public function update(Request $request){
        $user = $this->userServices->update($request);
        return $this->show();
    }
    public function updatePassword(Request $request){
        $user = $this->userServices->updatePassword($request);
        if($user!= null){
            return redirect()->route('admin.user.show')->withFlashSuccess(__('Thay đổi mật khẩu thành công!!!!'));
        }else{
            session()->flash('flash_warning', 'Lỗi sai mật khẩu');
            return redirect()->route('admin.user.show');
        }
    }
}
