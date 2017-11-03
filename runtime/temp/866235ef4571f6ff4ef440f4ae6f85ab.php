<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:53:"E:\phpstudy\WWW\my\meng/app/admin\view\menu\index.php";i:1508330954;s:49:"E:\phpstudy\WWW\my\meng/app/admin\view\layout.php";i:1509698566;s:49:"E:\phpstudy\WWW\my\meng/app/admin\view\header.php";i:1509678508;s:49:"E:\phpstudy\WWW\my\meng/app/admin\view\footer.php";i:1509500460;}*/ ?>
<!DOCTYPE html>
<!-- 公共 header start-->
<html>
<head>
    <title><?php echo $_admin_menu_current['title']; ?> -  Powered by <?php echo config('hisiphp.name'); ?></title>
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <link rel="stylesheet" href="__PUBLIC_LAYUI__/css/layui.css">
    <link rel="stylesheet" href="__ADMIN_CSS__/style.css">
    <link rel="stylesheet" href="__STATIC__/fonts/typicons/min.css">
    <link rel="stylesheet" href="__STATIC__/fonts/font-awesome/min.css">
    <script src="__ADMIN_JS__/jquery.min.js"></script>
    <script src="__PUBLIC_LAYUI__/layui.js"></script>
    <script>
        var ADMIN_PATH = "<?php echo $_SERVER['SCRIPT_NAME']; ?>", LAYUI_OFFSET = 0;
        layui.config({
            base: '__ADMIN_JS__/',
            version: '<?php echo config("hisiphp.version"); ?>'
        }).use('global');
    </script>
