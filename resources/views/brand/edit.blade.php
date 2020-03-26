<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>商品修改</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<a href="{{url('/brand/index')}}" class="btn btn-default">去列表</a>
<center>
<h2>商品的修改展示页面</h2><hr/>
</center>
<form class="form-horizontal" role="form" action="{{url('/brand/update/'.$brand->brand_id)}}" method="post" enctype="multipart/form-data">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品名字</label>
		<div class="col-sm-7">
			<input type="text" class="form-control" id="firstname"  name="brand_name" value="{{$brand->brand_name}}"
				   placeholder="请输入名字">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品网址</label>
		<div class="col-sm-7">
			<input type="text" class="form-control" id="firstname"  name="brand_url" value="{{$brand->brand_url}}"
				   placeholder="请输入网址">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品图片</label>
		<div class="col-sm-7">
			<input type="file" class="form-control" id="firstname"  name="brand_logo" >
            <img widte="35" height='35' src="{{env('UPLODES_URL')}}{{$brand->brand_logo}}" alt="">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品介绍</label>
		<div class="col-sm-7">
			<textarea type="text" class="form-control" id="firstname"  name="brand_desc"
				   placeholder="请输入内容">{{$brand->brand_desc}}</textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">修改</button>
		</div>
	</div>
</form>
</body>
</html>
