<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>售楼添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<a href="{{url('/office/index')}}" class="btn btn-default">去列表</a>
<center>
<h2>售楼的添加页面</h2><hr/>
</center>
<form class="form-horizontal" role="form" action="{{url('/office/store')}}" method="post" enctype="multipart/form-data">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">小区名字</label>
		<div class="col-sm-7">
			<input type="text" class="form-control" id="firstname"  name="name"
				   placeholder="请输入名字">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">导购人</label>
		<div class="col-sm-7">
			<input type="text" class="form-control" id="firstname"  name="man"
				   placeholder="请输入网址">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">导购联系方式</label>
		<div class="col-sm-7">
			<input type="text" class="form-control" id="firstname"  name="tel">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">房屋面积</label>
		<div class="col-sm-7">
			<input type="text" class="form-control" id="firstname"  name="area"
				   placeholder="请输入内容"></input>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">房屋图片</label>
		<div class="col-sm-7">
			<input type="file" class="form-control" id="firstname"  name="img">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">房屋相册</label>
		<div class="col-sm-7">
			<input type="file" class="form-control" id="firstname"  name="imgs[]" multiple="multiple">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">售价</label>
		<div class="col-sm-7">
			<input type="text" class="form-control" id="firstname"  name="price">
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
