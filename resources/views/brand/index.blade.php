
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>商品类表展示</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<table class="table table-condensed">
<a href="{{url('/brand/create')}}" class="btn btn-default">去添加</a>
<center>
<h2>商品的展示页面</h2>
</center>
<form> 
<input type="text" name="brand_name" placeholder="请输入名称" value="{{$query['brand_name']??''}}">
<input type="text" name="brand_url" placeholder="请输入网址" value="{{$query['brand_url']??''}}">
<input type="submit" value="搜索">
</form>
	<thead>
		<tr>
			<th>商品id</th>
			<th>商品名称</th>
			<th>商品网址</th>
            <th>商品图片</th>
			<th>商品介绍</th>
            <th>操作</th>
		</tr>
	</thead>
	<touch>
        @foreach ($brand as $v)
		<tr>
			<td>{{$v->brand_id}}</td>
			<td>{{$v->brand_name}}</td>
			<td>{{$v->brand_url}}</td>
            <td><img widte="35" height='35' src="{{env('UPLODES_URL')}}{{$v->brand_logo}}" alt=""></td>
			<td>{{$v->brand_desc}}</td>
			<td>
                 <a href="{{url('/brand/edit/'.$v->brand_id)}}" class="btn btn-info">编辑</a>
                 <a href="{{url('/brand/destroy/'.$v->brand_id)}}" class="btn btn-danger">删除</a></td>
		</tr>
        @endforeach
		<tr>
			<td colsoan='6'>{{$brand->appends($query)->links()}}</td>
		</tr>
    </touch>
</table>

</body>
</html>