<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>商品分类添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<a href="{{url('/create/index')}}" class="btn btn-default">去列表</a>
<center>
<h2>商品分类添加页面</h2><hr/>
</center>
<form class="form-horizontal" role="form" action="{{url('/create/store')}}" method="post" >
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">分类名字</label>
		<div class="col-sm-7">
			<input type="text" class="form-control" id="firstname"  name="create_name"
				   placeholder="请输入名字">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">分类描述</label>
		<div class="col-sm-7">
			<select name="pid" id="">
                <option value="">--顶级--</option>
                @foreach($info as $v)
                <option value="{{$v->create_id}}">{{$v->create_name}}</option>
                @endforeach
            </select>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">分类描述</label>
		<div class="col-sm-7">
			<textarea type="text" class="form-control" id="firstname"  name="create_desc"
				   placeholder="请输入内容"></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否显示在导航栏</label>
		<div class="col-sm-7">
			<input type="radio"   name="create_sex" value="1" checked>是
            <input type="radio"  name="create_sex" value="2">否
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
