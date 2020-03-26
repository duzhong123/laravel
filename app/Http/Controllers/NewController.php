<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cate;
use App\News;
use App\Http\Requests\StroeNewPost;
use Illuminate\Support\Facades\Redis;
class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //搜索
        // Redis::flushall();
        $page=request()->page??1;
        // dd($page);
        $new_title=request()->new_title??'';
        
       $news= Redis::get('newlist_'.$page.'_'.$new_title);
       if(!$news){
           echo 'bbb';
            $where=[];
            if($new_title){
                $where[]=['new_title','like',"%$new_title%"];
            }
            //分页
            $pageSize=config('app.pageSize');
            $news= News::where($where)->leftjoin('cate','cate.cate_id','=','news.cate_id')->paginate($pageSize);
        $news=serialize($news);
        Redis::setex('newlist_'.$page.'_'.$new_title,60*5,$news);
        }
        $news=unserialize($news);


       if(request()->ajax()){
         return view('news.ajaxpage',['news'=>$news]);
       }
       $query=request()->all();
       return view('news.index',['news'=>$news,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate=Cate::all();
        
        $cate=NewModel($cate);
        // dd($cate);
        return view('news.create',['cate'=>$cate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StroeNewPost $request)
    {
        $post=request()->except('_token');
        $post['new_time']=time();
        $res=News::insert($post);
        if($res){
            return redirect('/news/index');
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
