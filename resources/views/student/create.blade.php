<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>学生添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<a href="{{url('/student/index')}}" class="btn btn-default">去列表</a>
<center>
<h2>学生添加页面</h2><hr/>
</center>
<form class="form-horizontal" role="form" action="{{url('/student/store')}}" method="post">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">学生姓名</label>
		<div class="col-sm-7">
			<input type="text" class="form-control" id="firstname"  name="name"
				   placeholder="请输入名字">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">学生性别</label>
		<div class="col-sm-7">
			<input type="radio"   name="sex" value="男">男
            <input type="radio"   name="sex" value="女">女
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">学生班级</label>
		<div class="col-sm-7">
			<input type="text" class="form-control" id="firstname" placeholder="请输入班级"  name="status">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">添加</button>
		</div>
	</div>
</form>
</body>
</html>
