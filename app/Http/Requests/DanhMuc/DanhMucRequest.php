<?php

namespace App\Http\Requests\DanhMuc;

use Illuminate\Foundation\Http\FormRequest;

class DanhMucRequest extends FormRequest
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
            'tendanhmuc' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'tendanhmuc.required' => 'Vui lòng nhập điền đầy đủ thông tin',

        ];
    }
}
