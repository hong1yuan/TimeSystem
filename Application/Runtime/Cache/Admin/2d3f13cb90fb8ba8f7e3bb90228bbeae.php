<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js fixed-layout">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<<<<<<< HEAD
    <title>洲际币后台管理系统</title>
=======
    <title>Amaze UI Admin index Examples</title>
>>>>>>> 4e77aa96207877589995b0b5cd935797a90ba091
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
<<<<<<< HEAD
    <link rel="icon" type="image/png" href="/Public/Admin/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/Public/Admin/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="/Public/Admin/css/amazeui.min.css"/>
    <link rel="stylesheet" href="/Public/Admin/css/admin.css">
    <link rel="stylesheet" href="/Public/Admin/lib/layer/skin/layer.css">
=======
    <link rel="icon" type="image/png" href="/123/Public/Admin/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/123/Public/Admin/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="/123/Public/Admin/css/amazeui.min.css"/>
    <link rel="stylesheet" href="/123/Public/Admin/css/admin.css">
    <link rel="stylesheet" href="/123/Public/Admin/lib/layer/skin/layer.css">
>>>>>>> 4e77aa96207877589995b0b5cd935797a90ba091
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
    以获得更好的体验！</p>
<![endif]-->

<<<<<<< HEAD
<!--<header class="am-topbar am-topbar-inverse admin-header">
    <div class="am-topbar-brand">
        <strong>Amaze UI</strong> <small>后台管理</small>
    </div>-->
<header class="am-topbar am-topbar-inverse admin-header">
    <div class="am-topbar-brand">
        <div class="logo"><img class="am-img-responsive" src="/Public/Admin/i/examples/logo.png"></div>
        <!--<div class="logo_biaoti"></div>-->
    </div>
    <div class="logo_text">
        <small>后台管理</small>
=======
<header class="am-topbar am-topbar-inverse admin-header">
    <div class="am-topbar-brand">
        <strong>Amaze UI</strong> <small>后台管理模板</small>
>>>>>>> 4e77aa96207877589995b0b5cd935797a90ba091
    </div>

    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

        <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
<<<<<<< HEAD
            <li><a href="javascript:;"><span class="am-icon-envelope-o"></span> 收件箱 <span class="am-badge am-badge-warning"></span></a></li>
            <li class="am-dropdown" data-am-dropdown>
                <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                    <span class="am-icon-users"></span> <?php echo ($_SESSION['member']['name']); ?> <span class="am-icon-caret-down"></span>
=======
            <li><a href="javascript:;"><span class="am-icon-envelope-o"></span> 收件箱 <span class="am-badge am-badge-warning">5</span></a></li>
            <li class="am-dropdown" data-am-dropdown>
                <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                    <span class="am-icon-users"></span> 管理员 <span class="am-icon-caret-down"></span>
>>>>>>> 4e77aa96207877589995b0b5cd935797a90ba091
                </a>
                <ul class="am-dropdown-content">
                    <li><a href="#"><span class="am-icon-user"></span> 资料</a></li>
                    <li><a href="#"><span class="am-icon-cog"></span> 设置</a></li>
<<<<<<< HEAD
                    <li><a href="<?php echo U('Index/layout');?>" onclick =" return confirm('你确定要退出吗？') "><span class="am-icon-power-off"></span> 退出</a></li>
=======
                    <li><a href="#"><span class="am-icon-power-off"></span> 退出</a></li>
>>>>>>> 4e77aa96207877589995b0b5cd935797a90ba091
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
<<<<<<< HEAD
            <li><a href="<?php echo U('Index/index');?>"><span class="am-icon-home"></span> 首页</a></li>
=======
            <li><a href="#"><span class="am-icon-home"></span> 首页</a></li>
>>>>>>> 4e77aa96207877589995b0b5cd935797a90ba091
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
                                <span class="am-badge am-badge-secondary am-margin-right am-fr">24</span>
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
<<<<<<< HEAD
                        <li><a href="<?php echo U('Guanli/jibie');?>">
                            <span class="am-icon-trophy">级别管理</span>
                        </a>
                        </li>
