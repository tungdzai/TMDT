<?php

namespace App\Services\Web;
use App\Models\Order;
use App\Models\User;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserServices extends BaseService
{
    protected $user;
    public function __construct(User $user){
        $this->user = $user;
    }
    public function store($data){
        DB::beginTransaction();
        $data = $data->validated();
        // $data = $data->all();
        $data['password'] = Hash::make($data['password']);
        try{
            $user = $this->user->create($data);
            DB::commit();
            return $user;
        }catch(\Exception $e){
            DB::rollBack();
        }
    }
    public function detail(){
        $user_id = auth()->user()->id;
        $user = $this->user->find($user_id);
        $dataOrder = Order::with(['order.product'])->where('user_id',$user_id)->get();
        // dd($dataOrder->toArray());
        return compact('dataOrder','user');
    }
    public function update($request)
    {
        $data = $request->all();
        $user = $this->user->find(auth()->user()->id);
        DB::beginTransaction();
        try {
            $user = $user->update($data);
            // dd($user);
            DB::commit();
            return $user;
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
    public function updatePassword($request)
    {
        $data = $request->all();
        // $user = $this->user->find(auth()->user()->id);
        $user = auth()->user();
        // dd($user);
        // dd( $data['password'],auth()->user()->password);
        // dd(Hash::check( $data['password'] , auth()->user()->password));

        if ($data['password'] === auth()->user()->password) {
            // dd($user);
            unset($data['renewpassword'], $data['password']);
            $user->password = Hash::make($data['newpassword']);
            // $user->name = Auth::user()->name();
            $user->save();
            return true;
        }
        else{
            return null;
        }

    }
}
