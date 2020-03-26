<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Brand;
// use App\Http\Requests\StoreBrandPost;
use Validator;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *列表展示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 搜索
        $brand_name=request()->brand_name;
        $where=[];
        if($brand_name){
            $where[]=["brand_name","like","%$brand_name%"];
        }
        $brand_url=request()->brand_url;
        if($brand_url){
            $where[]=["brand_url","like","%$brand_url%"];
        }
        //分页
        $pageSize=config('app.pageSize');
        // $brand=DB::table('brand')->get();
        //ORM方法
        $query=request()->all();
        $brand=Brand::where($where)->orderby('brand_id','desc')->paginate($pageSize);
        return view('brand.index',['brand'=>$brand,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *添加页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'brand_name' =>'required|unique:brand|max:20',
        //     'brand_url' =>'required',
        // ],[
        //     'brand_name.required'=>'商品名称必填',
        //     'brand_name.unique'=>'已有此商品名称',
        //     'brand_name.max'=>'名称最多输入20位',
        //     'brand_url.required'=>'商品网址不能为空',
        // ]);
        //接受数据
        $res=$request->except('_token');
        
        $validator = Validator::make($res,
            [
                'brand_name' =>'required|unique:brand|max:20',
                'brand_url' =>'required',
            ],[
                'brand_name.required'=>'商品名称必填',
                'brand_name.unique'=>'已有此商品名称',
                'brand_name.max'=>'名称最多输入20位',
                'brand_url.required'=>'商品网址不能为空',
            ]);
            if ($validator->fails()) {
                return redirect('brand/create')
                ->withErrors($validator)
                ->withInput();
            }
        //判断添加的图片是否存在 单文件上传
        if($request->hasFile('brand_logo')){
            $res['brand_logo']=$this->uplode('brand_logo');
        }
        
        //添加数据到数据库
        // $insert=DB::table('brand')->insert($res);
        //ORM添加
        $insert=Brand::insert($res);
        if( $insert ){
            return redirect('/brand/index');
        }
    }
    //判断是否上传成功
    public function uplode($img){
        if(request()->file($img)->isValid()){
            $file=request()->$img;
            //创建方法
            $stores=$file->store('uplodes');
            return $stores;
        }
        exit('图片上传失败');
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
     *修改展示页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //$brand= DB::table('brand')->where('brand_id',$id)->first();
       
       $brand=Brand::where('brand_id',$id)->first();

        return view('brand.edit',['brand'=>$brand]);
    }

    /**
     * Update the specified resource in storage.
     *修改执行页面
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=$request->except('_token');
        //判断添加的图片是否存在
        if($request->hasFile('brand_logo')){
            $post['brand_logo']=$this->uplode('brand_logo');
        }
        // $res=DB::table('brand')->where('brand_id',$id)->update($post);
        $res=Brand::where('brand_id',$id)->update($post);
        if($res!==false){
            return redirect('/brand/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *删除的方法
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res=Brand::destroy($id);
        if($res){
            return redirect('/brand/index');
        }
    }
}
