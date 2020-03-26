<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Creagory;
class CreagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *列表展示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $pageSize=config('app.pageSize');
       $goods=Creagory::paginate($pageSize);
       
       return view('goods.index',['goods'=>$goods]);
    }

    /**
     * Show the form for creating a new resource.
     *添加展示
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $res=Creagory::all();
        
        $info=$this->catemodel($res);
        return view('creagory.create',['info'=>$info]);
    }

    /**
     * Store a newly created resource in storage.
     *添加执行
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post=request()->except('_token');
        $res=Creagory::insert($post);
        if($res){
             return redirect('/creagory/index');
        }
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
        $res=Creagory::all();
        
        $info=$this->catemodel($res);
        $goods=Creagory::where('goods_id',$id)->first();

        return view('creagory.edit',['goods'=>$goods,'info'=>$info]);
    }

    /**
     * Update the specified resource in storage.
     *编辑执行
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=request()->except('_token');
        $res=Creagory::where('goods_id',$id)->update($post);
        if($res!==false){
            return redirect('/creagory/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *删除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res=Creagory::where('goods_id',$id)->delete();
        if($res){
            return redirect('/creagory/index');
        }
    }


    public function catemodel($cateintro,$pid=0,$level=1){
        static $info=[];
        foreach($cateintro as $k=>$v){
            if($v['pid']==$pid){
                $v['level']=$level;
                $info[]=$v;
                // self::catemodel($cateintro,$v['cate_id'],$v['level']+1);
            }
        }
        return $info;
    }
}
