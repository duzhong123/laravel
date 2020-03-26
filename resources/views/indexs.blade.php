<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Bootstrap 附加导航（Affix）插件</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
/* Custom Styles */
    ul.nav-tabs{
        width: 140px;
        margin-top: 20px;
        border-radius: 4px;
        border: 1px solid #ddd;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.067);
    }
    ul.nav-tabs li{
        margin: 0;
        border-top: 1px solid #ddd;
    }
    ul.nav-tabs li:first-child{
        border-top: none;
    }
    ul.nav-tabs li a{
        margin: 0;
        padding: 8px 16px;
        border-radius: 0;
    }
    ul.nav-tabs li.active a, ul.nav-tabs li.active a:hover{
        color: #fff;
        background: #0088cc;
        border: 1px solid #0088cc;
    }
    ul.nav-tabs li:first-child a{
        border-radius: 4px 4px 0 0;
    }
    ul.nav-tabs li:last-child a{
        border-radius: 0 0 4px 4px;
    }
    ul.nav-tabs.affix{
        top: 30px; /* Set the top position of pinned element */
    }
</style>
<script>
$(document).ready(function(){
    $("#myNav").affix({
        offset: { 
            top: 125 
      }
    });
});
</script>
</head>
<body data-spy="scroll" data-target="#myScrollspy">
<div class="container">
   <div class="jumbotron">
        <h1>laravel 后台</h1>
    </div>
    <div class="row">
        <div class="col-xs-3" id="myScrollspy">
            <ul class="nav nav-tabs nav-stacked" id="myNav">
                <li><a href="{{url('/goods/create')}}">商品添加</a></li>
                <li><a href="{{url('/creagory/create')}}">分类添加</a></li>
                <li><a href="{{url('/brand/create')}}">品牌添加</a></li>
                <li><a href="{{url('/admin/create')}}">管理员添加</a></li>
            </ul>
        </div>
        <div class="col-xs-9">
            <h2 id="section-1">商品添加</h2>
            <p>欢迎添加商品</p>
            <hr>
            <h2 id="section-2">分类添加</h2>
            <p>欢迎添加分类</p>
            <hr>
            <h2 id="section-3">品牌添加</h2>
            <p>欢迎添加品牌</p>
            <hr>
            <h2 id="section-4">管理员添加</h2>
            <p>欢迎添加管理员</p>
            <hr>
        </div>
    </div>
</div>
</body>
</html>