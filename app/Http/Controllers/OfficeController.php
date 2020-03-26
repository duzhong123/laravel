<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Office;
class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *展示页面
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $office=Office::all();
        return view('office.index',['office'=>$office]);
    }

    /**
     * Show the form for creating a new resource.
     *添加展示页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('office.create');
    }

    /**
     * Store a newly created resource in storage.
     *添加执行
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $_token=request()->except('_token');
        //添加图片 单文件上传
        if(request()->hasFile('img')){
            $_token['img']=uplode('img');
        }

        //添加图片 多文件上传
        if(request()->hasFile('imgs')){
            $file_imgs=Moreuplode('imgs');
            //用|隔开分割成字符串
            $_token['imgs']=implode('|',$file_imgs);
        }
        
        $res=Office::insert($_token);
        if($res){
            return redirect('/office/index');
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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