=======
>>>>>>> 4e77aa96207877589995b0b5cd935797a90ba091
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
            <li><a href="#"><span class="am-icon-sign-out"></span> 注销</a></li>
        </ul>

        <!-- <div class="am-panel am-panel-default admin-sidebar-panel">
          <div class="am-panel-bd">
            <p><span class="am-icon-bookmark"></span> 公告</p>
            <p>时光静好，与君语；细水流年，与君同。—— Amaze UI</p>
          </div>
        </div> -->

        <div class="am-panel am-panel-default admin-sidebar-panel">
            <div class="am-panel-bd">
                <p><span class="am-icon-tag"></span> wiki</p>
                <p>Welcome to the Amaze UI wiki!</p>
            </div>
        </div>
    </div>
</div>
<!-- sidebar end -->


    <!-- content start -->
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">财务管理</strong> / <small>交易平台设置</small></div>
            </div>

            <hr>

            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-2 am-u-md-push-10">
<<<<<<< HEAD

                </div>

                <div class="am-u-sm-12 am-u-md-10 am-u-md-pull-2">
                    <form class="am-form am-form-horizontal" method="post" action="<?php echo U('webxiugai');?>">
                        <div class="am-form-group">
                            <label for="user-jiage" class="am-u-sm-3 am-form-label">
                                洲际比的价格
                            </label>
                            <div class="am-u-sm-9">
                                <input type="text" name="jiage" id="user-jiage" value="<?php echo ($config["jiage"]); ?>"/>

=======
                    <!--  <div class="am-panel am-panel-default">
                       <div class="am-panel-bd">
                         <div class="am-g">
                           <div class="am-u-md-4">
                             <img class="am-img-circle am-img-thumbnail" src="http://s.amazeui.org/media/i/demos/bw-2014-06-19.jpg?imageView/1/w/200/h/200/q/80" alt="">
                           </div>
                           <div class="am-u-md-8">
                             <p>你可以使用<a href="#">gravatar.com</a>提供的头像或者使用本地上传头像。 </p>
                             <form class="am-form">
                               <div class="am-form-group">
                                 <input type="file" id="user-pic">
                                 <p class="am-form-help">请选择要上传的文件...</p>
                                 <button type="button" class="am-btn am-btn-primary am-btn-xs">保存</button>
                               </div>
                             </form>
                           </div>
                         </div>
                       </div>
                     </div>

                     <div class="am-panel am-panel-default">
                       <div class="am-panel-bd">
                         <div class="user-info">
                           <p>等级信息</p>
                           <div class="am-progress am-progress-sm">
                             <div class="am-progress-bar" style="width: 60%"></div>
                           </div>
                           <p class="user-info-order">当前等级：<strong>LV8</strong> 活跃天数：<strong>587</strong> 距离下一级别：<strong>160</strong></p>
                         </div>
                         <div class="user-info">
                           <p>信用信息</p>
                           <div class="am-progress am-progress-sm">
                             <div class="am-progress-bar am-progress-bar-success" style="width: 80%"></div>
                           </div>
                           <p class="user-info-order">信用等级：正常当前 信用积分：<strong>80</strong></p>
                         </div>
                       </div>
                     </div> -->
                </div>

                <div class="am-u-sm-12 am-u-md-10 am-u-md-pull-2">
                    <form class="am-form am-form-horizontal">
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">姓名 / Name</label>
                            <div class="am-u-sm-9">
                                <input type="text" id="user-name" placeholder="姓名 / Name">
                                <small>输入你的名字，让我们记住你。</small>
>>>>>>> 4e77aa96207877589995b0b5cd935797a90ba091
                            </div>
                        </div>

                        <div class="am-form-group">
<<<<<<< HEAD
                            <label for="user-zuidi" class="am-u-sm-3 am-form-label">
                                最低价
                            </label>
                            <div class="am-u-sm-9">
                                <input type="text" name="zuidi" id="user-zuidi" value="<?php echo ($config["zuidi"]); ?> "/>

=======
                            <label for="user-email" class="am-u-sm-3 am-form-label">电子邮件 / Email</label>
                            <div class="am-u-sm-9">
                                <input type="email" id="user-email" placeholder="输入你的电子邮件 / Email">
                                <small>邮箱你懂得...</small>
>>>>>>> 4e77aa96207877589995b0b5cd935797a90ba091
                            </div>
                        </div>

                        <div class="am-form-group">
