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
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">财务管理</strong> / <small>在线充值</small></div>
            </div>
            <hr>
            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-2 am-u-md-push-10">

                </div>

                <div class="am-u-sm-12 am-u-md-10 am-u-md-pull-2">
                    <form class="am-form am-form-horizontal" action="/Admin/Member/remit.html" method="post" id="cashform">
                    	 <div class="am-form-group">
                            <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">洲际银河交易系统财富账号
                                    </label>
                                    <div class="am-u-sm-9">
	                                    <h3>1.中国农业银行深圳市分行坂田支行  账号 6228480128192706678  陈晓圆 </h3>	
	                                    <h3>2.中国工商银行深圳国贸支行 账号 621226 40000 1913
											8755  阮玲灵</h3>
										<h3>3.中国建设银行深圳建设路支行
											账号 621081 72000 11833 868  陈晓圆</h3>
									</div>
                                   <blockquote>
										
										
										
								   </blockquote>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">选择充值金额</label>
                                    <div class="am-u-sm-9">
                                        <select id="elvel" name="elvel" class="input-xlarge">
                                                  <option value="0">请选择购买现金币数量</option>  
                                                  <option value="500">现金币数量（500€）</option>                                    
                                                  <option value="1000">现金币数量（1000€）</option>  
                                                  <option value="3000">现金币数量（3000€）</option>                             
                                                  <option value="5000">现金币数量（5000€）</option>
                                        </select>
                                     
                                    </div>
                            </div>
                        </div>
                       
                        <div class="am-form-group">
                            <label for="user-email" class="am-u-sm-3 am-form-label">
                                输入充值金额
                            </label>
                            <div class="am-u-sm-9">
                                <input type="text" id="money" name="money" value="" placeholder="请输入充值金额">
                                <small>(充值金额必须为整数)</small>
                            </div>
                        </div>

                       <!--  <div class="am-form-group">
                            <label for="user-phone" class="am-u-sm-3 am-form-label">
                                开户银行
                            </label>
                            <div class="am-u-sm-9">
                                <input type="text" id="bankname" name="bankname" value="<?php echo ($memberinfo['bankname']); ?>" placeholder="开户银行">
                            </div>
                        </div> -->

                        <!-- <div class="am-form-group">
                            <label for="user-QQ" class="am-u-sm-3 am-form-label">
                                开户姓名
                            </label>
                            <div class="am-u-sm-9">
                                <input type="text"  name="bankuser" value="<?php echo ($memberinfo['bankuser']); ?>" id="bankuser" placeholder="请输入开户人姓名">
                            </div>
                        </div> -->

                        <!-- <div class="am-form-group">
                            <label for="user-kahao" class="am-u-sm-3 am-form-label">
                                银行卡号
                            </label>
                            <div class="am-u-sm-9">
                                <input type="text" id="bankcard"  name="bankcard" value="<?php echo ($memberinfo['bankcard']); ?>" placeholder="请输入卡号">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-intro" class="am-u-sm-3 am-form-label">
                                交易密码
                            </label>
                            <div class="am-u-sm-9">
                                <input type="password" value="" name="pwd" id="pwd" name="user-intro" />
                            </div>
                        </div> -->

                        <div class="am-form-group">
                            <div class="am-u-sm-9 am-u-sm-push-3">
                                <button type="button"  id="remit" class="am-btn am-btn-primary">
                                    提交确认
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="am-g">
                <div class="am-u-sm-12">

                        <table class="am-table am-table-striped am-table-hover table-main">
                            <thead>
                            <tr>
                                <th class="table-id" style="width:15%;">编号</th>
                                <th class="table-title" style="width:15%;">充值金额</th>
                                <th class="table-title" style="width:10%;">剩余</th>
                                <th class="table-type" style="width:25%;">充值时间</th>
                                <th class="table-type" style="width:25%;">审核时间</th>
                                <th class="table-author am-hide-sm-only" style="width:10%;">状态</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
	                                <td><?php echo ($vo["id"]); ?></td>
	                                <td>€<?php echo ($vo["money"]); ?></td>
                                    <td>€<?php echo ($vo["xianjin"]); ?></td>
	                                <td><?php echo (date("Y-m-d H:i:s",$vo["addtime"])); ?></td>
                                    <td>
                                        <?php if($vo["retime"] == ''): ?><button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span>待审核</button>
                                        <?php else: ?>
                                            <?php echo (date("Y-m-d H:i:s",$vo["retime"])); endif; ?>
                                    </td>
	                                <td>
	                                	<div class="am-btn-toolbar">
	                                        <div class="am-btn-group am-btn-group-xs">
	                                        	<?php if($vo["status"] == '1'): ?><button class="am-btn am-btn-default am-btn-xs am-hide-sm-only"><span class="am-icon-copy"></span> 已处理</button>
									            <?php else: ?>
									    			<button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span>未审核</button><?php endif; ?>
	                                        </div>
	                                    </div>
	                                </td>
	                            </tr><?php endforeach; endif; ?>
                            

                            </tbody>
                        </table>
                        <div class="am-cf">
                            共 <?php echo ($count); ?> 条记录
                            <div class="am-fr" id="page" pages="<?php echo ($pages); ?>">
                              
                            </div>
                        </div>

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
    $('#elvel').on('change',function(){
        if ($(this).val()=='0') {
            return false;
        };
        $('#money').val($(this).val());
    })
	$('#remit').on('click',function(){
		var money = $('#money').val();
		var re = /^[1-9]\d*$/;
		if (!re.test(money)) {
			layer.alert('充值金额应为整数~');
			return false;
		};
        layer.confirm('您要充值的金额为<span style="color:red">'+money+'</span>,您确定已转账到公司账户了吗？', {
              btn: ['确定','取消'] //按钮
        }, function(){
             $('#cashform').submit();
        }, function(){
        });
	})
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