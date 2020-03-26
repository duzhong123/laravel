
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>学生列表展示</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<table class="table table-condensed">
<a href="{{url('/student/create')}}" class="btn btn-default">去添加</a>
<center>
<h2>学生展示页面</h2>
</center>
	<thead>
		<tr>
			<th>学生id</th>
			<th>学生姓名</th>
			<th>学生性别</th>
            <th>学生班级</th>
		</tr>
	</thead>
	<touch>
        @foreach ($student as $v)
		<tr>
			<td>{{$v->id}}</td>
			<td>{{$v->name}}</td>
			<td>{{$v->sex}}</td>
            <td>{{$v->status}}</td>
			<td>
                 <button type="button" class="btn btn-info">编辑</button>
                 <button type="button" class="btn btn-danger">删除</button></td>
		</tr>
        @endforeach
    </touch>
</table>

</body>
</html>