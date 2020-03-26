<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wenzhang;
use App\Book;
use App\Http\Requests\StoreWenPost;
class WenzhangController extends Controller
{
    /**
     * Display a listing of the resource.
     *列表展示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //搜索
        $w_title=request()->w_title;
        $where=[];
        if($w_title){
            $where[]=["w_title","like","%$w_title%"];
        }

        $query=request()->all();
        //分页
        $pageSize=config('app.pageSize');

        $res=Wenzhang::where($where)->leftjoin('book','wenzhang.book_id','=','book.book_id')->paginate($pageSize);
        return view('wenzhang.index',['res'=>$res,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *添加展示
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //图书的分类
        $book=Book::all();
        return view('wenzhang.create',['book'=>$book]);
    }

    /**
     * Store a newly created resource in storage.
     *添加执行
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWenPost $request)
    {
        $post=$request->except('_token');
        
        if(request()->hasFile('w_img')){
            $post['w_img']=uplode('w_img');
        }
        $res=Wenzhang::insert($post);
       
        if($res){
            return redirect('/wenzhang/index');
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
        $res=Wenzhang::where('w_id',$id)->first();
        $book=Book::all();
        return view('wenzhang.edit',['res'=>$res,'book'=>$book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreWenPost $request, $id)
    {
        $post=request()->except('_token');
        if(request()->hasFile('w_img')){
            $post['w_img']=uplode('w_img');
        }
        $res=Wenzhang::where('w_id',$id)->update($post);
        if($res){
            return redirect('/wenzhang/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res=Wenzhang::where('w_id',$id)->delete();
        if($res){
            if(request()->ajax()){
                return json_encode(['code'=>'0','msg'=>'删除成功']);
            }
            return redirect('/wenzhang/index');
        }
    }

    //验证唯一性
    public function checkOnly(){
        $w_title=request()->w_title;
        $count=Wenzhang::where('w_title',$w_title)->count();
        return json_encode(['code'=>'00000','count'=>$count]);

    }
}
