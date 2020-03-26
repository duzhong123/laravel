
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>图书列表展示</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<table class="table table-condensed">
<a href="{{url('/book/create')}}" class="btn btn-default">去添加</a>
<center>
<h2>图书的展示页面</h2>
</center>
<form> 
<input type="text" name="book_name" placeholder="请输入名称" value="{{$book_name}}">
<input type="submit" value="搜索">
</form>
	<thead>
		<tr>
			<th>图书id</th>
			<th>图书名称</th>
			<th>图书作者</th>
            <th>图书价格</th>
			<th>图书图片</th>
            <th>操作</th>
		</tr>
	</thead>
	<touch>
        @foreach ($book as $v)
		<tr>
			<td>{{$v->book_id}}</td>
			<td>{{$v->book_name}}</td>
			<td>{{$v->book_man}}</td>
            <td>{{$v->book_price}}</td>
            <td><img widte="35" height='35' src="{{env('BOOKIMG_URL')}}{{$v->book_img}}" alt=""></td>
			<td>
                 <a href="{{url('/book/edit/'.$v->book_id)}}" class="btn btn-info">编辑</a>
                 <a href="{{url('/book/destroy/'.$v->book_id)}}" class="btn btn-danger">删除</a></td>
		</tr>
        @endforeach
		<tr>
			<td colsoan='6'>{{$book->appends(['book_name'=>$book_name])->links()}}</td>
		</tr>
    </touch>
</table>

</body>
</html>