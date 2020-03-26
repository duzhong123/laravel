<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
class LoginController extends Controller
{
    public function login(){
        return view('/login');
    }
    public function loginDo(){
        $post=request()->except('_token');
        
        $adminLogin=Admin::where('admin_name',$post['admin_name'])->first();
        if(decrypt($adminLogin->admin_pwd)!=$post['admin_pwd']){
            return redirect('/login')->with('msg','用户名或密码错误');
        }else{
        
            session(['adminLogin'=>$adminLogin]);
            return redirect('/wenzhang/create');
        }
    }
}
