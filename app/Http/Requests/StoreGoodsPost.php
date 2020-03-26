<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class StoreGoodsPost extends FormRequest
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
        // dd($name);
        if($name=='goodsstore'){
            return [
                'goods_name' =>'regex:/^[\x{4e00}-\x{9fa5}\w]{2,50}$/u|required|unique:goods',
                'goods_num' =>'required|numeric|digits_between:1,9999999',
                'goods_price'=>'required|numeric',
                'creagory_id'=>'required',
                'brand_id'=>'required',
            ];
        }
        if($name=='goodsupdate'){
            return [
                'goods_name' =>[
                        'regex:/^[\x{4e00}-\x{9fa5}\w]{2,50}$/u',
                        Rule::unique('goods')->ignore(request()->id,'goods_id'),
                    ],
                'goods_num' =>'required|numeric|digits_between:1,9999999',
                'goods_price'=>'required|numeric',
                'creagory_id'=>'required',
                'brand_id'=>'required',
            ];
        }
    }
    public function messages(){
        return [
            'goods_name.required'=>'商品名称必填',
            'goods_name.unique'=>'已有此商品名称',
            'goods_name.regex'=>'商品可以用字母,数字,下划线组成',
            'goods_num.required'=>'商品名称必填',
            'goods_num.numeric'=>'必须是数字',
            'goods_num.digits_between'=>'必须是数字且小于8位',
            'goods_price.required'=>'商品价格必填',
            'goods_price.digits_between'=>'商品价格必须是数字',
            'creagory_id.required'=>'分类名称不能为空',
            'brand_id.required'=>'品牌名称不能为空',
        ];
    }
}
