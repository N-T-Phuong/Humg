<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name'      => 'required|min:5|max:50',
            'ma'        => 'required',
//            'password'  => 'required|min:6|max:16',
            'phone'     => 'required|min:9|max:12'
        ];
    }
    public function messages()
    {
        return [
            'name.required'      => 'Họ tên không được để trống',
            'ma.required'        => 'Mã không được để trống',
            'password.required'  => 'Mật khẩu không được để trống',
//            'password.min'       => 'Mật khẩu tối thiểu 6 kí tự',
//            'password.max'       => 'Tối đa 16 kí tự',
            'phone.min'          => 'Số điện thoại tối thiểu 9 số',
            'phone.required'     => 'Số điện thoại không đúng',
            'phone.max'          => 'Số điện thoại tối đa 12 số',

        ];
    }
}