</head>
<body>
<div style="padding:0 10px;" class="mcolor"><?php echo runhook('system_admin_tips'); ?></div>
<style type="text/css">
    .layui-form-item .layui-form-label{width:150px;}
    .layui-form-item .layui-input-inline{max-width:80%;width:auto;min-width:260px;}
    .layui-form-mid{padding:0!important;}
    .layui-form-mid code{color:#5FB878;}
</style>
<!-- 公共 header end-->

<!-- 添加快捷菜单 start-->
<ul class="bread-crumbs">
    <?php if(is_array($_bread_crumbs) || $_bread_crumbs instanceof \think\Collection || $_bread_crumbs instanceof \think\Paginator): $i = 0; $__LIST__ = $_bread_crumbs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;if($key > 0 && $i != count($_bread_crumbs)): ?>
    <li>></li>
    <li><a href="<?php echo url($v['url'].'?'.$v['param']); ?>"><?php echo $v['title']; ?></a></li>
    <?php elseif($i == count($_bread_crumbs)): ?>
    <li>></li>
    <li><a href="javascript:void(0);"><?php echo $v['title']; ?></a></li>
    <?php else: ?>
    <li><a href="javascript:void(0);"><?php echo $v['title']; ?></a></li>
    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
    <li><a href="<?php echo url('admin/menu/quick?id='.$_admin_menu_current['id']); ?>" title="添加到首页快捷菜单" class="j-ajax">[+]</a></li>
</ul>
<!-- 添加快捷菜单 end-->

<!-- 分组切换 start-->

<?php switch($tab_type): case "1": ?>

<div class="layui-tab layui-tab-card">
    <ul class="layui-tab-title">
        <?php if(is_array($tab_data['menu']) || $tab_data['menu'] instanceof \think\Collection || $tab_data['menu'] instanceof \think\Paginator): $i = 0; $__LIST__ = $tab_data['menu'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['url'] == $_admin_menu_current['url'] or (url($vo['url']) == $tab_data['current'])): ?>
            <li class="layui-this">
            <?php else: ?>
            <li>
            <?php endif; if(substr($vo['url'], 0, 4) == 'http'): ?>
            <a href="<?php echo $vo['url']; ?>" target="_blank"><?php echo $vo['title']; ?></a>
            <?php else: ?>
            <a href="<?php echo url($vo['url']); ?>"><?php echo $vo['title']; ?></a>
            <?php endif; ?>
        </li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <div class="tool-btns">
            <a href="javascript:location.reload();" title="刷新当前页面" class="aicon ai-shuaxin2 font18"></a>
        </div>
    </ul>
    <div class="layui-tab-content page-tab-content">
        <div class="layui-tab-item layui-show">
            <?php if(is_array($menu_list) || $menu_list instanceof \think\Collection || $menu_list instanceof \think\Paginator): $k = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
<div class="layui-tab-item layui-form menu-dl <?php if($k == 1): ?>layui-show<?php endif; ?>">
<form class="page-list-form">
    <div class="page-toolbar">
        <div class="layui-btn-group fl">
            <a href="<?php echo url('add?pid='.$v['id'].'&mod='.$v['module']); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加子菜单</a>
            <a data-href="<?php echo url('status?table=admin_menu&val=1'); ?>" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-qiyong"></i>启用</a>
            <a data-href="<?php echo url('status?table=admin_menu&val=0'); ?>" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-jinyong1"></i>禁用</a>
            <a data-href="<?php echo url('del'); ?>" class="layui-btn layui-btn-primary j-page-btns confirm"><i class="aicon ai-jinyong"></i>删除</a>
            <a href="<?php echo url('export?id='.$v['id']); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-daochu"></i>导出</a>
        </div>
    </div>
    <dl class="menu-dl1 menu-hd mt10">
        <dt>菜单名称</dt>
        <dd>
            <span class="hd">排序</span>
            <span class="hd2">状态</span>
            <span class="hd3">操作</span>
        </dd>
    </dl>
    <?php if(is_array($v['childs']) || $v['childs'] instanceof \think\Collection || $v['childs'] instanceof \think\Paginator): $kk = 0; $__LIST__ = $v['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($kk % 2 );++$kk;?>
    <dl class="menu-dl1">
        <dt>
            <input type="checkbox" name="ids[<?php echo $kk; ?>]" value="<?php echo $vv['id']; ?>" class="checkbox-ids" lay-skin="primary" title="<?php echo $vv['title']; ?>">
            <input type="text" class="menu-sort j-ajax-input" name="sort[<?php echo $kk; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $vv['sort']; ?>" data-value="<?php echo $vv['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$vv['id']); ?>">
            <input type="checkbox" name="status" value="<?php echo $vv['status']; ?>" <?php if($vv['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$vv['id']); ?>">
            <div class="menu-btns">
                <a href="<?php echo url('edit?id='.$vv['id']); ?>" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                <a href="<?php echo url('add?pid='.$vv['id'].'&mod='.$vv['module']); ?>" title="添加子菜单"><i class="layui-icon">&#xe654;</i></a>
                <a href="<?php echo url('del?ids='.$vv['id']); ?>" title="删除"><i class="layui-icon">&#xe640;</i></a>
            </div>
        </dt>
        <dd>
            <?php 
                $kk++;
             if(is_array($vv['childs']) || $vv['childs'] instanceof \think\Collection || $vv['childs'] instanceof \think\Paginator): $kkk = 0; $__LIST__ = $vv['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvv): $mod = ($kkk % 2 );++$kkk;
                if ($vvv['title'] == '预留占位') continue;
                $kk++;
             ?>
            <dl class="menu-dl2">
                <dt>
                    <input type="checkbox" name="ids[<?php echo $kk; ?>]" value="<?php echo $vvv['id']; ?>" class="checkbox-ids" lay-skin="primary" title="<?php echo $vvv['title']; ?>">
                    <input type="text" class="menu-sort j-ajax-input" name="sort[<?php echo $kk; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $vvv['sort']; ?>" data-value="<?php echo $vvv['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$vvv['id']); ?>">
                    <input type="checkbox" name="status" value="<?php echo $vvv['status']; ?>" <?php if($vvv['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$vvv['id']); ?>">
                    <div class="menu-btns">
                        <a href="<?php echo url('edit?id='.$vvv['id']); ?>" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                        <a href="<?php echo url('add?pid='.$vvv['id'].'&mod='.$vvv['module']); ?>" title="添加子菜单"><i class="layui-icon">&#xe654;</i></a>
                        <a href="<?php echo url('del?ids='.$vvv['id']); ?>" title="删除"><i class="layui-icon">&#xe640;</i></a>
                    </div>
                </dt>
                <?php 
                    $kk++;
                 if(is_array($vvv['childs']) || $vvv['childs'] instanceof \think\Collection || $vvv['childs'] instanceof \think\Paginator): $kkkk = 0; $__LIST__ = $vvv['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvvv): $mod = ($kkkk % 2 );++$kkkk;
                    $kk++;
                 ?>
                <dd>
                    <input type="checkbox" name="ids[<?php echo $kk; ?>]" value="<?php echo $vvvv['id']; ?>" class="checkbox-ids" lay-skin="primary" title="<?php echo $vvvv['title']; ?>">
                    <input type="text" class="menu-sort j-ajax-input" name="sort[<?php echo $kk; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $vvvv['sort']; ?>" data-value="<?php echo $vvvv['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$vvvv['id']); ?>">
                    <input type="checkbox" name="status" value="<?php echo $vvvv['status']; ?>" <?php if($vvvv['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$vvvv['id']); ?>">
                    <div class="menu-btns">
                        <a href="<?php echo url('edit?id='.$vvvv['id']); ?>" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                        <a href="<?php echo url('add?pid='.$vvvv['id'].'&mod='.$vvvv['module']); ?>" title="添加子菜单"><i class="layui-icon">&#xe654;</i></a>
                        <a href="<?php echo url('del?ids='.$vvvv['id']); ?>" title="删除之后无法恢复，您确定要删除吗？" class="j-ajax"><i class="layui-icon">&#xe640;</i></a>
                    </div>
                </dd>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </dl>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </dd>
    </dl>
    <?php 
        $kk++;
     endforeach; endif; else: echo "" ;endif; ?>
</form>
</div>
<?php endforeach; endif; else: echo "" ;endif; ?>
<div class="layui-tab-item layui-form menu-dl">
    <form class="page-list-form">
        <dl class="menu-dl1 menu-hd mt10">
            <dt>模块名称</dt>
            <dd>
                <span class="hd">排序</span>
                <span class="hd2">状态</span>
                <span class="hd3">操作</span>
            </dd>
        </dl>
        <?php if(is_array($menu_list) || $menu_list instanceof \think\Collection || $menu_list instanceof \think\Paginator): $k = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
        <dl class="menu-dl1">
            <dt>
                <input type="checkbox" name="ids[<?php echo $k; ?>]" class="checkbox-ids" value="<?php echo $v['id']; ?>" lay-skin="primary" title="<?php echo $v['title']; ?>">
                <input type="text" class="layui-input j-ajax-input menu-sort" name="sort[<?php echo $k; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $v['sort']; ?>" data-value="<?php echo $v['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$v['id']); ?>">
                <input type="checkbox" name="status" value="<?php echo $v['status']; ?>" <?php if($v['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$v['id']); ?>">
                <div class="menu-btns">
                <a href="<?php echo url('del?ids='.$v['id']); ?>" title="删除之后无法恢复，您确定要删除吗？" class="j-ajax"><i class="layui-icon">&#xe640;</i></a>
                </div>
            </dt>
        </dl>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </form>
</div>
        </div>
    </div>
</div>
<?php break; case "2": ?>

<div class="layui-tab layui-tab-card">
    <ul class="layui-tab-title">
        <?php if(is_array($tab_data['menu']) || $tab_data['menu'] instanceof \think\Collection || $tab_data['menu'] instanceof \think\Paginator): $k = 0; $__LIST__ = $tab_data['menu'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;if($k == 1): ?>
        <li class="layui-this">
            <?php else: ?>
        <li>
            <?php endif; ?>
            <a href="javascript:;"><?php echo $vo['title']; ?></a>
        </li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <div class="tool-btns">
            <a href="javascript:location.reload();" title="刷新当前页面" class="aicon ai-shuaxin2 font18"></a>
        </div>
    </ul>
    <div class="layui-tab-content page-tab-content">
        <?php if(is_array($menu_list) || $menu_list instanceof \think\Collection || $menu_list instanceof \think\Paginator): $k = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
<div class="layui-tab-item layui-form menu-dl <?php if($k == 1): ?>layui-show<?php endif; ?>">
<form class="page-list-form">
    <div class="page-toolbar">
        <div class="layui-btn-group fl">
            <a href="<?php echo url('add?pid='.$v['id'].'&mod='.$v['module']); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加子菜单</a>
            <a data-href="<?php echo url('status?table=admin_menu&val=1'); ?>" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-qiyong"></i>启用</a>
            <a data-href="<?php echo url('status?table=admin_menu&val=0'); ?>" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-jinyong1"></i>禁用</a>
            <a data-href="<?php echo url('del'); ?>" class="layui-btn layui-btn-primary j-page-btns confirm"><i class="aicon ai-jinyong"></i>删除</a>
            <a href="<?php echo url('export?id='.$v['id']); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-daochu"></i>导出</a>
        </div>
    </div>
    <dl class="menu-dl1 menu-hd mt10">
        <dt>菜单名称</dt>
        <dd>
            <span class="hd">排序</span>
            <span class="hd2">状态</span>
            <span class="hd3">操作</span>
        </dd>
    </dl>
    <?php if(is_array($v['childs']) || $v['childs'] instanceof \think\Collection || $v['childs'] instanceof \think\Paginator): $kk = 0; $__LIST__ = $v['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($kk % 2 );++$kk;?>
    <dl class="menu-dl1">
        <dt>
            <input type="checkbox" name="ids[<?php echo $kk; ?>]" value="<?php echo $vv['id']; ?>" class="checkbox-ids" lay-skin="primary" title="<?php echo $vv['title']; ?>">
            <input type="text" class="menu-sort j-ajax-input" name="sort[<?php echo $kk; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $vv['sort']; ?>" data-value="<?php echo $vv['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$vv['id']); ?>">
            <input type="checkbox" name="status" value="<?php echo $vv['status']; ?>" <?php if($vv['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$vv['id']); ?>">
            <div class="menu-btns">
                <a href="<?php echo url('edit?id='.$vv['id']); ?>" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                <a href="<?php echo url('add?pid='.$vv['id'].'&mod='.$vv['module']); ?>" title="添加子菜单"><i class="layui-icon">&#xe654;</i></a>
                <a href="<?php echo url('del?ids='.$vv['id']); ?>" title="删除"><i class="layui-icon">&#xe640;</i></a>
            </div>
        </dt>
        <dd>
            <?php 
                $kk++;
             if(is_array($vv['childs']) || $vv['childs'] instanceof \think\Collection || $vv['childs'] instanceof \think\Paginator): $kkk = 0; $__LIST__ = $vv['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvv): $mod = ($kkk % 2 );++$kkk;
                if ($vvv['title'] == '预留占位') continue;
                $kk++;
             ?>
            <dl class="menu-dl2">
                <dt>
                    <input type="checkbox" name="ids[<?php echo $kk; ?>]" value="<?php echo $vvv['id']; ?>" class="checkbox-ids" lay-skin="primary" title="<?php echo $vvv['title']; ?>">
                    <input type="text" class="menu-sort j-ajax-input" name="sort[<?php echo $kk; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $vvv['sort']; ?>" data-value="<?php echo $vvv['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$vvv['id']); ?>">
                    <input type="checkbox" name="status" value="<?php echo $vvv['status']; ?>" <?php if($vvv['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$vvv['id']); ?>">
                    <div class="menu-btns">
                        <a href="<?php echo url('edit?id='.$vvv['id']); ?>" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                        <a href="<?php echo url('add?pid='.$vvv['id'].'&mod='.$vvv['module']); ?>" title="添加子菜单"><i class="layui-icon">&#xe654;</i></a>
                        <a href="<?php echo url('del?ids='.$vvv['id']); ?>" title="删除"><i class="layui-icon">&#xe640;</i></a>
                    </div>
                </dt>
                <?php 
                    $kk++;
                 if(is_array($vvv['childs']) || $vvv['childs'] instanceof \think\Collection || $vvv['childs'] instanceof \think\Paginator): $kkkk = 0; $__LIST__ = $vvv['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvvv): $mod = ($kkkk % 2 );++$kkkk;
                    $kk++;
                 ?>
                <dd>
                    <input type="checkbox" name="ids[<?php echo $kk; ?>]" value="<?php echo $vvvv['id']; ?>" class="checkbox-ids" lay-skin="primary" title="<?php echo $vvvv['title']; ?>">
                    <input type="text" class="menu-sort j-ajax-input" name="sort[<?php echo $kk; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $vvvv['sort']; ?>" data-value="<?php echo $vvvv['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$vvvv['id']); ?>">
                    <input type="checkbox" name="status" value="<?php echo $vvvv['status']; ?>" <?php if($vvvv['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$vvvv['id']); ?>">
                    <div class="menu-btns">
                        <a href="<?php echo url('edit?id='.$vvvv['id']); ?>" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                        <a href="<?php echo url('add?pid='.$vvvv['id'].'&mod='.$vvvv['module']); ?>" title="添加子菜单"><i class="layui-icon">&#xe654;</i></a>
                        <a href="<?php echo url('del?ids='.$vvvv['id']); ?>" title="删除之后无法恢复，您确定要删除吗？" class="j-ajax"><i class="layui-icon">&#xe640;</i></a>
                    </div>
                </dd>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </dl>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </dd>
    </dl>
    <?php 
        $kk++;
     endforeach; endif; else: echo "" ;endif; ?>
</form>
</div>
<?php endforeach; endif; else: echo "" ;endif; ?>
<div class="layui-tab-item layui-form menu-dl">
    <form class="page-list-form">
        <dl class="menu-dl1 menu-hd mt10">
            <dt>模块名称</dt>
            <dd>
                <span class="hd">排序</span>
                <span class="hd2">状态</span>
                <span class="hd3">操作</span>
            </dd>
        </dl>
        <?php if(is_array($menu_list) || $menu_list instanceof \think\Collection || $menu_list instanceof \think\Paginator): $k = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
        <dl class="menu-dl1">
            <dt>
                <input type="checkbox" name="ids[<?php echo $k; ?>]" class="checkbox-ids" value="<?php echo $v['id']; ?>" lay-skin="primary" title="<?php echo $v['title']; ?>">
                <input type="text" class="layui-input j-ajax-input menu-sort" name="sort[<?php echo $k; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $v['sort']; ?>" data-value="<?php echo $v['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$v['id']); ?>">
                <input type="checkbox" name="status" value="<?php echo $v['status']; ?>" <?php if($v['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$v['id']); ?>">
                <div class="menu-btns">
                <a href="<?php echo url('del?ids='.$v['id']); ?>" title="删除之后无法恢复，您确定要删除吗？" class="j-ajax"><i class="layui-icon">&#xe640;</i></a>
                </div>
            </dt>
        </dl>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </form>
</div>
    </div>
</div>
<?php break; case "3": if(is_array($menu_list) || $menu_list instanceof \think\Collection || $menu_list instanceof \think\Paginator): $k = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
<div class="layui-tab-item layui-form menu-dl <?php if($k == 1): ?>layui-show<?php endif; ?>">
<form class="page-list-form">
    <div class="page-toolbar">
        <div class="layui-btn-group fl">
            <a href="<?php echo url('add?pid='.$v['id'].'&mod='.$v['module']); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加子菜单</a>
            <a data-href="<?php echo url('status?table=admin_menu&val=1'); ?>" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-qiyong"></i>启用</a>
            <a data-href="<?php echo url('status?table=admin_menu&val=0'); ?>" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-jinyong1"></i>禁用</a>
            <a data-href="<?php echo url('del'); ?>" class="layui-btn layui-btn-primary j-page-btns confirm"><i class="aicon ai-jinyong"></i>删除</a>
            <a href="<?php echo url('export?id='.$v['id']); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-daochu"></i>导出</a>
        </div>
    </div>
    <dl class="menu-dl1 menu-hd mt10">
        <dt>菜单名称</dt>
        <dd>
            <span class="hd">排序</span>
            <span class="hd2">状态</span>
            <span class="hd3">操作</span>
        </dd>
    </dl>
    <?php if(is_array($v['childs']) || $v['childs'] instanceof \think\Collection || $v['childs'] instanceof \think\Paginator): $kk = 0; $__LIST__ = $v['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($kk % 2 );++$kk;?>
    <dl class="menu-dl1">
        <dt>
            <input type="checkbox" name="ids[<?php echo $kk; ?>]" value="<?php echo $vv['id']; ?>" class="checkbox-ids" lay-skin="primary" title="<?php echo $vv['title']; ?>">
            <input type="text" class="menu-sort j-ajax-input" name="sort[<?php echo $kk; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $vv['sort']; ?>" data-value="<?php echo $vv['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$vv['id']); ?>">
            <input type="checkbox" name="status" value="<?php echo $vv['status']; ?>" <?php if($vv['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$vv['id']); ?>">
            <div class="menu-btns">
                <a href="<?php echo url('edit?id='.$vv['id']); ?>" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                <a href="<?php echo url('add?pid='.$vv['id'].'&mod='.$vv['module']); ?>" title="添加子菜单"><i class="layui-icon">&#xe654;</i></a>
                <a href="<?php echo url('del?ids='.$vv['id']); ?>" title="删除"><i class="layui-icon">&#xe640;</i></a>
            </div>
        </dt>
        <dd>
            <?php 
                $kk++;
             if(is_array($vv['childs']) || $vv['childs'] instanceof \think\Collection || $vv['childs'] instanceof \think\Paginator): $kkk = 0; $__LIST__ = $vv['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvv): $mod = ($kkk % 2 );++$kkk;
                if ($vvv['title'] == '预留占位') continue;
                $kk++;
             ?>
            <dl class="menu-dl2">
                <dt>
                    <input type="checkbox" name="ids[<?php echo $kk; ?>]" value="<?php echo $vvv['id']; ?>" class="checkbox-ids" lay-skin="primary" title="<?php echo $vvv['title']; ?>">
                    <input type="text" class="menu-sort j-ajax-input" name="sort[<?php echo $kk; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $vvv['sort']; ?>" data-value="<?php echo $vvv['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$vvv['id']); ?>">
                    <input type="checkbox" name="status" value="<?php echo $vvv['status']; ?>" <?php if($vvv['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$vvv['id']); ?>">
                    <div class="menu-btns">
                        <a href="<?php echo url('edit?id='.$vvv['id']); ?>" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                        <a href="<?php echo url('add?pid='.$vvv['id'].'&mod='.$vvv['module']); ?>" title="添加子菜单"><i class="layui-icon">&#xe654;</i></a>
                        <a href="<?php echo url('del?ids='.$vvv['id']); ?>" title="删除"><i class="layui-icon">&#xe640;</i></a>
                    </div>
                </dt>
                <?php 
                    $kk++;
                 if(is_array($vvv['childs']) || $vvv['childs'] instanceof \think\Collection || $vvv['childs'] instanceof \think\Paginator): $kkkk = 0; $__LIST__ = $vvv['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvvv): $mod = ($kkkk % 2 );++$kkkk;
                    $kk++;
                 ?>
                <dd>
                    <input type="checkbox" name="ids[<?php echo $kk; ?>]" value="<?php echo $vvvv['id']; ?>" class="checkbox-ids" lay-skin="primary" title="<?php echo $vvvv['title']; ?>">
                    <input type="text" class="menu-sort j-ajax-input" name="sort[<?php echo $kk; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $vvvv['sort']; ?>" data-value="<?php echo $vvvv['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$vvvv['id']); ?>">
                    <input type="checkbox" name="status" value="<?php echo $vvvv['status']; ?>" <?php if($vvvv['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$vvvv['id']); ?>">
                    <div class="menu-btns">
                        <a href="<?php echo url('edit?id='.$vvvv['id']); ?>" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                        <a href="<?php echo url('add?pid='.$vvvv['id'].'&mod='.$vvvv['module']); ?>" title="添加子菜单"><i class="layui-icon">&#xe654;</i></a>
                        <a href="<?php echo url('del?ids='.$vvvv['id']); ?>" title="删除之后无法恢复，您确定要删除吗？" class="j-ajax"><i class="layui-icon">&#xe640;</i></a>
                    </div>
                </dd>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </dl>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </dd>
    </dl>
    <?php 
        $kk++;
     endforeach; endif; else: echo "" ;endif; ?>
</form>
</div>
<?php endforeach; endif; else: echo "" ;endif; ?>
<div class="layui-tab-item layui-form menu-dl">
    <form class="page-list-form">
        <dl class="menu-dl1 menu-hd mt10">
            <dt>模块名称</dt>
            <dd>
                <span class="hd">排序</span>
                <span class="hd2">状态</span>
                <span class="hd3">操作</span>
            </dd>
        </dl>
        <?php if(is_array($menu_list) || $menu_list instanceof \think\Collection || $menu_list instanceof \think\Paginator): $k = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
        <dl class="menu-dl1">
            <dt>
                <input type="checkbox" name="ids[<?php echo $k; ?>]" class="checkbox-ids" value="<?php echo $v['id']; ?>" lay-skin="primary" title="<?php echo $v['title']; ?>">
                <input type="text" class="layui-input j-ajax-input menu-sort" name="sort[<?php echo $k; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $v['sort']; ?>" data-value="<?php echo $v['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$v['id']); ?>">
                <input type="checkbox" name="status" value="<?php echo $v['status']; ?>" <?php if($v['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$v['id']); ?>">
                <div class="menu-btns">
                <a href="<?php echo url('del?ids='.$v['id']); ?>" title="删除之后无法恢复，您确定要删除吗？" class="j-ajax"><i class="layui-icon">&#xe640;</i></a>
                </div>
            </dt>
        </dl>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </form>
</div>
<?php break; default: ?>

<div class="layui-tab layui-tab-card">
    <ul class="layui-tab-title">
        <li class="layui-this">
            <a href="javascript:;" id="curTitle"><?php echo $_admin_menu_current['title']; ?></a>
        </li>
        <div class="tool-btns">
            <a href="javascript:location.reload();" title="刷新当前页面" class="aicon ai-shuaxin2 font18"></a>
        </div>
    </ul>
    <div class="layui-tab-content page-tab-content">
        <div class="layui-tab-item layui-show">
            <?php if(is_array($menu_list) || $menu_list instanceof \think\Collection || $menu_list instanceof \think\Paginator): $k = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
<div class="layui-tab-item layui-form menu-dl <?php if($k == 1): ?>layui-show<?php endif; ?>">
<form class="page-list-form">
    <div class="page-toolbar">
        <div class="layui-btn-group fl">
            <a href="<?php echo url('add?pid='.$v['id'].'&mod='.$v['module']); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加子菜单</a>
            <a data-href="<?php echo url('status?table=admin_menu&val=1'); ?>" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-qiyong"></i>启用</a>
            <a data-href="<?php echo url('status?table=admin_menu&val=0'); ?>" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-jinyong1"></i>禁用</a>
            <a data-href="<?php echo url('del'); ?>" class="layui-btn layui-btn-primary j-page-btns confirm"><i class="aicon ai-jinyong"></i>删除</a>
            <a href="<?php echo url('export?id='.$v['id']); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-daochu"></i>导出</a>
        </div>
    </div>
    <dl class="menu-dl1 menu-hd mt10">
        <dt>菜单名称</dt>
        <dd>
            <span class="hd">排序</span>
            <span class="hd2">状态</span>
            <span class="hd3">操作</span>
        </dd>
    </dl>
    <?php if(is_array($v['childs']) || $v['childs'] instanceof \think\Collection || $v['childs'] instanceof \think\Paginator): $kk = 0; $__LIST__ = $v['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($kk % 2 );++$kk;?>
    <dl class="menu-dl1">
        <dt>
            <input type="checkbox" name="ids[<?php echo $kk; ?>]" value="<?php echo $vv['id']; ?>" class="checkbox-ids" lay-skin="primary" title="<?php echo $vv['title']; ?>">
            <input type="text" class="menu-sort j-ajax-input" name="sort[<?php echo $kk; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $vv['sort']; ?>" data-value="<?php echo $vv['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$vv['id']); ?>">
            <input type="checkbox" name="status" value="<?php echo $vv['status']; ?>" <?php if($vv['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$vv['id']); ?>">
            <div class="menu-btns">
                <a href="<?php echo url('edit?id='.$vv['id']); ?>" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                <a href="<?php echo url('add?pid='.$vv['id'].'&mod='.$vv['module']); ?>" title="添加子菜单"><i class="layui-icon">&#xe654;</i></a>
                <a href="<?php echo url('del?ids='.$vv['id']); ?>" title="删除"><i class="layui-icon">&#xe640;</i></a>
            </div>
        </dt>
        <dd>
            <?php 
                $kk++;
             if(is_array($vv['childs']) || $vv['childs'] instanceof \think\Collection || $vv['childs'] instanceof \think\Paginator): $kkk = 0; $__LIST__ = $vv['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvv): $mod = ($kkk % 2 );++$kkk;
                if ($vvv['title'] == '预留占位') continue;
                $kk++;
             ?>
            <dl class="menu-dl2">
                <dt>
                    <input type="checkbox" name="ids[<?php echo $kk; ?>]" value="<?php echo $vvv['id']; ?>" class="checkbox-ids" lay-skin="primary" title="<?php echo $vvv['title']; ?>">
                    <input type="text" class="menu-sort j-ajax-input" name="sort[<?php echo $kk; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $vvv['sort']; ?>" data-value="<?php echo $vvv['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$vvv['id']); ?>">
                    <input type="checkbox" name="status" value="<?php echo $vvv['status']; ?>" <?php if($vvv['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$vvv['id']); ?>">
                    <div class="menu-btns">
                        <a href="<?php echo url('edit?id='.$vvv['id']); ?>" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                        <a href="<?php echo url('add?pid='.$vvv['id'].'&mod='.$vvv['module']); ?>" title="添加子菜单"><i class="layui-icon">&#xe654;</i></a>
                        <a href="<?php echo url('del?ids='.$vvv['id']); ?>" title="删除"><i class="layui-icon">&#xe640;</i></a>
                    </div>
                </dt>
                <?php 
                    $kk++;
                 if(is_array($vvv['childs']) || $vvv['childs'] instanceof \think\Collection || $vvv['childs'] instanceof \think\Paginator): $kkkk = 0; $__LIST__ = $vvv['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvvv): $mod = ($kkkk % 2 );++$kkkk;
                    $kk++;
                 ?>
                <dd>
                    <input type="checkbox" name="ids[<?php echo $kk; ?>]" value="<?php echo $vvvv['id']; ?>" class="checkbox-ids" lay-skin="primary" title="<?php echo $vvvv['title']; ?>">
                    <input type="text" class="menu-sort j-ajax-input" name="sort[<?php echo $kk; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $vvvv['sort']; ?>" data-value="<?php echo $vvvv['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$vvvv['id']); ?>">
                    <input type="checkbox" name="status" value="<?php echo $vvvv['status']; ?>" <?php if($vvvv['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$vvvv['id']); ?>">
                    <div class="menu-btns">
                        <a href="<?php echo url('edit?id='.$vvvv['id']); ?>" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                        <a href="<?php echo url('add?pid='.$vvvv['id'].'&mod='.$vvvv['module']); ?>" title="添加子菜单"><i class="layui-icon">&#xe654;</i></a>
                        <a href="<?php echo url('del?ids='.$vvvv['id']); ?>" title="删除之后无法恢复，您确定要删除吗？" class="j-ajax"><i class="layui-icon">&#xe640;</i></a>
                    </div>
                </dd>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </dl>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </dd>
    </dl>
    <?php 
        $kk++;
     endforeach; endif; else: echo "" ;endif; ?>
</form>
</div>
<?php endforeach; endif; else: echo "" ;endif; ?>
<div class="layui-tab-item layui-form menu-dl">
    <form class="page-list-form">
        <dl class="menu-dl1 menu-hd mt10">
            <dt>模块名称</dt>
            <dd>
                <span class="hd">排序</span>
                <span class="hd2">状态</span>
                <span class="hd3">操作</span>
            </dd>
        </dl>
        <?php if(is_array($menu_list) || $menu_list instanceof \think\Collection || $menu_list instanceof \think\Paginator): $k = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
        <dl class="menu-dl1">
            <dt>
                <input type="checkbox" name="ids[<?php echo $k; ?>]" class="checkbox-ids" value="<?php echo $v['id']; ?>" lay-skin="primary" title="<?php echo $v['title']; ?>">
                <input type="text" class="layui-input j-ajax-input menu-sort" name="sort[<?php echo $k; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $v['sort']; ?>" data-value="<?php echo $v['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$v['id']); ?>">
                <input type="checkbox" name="status" value="<?php echo $v['status']; ?>" <?php if($v['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$v['id']); ?>">
                <div class="menu-btns">
                <a href="<?php echo url('del?ids='.$v['id']); ?>" title="删除之后无法恢复，您确定要删除吗？" class="j-ajax"><i class="layui-icon">&#xe640;</i></a>
                </div>
            </dt>
        </dl>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </form>
</div>
        </div>
    </div>
</div>
<?php endswitch; ?>
<!-- 分组切换 end-->

<!-- 公共 header footer-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

</body>
</html>
<!-- 公共 header footer-->