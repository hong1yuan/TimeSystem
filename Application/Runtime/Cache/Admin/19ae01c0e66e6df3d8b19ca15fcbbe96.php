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
    <style>
        .well {
            min-height: 20px;
            padding: 19px;
            margin-bottom: 20px;
            background-color: #f5f5f5;
            border: 1px solid #eee;
            border: 1px solid rgba(0, 0, 0, 0.05);
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
            -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
        }
        .hero-unit {
            padding: 40px 60px;
            margin-bottom: 30px;
            background-color: #F8F8F8;
            -webkit-border-radius: 6px;
            -moz-border-radius: 6px;
            border-radius: 6px;
        }

    </style>
    <!-- content start -->
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding">
                <div class="am-fl am-cf">
                    <strong class="am-text-primary am-text-lg">财务管理/</strong>
                    <small> 财务明细</small>
                </div>
            </div>
            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-2 am-u-md-push-10">

                </div>

                <div class="well hero-unit span12">

                    <!--<p>账户名称:<?php echo ($info["username"]); ?></p>-->
                    <h2>账户ID:<?php echo ($info["id"]); ?></h2>
                    <p>币值组合：€ <?php echo ($info["zuhe"]); ?></p>
                    <p>总奖金：€ <?php echo ($info["zongji"]); ?></p>
                    <p>洲际银行股权：€ <?php echo ($info["guquan"]); ?></p>
                    <p>洲际币：<?php echo ($info["zhoujibi"]); ?></p>
                    <p>现金币：€ <?php echo ($info["xianjin"]); ?></p>
                    <p>报单币：€ <?php echo ($info["baodan"]); ?></p>
                    <p>周利息：€ <?php echo ($info["lixi"]); ?></p>
                    <p>月分红：€ <?php echo ($info["fenhong"]); ?></p>
                    <p>环球奖：€ <?php echo ($info["huanqiu"]); ?></p>
                    <p>慈善基金：€ <?php echo ($info["cishan"]); ?></p>
                    <p>洲际币行情：€ <?php echo ($zhoujibi); ?>
                    </p>
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
    laypage({
        cont: $('#page'), //容器。值支持id名、原生dom对象，jquery对象,
        pages: $('#page').attr('pages'), //总页数
        //first:false,
        skin: '#AF0000',
        groups: 7,//连续显示分页数
        curr: function(){ //通过url获取当前页，也可以同上（pages）方式获取
            var page = location.search.match(/page=(\d+)/);
            return page ? page[1] : 1;
        }(),
        jump: function(e, first){ //触发分页后的回调
            if(!first){ //一定要加此判断，否则初始时会无限刷新
                location.href = '?page='+e.curr;
            }
        }
    });
</script>