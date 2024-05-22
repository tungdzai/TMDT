<?php

namespace App\Services\Admin;

use App\Models\User;
use App\Services\BaseService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use TheSeer\Tokenizer\Exception;

class UserServices extends BaseService
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function getAll()
    {
        $users = $this->user->all();
        return $users;
    }
    public function store($request)
    {
        $data = $request->all();
        $data['password'] = '666666';
        $data['password'] = Hash::make($data['password']);
        $data['role'] = 'admin';
        DB::beginTransaction();
        try {
            $user = $this->user->create($data);
            DB::commit();
            return $user;
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
    public function show()
    {
        $id = auth()->user()->id;
        $user = $this->user->find($id);
        return $user;
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
        $user = auth()->user();
        if ((Hash::check($data['password'], auth()->user()->password)) === true) {
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
