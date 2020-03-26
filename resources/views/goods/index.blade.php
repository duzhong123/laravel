
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>商品展示</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<table class="table table-condensed">
<a href="{{url('/goods/create')}}" class="btn btn-default">去添加</a>
<center>
<h2>商品展示页面</h2>
<form>
<input type="text" name="goods_name">
<input type="submit" value="添加">
</form>
</center>
	<thead>
		<tr>
			<th>商品id</th>
			<th>商品名称</th>
			<th>商品单号</th>
            <th>商品价格</th>
			<th>商品库存</th>
            <th>商品介绍</th>
			<th>商品分类</th>
            <th>商品品牌</th>
			<th>商品图片</th>
            <th>商品相册</th>
            <th>是否显示</th>
			<th>是否新品</th>
            <th>是否精品</th>
            <th>操作</th>
		</tr>
	</thead>
	<touch>
        @foreach($goods as $v)
		<tr>
			<td>{{$v->goods_id}}</td>
			<td>{{$v->goods_name}}</td>
			<td>{{$v->goods_order}}</td>
			<td>{{$v->goods_price}}</td>
            <td>{{$v->goods_num}}</td>
            <td>{{$v->goods_desc}}</td>
			<td>{{$v->creagory_name}}</td>
            <td>{{$v->brand_name}}</td>
            <td><img widte="35" height='35' src="{{env('IMGS_URL')}}{{$v->goods_img}}" alt=""></td>
            <td>
                @php $file_img=explode('|',$v->goods_imgs); @endphp
                @foreach($file_img as $vv)
                <img widte="35" height='35' src="{{env('IMGS_URL')}}{{$vv}}" alt="">
                @endforeach
            </td>
            <td>{{$v->is_show}}</td>
            <td>{{$v->is_new}}</td>
            <td>{{$v->is_dest}}</td>
			<td>
                 <a href="{{url('/goods/edit/'.$v->goods_id)}}" class="btn btn-info">编辑</a>
                 <a href="{{url('/goods/destroy/'.$v->goods_id)}}" class="btn btn-danger">删除</a></td>
		</tr>
        @endforeach
    </touch>
</table>

</body>
</html>