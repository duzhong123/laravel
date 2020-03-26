<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexsController extends Controller
{
    public function indexs(){
        return view('/indexs');
    }
    public function goods(){
        return view('/goods/create');
    }
}
