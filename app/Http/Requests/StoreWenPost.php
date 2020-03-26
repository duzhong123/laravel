<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class StoreWenPost extends FormRequest
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
        $name=\Route::currentRouteName();
        if($name=='goodsstore'){
            return [
                'w_title' =>'required|regex:/^[\x{4e00}-\x{9fa5}\w]{2,50}$/u|unique:wenzhang',
                'w_sex' =>'required',
            ];
        }
        if($name=='goodsupdate'){
            return [
                'w_title' =>[
                        'regex:/^[\x{4e00}-\x{9fa5}\w]{2,50}$/u',
                        Rule::unique('wenzhang')->ignore(request()->id,'w_id'),
                    ],
                'w_sex' =>'required',
                
            ];
        }
    }
    public function messages(){
        return [
            'w_title.required'=>'文章名称必填',
            'w_title.unique'=>'已有此名称',
            'w_title.regex'=>'可以用字母,数字,下划线组成',
            'w_sex.required'=>'显示不能为空',
        ];
    }
}
