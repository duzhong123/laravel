<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Http\Requests\StoreAdminPost;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *列表展示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin_name=request()->admin_name;
        $where=[];
        if($admin_name){
            $where[]=["admin_name","like","%$admin_name%"];
        }
        $config=config('app.pageSize');
        $admin=Admin::paginate($config);
        return view('admin.index',['admin'=>$admin,'admin_name'=>$admin_name]);
    }

    /**
     * Show the form for creating a new resource.
     *表单展示
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *添加执行
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminPost $request)
    {
        $post=request()->except('_token');
        $post['admin_pwd']=encrypt($post['admin_pwd']);
        //添加图片
        if(request()->hasFile('admin_img')){
            $post['admin_img']=uplode('admin_img');
        }
        $res=Admin::insert($post);
        if($res){
            return redirect('/admin/index');
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
     *修改展示
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin=Admin::where('admin_id',$id)->first();
       
        // $admin['admin_pwd']=$admin;
        // dd($admin);
        return view('admin.edit',['admin'=>$admin]);
    }

    /**
     * Update the specified resource in storage.
     *修改执行
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=request()->except('_token');
        //添加图片
        if(request()->hasFile('admin_img')){
            $post['admin_img']=uplode('admin_img');
        }
        $res=Admin::where('admin_id',$id)->update($post);
        if($res!==false){
            return redirect('/admin/index');
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
        $res=Admin::where('admin_id',$id)->delete();
        if($res){
            return redirect('/admin/index');
        }
    }
}
