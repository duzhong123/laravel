
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
<a href="{{url('/admin/create')}}" class="btn btn-default">去添加</a>
<center>
<h2>图书的展示页面</h2>
</center>
<form> 
<input type="text" name="admin_name" placeholder="请输入名称" value="{{$admin_name}}">
<input type="submit" value="搜索">
</form>
	<thead>
		<tr>
			<th>管理员id</th>
			<th>管理员姓名</th>
			<th>管理员邮箱</th>
            <th>管理员手机号</th>
			<th>管理员图片</th>
            <th>操作</th>
		</tr>
	</thead>
	<touch>
        @foreach ($admin as $v)
		<tr>
			<td>{{$v->admin_id}}</td>
			<td>{{$v->admin_name}}</td>
			<td>{{$v->admin_email}}</td>
            <td>{{$v->admin_tel}}</td>
            <td><img widte="35" height='35' src="{{env('IMG_URL')}}{{$v->admin_img}}" alt=""></td>
			<td>
                 <a href="{{url('/admin/edit/'.$v->admin_id)}}" class="btn btn-info">编辑</a>
                 <a href="{{url('/admin/destroy/'.$v->admin_id)}}" class="btn btn-danger">删除</a></td>
		</tr>
        @endforeach
		<tr>
			<td colsoan='6'>{{$admin->appends(['admin_name'=>$admin_name])->links()}}</td>
		</tr>
    </touch>
</table>

</body>
</html>