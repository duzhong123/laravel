<?php 
namespace App\Http\Controllers;
use App\catemodel;

class Common extends Controller{


    public function catemodel($cateintro,$pid=0,$level=1){
        static $info=[];
        foreach($cateintro as $k=>$v){
            if($v['pid']==$pid){
                $v['level']=$level;
                $info[]=$v;
                $this->catemodel($cateintro,$v['cate_id'],$v['level']+1);
            }
        }
        return $info;
    }
}



?>