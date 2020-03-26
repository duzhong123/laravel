
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>文章的展示</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<table class="table table-condensed">
<a href="{{url('/wenzhang/create')}}" class="btn btn-default">去添加</a>
<center>
<h2>文章的展示页面</h2>
<form>
<input type="text" name="w_title" value="{{$query['w_title']??''}}">
<input type="submit" value="搜索">
</form>
</center>
	<thead>
		<tr>
			<th>文章id</th>
			<th>文章标题</th>
			<th>文章分类</th>
            <th>文章是否重要</th>
			<th>文章是否显示</th>
            <th>文章作者</th>
			<th>文章作者邮箱</th>
            <th>关键字</th>
            <th>文章介绍</th>
            <th>文章图片</th>
            <th>操作</th>
		</tr>
	</thead>
	<touch>
        @foreach ($res as $v)
		<tr>
			<td>{{$v->w_id}}</td>
			<td>{{$v->w_title}}</td>
			<td>{{$v->book_name}}</td>
            <td>{{$v->w_zhong?'√':'×'}}</td>
			<td>{{$v->w_sex?'√':'×'}}</td>
            <td>{{$v->w_man}}</td>
            <td>{{$v->w_email}}</td>
            <td>{{$v->w_guan}}</td>
            <td>{{$v->w_desc}}</td>
			<td><img widte="35" height='35' src="{{env('IMG_URL')}}{{$v->w_img}}" alt=""></td>
			<td>
                 <a href="{{url('/wenzhang/edit/'.$v->w_id)}}" class="btn btn-info">编辑</a>
                 <a href="javascript:;" id="{{$v->w_id}}" class="btn btn-danger">删除</a></td>
		</tr>
        @endforeach
		<tr>
            <td>{{$res->appends($query)->links()}}</td>
        </tr>
    </touch>
</table>
</body>
</html>
<script>

//删除的方法
$('.btn-danger').click(function(){
    var id=$(this).attr('id');
    if(confirm('是否确定删除')){
        $.get('/wenzhang/destroy/'+id,function(res){
            if(res.code=='0'){
                location.reload();
            }
        },'json')
    }
})

</script>