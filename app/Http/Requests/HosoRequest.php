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
            'tt_id' => 'required',
            'phone' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'tt_id.required' => 'Thiếu thủ tục id',
            'phone.required' => 'Hãy điền số điện thoại của bạn'
        ];
    }
}
