<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js fixed-layout">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>洲际币后台管理系统</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="/Public/Admin/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/Public/Admin/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="/Public/Admin/css/amazeui.min.css"/>
    <link rel="stylesheet" href="/Public/Admin/css/admin.css">
    <link rel="stylesheet" href="/Public/Admin/lib/layer/skin/layer.css">
</head>
<script>
    var __index__ = "http://iccoin.cc/houtai/"
</script>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
    以获得更好的体验！</p>
<![endif]-->


<header class="am-topbar am-topbar-inverse admin-header">
    <div class="am-topbar-brand">
        <div class="logo"><img class="am-img-responsive" src="/Public/Admin/i/examples/logo.png"></div>
        <!--<div class="logo_biaoti"></div>-->
    </div>
    <div class="logo_text">
        <small>后台管理</small>
    </div>

    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

        <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">

            <li class="am-dropdown" data-am-dropdown>
                <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                    <span class="am-icon-users"></span> <?php echo ($_SESSION['member']['name']); ?> <span class="am-icon-caret-down"></span>
                </a>
                <ul class="am-dropdown-content">
                    <li><a href="<?php echo U('Member/profile');?>"><span class="am-icon-user"></span> 资料</a></li>
                    <li><a href="<?php echo U('Member/password');?>"><span class="am-icon-cog"></span> 设置</a></li>
                    <li><a href="<?php echo U('Index/layout');?>" onclick =" return confirm('你确定要退出吗？') "><span class="am-icon-power-off"></span> 退出</a></li>
                </ul>
            </li>
            <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
        </ul>
    </div>
</header>

<div class="am-cf admin-main">
    
<!-- sidebar start -->
<div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
        <ul class="am-list admin-sidebar-list">
            <li><a href="<?php echo U('Index/index');?>"><span class="am-icon-home"></span> 首页</a></li>
            <!-- 信息中心 -->
            <li class="admin-parent">
                <a class="am-cf" data-am-collapse="{target: '#collapse-news'}"><span class="am-icon-btn am-primary am-icon-book"></span> 信息中心
                    <span class="am-icon-angle-right am-fr am-margin-right"></span>
                </a>
                <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-news">
                    <li>
                        <a href="<?php echo U('News/news');?>">
                            <span class="am-icon-newspaper-o">新闻公告</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo U('Msg/msg');?>">
                            <span class="am-icon-product-hunt">问题反馈</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- 信息中心 -->
            <!-- 财务管理 -->
            <li class="admin-parent">
                <a class="am-cf" data-am-collapse="{target: '#collapse-finance'}">
                    <span class="am-icon-btn am-primary am-icon-euro"></span> 财务管理
                    <span class="am-icon-angle-right am-fr am-margin-right"></span>
                </a>
                <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-finance">
                    <li>
                        <a href="<?php echo U('Caiwu/index');?>">
                            <span class="am-icon-euro"></span>财务明细
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo U('Caiwu/award');?>">
                            <span class="am-icon-money"></span>奖金明细
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo U('Caiwu/exchange');?>">
                            <span class="am-icon-user-plus"></span>会员转账
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo U('Member/remit');?>">
                            <span class="am-icon-euro"></span>在线充值
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo U('Caiwu/change');?>">
                            <span class="am-icon-database"></span>货币转换
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo U('Caiwu/withdraw');?>">
                            <span class="am-icon-refresh"></span>申请提现
                        </a>
                    </li>
                </ul>
            </li>
            <!-- 财务管理 -->

            <?php if($_SESSION['member']['member'] == 'member'): ?><!-- 个人中心 -->
                <li class="admin-parent">
                    <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}">
                        <span class="am-icon-btn am-primary am-icon-user"></span> 个人中心
                        <span class="am-icon-angle-right am-fr am-margin-right"></span>
                    </a>
                    <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
                        <li>
                            <a href="<?php echo U('Member/profile');?>" class="am-cf">
                                <span class="am-icon-user"></span> 个人资料
                                <span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo U('Member/password');?>">
                                <span class="am-icon-puzzle-piece"></span> 修改密码
                            </a>
                        </li>
                           <li>
                            <a href="<?php echo U('Member/paypassword');?>">
                                <span class="am-icon-puzzle-piece"></span> 二级密码
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo U('Member/register');?>">
                                <span class="am-icon-th"></span> 注册会员

                            </a>
                        </li>
                        <li>
                            <a href="<?php echo U('Member/activate');?>">
                                <span class="am-icon-calendar"></span> 激活帐号
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo U('Member/team');?>"><span class="am-icon-users"></span>团队结构
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- 个人中心 --><?php endif; ?>
            
            <?php if($_SESSION['member']['member'] == 'admin'): ?><!-- 管理平台 -->

                <li class="admin-parent">
                    <a class="am-cf" data-am-collapse="{target: '#collapse-manage'}">
                        <span class="am-icon-btn am-primary am-icon-cog"></span> 平台管理
                        <span class="am-icon-angle-right am-fr am-margin-right"></span>
                    </a>
                    <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-manage">
                        <li><a href="<?php echo U('Guanli/member');?>">
                            <span class="am-icon-trophy">会员管理</span>
                        </a>
                        </li>
                        <li><a href="<?php echo U('Guanli/jibie');?>">
                            <span class="am-icon-trophy">级别管理</span>
                        </a>
                        </li>
                        <li>
                            <a href="<?php echo U('Guanli/reward');?>">
                                <span class="am-icon-database">月分红</span>
                            </a>
                        </li>
                     <!--    <li>
                         <a href="<?php echo U('Guanli/zhoulixi');?>">
                             <span class="am-icon-money">周利息</span>
                         </a>
                     </li> -->
                        <li>
                            <a href="<?php echo U('News/index');?>">
                                <span class="am-icon-newspaper-o"></span>新闻管理
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo U('Msg/index');?>">
                                <span class="am-icon-text-width"></span>留言管理
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo U('Guanli/remit');?>">
                                <span class="am-icon-euro"></span>充值确认
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo U('Guanli/qwithdraw');?>">
                                <span class="am-icon-refresh"></span>提现确认
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo U('Plat/index');?>">
                                <span class="am-icon-cog"></span>交易平台设置
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- 管理平台 --><?php endif; ?>
            <li><a href="<?php echo U('Index/layout');?>"><span class="am-icon-sign-out"></span> 注销</a></li>
        </ul>



        <div class="am-panel am-panel-default admin-sidebar-panel" style="height:0; border:none;">
        </div>
    </div>
