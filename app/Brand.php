<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //指定表明
    protected $table='brand';
    //指定主见id
    protected $primaryKey='brand_id';
    //去掉修改的默认时间
    public $timestamps=false;
    //删除的没名单
    protected $guarded=[];
}
