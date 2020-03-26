
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>商品分类展示</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<table class="table table-condensed">
<a href="{{url('/goods/create')}}" class="btn btn-default">去添加</a>
<center>
<h2>分类展示页面</h2>
</center>
	<thead>
		<tr>
			<th>分类id</th>
			<th>分类名称</th>
			<th>父级分类</th>
            <th>分类介绍</th>
			<th>是否展示在导航栏</th>
            <th>操作</th>
		</tr>
	</thead>
	<touch>
        @foreach($goods as $v)
		<tr>
			<td>{{$v->creagory_id}}</td>
			<td>{{$v->creagory_name}}</td>
			<td>{{$v->pid}}</td>
			<td>{{$v->creagory_desc}}</td>
            <td>{{$v->creagory_sex}}</td>
			<td>
                 <a href="{{url('/creagory/edit/'.$v->creagory_id)}}" class="btn btn-info">编辑</a>
                 <a href="{{url('/creagory/destroy/'.$v->creagory_id)}}" class="btn btn-danger">删除</a></td>
		</tr>
        @endforeach
		<tr>
			<td colsoan='6'>{{$goods->links()}}</td>
		</tr>
    </touch>
</table>

</body>
</html>