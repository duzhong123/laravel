<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>后台登录</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center>
<h2>登录页面</h2><hr/>
</center>
<b style="color:red">{{session('msg')}}</b>
<form class="form-horizontal" role="form" action="{{url('/logindo')}}" method="post" >
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">用户名</label>
		<div class="col-sm-7">
			<input type="text" class="form-control" id="firstname"  name="admin_name"
				   placeholder="请输入用户名">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">密码</label>
		<div class="col-sm-7">
			<input type="password" class="form-control" id="firstname"  name="admin_pwd"
                  placeholder="请输入密码">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">登录</button>
			
		</div>
	</div>
</form>
</body>
</html>
