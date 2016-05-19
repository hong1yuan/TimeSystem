<?php if (!defined('THINK_PATH')) exit();?>﻿
<!DOCTYPE html>
<html lang="en" class="no-js">

    <head>

        <meta charset="utf-8">
        <title>洲际财富系统-登陆</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel="stylesheet" href="/Public/Admin/css/reset.css">
        <link rel="stylesheet" href="/Public/Admin/css/supersized.css">
        <link rel="stylesheet" href="/Public/Admin/css/style.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <!--<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>-->
        <![endif]-->

    </head>

    <body style="background-image:url(/Public/Admin/img/backgrounds/bjt.jpg);background-position:center; background-repeat:repeat-y">

        <div class="page-container clearfix">
            <h1 style="color: #000000; font-family: 微软雅黑; font-weight: normal;">洲际财富系统</h1>
            <h3 style="font-family: Arial;">Intercontinental Wealth System</h3>
            <form action="" method="post">
                <div class="user">

                    <span id="uname">用户名：</span>
                    <input type="text" name="username" class="username" placeholder="请输入你的用户名/账号">
                </div>
                <div class="mima">
                    <span id="pwd">密码：</span>
                    <input type="password" name="password" class="password" placeholder="请输入密码">
                </div>
                <input type="checkbox" class="ckb" style="width:15px; height:15px; margin-top: 15px; color: #ffffff; border: none;">
                <small class="size" style="color: #000000;">记住密码</small>
                <small style="margin-left:50%; color: #000000;">忘记密码？</small>
                <button type="submit" class="login1">登陆</button>
                <div class="error"><span>+</span></div>
                <div class="connect_title clearfix">

                    <div style="width:80px; height: 1px; background-color: #ffffff; float: left; margin-top: 8px;"></div>
                    <span style="float:left;"><p style="font-size: 14px;">第三方快速登录入口</p></span>
                    <div style="width:85px; height: 1px; background-color: #ffffff;float: left;margin-top: 8px;"></div>
                    <div class="clearfix"></div>
                    <div class="connect_img clearfix">

                        <a href="#"><img src="/Public/Admin/img/icon1.png"></a>
                        <a href="#"><img src="/Public/Admin/img/icon2.png"></a>
                        <a href="#"><img src="/Public/Admin/img/icon3.png"></a>
                        <a href="#"><img src="/Public/Admin/img/icon4.png"></a>

                    </div>
                </div>

            </form>
            <div class="connect">

            </div>

        </div>
<footer style="margin-top:100px;">
    <span style="font-size: 0.625rem;">&copy;版权所有 2016 洲际银行</span>
</footer>
        <!-- Javascript -->
        <script src="/Public/Admin/js/jquery-1.8.2.min.js"></script>
        <script src="/Public/Admin/js/supersized.3.2.7.min.js"></script>
        <script src="/Public/Admin/js/supersized-init.js"></script>
        <script src="/Public/Admin/js/scripts.js"></script>

    </body>

</html>