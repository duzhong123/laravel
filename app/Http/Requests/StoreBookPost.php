<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookPost extends FormRequest
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
            'book_name' =>'required|unique:book|max:20',
            'book_man'=>'required'
        ];
    }
    public function messages(){
        return [
            'book_name.required'=>'商品名称必填',
            'book_name.unique'=>'已有此商品名称',
            'book_man.required'=>'作者必填',
        ];
    }
}