</div>
<!-- sidebar end -->


    <!-- content start -->
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">个人中心</strong> / <small>注册新会员</small></div>
            </div>

            <hr>

            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-2 am-u-md-push-10">
                
                </div>

               <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
                   <form class="am-form am-form-horizontal" id="dify"  method="post">
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">安置人</label>
                            <div class="am-u-sm-7">
                                <input type="text" id="fatherMan" name="fatherMan" placeholder=""  value="<?php echo ($value["fatherman"]); ?>">
                            </div>
                            <a href = "team"><strong>查询安置人</strong></a>
                        </div>
                        <br/>
                         <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">位置</label>
                                    <div class="am-u-sm-9">
                                        
                                        <select id="treeplace" name="treeplace" class="input-xlarge">
                                          <option value="0" >左区</option>
                                          <option value="1" >右区</option>
                                        </select>
                                     
                                    </div>
                         </div>
                        <br/>
                          <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">位置</label>
                                    <div class="am-u-sm-9">
                                        
                                        <select id="elvel" name="elvel" class="input-xlarge">
                                                  <option value="0" selected>请选择会员级别</option>

                                                  <option value="4">水星会员（€500）</option>
                                                  
                                                  <option value="1">金星会员（€1000）</option>
                                                  
                                                  <option value="2">白金会员（€3000）</option>
                                                  
                                                  <option value="3">钻石会员（€5000）</option>

                                        </select>
                                     
                                    </div>
                          </div>
                        <br/>
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">用户名</label>
                            <div class="am-u-sm-9">
                                <input type="text" id="usernames" name="usernames" placeholder=""  >
                            </div>
                        </div>
                        <br/>
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">登录密码</label>
                            <div class="am-u-sm-9">
                                <input type="password" id="password" name="password" placeholder="请输入登录密码"  >
                            </div>
                        </div>
                        <br/>
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">确认登录密码</label>
                            <div class="am-u-sm-9">
                                <input type="password" id="password2"  placeholder="请输入确认登录密码" >
                            </div>
                        </div>
                        <br/>
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">二级密码</label>
                            <div class="am-u-sm-9">
                                <input type="password" id="passwordtwo" name="passwordtwo" placeholder="请输入登录密码"  >
                            </div>
                        </div>
                        <br/>
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">确认二级密码</label>
                            <div class="am-u-sm-9">
                                <input type="password" id="passwordtwo2" name="passwordtwo2" placeholder="请输入确认二级密码"  >
                            </div>
                        </div>
                        <br/>
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">手机号码</label>
                            <div class="am-u-sm-9">
                                <input type="text" id="telephone" name="telephone" placeholder="请输入手机号码" >
                            </div>
                        </div>
                        <br/>
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">推荐人</label>
                            <div class="am-u-sm-9">
                                <input type="text" id="reMan" name="reMan" placeholder="开户行" readonly value="<?php echo ($value["username"]); ?>" o>
                            </div>
                        </div>
                        <br/>
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">电子邮箱</label>
                            <div class="am-u-sm-9">
                                <input type="text" id="alipay" name="alipay" placeholder="电子邮箱" >
                            </div>
                        </div>
                        <br/>
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">开户行</label>
                            <div class="am-u-sm-9">
                                <input type="text" id="ibankname" name="ibankname" placeholder="中国银行深圳分行国贸支行" >
                            </div>
                        </div>
                        <br/>
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">开户姓名</label>
                            <div class="am-u-sm-9">
                                <input type="text" id="ibankuser" name="ibankuser" placeholder="银行账号对应的姓名" >
                            </div>
                        </div>
                        <br/>
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">银行卡号</label>
                            <div class="am-u-sm-9">
                                <input type="text" id="ibankcard" name="ibankcard" placeholder="银行卡号" >
                            </div>
                        </div>
                        <br/>
                      
                               



                    <!--     <div class="am-form-group">
                            <div class="am-u-sm-9 am-u-sm-push-3">
                            <button type="button" class="am-btn am-btn-primary" data-loading-text="保存中..."  onclick="submitAdd()">提交注册</button>
                            </div>
                        </div> -->
                            <div class="am-form-group">
                            <div class="am-u-sm-9 am-u-sm-push-3">
                            <button type="button" class="am-btn am-btn-primary" data-loading-text="保存中..."  onclick="submitAdd()">提交注册</button>
                            </div>
                        </div>
                        </form>
                </div>
            </div>
        </div>
        <footer class="admin-content-footer">
            <hr>
            <p class="am-padding-left">© 1998-2016 InterContinental Investment Bank All rights reserved.</p>
        </footer>
    </div>
    <!-- content end -->

