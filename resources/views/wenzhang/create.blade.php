<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>文章添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<a href="{{url('/wenzhang/index')}}" class="btn btn-default">去列表</a>
<center>
<h2>文章的添加页面</h2><hr/>
</center>
<form class="form-horizontal" role="form" action="{{url('/wenzhang/store')}}" method="post" enctype="multipart/form-data">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章标题</label>
		<div class="col-sm-7">
			<input type="text" class="form-control"   name="w_title"
				   placeholder="请输入标题">
            <span id="title_span"></span>
            <b style="color:red">{{$errors->first('w_title')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章分类</label>
		<div class="col-sm-7">
			<select name="book_id" id="">
                <option value="">--请选择--</option>
                @foreach($book as $v)
                <option value="{{$v->book_id}}">{{$v->book_name}}</option>
                @endforeach
            </select>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章重要性</label>
		<div class="col-sm-7">
            <input type="radio"  name="w_zhong" value="1" checked>重要
            <input type="radio" name="w_zhong" value="2">不重要
            
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章是否显示</label>
		<div class="col-sm-7">
			<input type="radio"  name="w_sex" value="1" checked>显示
            <input type="radio" name="w_sex" value="2">不显示
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章作者</label>
		<div class="col-sm-7">
			<input type="text" class="form-control" id="firstname"  name="w_man">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">作者邮件</label>
		<div class="col-sm-7">
			<input type="text" class="form-control" id="firstname"  name="w_email" >
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">关键字</label>
		<div class="col-sm-7">
			<input type="text" class="form-control" id="firstname"  name="w_guan">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章介绍</label>
		<div class="col-sm-7">
			<textarea type="text" class="form-control" id="firstname"  name="w_desc"></textarea>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章图片</label>
		<div class="col-sm-7">
			<input type="file" class="form-control" id="firstname"  name="w_img">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="button" class="btn btn-default">添加</button>
		</div>
	</div>
</form>
</body>
</html>
<script>
   $('input[name="w_title"]').blur(function(){
       $(this).next().empty();
       var w_title=$(this).val();
       var reg=/^[\u4e00-\u9fa5\w-.]{2,50}$/;
       if(!reg.test(w_title)){
           $(this).next().text('文章名称需要由中文,字母,下划线组成长度2-50位');
           return;
       }
       var obj=$(this);
       $.ajax({
           url:"/wenzhang/checkOnly",
           data:{w_title:w_title},
           dataType:'json',
           success:function(res){
               if(res.count>0){
                   obj.next().text("文章标题已存在");
               }
           }
       })
   })
   //表单提交
   $('button').click(function(){
            var nameflag=true;
            var w_title=$('input[name="w_title"]').val();
            var reg=/^[\u4e00-\u9fa5\w-.]{2,50}$/;
            if(!reg.test(w_title)){
                $('input[name="w_title"]').next().text('文章名称需要由中文,字母,下划线组成长度2-50位');
                return;
            }

            
            $.ajax({
                url:"/wenzhang/checkOnly",
                data:{w_title:w_title},
                async:false,
                dataType:'json',
                success:function(res){
                    if(res.count>0){
                        $('input[name="w_title"]').next().text("文章标题已存在");
                        nameflag=false;
                    }
                }
            })
            if(!nameflag){
                return;
            }
            $('form').submit();
   })
</script>
