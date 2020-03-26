
<html>
<head>
	<meta charset="utf-8"> 
	<title>管理员添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<a href="{{url('/admin/index')}}" class="btn btn-default">去列表</a>
<center>
<h2>管理员添加页面</h2><hr/>
</center>
<form class="form-horizontal" role="form" action="{{url('/admin/store')}}" method="post" enctype="multipart/form-data">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">管理员名字</label>
		<div class="col-sm-7">
			<input type="text" class="form-control" id="name_value"  onblur="check_name()" 
                 name="admin_name" placeholder="请输入姓名">
            <span id="name_span"></span>
			<b style="color:red">{{$errors->first('admin_name')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">管理员密码</label>
		<div class="col-sm-7">
			<input type="password" class="form-control" id="firstname"  name="admin_pwd"
				   placeholder="请输入密码">
			<b style="color:red">{{$errors->first('admin_pwd')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">管理员邮箱</label>
		<div class="col-sm-7">
			<input type="email" class="form-control" id="firstname"  name="admin_email"
                  placeholder="请输入邮箱">
            <b style="color:red">{{$errors->first('admin_email')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">管理员手机号</label>
		<div class="col-sm-7">
			<input type="text" class="form-control" id="firstname"  name="admin_tel"
                  placeholder="请输入手机号">
            <b style="color:red">{{$errors->first('admin_tel')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">管理员头像</label>
		<div class="col-sm-7">
            <input type="file" class="form-control" id="firstname"  name="admin_img">
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
<script>
 //验证姓名
 function check_name(){
     var _name=document.getElementById("name_value").value;
     if(_name==''){
         document.getElementById('name_span').innerHTML="<font color=red>名字不能为空</font>";
     }
 }

</script>