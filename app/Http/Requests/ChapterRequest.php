<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChapterRequest extends FormRequest
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
            'tieude' => 'required',
            'tomtat' => 'required',
            'noidung' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'tieude.required' => 'Vui lòng nhập điền tên chapter',
            'tomtat.required' => 'Vui lòng nhập điền tóm tắt chapter',
            'noidung.required' => 'Vui lòng nhập điền nội dung',

        ];
    }
}
