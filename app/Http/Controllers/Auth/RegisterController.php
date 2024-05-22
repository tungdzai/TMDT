<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Services\Web\UserServices;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    protected $userServices;
    public function __construct(UserServices $userServices){
        $this->userServices = $userServices;
    }
    public function index(){
        return view('auth.register');
    }
    public function register(RegisterRequest $request){
        $this->userServices->store($request);
        return redirect()->route('login');
    }
}
