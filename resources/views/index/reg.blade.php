@extends('layouts.shop')

@section('title', '注册页面')

@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>会员注册</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/static/index/images/head.jpg" />
     </div><!--head-top/-->
     <form action="{{url('/reg/regDo')}}" method="post" class="reg-login">
      @csrf
      <h3>已经有账号了？点此<a class="orange" href="{{url('/log')}}">登陆</a></h3>
      <div class="lrBox">
       <div class="lrList"><input type="text"  name="name" placeholder="输入手机号码或者邮箱号" /></div>
       <b style="color:red">{{$errors->first('name')}}</b>
       
       <div class="lrList2"><input type="text" name="code" placeholder="输入短信验证码" />
        <button type="button">获取验证码</button>    
      </div>
      <b style="color:red">{{$errors->first('code')}}</b>
       <div class="lrList"><input type="password"  name="pwd" placeholder="设置新密码（6-18位数字或字母）" /></div>
       <b style="color:red">{{$errors->first('pwd')}}</b>
       <div class="lrList"><input type="password"  name="pwds" placeholder="再次输入密码" /></div>
       <b style="color:red">{{$errors->first('pwds')}}</b>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="submit" value="立即注册" />
      </div>
     </form><!--reg-login/-->
    
@include('index.public.footer');

<script>
  $('button').click(function(){
    var name=$("input[name='name']").val();
    var sj=/^1[3|5|6|7|8|9]\d{9}$/
    if(sj.test(name)){
      //发送手机验证码
      $.get('/reg/sendReg',{name:name},function(res){
         if(res.code=='1'){
           alert(res.msg);
         }
      },'json')
      return;
    }
    var emai=/^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/;
    if(emai.test(name)){
      //发送邮箱验证码
      $.get('/reg/sendEmai',{name:name},function(res){
         if(res.code=='1'){
           alert(res.msg);
         }
      },'json')
      return;
    }
    alert("请输入正确的验证码或邮箱");
    return;
    
  })
</script>



@endsection
