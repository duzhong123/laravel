<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goods;
use App\Creagory;
use App\Brand;
use App\Http\Requests\StoreGoodsPost;
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *列表展示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goods_name=request()->goods_name;
        $where=[];
        if($goods_name){
            $where[]=["goods_name","like","%$goods_name%"];
        }
        $goods=Goods::select('goods.*','creagory.creagory_name','brand.brand_name')
                    ->leftjoin('creagory','goods.creagory_id','=','creagory.creagory_id')
                    ->leftjoin('brand','goods.brand_id','=','brand.brand_id')
                    ->where($where)
                    ->get();
        // dd($goods);
        return view('goods.index',['goods'=>$goods]);
    }

    /**
     * Show the form for creating a new resource.
     *添加展示
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        //品牌循环
        $brand=Brand::all();
        
        //分类的循环
        $care=Creagory::all();
        $care=CreaModel($care);
        
        return view('/goods/create',['brand'=>$brand,'care'=>$care]);
    }

    /**
     * Store a newly created resource in storage.
     *添加执行
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGoodsPost $request)
    {
        $_token=$request->except('_token');
        //添加图片 单文件上传
        if(request()->hasFile('goods_img')){
            $_token['goods_img']=$this->uplode('goods_img');
        }

        //添加图片 多文件上传
        if(request()->hasFile('goods_imgs')){
            $file_imgs=$this->Moreuplode('goods_imgs');
            //用|隔开分割成字符串
            $_token['goods_imgs']=implode('|',$file_imgs);
        }
        $res=Goods::insert($_token);
        if($res){
            return redirect('/goods/index');
        }
    }

     //单文件上传
     public function uplode($img){
        $file=request()->$img;
        if($file->isValid()){
           
            $store=$file->store('imgs');
            return $store;
        }
        exit('图片上传失败');
    }
     //多文件上传
     public function Moreuplode($img){
         $file=request()->$img;
         foreach($file as $k=>$v){
            if($v->isValid()){
                $store_img[$k]=$v->store('imgs');
            }
        }
        return $store_img;  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *编辑展示
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $goods=Goods::where('goods_id',$id)->first();
        //品牌循环
        $brand=Brand::all();
        
        //分类的循环
        $care=Creagory::all();
        $care=CreaModel($care);

        return view('goods.edit',['goods'=>$goods,'brand'=>$brand,'care'=>$care]);
    }

    /**
     * Update the specified resource in storage.
     *编辑执行
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreGoodsPost $request, $id)
    {
        $post=$request->except('_token');
         //添加图片 单文件上传
         if(request()->hasFile('goods_img')){
            $post['goods_img']=$this->uplode('goods_img');
        }

        //添加图片 多文件上传
        if(request()->hasFile('goods_imgs')){
            $file_imgs=$this->Moreuplode('goods_imgs');
            //用|隔开分割成字符串
            $post['goods_imgs']=implode('|',$file_imgs);
        }
        
        // $res=DB::table('brand')->where('brand_id',$id)->update($post);
        $res=Goods::where('goods_id',$id)->update($post);
        
        if($res!==false){
            return redirect('/goods/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *删除方法
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res=Goods::destroy($id);
        if($res){
            return redirect('/goods/index');
        }
    }


    
}
