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
<style type="text/css">
      .box{
            margin: 50px auto;
            position: relative;
            border-radius: 50%;
            width: 100px;
            height: 100px;
            /*background: salmon;*/
            text-align: center;
            line-height: 100px;
            cursor:pointer;
        }
        .box div{
            border-radius: 8%;
            width: 150px;
            height: 150px;
            background:salmon;
            text-align: center;
            line-height: 100px;
            cursor:pointer;
        }
        .box1{
            
            position: absolute;  
            cursor:pointer;
        }
        .box2{
            position: absolute;
            left: -200px;
            top: 150px;
            cursor:pointer;
        }
        .box3{
            position: absolute;
            left: 200px;
            top: 150px;
            cursor:pointer;
        }
        .box5{
            position: absolute;
            left: -100px;
            top: 300px;
            cursor:pointer;
        }
        .box6{
            position: absolute;
            left: 100px;
            top: 300px;
            cursor:pointer;
        }
        .box4{
            position: absolute;
            left: -300px;
            top: 300px;
            cursor:pointer;
        }
        .box7{
            position: absolute;
            left: 300px;
            top: 300px;
            cursor:pointer;
        }
</style>
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
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">个人中心</strong> / <small>团队结构</small></div>
            </div>
            <div class="am-g">
            	<div class="box">
                    <div class="team box1" tree="1"></div>
                    <div class="team box2" tree="2"></div>
                    <div class="team box3" tree="3"></div>
                    <div class="team box4" tree="4"></div>
                    <div class="team box5" tree="5"></div>
                    <div class="team box6" tree="6"></div>
                    <div class="team box7" tree="7"></div>
                </div>
                <!-- <ul class="am-avg-sm-3 boxes">
					  <li class="box box-2">1</li>
					  <li class="box box-3">3</li>
					  <li class="box box-4">4</li>
					  <li class="box box-5">5</li>
					  <li class="box box-6">6</li>
					  <li class="box box-7">7</li>
					  <li class="box box-8">8</li>
					  <li class="box box-9">9</li>
				</ul> -->
            </div>
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
    	var id = "<?php echo $_SESSION['member']['id']?>";
    	var cont = '<a class="reg"  href="javascript:void(0)">注册会员</a>';
    	var init = {
	    	getteam:function(id){
	            $.get('geteam?id='+id,function(data){
	                //顶层
	                $('.box1').html(data['member']['username']);
	                $('.box1').attr('id',data['member']['id']);
                    $('.box1').attr('ulevel',data['member']['ulevel']);

	                //中间层
	                if (!data['memberinfo'].length) {
	                    $('.box2').html(cont);
	                    $('.box2').attr('id','');
	                    $('.box3').html(cont);
	                    $('.box3').attr('id','');
	                }else if (data['memberinfo'].length =='1') {
	                    if (data['memberinfo'][0]['treeplace'] == '0') {
	                         $('.box2').html(data['memberinfo'][0]['username']);
	                         $('.box2').attr('id',data['memberinfo'][0]['id']);
                             $('.box2').attr('ulevel',data['memberinfo'][0]['ulevel']);
	                         $('.box3').html(cont);
	                         $('.box3').attr('id','');
	                    }
	                    if (data['memberinfo'][0]['treeplace'] == '1') {
	                         $('.box3').html(data['memberinfo'][0]['username']);
	                         $('.box3').attr('id',data['memberinfo'][0]['id']);
                             $('.box3').attr('ulevel',data['memberinfo'][0]['ulevel']);
	                         $('.box2').html(cont);
	                         $('.box2').attr('id','');
	                    }
	                }else if(data['memberinfo'].length == "2") {
	                    $('.box2').html(data['memberinfo'][0]['username']);
	                    $('.box2').attr('id',data['memberinfo'][0]['id']);
                        $('.box2').attr('ulevel',data['memberinfo'][0]['ulevel']);

	                    $('.box3').html(data['memberinfo'][1]['username']);
	                    $('.box3').attr('id',data['memberinfo'][1]['id']);
                        $('.box3').attr('ulevel',data['memberinfo'][1]['ulevel']);
	                }
	                //底层数据
	                if (data['childinfo']) {
	                    var left = [];
	                    var right = [];
	                    $.each(data['childinfo'],function(i,item){
	                        if (item['fatherid'] == $('.box2').attr('id')) {
	                            left.push(item);
	                        };
	                        if (item['fatherid']== $('.box3').attr('id')) {
	                            right.push(item);
	                        };
	                    })
	                }

	                //底层左区
	                if (left.length=='1') {
	                	//左边
	                    if (left[0]['treeplace']==0) {
	                        $('.box4').html(left[0]['username']);
	                        $('.box4').attr('id',left[0]['id']);
                            $('.box4').attr('ulevel',left[0]['ulevel']);
	                        $('.box5').html(cont);
	                        $('.box5').attr('id','');
	                    }else{
	                        $('.box5').html(left[0]['username']);
	                        $('.box5').attr('id',left[0]['id']);
                            $('.box5').attr('ulevel',left[0]['ulevel']);
	                        $('.box4').html(cont);
	                        $('.box4').attr('id','');
	                    }
	                }else if (left.length=='2') { //左右同时存在
	                    $.each(left,function(i,item){
	                        switch(item['treeplace']){
	                            case '0':
	                                $('.box4').html(item['username']);
	                                $('.box4').attr('id',item['id']);
                                    $('.box4').attr('ulevel',item['ulevel']);
	                            break;
	                            case '1':
	                                $('.box5').html(item['username']);
	                                $('.box5').attr('id',item['id']);
                                    $('.box5').attr('id',item['id']);
	                            break;
	                            default:
	                            break;
	                        }
	                    })
	                }else{
	                	if (!$('.box2').attr('id')) {
	                		$('.box4').html('');
	                		$('.box5').html('');
	                		$('.box4').attr('id','');
	                		$('.box5').attr('id','');
	                	}else{
	                		$('.box4').html(cont);
	                		$('.box4').attr('id','');
	                		$('.box5').html(cont);
	                		$('.box5').attr('id','');
	                	}
	                }

	                //底层右区
	                if (right.length=='1') {
	                    if (right[0]['treeplace']==0) {
	                        $('.box6').html(right[0]['username']);
	                        $('.box6').attr('id',right[0]['id']);
	                        $('.box7').html(cont);
	                        $('.box7').attr('id','');
	                    }else{
	                        $('.box7').html(right[0]['username']);
	                        $('.box7').attr('id',right[0]['id']);
	                        $('.box6').html(cont);
	                        $('.box6').attr('id','');
	                    }
	                }else if (right.length=='2') { //左右同时存在
	                    $.each(right,function(i,item){
	                        switch(item['treeplace']){
	                            case '0':
	                                $('.box6').html(item['username']);
	                                $('.box6').attr('id',item['id']);
	                            break;
	                            case '1':
	                                $('.box7').html(item['username']);
	                                $('.box7').attr('id',item['id']);
	                            break;
	                            default:
	                            break;
	                        }
	                    })
	                }else{
	                    if (!$('.box3').attr('id')) {
	                		$('.box6').html('');
	                		$('.box6').attr('id','');
	                		$('.box7').html('');
	                		$('.box7').attr('id','');
	                	}else{
	                		$('.box6').html(cont);
	                		$('.box6').attr('id','');
	                		$('.box7').html(cont);
	                		$('.box7').attr('id','');
	                	}
	                }
	            })
	        },
            getcolor:function(){
                var team = $('.team');
                $.each(team,function(i,item){
                    var color = $(item).attr('ulevel');
                    /*switch(i){
                        case "1":
                           $(item).css('background','#eabf56');
                           break;
                        case "2":
                           $(item).css('background','#d9d9d9');
                           break; 
                        case "3":
                           $(item).css('background','#9ec5f8');
                           break;
                        case "4":
                           $(item).css('background','#87d5d1');
                           break; 
                        default :
                            break;  
                    }*/
                })
                
            }
    	}
        
        var obj = Object.create(init);

        //获取团队信息
        obj.getteam(id);
        //obj.getcolor();
        $('.team').on('click',function(){
            var id = $(this).attr('id');
            if (!id) {
            	if ($(this).html()) {
            		switch($(this).attr('tree')){
            			case '2':
            				location.href = "register?fatherMan="+$('.box1').html();
            				break;
            			case '3':
            				location.href = "register?fatherMan="+$('.box1').html();
            				break;
            			case '4':
            				location.href = "register?fatherMan="+$('.box2').html();
            				break;
            			case '5':
            				location.href = "register?fatherMan="+$('.box2').html();
            				break;
            			case '6':
            				location.href = "register?fatherMan="+$('.box3').html();
            				break;
            			case '7':
            				location.href = "register?fatherMan="+$('.box3').html();
            				break;
            			default:
            				break;
            		}
            	}else{
            		return false;
            	}
            }else{
                obj.getteam(id);
            }
        })
		$('.team').on('mouseover',function(){
			var id = $(this).attr('id');
			if (!id) {return false;};
			var self = $(this);
			$.get('getcount?id='+id,function(data){
				layer.tips('左区：'+data['r']/500+' 总 右区：'+data['l']/500, self, {
				   tips: [1, '#3595CC'],
				   time: 4000
				});
			})
			
		})
        
</script>