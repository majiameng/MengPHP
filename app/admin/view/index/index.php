<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <title>{:config('system.base.site_name')}-后台管理系统</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html"/>
    <![endif]-->
    <link rel="shortcut icon" href="{:config('system.base.site_favicon')}">
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
            {if !empty($_admin_menu)}
            {foreach name="_admin_menu" item="val"}
            <li class="layui-nav-item"><a href="javascript:meng_menu('{$val.id}')">{$val.title}</a></li>
            {/foreach}
            {/if}
            <li class="layui-nav-item meng-nav-my">
                <a href="javascript:;">
                    <img src="https://avatars.githubusercontent.com/u/24783993?v=4" class="layui-nav-img">
                    Mengphp
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
                            <img src="{:config('system.base.site_logo')}" alt="{:config('system.base.site_name')}" style="width: 180px">
                        </div>

                    </div>
                </li>
                {if !empty($_admin_menu)}
                {foreach name="_admin_menu" item="val"}
                    {if !empty($val['childs'])}
                    {foreach name="$val['childs']" item="va"}
                    <li class="meng-menu meng-li-{$va.pid}" style="display:none;">
                        <a href="{$va.url}">
                            <i class="{$va.icon}"></i>
                            <span class="nav-label">{$va.title} </span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            {if ($va['title'] == '快捷菜单')}
                                {if !empty($va['childs'])}
                                {foreach name="$va['childs']" item="v"}
                                <li class="menu">
                                    <a class="J_menuItem" href="{$v.url}"><i class="{$v.icon}"></i>{$v.title}</a><i data-href="{:url('menu/del?ids='.$v['id'])}" class="layui-icon j-del-menu" style="position: absolute;right: 10px;top: 10px;">&#xe640;</i>
                                </li>
                                {/foreach}
                                {/if}
                            {else}
                                {if !empty($va['childs'])}
                                {foreach name="$va['childs']" item="v"}
                                <li class="menu">
                                    <a class="J_menuItem" href="{$v.url}"><i class="{$v.icon}"></i>{$v.title}</a>
                                </li>
                                {/foreach}
                                {/if}
                            {/if}
                        </ul>
                    </li>
                    {/foreach}
                    {/if}
                {/foreach}
                {/if}
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
                    <a href="javascript:;" class="active J_menuTab" data-id="index_v1.html">{$_admin_menu_current['title']}</a>
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
            <a href="{:url('admin/login/logout')}" class="roll-nav roll-right J_tabExit"><i class="fa fa fa-sign-out"></i>退出</a>
        </div>
        <div class="row J_mainContent" id="content-main">
            <iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="{:url('index/index_page')}" frameborder="0" data-id="index_v1.html" seamless></iframe>

        </div>
        <div class="footer">
            <div>
                <span style="float: left">Powered by <a href="{:config('mengphp.url')}" target="_blank">{:config('mengphp.name')}</a> v{:config('mengphp.version')}</span>
                <span style="float: right;size: 12rem"> &copy;2016-<?=date('Y')?> <a href="{:config('mengphp.url')}" target="_blank">{:config('mengphp.copyright')}</a> All Rights Reserved.</span>
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