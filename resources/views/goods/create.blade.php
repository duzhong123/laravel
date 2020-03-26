<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>商品添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<a href="{{url('/goods/index')}}" class="btn btn-default">去列表</a>
<center>
<h2>商品添加页面</h2><hr/>
</center>
<form class="form-horizontal" role="form" action="{{url('/goods/store')}}" method="post" enctype="multipart/form-data">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品名称</label>
		<div class="col-sm-7">
			<input type="text" class="form-control" id="firstname"   name="goods_name"
				   placeholder="请输入名字">
			<b style="color:red">{{$errors->first('goods_name')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品货号</label>
		<div class="col-sm-7">
			<input type="text" class="form-control" id="firstname"  name="goods_order"
				   placeholder="请输入单号">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品价格</label>
		<div class="col-sm-7">
			<input type="text" class="form-control" id="firstname"  name="goods_price"
              placeholder="请输入价格">
			  <b style="color:red">{{$errors->first('goods_price')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品库存</label>
		<div class="col-sm-7">
			<input type="text" class="form-control" id="firstname"  name="goods_num"
				   placeholder="请输入库存"></input>
			<b style="color:red">{{$errors->first('goods_num')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品图片</label>
		<div class="col-sm-7">
			<input type="file" class="form-control" id="firstname"  name="goods_img">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品相册</label>
		<div class="col-sm-7">
			<input type="file" class="form-control" id="firstname"  name="goods_imgs[]" multiple="multiple">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品分类</label>
		<div class="col-sm-7">
            <select name="creagory_id" id="">
                <option value="0">--请选择--</option>
				@foreach($care as $v)
				<option value="{{$v->creagory_id}}">{{str_repeat('---',$v->level)}}{{$v->creagory_name}}</option>
				@endforeach
					
            </select>
			<b style="color:red">{{$errors->first('c_id')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品品牌</label>
		<div class="col-sm-7">
			<select name="brand_id" id="">
                <option value="0">--请选择--</option>
				@foreach($brand as $v)
				<option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
				@endforeach
            </select>
			<b style="color:red">{{$errors->first('g_id')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品介绍</label>
		<div class="col-sm-7">
			<textarea type="text" class="form-control" id="firstname"  name="goods_desc"></textarea>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否显示</label>
		<div class="col-sm-7">
            <input type="radio"   name="is_show" value="1" checked>是
            <input type="radio"   name="is_show" value="2">否
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否新品</label>
		<div class="col-sm-7">
            <input type="radio"   name="is_new" value="1" checked>是
            <input type="radio"   name="is_new" value="2">否
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否精品</label>
		<div class="col-sm-7">
			<input type="radio"   name="is_dest" value="1" checked>是
            <input type="radio"   name="is_dest" value="2">否
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是幻灯片展示</label>
		<div class="col-sm-7">
			<input type="radio"   name="is_slide" value="1" >是
            <input type="radio"   name="is_slide" value="2"checked>否
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">商品添加</button>
		</div>
	</div>
</form>
</body>
</html>
<script>
