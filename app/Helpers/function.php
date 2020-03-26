<?php 


//单文件上传
function uplode($img){
    $file=request()->$img;
    if($file->isValid()){
        $store=$file->store('img');
        return $store;
    }
    exit('图片上传失败');
}
 //多文件上传
 function Moreuplode($img){
     $file=request()->$img;
     foreach($file as $k=>$v){
        if($v->isValid()){
            $store_img[$k]=$v->store('img');
        }
    }
    return $store_img;  
}

//无限极分类
 function CreaModel($data,$pid=0,$level=0){
        //判断是否接受到只
        if(!$data){
            return;
        }
    //循环分类表的数据
    static $info=[];
    foreach($data as $v){
        //判断循环的数据跟传值是否相等
        if($v->pid==$pid){
            $v->level=$level;
            $info[]=$v;
            //调用自己
            CreaModel($data,$v->creagory_id,$level+1);
        }
    }
    return $info;
 }
 

 //新闻无限极分类
 function NewModel($data,$pid=0,$level=0){
     if(!$data){
         return;
     }
     static $info=[];
     foreach($data as $v){
         if($v->pid==$pid){
             $v->level=$level;
             $info[]=$v;
             NewModel($data,$v->cate_id,$level+1);
         }
     }
     return $info;
 }

//返回正确的json窜
function successly($code,$msg){
    return json_encode(['code'=>$code,'msg'=>$msg]);
}
// 返回错误的json窜
function errorly($code,$msg){
    return json_encode(['code'=>$code,'msg'=>$msg]);
}

?>