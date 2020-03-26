
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>新闻列表展示</title>
	<link rel="stylesheet" href="{{asset('/static/admin/css/bootstrap.min.css')}}">  
	<script src="/static/admin/js/jquery.min.js"></script>
	<script src="/static/admin/js/bootstrap.min.js"></script>
</head>
<body>

<table class="table table-condensed">
<a href="{{url('/news/create')}}" class="btn btn-default">去添加</a>

<center>
<h2>新闻的展示页面</h2>
</center>
<form>
<input type="text" name="new_title" value="{{$query['new_title']??''}}">
<input type="submit" value="搜索">
</form>
	<thead>
		<tr>
			<th>新闻id</th>
			<th>新闻标题</th>
			<th>新闻分类</th>
            <th>作着</th>
			<th>添加时间</th>
            <th>操作</th>
		</tr>
	</thead>
	<touch>
        @foreach ($news as $v)
		<tr>
			<td>{{$v->new_id}}</td>
			<td>{{$v->new_title}}</td>
			<td>{{$v->cate_name}}</td>
            <td>{{$v->new_man}}</td>
            <td>@php echo date("Y-m-d H:i:s",$v->new_time)@endphp</td>
			<td>
                 <a href="" class="btn btn-info">编辑</a>
                 <a href="" class="btn btn-danger">删除</a></td>
		</tr>
        @endforeach
		<tr>
			<td colsoan='6'>{{$news->appends($query)->links()}}</td>
		</tr>
    </touch>
</table>
</body>
</html>
<script>
//无刷新页面
$(document).on('click','.pagination a',function(){
    var url=$(this).attr('href');
    // alert(url);
    $.get(url,function(result){
        $('tbody').html(result);
    });
    return false;
});


</script>