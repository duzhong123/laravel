<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Goods;
use App\Creagory;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
class IndexController extends Controller
{
    public function index(){       
        //缓存读取数据
        // Cache::flush();
        // Redis::flushall();
        // $goods=Cache::get('is_slide');
        $goods=Redis::get('is_slide');
        if(!$goods){
            echo 'db';
            $goods=Goods::getslideData();
            //存入memcache
            // Cache::put('is_slide',$goods,60*60*24);
            $goods=serialize($goods);
            Redis::setex('is_slide',60*60*24,$goods);
        }
        $goods=unserialize($goods);
        $Creagory=Creagory::where('pid',0)->get();
        $is_dest=Goods::where('is_dest',1)->take(8)->get();
        $is_pro=Goods::where('is_pro',1)->take(3)->get();
        return view('index.index',['goods'=>$goods,'Creagory'=>$Creagory,'is_dest'=>$is_dest,'is_pro'=>$is_pro]);
    }

    //商品列表
    public function pid(){
        $Creagory_id=request()->creagory_id;
        
        $post=Goods::where($Creagory_id)->get();
       
        return view('index.prolist',['post'=>$post]);
    }


}
