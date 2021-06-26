<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckLogin extends FormRequest
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
     * @return array
     */
        public function rules()
    {
        return [
            'phone' => 'required|max:12|min:6',
            'password' => 'required|min:6',
        ];
    }
    public function messages()
    {
        return [
            'phone.required' => 'Phone cần được nhập',
            'phone.max' => 'Phone phải ít hơn 255 kí tự',
            'phone.min' => 'Phone phải nhiều hơn 6 kí tự',
            'password.required' => 'Mật khẩu cần được nhập',
            'password.min' => 'Mật khẩu cần phải dài hơn 6 kí tự',
        ];
    }
}
