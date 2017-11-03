<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:54:"E:\phpstudy\WWW\my\meng/app/admin\view\index\index.php";i:1509693522;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <title><?php echo config('base.site_name'); ?>-后台管理系统</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html"/>
    <![endif]-->
    <link rel="shortcut icon" href="<?php echo config('base.site_favicon'); ?>">
    <link href="__ADMIN_CSS__/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="__STATIC__/fonts/typicons/min.css?v=4.4.0" rel="stylesheet">
    <link href="__STATIC__/fonts/font-awesome/min.css?v=4.4.0" rel="stylesheet">
    <link href="__ADMIN_CSS__/animate.min.css" rel="stylesheet">
    <link href="__ADMIN_CSS__/style.min.css?v=4.1.0" rel="stylesheet">
    <link rel="stylesheet" href="__PUBLIC_LAYUI__/css/layui.css">
    <!-- 字体 -->
    <link rel="stylesheet" href="__ADMIN_CSS__/style.css">
    <link rel="stylesheet" href="__STATIC__/fonts/typicons/min.css">
    <link rel="stylesheet" href="__STATIC__/fonts/font-awesome/min.css">
</head>
<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
<div id="wrapper">
    <div class="layui-header">
        <!-- 头部垂直导航 -->
        <ul class="layui-nav">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#" style="float: left"><i class="fa fa-bars"></i> </a>
            <?php if(!empty($_admin_menu)): if(is_array($_admin_menu) || $_admin_menu instanceof \think\Collection || $_admin_menu instanceof \think\Paginator): if( count($_admin_menu)==0 ) : echo "" ;else: foreach($_admin_menu as $key=>$val): ?>
            <li class="layui-nav-item"><a href="javascript:meng_menu('<?php echo $val['id']; ?>')"><?php echo $val['title']; ?></a></li>
            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
            <li class="layui-nav-item meng-nav-my">
                <a href="javascript:;">
                    <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                    佳萌
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="">基本资料</a></dd>
                    <dd><a href="">安全设置</a></dd>
                </dl>
            </li>
        </ul>
    </div>
    <!--左侧导航开始-->
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="nav-close"><i class="fa fa-times-circle"></i>
        </div>
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <div class="layui-logo">
                            <img src="<?php echo config('base.site_logo'); ?>" alt="<?php echo config('base.site_name'); ?>" style="width: 180px">
                        </div>

                    </div>
                </li>
                <?php if(!empty($_admin_menu)): if(is_array($_admin_menu) || $_admin_menu instanceof \think\Collection || $_admin_menu instanceof \think\Paginator): if( count($_admin_menu)==0 ) : echo "" ;else: foreach($_admin_menu as $key=>$val): if(!empty($val['childs'])): if(is_array($val['childs']) || $val['childs'] instanceof \think\Collection || $val['childs'] instanceof \think\Paginator): if( count($val['childs'])==0 ) : echo "" ;else: foreach($val['childs'] as $key=>$va): ?>
                    <li class="meng-menu meng-li-<?php echo $va['pid']; ?>" style="display:none;">
                        <a href="<?php echo $va['url']; ?>">
                            <i class="<?php echo $va['icon']; ?>"></i>
                            <span class="nav-label"><?php echo $va['title']; ?> </span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <?php if(($va['title'] == '快捷菜单')): if(!empty($va['childs'])): if(is_array($va['childs']) || $va['childs'] instanceof \think\Collection || $va['childs'] instanceof \think\Paginator): if( count($va['childs'])==0 ) : echo "" ;else: foreach($va['childs'] as $key=>$v): ?>
                                <li class="menu">
                                    <a class="J_menuItem" href="<?php echo $v['url']; ?>"><i class="<?php echo $v['icon']; ?>"></i><?php echo $v['title']; ?></a><i data-href="<?php echo url('menu/del?ids='.$v['id']); ?>" class="layui-icon j-del-menu" style="position: absolute;right: 10px;top: 10px;">&#xe640;</i>
                                </li>
                                <?php endforeach; endif; else: echo "" ;endif; endif; else: if(!empty($va['childs'])): if(is_array($va['childs']) || $va['childs'] instanceof \think\Collection || $va['childs'] instanceof \think\Paginator): if( count($va['childs'])==0 ) : echo "" ;else: foreach($va['childs'] as $key=>$v): ?>
                                <li class="menu">
                                    <a class="J_menuItem" href="<?php echo $v['url']; ?>"><i class="<?php echo $v['icon']; ?>"></i><?php echo $v['title']; ?></a>
                                </li>
                                <?php endforeach; endif; else: echo "" ;endif; endif; endif; ?>
                        </ul>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; endif; ?>
            </ul>
        </div>
    </nav>
    <!--左侧导航结束-->
    <!--右侧部分开始-->
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row content-tabs">
            <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i>
            </button>
            <nav class="page-tabs J_menuTabs">
                <div class="page-tabs-content">
                    <a href="javascript:;" class="active J_menuTab" data-id="index_v1.html"><?php echo $_admin_menu_current['title']; ?></a>
                </div>
            </nav>
            <button class="roll-nav roll-right J_tabRight"><i class="fa fa-forward"></i>
            </button>
            <div class="btn-group roll-nav roll-right">
                <button class="dropdown J_tabClose" data-toggle="dropdown">常用操作<span class="caret"></span></button>
                <ul role="menu" class="dropdown-menu dropdown-menu-right">
                    <li class="J_tabGo"><a>前进</a>
                    </li>
                    <li class="J_tabBack"><a>后退</a>
                    </li>
                    <li class="J_tabFresh"><a>刷新</a>
                    </li>
                    <li class="divider"></li>
                    <li class="J_tabShowActive"><a>定位当前选项卡</a>
                    </li>
                    <li class="divider"></li>
                    <li class="J_tabCloseAll"><a>关闭全部选项卡</a>
                    </li>
                    <li class="J_tabCloseOther"><a>关闭其他选项卡</a>
                    </li>
                </ul>
            </div>
            <a href="<?php echo url('admin/login/logout'); ?>" class="roll-nav roll-right J_tabExit"><i class="fa fa fa-sign-out"></i>退出</a>
        </div>
        <div class="row J_mainContent" id="content-main">
            <iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="<?php echo url('index/index_page'); ?>" frameborder="0" data-id="index_v1.html" seamless></iframe>

        </div>
        <div class="footer">
            <div>
                <span style="float: left">Powered by <a href="<?php echo config('mengphp.url'); ?>" target="_blank"><?php echo config('mengphp.name'); ?></a> v<?php echo config('mengphp.version'); ?></span>
                <span style="float: right;size: 12rem"> &copy;2016-<?=date('Y')?> <a href="<?php echo config('mengphp.url'); ?>" target="_blank"><?php echo config('mengphp.copyright'); ?></a> All Rights Reserved.</span>
            </div>
        </div>
    </div>
    <!--右侧部分结束-->
</div>
<script src="__ADMIN_JS__/jquery.min.js?v=2.1.4"></script>
<script src="__ADMIN_JS__/bootstrap.min.js?v=3.3.6"></script>
<script src="__ADMIN_JS__/jquery.metisMenu.js"></script>
<script src="__ADMIN_JS__/jquery.slimscroll.min.js"></script>
<script src="__PUBLIC_JS__/layer/layer/layer.min.js"></script>
<script src="__ADMIN_JS__/hplus.min.js?v=4.1.0"></script>
<script src="__ADMIN_JS__/contabs.min.js"></script>
<script src="__ADMIN_JS__/contabs.js"></script>
<script src="__ADMIN_JS__/pace.min.js"></script>
</body>
</html>
<script src="__PUBLIC_LAYUI__/layui.js"></script>
<script src="__ADMIN_JS__/global.js"></script>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

    });
</script>