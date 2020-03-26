<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>新闻添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<a href="{{url('/news/index')}}" class="btn btn-default">去列表</a>
<center>
<h2>新闻的添加页面</h2><hr/>
</center>
<form class="form-horizontal" role="form" action="{{url('/news/store')}}" method="post" >
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">新闻标题</label>
		<div class="col-sm-7">
			<input type="text" class="form-control" id="firstname"  name="new_title"
				   placeholder="请输入标题">
			<b style="color:red">{{$errors->first('new_title')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">新闻分类</label>
		<div class="col-sm-7">
			<select name="cate_id" id="">
                <option value="0">--请选择--</option>
                @foreach($cate as $v)
                    <option value="{{$v->cate_id}}">{{str_repeat('--|',$v->level)}}{{$v->cate_name}}</option>
                @endforeach
            </select>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">作者</label>
		<div class="col-sm-7">
			<input type="text" class="form-control" id="firstname"  name="new_man"
                  placeholder="请输入作者">
				  <b style="color:red">{{$errors->first('new_man')}}</b>
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
