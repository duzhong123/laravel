<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Http\Requests\StoreBookPost;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *展示页面
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book_name=request()->book_name;
        $where=[];
        if($book_name){
            $where[]=["book_name","like","%$book_name%"];
        }
        //分页
        $pageSize=config('app.pageSize');
        $query=request()->all();
        $book=Book::where($where)->paginate($pageSize);
        return view('book.index',['book'=>$book,'query'=>$query,'book_name'=>$book_name]);
    }

    /**
     * Show the form for creating a new resource.
     *添加展示页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     *添加执行页面
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookPost $request)
    {
        $_token=$request->except('_token');
        //添加图片
        //判断图片书否存在
        if(request()->hasFile('book_img')){
            $_token['book_img']=$this->uplode('book_img');
        }
        //添加执行方法
        $res=Book::insert($_token);
        if($res){
            return redirect('/book/index');
        }
    }

    //添加图片的执行方法
    public function uplode($img){
        $file=request()->$img;
        //判断是否添加成功
        if($file->isValid()){
            $store=$file->store('bookImg');
            return $store;
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
