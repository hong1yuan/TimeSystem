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
                        <a href="<?php echo U('Caiwu/change');?>">
                            <span class="am-icon-database"></span>货币转账
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
            
            <?php if($_SESSION['member']['member'] == 'admin'): ?><!-- 个人中心 -->
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
                <!-- 个人中心 -->

                <!-- 管理平台 -->

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
                                <span class="am-icon-trophy">月分红</span>
                            </a>
                        </li>
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



        <div class="am-panel am-panel-default admin-sidebar-panel">
            <div class="am-panel-bd">

            </div>
        </div>
    </div>
</div>
<!-- sidebar end -->

    <!-- content start -->
    <!-- content start -->
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">财务管理</strong> / <small>添加会员级别</small></div>
            </div>

            <hr>

            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-2 am-u-md-push-10">

                </div>

                <div class="am-u-sm-12 am-u-md-10 am-u-md-pull-2">
                    <form class="am-form am-form-horizontal" method="post" action="<?php echo U('jibieOK');?>">
                        <div class="am-form-group">
                            <label for="jibie" class="am-u-sm-3 am-form-label">
                                级别名称
                            </label>
                            <div class="am-u-sm-9">
                                <input type="text" name="jibie" id="jibie" value=" "/>

                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="jine" class="am-u-sm-3 am-form-label">
                                金额
                            </label>
                            <div class="am-u-sm-9">
                                <input type="text" name="jine" id="jine" value=""/>

                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="chongfu" class="am-u-sm-3 am-form-label">
                                市币组合
                            </label>
                            <div class="am-u-sm-9">
                                <input type="text" name="chongfu" id="chongfu" value=""/>
                                <small> %</small>

                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="zhjtuiTC" class="am-u-sm-3 am-form-label">
                                市场奖
                            </label>
                            <div class="am-u-sm-9">
                                <input type="text" name="zhituiTC" id="zhjtuiTC" value=" "/>
                                <small> %</small>

                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="duipengTC" class="am-u-sm-3 am-form-label">
                                开拓奖
                            </label>
                            <div class="am-u-sm-9">
                                <input type="text" name="duipengTC" id="duipengTC" value=""/>
                                <small> %</small>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="DPbilv1" class="am-u-sm-3 am-form-label">
                                开拓奖(六次之后)
                            </label>
                            <div class="am-u-sm-9">
                                <input type="text" name="DPbilv1" id="DPbilv1" value=""/>
                                <small> %</small>
                            </div>
                        </div>

                       <!-- <div class="am-form-group">
                            <label for="user-DPbilv2" class="am-u-sm-3 am-form-label">
                                开拓奖第二级别
                            </label>
                            <div class="am-u-sm-9">
                                <input type="text" name="DPbilv2" id="user-DPbilv2" value=""/>
                                <small> %</small>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-DPbilv3" class="am-u-sm-3 am-form-label">
                                开拓奖第三级别
                            </label>
                            <div class="am-u-sm-9">
                                <input type="text" name="DPbilv3" id="user-DPbilv3" value=""/>
                                <small> %</small>
                            </div>
                        </div>-->



                        <div class="am-form-group">
                            <label for="guanliTC" class="am-u-sm-3 am-form-label">
                                管理奖
                            </label>
                            <div class="am-u-sm-9" >
                                <input type="text" name="guanliTC" id="guanliTC" value=""/>
                                <small> %</small>
                            </div>
                        </div>




                        <div class="am-form-group">
                            <label for="yfenhong" class="am-u-sm-3 am-form-label">
                                月分红
                            </label>
                            <div class="am-u-sm-9">
                                <input type="text" name="yfenhong" id="yfenhong" value=""/>
                                <small> ‰</small>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="zlixi" class="am-u-sm-3 am-form-label">
                                周利息
                            </label>
                            <div class="am-u-sm-9">
                                <input type="text" name="zlixi" id="zlixi" value=""/>
                                <small> ‰</small>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="rifd" class="am-u-sm-3 am-form-label">
                                日封顶
                            </label>
                            <div class="am-u-sm-9">
                                <input type="text" name="rifd" id="rifd" value=""/>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label  class="am-u-sm-3 am-form-label">
                                是否显示
                            </label>
                            <div class="am-u-sm-9">
                                <input type="radio"  name="ifshow" value=" 1" checked/>是
                                <input type="radio" name="ifshow" value="0 " />否
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label  class="am-u-sm-3 am-form-label">
                                密码
                            </label>
                            <div class="am-u-sm-9">
                                <input type="text" name="safekey" id="safekey" value=" " placeholder="请输入二级密码"/>

                            </div>
                        </div>

                        <!--<div class="am-form-group">
                            <label for="user-phone" class="am-u-sm-3 am-form-label">
                                手机号码
                            </label>
                            <div class="am-u-sm-9">
                                <input type="text" id="user-phone"  value="<?php echo ($tel); ?> " disabled/>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-yanzheng" class="am-u-sm-3 am-form-label">
                                验证码
                            </label>
                            <div class="am-u-sm-9 am-form-inline" role="form">
                                <div class="am-form-group">
                                    <input type="text" id="user-yanzheng" name="mobile_code" placeholder="请输入手机验证码"/>
                                </div>

                                <div class="am-form-group">
                                    <button type="button" class="am-btn am-btn-primary send">发送验证码</button>
                                </div>

                            </div>
                        </div>-->

                        <div class="am-form-group">
                            <div class="am-u-sm-9 am-u-sm-push-3">
                                <button type="button" class="am-btn am-btn-primary" onclick="submitAdd()">
                                    添加
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    <!-- content end -->



