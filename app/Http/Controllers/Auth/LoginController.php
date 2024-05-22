<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Services\Web\UserServices;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
    protected $userServices;
    public function __construct(UserServices $userServices){
        $this->userServices = $userServices;
    }
    public function index(){
        return view('auth.login');
    }
    public function login(LoginRequest $request){
        $request->validated();
        $data = $request->all();
        $user = User::where('email', $request->email)->first();
        $validator = \Illuminate\Support\Facades\Validator::make([], []);
        if (auth()->attempt(['email' => $data['email'], 'password' => $data['password']], $request->remember_me)) {
            
            if (auth()->user()->role == 'admin') {
                // dd(auth()->user());
                return redirect()->route('admin.home');
            } else {
                return redirect()->route('home');
            }
        } else {
            if (!$user) {
                $validator->errors()->add('password', __('Tài khoản không tồn tại.'));
                return redirect('/login')
                    ->withErrors($validator)
                    ->withInput();
            }
            if (!Hash::check($request->password, $user->password)) {
                $validator->errors()->add('password', __('Mật khẩu không chính xác.'));
                return redirect('/login')
                    ->withErrors($validator)
                    ->withInput();
            }
        }
        Auth::login($user, $request->get('remember'));
        $this->authenticated($request, $user);
    }
    public function logout(){
        session()->flush();
        Auth::logout();
        return redirect()->route('login');
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $finduser = User::where('google_id', $user->id)->first();
        if ($finduser) {
            Auth::login($finduser);
            if (auth()->user()->role == 'admin') {
                return redirect()->route('admin.home');
            } else {
                return redirect()->route('home');
            }
        } else {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id,
            ]);
            Auth::login($newUser);
            return redirect()->route('home');
        }
    }
}
