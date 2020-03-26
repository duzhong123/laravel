<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Success extends Model
{
    protected $table="success";
    protected $primaryKey="success_id";
    //去掉修改的默认时间
    public $timestamps=false;
    //删除的没名单
    protected $guarded=[];
}
