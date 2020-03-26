<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table="goods";
    protected $primaryKey="goods_id";
    //去掉修改的默认时间
    public $timestamps=false;
    //删除的没名单
    protected $guarded=[];

    public static function getslideData(){
        $goods=Goods::where('is_slide',1)->orderBy('goods_id','desc')->take(5)->get();
        return $goods;
    }
}
