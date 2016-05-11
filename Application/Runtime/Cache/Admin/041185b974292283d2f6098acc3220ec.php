<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Login Page | Amaze UI Example</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="alternate icon" type="image/png" href="/123/Public/Admin/i/favicon.png">
  <link rel="stylesheet" href="/123/Public/Admin/css/amazeui.min.css"/>
  <link rel="stylesheet" href="/123/Public/Admin/lib/layer/skin/layer.css"/>
  <style>
    .header {
      text-align: center;
    }
    .header h1 {
      font-size: 200%;
      color: #333;
      margin-top: 30px;
    }
    .header p {
      font-size: 14px;
    }
  </style>
</head>
<body>
<div class="header">
  <div class="am-g">
    <h1>Web ide</h1>
    <p>Integrated Development Environment<br/>代码编辑，代码生成，界面设计，调试，编译</p>
  </div>
  <hr />
</div>
<div class="am-g">
  <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
    <h3>登录</h3>
    <hr>
    <div class="am-btn-group">
      <a href="#" class="am-btn am-btn-secondary am-btn-sm"><i class="am-icon-github am-icon-sm"></i> Github</a>
      <a href="#" class="am-btn am-btn-success am-btn-sm"><i class="am-icon-google-plus-square am-icon-sm"></i> Google+</a>
      <a href="#" class="am-btn am-btn-primary am-btn-sm"><i class="am-icon-stack-overflow am-icon-sm"></i> stackOverflow</a>
    </div>
    <br>
    <br>

    <form method="post"  id="documentForm" class="am-form" action="/123/Admin/Index/login.html">
        <label for="email">用户名:</label>
          <input type="text" name="username" id="username" value="">
        <br>
        <label for="password">密码:</label>
        <input type="password" name="password" id="password" value="">
        <br>
        <!-- <label for="verify">验证码:</label>
          <div class="am-cf">
            <input type="text" class="am-btn am-btn-primary am-btn-sm am-fl" style="width:50%;" name="verify">
            <input type="submit" class="am-btn am-btn-default am-btn-sm am-fr" value="忘记密码 ^_^? " name="">
          </div>
        <br> -->
        <label for="remember-me">
          <input id="remember-me" type="checkbox">
          记住密码
        </label>
        <br />
        <div class="am-cf">
          <a href="javascript:void(0)" id="refer" onclick="refer();">
            <input type="button" id="login" name="" value="登 录" class="am-btn am-btn-primary am-btn-sm am-fl">
          </a>
          <input type="submit" name="" value="忘记密码 ^_^? " class="am-btn am-btn-default am-btn-sm am-fr">
        </div>
    </form>
    <hr>
    <p>© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
  </div>
</div>
</body>
<script type="text/javascript" src="/123/Public/Admin/js/jquery.min.js"></script>
<script type="text/javascript" src="/123/Public/Admin/lib/layer/layer.js"></script>
<script type="text/javascript">
    function refer(){
           var username = $('#username').val();
           var password = $('#password').val();
           if (!username || username.length<=3) {
              layer.tips('用户名长度不能小于3位',$('#username'), {
                  tips: [1, 'red'],
                  time: 2000
              });
              return false;
           };
           if (!password || password.length<=3) {
              layer.tips('密码长度不能小于3位',$('#password'), {
                  tips: [1, 'red'],
                  time: 2000
              });
              return false;
           };
           $('#documentForm').submit();
    }
    document.onkeydown = function (e) {
        var ev = document.all ? window.event : e;
        if (ev.keyCode == 13) {
            refer();
        }
    }
</script>
</html>