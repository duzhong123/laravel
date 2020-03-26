<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminPost extends FormRequest
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
            'admin_name' =>'required|regex:/^[\x{4e00}-\x{9fa5}\w]{2,16}$/u|unique:admin',
            'admin_pwd'=>'required|regex:/^\d{6}$/',
            'admin_email'=>'required|regex:/^[0-5]{5,}@qq\.com$/',
            'admin_tel'=>'required|regex:/^\d{11}$/',
        ];
    }
    public function messages(){
        return [
            'admin_name.required'=>'管理员名称必填',
            'admin_name.unique'=>'已有此商品名称',
            'admin_name.regex'=>'可以用字母,数字,下划线组成,长2-16位',
            'admin_pwd.required'=>'密码必填',
            'admin_pwd.regex'=>'密码必须是六位,可以字母,数字组成',
            'admin_email.required'=>'邮箱必填',
            'admin_email.regex'=>'必须是邮箱格式',
            'admin_tel.required'=>'手机号必填',
            'admin_tel.regex'=>'手机号必须11位且数字',
        ];
    }
}
