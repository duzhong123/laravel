<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandPost extends FormRequest
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
            'brand_name' =>'required|unique:brand|max:20',
            'brand_url' =>'required',
        ];
    }
    public function messages(){
        return [
            'brand_name.required'=>'商品名称必填',
            'brand_name.unique'=>'已有此商品名称',
            'brand_name.max'=>'名称最多输入20位',
            'brand_url.required'=>'商品网址不能为空',
        ];
    }
}