<footer class="admin-content-footer">
    <hr>
    <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
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
    $('.send').on('click',function(){
        var self = $(this);
        if (self.text() != "发送验证码") {
            return false;
        };
        $.ajax({
            type:'POST',
            url:'/Admin/Plat/sendmsg',
            data:{
                tpl:$('#user-phone').val(),
            },
            success:function(data) {
                if (!data.status) {
                    layer.alert(data.info);
                    return false;
                }else{
                    var i = 180;
                    var time = setInterval(function(){
                        i--;
                        if(i <= 0){
                            self.text('发送验证码');
                            clearInterval(time);
                        }else{
                            self.text(+i+'秒后重新获取');
                        }
                    },1000);
                }

            }
        })
    });




    function submitAdd(){

        var jibie = $('#jibie').val();
        var jine = $('#jine').val();
        var chongfu = $('#chongfu').val();
        var zhituiTC = $('#zhituiTC').val();
        var cardidpatrn = /^\S+$/;
        var cardshuzi = /^([1-9][0-9]*)$/;
        var cardrandom = /^(\d{1,2}(\.\d{1,2})?|100)$/;
        var duipengTC  = $('#duipengTC').val();
        var DPbilv1  = $('#DPbilv1').val();
        var guanliTC  = $('#guanliTC').val();
        var yfenhong  = $('#yfenhong').val();
        var zlixi  = $('#zlixi').val();
        var rifd  = $('#rifd').val();
        var safekey  = $('#safekey').val();



        if (!cardidpatrn.test(jibie)) {
            $('#jibie').val('');
            $('#jibie').attr("placeholder", "不许为空");
            $('#jibie').focus();
            return;
        }
        if (!cardidpatrn.test(jine)) {
            $('#jine').val('');
            $('#jine').attr("placeholder", "不许为空");
            $('#jine').focus();
            return;
        }
        if (!cardshuzi.test(jine)) {
            $('#jine').val('');
            $('#jine').attr("placeholder", "数字格式不对");
            $('#jine').focus();
            return;
        }
        
        if (!cardidpatrn.test(chongfu)) {
            $('#chongfu').val('');
            $('#chongfu').attr("placeholder", "不许为空");
            $('#chongfu').focus();
            return;
        }
        if (!cardrandom.test(chongfu)) {
            $('#chongfu').val('');
            $('#chongfu').attr("placeholder", "数值范围不对");
            $('#chongfu').focus();
            return;
        }

        if (!cardidpatrn.test(zhituiTC)) {
            $('#zhituiTC').val('');
            $('#zhituiTC').attr("placeholder", "不许为空");
            $('#zhituiTC').focus();
            return;
        }
        if (!cardidpatrn.test(duipengTC)) {
            $('#duipengTC').val('');
            $('#duipengTC').attr("placeholder", "不许为空");
            $('#duipengTC').focus();
            return;
        }
        if (!cardidpatrn.test(DPbilv1)) {
            $('#DPbilv1').val('');
            $('#DPbilv1').attr("placeholder", "不许为空");
            $('#DPbilv1').focus();
            return;
        }
        if (!cardidpatrn.test(guanliTC)) {
            $('#guanliTC').val('');
            $('#guanliTC').attr("placeholder", "不许为空");
            $('#guanliTC').focus();
            return;
        }
        if (!cardidpatrn.test(yfenhong)) {
            $('#yfenhong').val('');
            $('#yfenhong').attr("placeholder", "不许为空");
            $('#yfenhong').focus();
            return;
        }
        if (!cardidpatrn.test(zlixi)) {
            $('#zlixi').val('');
            $('#zlixi').attr("placeholder", "不许为空");
            $('#zlixi').focus();
            return;
        }
        if (!cardidpatrn.test(rifd)) {
            $('#rifd').val('');
            $('#rifd').attr("placeholder", "不许为空");
            $('#rifd').focus();
            return;
        }
        if (!cardidpatrn.test(safekey)) {
            $('#safekey').val('');
            $('#safekey').attr("placeholder", "不许为空");
            $('#safekey').focus();
            return;
        }


        $.ajax({
            url : 'jibieOK',
            type : "post",
            data : {
                "jibie" : $('#jibie').val(),
                "jine" : $('#jine').val(),
                "chongfu" : $('#chongfu').val(),
                "zhituiTC" : $('#zhituiTC').val(),
                "password" : $('#password').val(),
                "passwordtwo" : $('#passwordtwo').val(),
                "duipengTC" : $('#duipengTC').val(),
                "DPbilv1" : $('#DPbilv1').val(),
                "guanliTC" : $('#guanliTC').val(),
                "yfenhong" : $('#yfenhong').val(),
                "zlixi" : $('#zlixi').val(),
                "rifd" : $('#rifd').val()

            },
            dataType : "json",
            success : function(data){
                // alert(data.isRead);
               /* if(data.read != 1){
                    var i = data.read;
                    alert(i);
                }
                else{
                    alert("注册成功");
                    location.href = "profile";
                }*/


            }
        })




    }





</script>