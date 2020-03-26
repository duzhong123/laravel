
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>售楼的展示</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<table class="table table-condensed">
<a href="{{url('/office/create')}}" class="btn btn-default">去添加</a>
<center>
<h2>售楼的展示页面</h2>
</center>
	<thead>
		<tr>
			<th>售楼id</th>
			<th>小区名称</th>
			<th>售楼人</th>
            <th>售楼人联系方式</th>
			<th>房屋面积</th>
            <th>房屋图片</th>
			<th>房屋相册</th>
            <th>售价</th>
            <th>操作</th>
		</tr>
	</thead>
	<touch>
        @foreach ($office as $v)
		<tr>
			<td>{{$v->id}}</td>
			<td>{{$v->name}}</td>
			<td>{{$v->man}}</td>
            <td>{{$v->tel}}</td>
			<td>{{$v->area}}</td>
			<td><img widte="35" height='35' src="{{env('IMG_URL')}}{{$v->img}}" alt=""></td>
            <td>
                @php $file_img=explode('|',$v->imgs); @endphp
                @foreach($file_img as $vv)
                <img widte="35" height='35' src="{{env('IMG_URL')}}{{$vv}}" alt="">
                @endforeach
            </td>
			<td>{{$v->price}}</td>
			<td>
                 <a href="{{url('/office/edit/'.$v->id)}}" class="btn btn-info">编辑</a>
                 <a href="{{url('/office/destroy/'.$v->id)}}" class="btn btn-danger">删除</a></td>
		</tr>
        @endforeach
		
    </touch>
</table>

</body>
</html>