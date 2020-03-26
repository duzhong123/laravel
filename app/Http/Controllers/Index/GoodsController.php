<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Goods;
use App\Cart;
use App\Success;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
class GoodsController extends Controller
{
    //商品详情页
    public function proinfo($id){
        //memcache用法 访问量
       // $count= Cache::add('count_'.$id,1)?Cache::get('count_'.$id):Cache::increment('count_'.$id);
       //redis用法  访问量
       $count=Redis::setnx('count_'.$id,1)?Redis::get('count_'.$id):Redis::incr('count_'.$id);
        $goods=Goods::find($id);
        $goods_imgs=$goods['goods_imgs'];
        // dd($goods);
        return view('index.proinfo',['goods'=>$goods,'goods_imgs'=>$goods_imgs,'count'=>$count]);
    }

    //添加购物车
    public function addcart(Request $request){
        //判断用户是否登录
        $user=session('id');
        $name=session('name');
        //  dd($user);
        if(!$name){
            return errorly(1,'用户未登录');
        }


        $goods_id=$request->goods_id;
        $buy_number=$request->buy_number;
        
        //根据商品id获取商品id
        $goods=Goods::find($goods_id);
        //判断库存
        if($goods->goods_num<$buy_number){
            return errorly(2,'库存不足');
        }

        //判断是否添加过 如果添加过就累加 否则添加
        $cart=Cart::where(['user_id'=>$user,'goods_id'=>$goods_id])->first();
        if($cart){
            //库存判断
            $buy_number=$cart->buy_number+$buy_number;
            if($goods->goods_num<$buy_number){
                $buy_number=$goods->goods_num;
            }
            //更新数据库数据
            $res=Cart::where('cart_id',$cart->cart_id)->update(['buy_number'=>$buy_number]);
        }else{
        //加入数据库
        $data=[
            'user_id'=>$user,
            'goods_id'=>$goods_id,
            'buy_number'=>$buy_number,
            'goods_name'=>$goods->goods_name,
            'goods_price'=>$goods->goods_price,
            'goods_img'=>$goods->goods_img,
            'addtime'=>time(),
        ];
        $res=Cart::create($data);
        }
        if($res){
            return successly(3,'添加成功');
        }
    }

    //购物车展示
    public function car(Request $request){
       $cart_id=Cache::get('cart_id');
       dump($cart_id);
        $user=session('id');
       $res=Cart::count();
        $cart=Cart::where('user_id',$user)->get();
        
        return view('index.car',['res'=>$res,'cart'=>$cart]);
    }
    //小计
    public function rexiaoji(Request $request){
		$admin=session('id');
		$goods_id=request()->goods_id;
		$_num=request()->_num;
		// dump($goods_id);
		// dd($_num);
		$result=Cart::where(['user_id'=>$admin,'goods_id'=>$goods_id])->update(['buy_number'=>$_num]);
		// dd($result);
		if($result){
			return json_encode(['code'=>'000','msg'=>'成功']);
		}
	}
	public function getRxiaoji(Request $request){
		$goods_id=$request->goods_id;
		$admin=session('id');
		$res=Cart::where(['user_id'=>$admin,'goods_id'=>$goods_id])->first();
		// dd($res);
		echo $res['buy_number']*$res['goods_price'];
	}
	public function getTotall(Request $request){
		$good_id=request()->good_id;
		// dd($good_id);
		$admin=session('id');
		// $sss=Cart::whereIn('goods_id',$good_id)->get();
		// dump($sss);
		$result=Cart::where(['goods_id'=>$good_id,'user_id'=>$admin])->get();
		// dd($result);
		$money=0;
		foreach($result as $k=>$v){
			$money+=$v['goods_price']*$v['buy_number'];
		}
		echo $money;
	}
	public function buy($id){
		$id=explode(',',$id);
		$admin=session('id');
		$res=Cart::whereIn('goods_id',$id)->get();
		$money=0;	
		foreach($res as $k=>$v){
			$money+=$v['goods_price']*$v['buy_number'];
        }
        $id=implode(',',$id);		
		return view('index.order',['res'=>$res,'money'=>$money,'id'=>$id]);
    }
    //提交信息
    public function successe(Request $request){
        $goods_id=request()->goods_id;
		// dd($goods_id);
		$order_no=rand().time();
		
		$user_id=session('id');
		$goods_id=explode(",",$goods_id);
		$result=Cart::whereIn('goods_id',$goods_id)->get();
		$money=0;
		foreach($result as $k=>$v){
			$money+=$v['goods_price']*$v['buy_number'];
		}
		// $data[]=[];
		foreach($result as $k=>$v){
			$data[]=[			
					'goods_id'=>$v->goods_id,
					'code'=>$order_no,
					'success_time'=>time(),
					'user_id'=>$user_id,
					'success_price'=>$money,
			];	
		}
		$res=Success::insert($data);
        $order_id=Success::where('user_id',$user_id)->get();
        
		$order_idd=[];
		foreach ($order_id as $key => $value) {
			$order_idd[]=$value['success_id'];
        }
        
		if($res){
			return json_encode(['code'=>'22','msg'=>'下单成功','success_id'=>$order_idd]);
		}else{
			return json_encode(['code'=>'00000','msg'=>'操作失误','success_id'=>$order_idd]);			
		}
    }
    //查询出提交订单数据
    public function suc($id){
        $goods_id=explode(",",$id);
		$res=Success::whereIn('success_id',$goods_id)->get();
        
        return view('index.suc',['res'=>$res]);
    }
	
}
