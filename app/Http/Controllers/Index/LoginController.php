<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//短信验证
use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;

//邮箱验证
use App\Mail\SendCode;
use Illuminate\Support\Facades\Mail;

use App\Users;

use Validator;
class LoginController extends Controller
{
    //登录
    public function log(){
        return view('index.login');
    }

    //注册
    public function reg(){
        return view('index.reg');
    }

    //注册验证手机号
    public function sendReg(){
        //接受值
        $name=request()->name;
        //php 验证手机号
        $reg='/^1[3|5|6|7|8|9]\d{9}$/';
        if(!preg_match($reg,$name)){
            return errorly(1,"请输入正确的手机号或邮箱"); 
        }
        $code=rand(100000,999999);
        $send=$this->send($name,$code);
        //发送成功
        if($send['Message']=='OK'){
            session(['code'=>$code]);
           return successly(2,'发送成功!');
        }
        //发送失败
        return errorly(1,$send['Message']);
    }

    //发送短信验证码
    public function send($name,$code){


        // Download：https://github.com/aliyun/openapi-sdk-php
        // Usage：https://github.com/aliyun/openapi-sdk-php/blob/master/README.md

        AlibabaCloud::accessKeyClient('LTAI4FbtsRnzWfBzviy7tH8Z','FJVYRl0H8v9HpJ6jS8JqQxkFtr6ekB')
                                ->regionId('cn-hangzhou')
                                ->asDefaultClient();

        try {
            $result = AlibabaCloud::rpc()
                                ->product('Dysmsapi')
                                // ->scheme('https') // https | http
                                ->version('2017-05-25')
                                ->action('SendSms')
                                ->method('POST')
                                ->host('dysmsapi.aliyuncs.com')
                                ->options([
                                                'query' => [
                                                'RegionId' => "cn-hangzhou",
                                                'PhoneNumbers' => $name,
                                                'SignName' => "飞吧",
                                                'TemplateCode' => "SMS_183241742",
                                                'TemplateParam' => "{code:$code}",
                                                ],
                                            ])
                                ->request();
            return $result->toArray();
        } catch (ClientException $e) {
            return $e->getErrorMessage() . PHP_EOL;
        } catch (ServerException $e) {
            return $e->getErrorMessage() . PHP_EOL;
        }

    }

    //注册的添加方法
    public function regDo(){
        $data=request()->except('_token');
        // dd($data);
        $validator = Validator::make($data,
            [
                'name' =>'required|unique:user',
                'code'=>'required|regex:/^\d{6}$/',
                'pwd'=>'required|regex:/^[0-9A-Za-z]{6,18}$/',
                'pwds'=>'required|same:pwd',
            ],[
                'name.required'=>'账号必填',
                'name.unique'=>'已有该账号',
                'code.required'=>'验证码必填',
                'code.regex'=>'验证码必须是六位数字',
                'pwd.required'=>'密码必填',
                'pwd.regex'=>'密码必须是6-18位数字或字母',
                'pwd.required'=>'确认密码必填',
                'pwds.same'=>'确认密码必须跟密码一致',
            ]);
            if ($validator->fails()) {
                return redirect('/reg')
                ->withErrors($validator)
                ->withInput();
            }
        $res=Users::insert($data);
        if($res){
            return redirect('/log');
        }
    }


    //登录的方法
    public function loginDo(){
        $data=request()->all();
        $validator = Validator::make($data,
            [
                'name' =>'required',
                'pwd'=>'required',
            ],[
                'name.required'=>'账号必填',    
                'pwd.required'=>'密码必填',
            ]);
            if ($validator->fails()) {
                return redirect('/log')
                ->withErrors($validator)
                ->withInput();
            }
        $res=Users::where('name',$data['name'])->first();
        
        session(['id'=>$res['id'],'name'=>$res['name']]);
            
        if($data['refre']){
            return redirect($data['refre']);
        }
        return redirect('/');
        
        
    }
    //邮箱验证
    public function sendEmai(){
        $name=request()->name;
        
        $reg='/^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/';
        if(!preg_match($reg,$name)){
            return errorly(1,"请输入正确的手机号或邮箱"); 
        }
        $code=rand(100000,999999);
        $res=Mail::to($name)->send(new SendCode($code));
        session(['code'=>$code]);
        return successly(2,'发送成功!');
    }

}