<<<<<<< HEAD
                            <label for="user-gao" class="am-u-sm-3 am-form-label">
                                最高价
                            </label>
                            <div class="am-u-sm-9">
                                <input type="text" name="zuigao" id="user-gao" value="<?php echo ($config["zuigao"]); ?>"/>
                            </div>
                        </div>



                        <div class="am-form-group">
                            <label for="user-zhangfu" class="am-u-sm-3 am-form-label">
                                涨幅
                            </label>
                            <div class="am-u-sm-9" >
                                <input type="text" name="zhangfu" id="user-zhangfu" value="<?php echo ($config["zhangfu"]); ?>"/>
                                <small> %</small>
                            </div>
                        </div>




                        <div class="am-form-group">
                            <label for="user-chengjiao" class="am-u-sm-3 am-form-label">
                                成交量
                            </label>
                            <div class="am-u-sm-9">
                                <input type="text" name="chengjiao" id="user-chengjiao" value="<?php echo ($config["chengjiao"]); ?>"/>
=======
                            <label for="user-phone" class="am-u-sm-3 am-form-label">电话 / Telephone</label>
                            <div class="am-u-sm-9">
                                <input type="tel" id="user-phone" placeholder="输入你的电话号码 / Telephone">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-QQ" class="am-u-sm-3 am-form-label">QQ</label>
                            <div class="am-u-sm-9">
                                <input type="number" pattern="[0-9]*" id="user-QQ" placeholder="输入你的QQ号码">
>>>>>>> 4e77aa96207877589995b0b5cd935797a90ba091
                            </div>
                        </div>

                        <div class="am-form-group">
<<<<<<< HEAD
                            <label for="user-phone" class="am-u-sm-3 am-form-label">
                                手机号码
                            </label>
                            <div class="am-u-sm-9">
                                <input type="text" id="user-phone"  value="<?php echo ($telephone); ?>" disabled/>
=======
                            <label for="user-weibo" class="am-u-sm-3 am-form-label">微博 / Twitter</label>
                            <div class="am-u-sm-9">
                                <input type="text" id="user-weibo" placeholder="输入你的微博 / Twitter">
>>>>>>> 4e77aa96207877589995b0b5cd935797a90ba091
                            </div>
                        </div>

                        <div class="am-form-group">
<<<<<<< HEAD
                            <label for="user-yanzheng" class="am-u-sm-3 am-form-label">
                                验证码
                            </label>
                            <div class="am-u-sm-9">
                                <input type="text" id="user-yanzheng" placeholder="请输入手机验证码"/>
                                <br/>
                                <button>发送验证</button>
                            </div>
                        </div>



                        <div class="am-form-group">
                            <div class="am-u-sm-9 am-u-sm-push-3">
                                <button type="submit" class="am-btn am-btn-primary">保存修改</button>
=======
                            <label for="user-intro" class="am-u-sm-3 am-form-label">简介 / Intro</label>
                            <div class="am-u-sm-9">
                                <textarea class="" rows="5" id="user-intro" placeholder="输入个人简介"></textarea>
                                <small>250字以内写出你的一生...</small>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <div class="am-u-sm-9 am-u-sm-push-3">
                                <button type="button" class="am-btn am-btn-primary">保存修改</button>
>>>>>>> 4e77aa96207877589995b0b5cd935797a90ba091
                            </div>
                        </div>
                    </form>
                </div>
            </div>
<<<<<<< HEAD

=======
>>>>>>> 4e77aa96207877589995b0b5cd935797a90ba091
        </div>
        <footer class="admin-content-footer">
            <hr>
            <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
        </footer>
    </div>
    <!-- content end -->

</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}">
</a>


<<<<<<< HEAD
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
=======
<!--[if lt IE 9]>
<script src="/123/Public/Admin/js/jquery.min.js"></script>
<script src="/123/Public/Admin/js/modernizr.js"></script>
<script src="/123/Public/Admin/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/123/Public/Admin/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="/123/Public/Admin/js/amazeui.min.js"></script>
<script src="/123/Public/Admin/js/app.js"></script>
<script src="/123/Public/Admin/lib/laypage/laypage.js"></script>
<script src="/123/Public/Admin/lib/layer/layer.js"></script>
<!-- <script type="text/javascript" src="/123/Public/Admin/lib/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/123/Public/Admin/lib/ueditor/ueditor.all.js"></script> -->
<!-- <script type="text/javascript" src="/123/Public/Admin/js/dialog.js"></script> -->
>>>>>>> 4e77aa96207877589995b0b5cd935797a90ba091
</body>
</html>