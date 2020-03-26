<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        echo '商品嘛';
    }

    public function add(){
        // dump(request()->name);
        if(request()->isMethod('get')){
            return view("add");
        }
        if(request()->isMethod('post')){
            echo request()->name;
        }
        
    }
    public function addDo(){
        echo request()->name;
        // return redirect('/index');
    }

    //必选参数
    public function show($id,$name){
        echo $id.'=='.$name;
    }
}
