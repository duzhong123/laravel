<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wenzhang extends Model
{
     //指定表明
     protected $table='Wenzhang';
     //指定主见id
     protected $primaryKey='w_id';
     //去掉修改的默认时间
     public $timestamps=false;
     //删除的没名单
     protected $guarded=[];
}
