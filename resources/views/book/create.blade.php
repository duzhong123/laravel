<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>图书添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<a href="{{url('/book/index')}}" class="btn btn-default">去列表</a>
<center>
<h2>图书的添加页面</h2><hr/>
</center>
<form class="form-horizontal" role="form" action="{{url('/book/store')}}" method="post" enctype="multipart/form-data">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">图书名字</label>
		<div class="col-sm-7">
			<input type="text" class="form-control" id="firstname"  name="book_name"
				   placeholder="请输入书名">
			<b style="color:red">{{$errors->first('book_name')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">作者</label>
		<div class="col-sm-7">
			<input type="text" class="form-control" id="firstname"  name="book_man"
				   placeholder="请输入作者">
			<b style="color:red">{{$errors->first('book_man')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">图书价格</label>
		<div class="col-sm-7">
			<input type="text" class="form-control" id="firstname"  name="book_price"
                  placeholder="请输入价格">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">图书图片</label>
		<div class="col-sm-7">
            <input type="file" class="form-control" id="firstname"  name="book_img">
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
