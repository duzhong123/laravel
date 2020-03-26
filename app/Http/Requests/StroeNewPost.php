<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StroeNewPost extends FormRequest
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
            'new_title' =>'required|regex:/^[\x{4e00}-\x{9fa5}\w]{2,50}$/u|unique:news',
            'new_man'=>'required',
        ];
    }
    public function messages(){
        return [
            'new_title.required'=>'标题名称必填',
            'new_title.unique'=>'已有此商品名称',
            'new_title.regex'=>'商品可以用字母,数字,下划线组成',
            'new_man.required'=>'作者必填',
        ];
    }
}
