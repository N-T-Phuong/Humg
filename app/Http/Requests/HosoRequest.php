<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HosoRequest extends FormRequest
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
            'phone' => 'required|min:10',
            'dia_chi' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'phone.required'     => 'Số điện thoại không được bỏ trống',
            'phone.min'          => 'Tối thiểu 10 số',
            'dia_chi.required'   => 'Địa chỉ không được bỏ trống',
        ];
    }
}