</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}">
</a>


<footer class="admin-content-footer">
    <hr>
    <p class="am-padding-left">© 1998-2016 InterContinental Investment Bank All rights reserved.</p>
</footer>
</div>
<!-- content end -->
</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}">
</a>



<!--[if lt IE 9]>
<script src="/Public/Admin/js/jquery.min.js"></script>
<script src="/Public/Admin/js/modernizr.js"></script>
<script src="/Public/Admin/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/Public/Admin/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="/Public/Admin/js/amazeui.min.js"></script>
<script src="/Public/Admin/js/app.js"></script>
<script src="/Public/Admin/lib/laypage/laypage.js"></script>
<script src="/Public/Admin/lib/layer/layer.js"></script>

<!-- <script type="text/javascript" src="/Public/Admin/lib/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/Public/Admin/lib/ueditor/ueditor.all.js"></script> -->
<!-- <script type="text/javascript" src="/Public/Admin/js/dialog.js"></script> -->
</body>
</html>
<script type="text/javascript">
 $().ready(function(){

  $('button[data-loading-text]').click(function () {
    var btn = $(this).button('loading');
    setTimeout(function () {
        btn.button('reset');
    }, 3000);
 });
  var url = window.document.location.href;
  var n = url.indexOf('&seat=');
  
  if (url.charAt(url.length - 1)=='0') {
     $("#treeplace").find("option[value='0']").attr("selected",true);
  }else if (url.charAt(url.length - 1)=='1') {
     $("#treeplace").find("option[value='1']").attr("selected",true);
  }

 })
 

 function submitAdd(){

      var password = $('#password').val();
      var password2 = $('#password2').val();
      var passwordtwo = $('#passwordtwo').val();
      var passwordtwo2 = $('#passwordtwo2').val();
      var cardidpatrn = /^\S+$/;
      var fatherMan  = $('#fatherMan').val();
      var treeplace  = $('#treeplace').val();
      var elvel  = $('#elvel').val();
      var usernames  = $('#usernames').val();
      var telephone  = $('#telephone').val();
      var reMan  = $('#reMan').val();
      var alipay  = $('#alipay').val();
      var ibankname  = $('#ibankname').val();
      var ibankuser  = $('#ibankuser').val();
      var ibankcard  = $('#ibankcard').val();
      if (!cardidpatrn.test(fatherMan)) {
        $('#fatherMan').val('');
        $('#fatherMan').attr("placeholder", "不许为空");
        $('#fatherMan').focus();
        return;
      }
      if (!cardidpatrn.test(treeplace)) {
        $('#treeplace').val('');
        $('#treeplace').attr("placeholder", "不许为空");
        $('#treeplace').focus();
        return;
      }
      if (!cardidpatrn.test(elvel)) {
        $('#elvel').val('');
        $('#elvel').attr("placeholder", "不许为空");
        $('#elvel').focus();
        return;
      }
      if (!cardidpatrn.test(usernames)) {
        $('#usernames').val('');
        $('#usernames').attr("placeholder", "不许为空");
        $('#usernames').focus();
        return;
      }
      if (!cardidpatrn.test(telephone)) {
        $('#telephone').val('');
        $('#telephone').attr("placeholder", "不许为空");
        $('#telephone').focus();
        return;
      }
      if (!cardidpatrn.test(reMan)) {
        $('#reMan').val('');
        $('#reMan').attr("placeholder", "不许为空");
        $('#reMan').focus();
        return;
      }
      if (!cardidpatrn.test(alipay)) {
        $('#alipay').val('');
        $('#alipay').attr("placeholder", "不许为空");
        $('#alipay').focus();
        return;
      }
      if (!cardidpatrn.test(ibankname)) {
        $('#ibankname').val('');
        $('#ibankname').attr("placeholder", "不许为空");
        $('#ibankname').focus();
        return;
      }
      if (!cardidpatrn.test(ibankuser)) {
        $('#ibankuser').val('');
        $('#ibankuser').attr("placeholder", "不许为空");
        $('#ibankuser').focus();
        return;
      }
      if (!cardidpatrn.test(ibankcard)) {
        $('#ibankcard').val('');
        $('#ibankcard').attr("placeholder", "不许为空");
        $('#ibankcard').focus();
        return;
      }
      if (!cardidpatrn.test(password)) {
        $('#password').val('');
        $('#password').attr("placeholder", "不许为空");
        $('#password').focus();
        return;
      }
      if (!cardidpatrn.test(passwordtwo)) {
        $('#passwordtwo').val('');
        $('#passwordtwo').attr("placeholder", "不许为空");
        $('#passwordtwo').focus();
        return;
      }

       if(password != password2){
        $('#password').val('');
        $('#password2').val('');
        $('#password').attr("placeholder", "两次密码不一样");
        $('#password2').attr("placeholder", "两次密码不一样");
        $('#password').focus();
        return;
      }

       if(passwordtwo != passwordtwo2){
        $('#passwordtwo').val('');
        $('#passwordtwo2').val('');
        $('#passwordtwo').attr("placeholder", "两次密码不一样");
        $('#passwordtwo2').attr("placeholder", "两次密码不一样");
        $('#passwordtwo').focus();
        return;
      }
        if(usernames.length < 6){
        $('#usernames').val('');
        $('#usernames').attr("placeholder", "用户名不能少于6位");
        $('#usernames').focus();
        return;
      }
       if(passwordtwo.length < 6){
        $('#passwordtwo').val('');
        $('#passwordtwo').attr("placeholder", "密码不能少于6位");
        $('#passwordtwo').focus();
        return;
      }
       if(password.length < 6){
        $('#password').val('');
        $('#password').attr("placeholder", "密码不能少于6位");
        $('#password').focus();
        return;
      }
         if(telephone.length < 8){
        $('#telephone').val('');
        $('#telephone').attr("placeholder", "请填写正确手机号");
        $('#telephone').focus();
        return;
      }
      


         $.ajax({
        url : 'registeradd',
        type : "post",
        data : {
         "fatherMan" : $('#fatherMan').val(),
         "treeplace" : $('#treeplace').val(),
         "elvel" : $('#elvel').val(),
         "usernames" : $('#usernames').val(),
         "password" : $('#password').val(),
         "passwordtwo" : $('#passwordtwo').val(),
         "telephone" : $('#telephone').val(),
         "reMan" : $('#reMan').val(),
         "alipay" : $('#alipay').val(),
         "ibankname" : $('#ibankname').val(),
         "ibankuser" : $('#ibankuser').val(),
         "ibankcard" : $('#ibankcard').val()

      },
        dataType : "json",
        success : function(data){
          // alert(data.isRead);
            if(data.read != 1){
              var i = data.read;
              alert(i);
            }
            else{
              alert("注册成功");
              location.href = "profile";
            }
          
     
        }
     })
       
   
      
     
    }

</script>