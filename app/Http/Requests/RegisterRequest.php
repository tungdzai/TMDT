<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => ':attribute không được để đống',
            'email.unique' => ':attribute email đã tồn tại',
            'email.email' => ':attribute không đúng định dạng',
            'name.required' => ':attribute không để trống',
            'password.required' => ':attribute không để trống',
            'password.min' => ':attribute tối thiểu 6 ký tự',
            'password.confirm' => ':attribute phải trùng nhau',
        ];
    }
    public function attributes()
    {
        return [
            'email' => ' Địa chỉ email',
            'name' => 'Tên',
            'password' => 'Mật khẩu'
        ];
    }
}
