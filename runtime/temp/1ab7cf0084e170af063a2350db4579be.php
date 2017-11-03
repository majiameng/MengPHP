<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:53:"E:\phpstudy\WWW\my\meng/app/admin\view\user\index.php";i:1508330954;s:49:"E:\phpstudy\WWW\my\meng/app/admin\view\layout.php";i:1509698566;s:49:"E:\phpstudy\WWW\my\meng/app/admin\view\header.php";i:1509678508;s:49:"E:\phpstudy\WWW\my\meng/app/admin\view\footer.php";i:1509500460;}*/ ?>
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
            <div class="page-toolbar">
    <div class="page-filter fr">
        <form class="layui-form layui-form-pane" action="<?php echo url(); ?>" method="get">
        <div class="layui-form-item">
            <label class="layui-form-label">搜索</label>
            <div class="layui-input-inline">
                <input type="text" name="q" value="<?php echo input('get.q'); ?>" lay-verify="required" placeholder="请输入关键词搜索" autocomplete="off" class="layui-input">
            </div>
        </div>
        </form>
    </div>
<form class="page-list-form">
    <div class="layui-btn-group fl">
        <a href="<?php echo url('addUser'); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加</a>
        <a data-href="<?php echo url('status?table=admin_user&val=1'); ?>" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-qiyong"></i>启用</a>
        <a data-href="<?php echo url('status?table=admin_user&val=0'); ?>" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-jinyong1"></i>禁用</a>
        <a data-href="<?php echo url('delUser'); ?>" class="layui-btn layui-btn-primary j-page-btns confirm"><i class="aicon ai-jinyong"></i>删除</a>
    </div>
</div>
<div class="layui-form">
    <table class="layui-table mt10" lay-even="" lay-skin="row">
        <colgroup>
            <col width="50">
        </colgroup>
        <thead>
            <tr>
                <th><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></th>
                <th>用户名</th>
                <th>昵称</th>
                <th>角色</th>
                <th>手机</th>
                <th>邮箱</th>
                <th>最后登陆时间</th>
                <th>最后登陆IP</th>
                <th>状态</th>
                <th>操作</th>
            </tr> 
        </thead>
        <tbody>
            <?php if(is_array($data_list) || $data_list instanceof \think\Collection || $data_list instanceof \think\Paginator): $i = 0; $__LIST__ = $data_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><input type="checkbox" name="ids[]" value="<?php echo $v['id']; ?>" <?php if($v['id'] == 1): ?>disabled<?php else: ?>class="layui-checkbox checkbox-ids"<?php endif; ?> lay-skin="primary"></td>
                <td><?php echo $v['username']; ?></td>
                <td><?php echo $v['nick']; ?></td>
                <td><?php echo $role_list[$v['role_id']]; ?></td>
                <td><?php echo $v['mobile']; ?></td>
                <td><?php echo $v['email']; ?></td>
                <td><?php echo date('Y-m-d H:i:s', $v['last_login_time']); ?></td>
                <td><?php echo $v['last_login_ip']; ?></td>
                <td><input type="checkbox" name="status" <?php if($v['status'] == 1): ?>checked=""<?php endif; if($v['id'] == 1): ?>disabled<?php endif; ?> value="<?php echo $v['status']; ?>" lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_user&ids='.$v['id']); ?>"></td>
                <td>
                    <?php if(ADMIN_ID != 1 && $v['id'] == 1): else: ?>
                    <div class="layui-btn-group">
                        <div class="layui-btn-group">
                        <a href="<?php echo url('editUser?id='.$v['id']); ?>" class="layui-btn layui-btn-primary layui-btn-small"><i class="layui-icon">&#xe642;</i></a>
                        <a href="<?php echo url('log/index?uid='.$v['id']); ?>" class="layui-btn layui-btn-primary layui-btn-small" title="查看操作日志"><i class="layui-icon">&#xe60e;</i></a>
                        <a data-href="<?php echo url('delUser?ids='.$v['id']); ?>" class="layui-btn layui-btn-primary layui-btn-small j-tr-del"><i class="layui-icon">&#xe640;</i></a>
                        </div>
                    </div>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <?php echo $pages; ?>
</div>
</form>
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
        <div class="page-toolbar">
    <div class="page-filter fr">
        <form class="layui-form layui-form-pane" action="<?php echo url(); ?>" method="get">
        <div class="layui-form-item">
            <label class="layui-form-label">搜索</label>
            <div class="layui-input-inline">
                <input type="text" name="q" value="<?php echo input('get.q'); ?>" lay-verify="required" placeholder="请输入关键词搜索" autocomplete="off" class="layui-input">
            </div>
        </div>
        </form>
    </div>
<form class="page-list-form">
    <div class="layui-btn-group fl">
        <a href="<?php echo url('addUser'); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加</a>
        <a data-href="<?php echo url('status?table=admin_user&val=1'); ?>" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-qiyong"></i>启用</a>
        <a data-href="<?php echo url('status?table=admin_user&val=0'); ?>" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-jinyong1"></i>禁用</a>
        <a data-href="<?php echo url('delUser'); ?>" class="layui-btn layui-btn-primary j-page-btns confirm"><i class="aicon ai-jinyong"></i>删除</a>
    </div>
</div>
<div class="layui-form">
    <table class="layui-table mt10" lay-even="" lay-skin="row">
        <colgroup>
            <col width="50">
        </colgroup>
        <thead>
            <tr>
                <th><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></th>
                <th>用户名</th>
                <th>昵称</th>
                <th>角色</th>
                <th>手机</th>
                <th>邮箱</th>
                <th>最后登陆时间</th>
                <th>最后登陆IP</th>
                <th>状态</th>
                <th>操作</th>
            </tr> 
        </thead>
        <tbody>
            <?php if(is_array($data_list) || $data_list instanceof \think\Collection || $data_list instanceof \think\Paginator): $i = 0; $__LIST__ = $data_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><input type="checkbox" name="ids[]" value="<?php echo $v['id']; ?>" <?php if($v['id'] == 1): ?>disabled<?php else: ?>class="layui-checkbox checkbox-ids"<?php endif; ?> lay-skin="primary"></td>
                <td><?php echo $v['username']; ?></td>
                <td><?php echo $v['nick']; ?></td>
                <td><?php echo $role_list[$v['role_id']]; ?></td>
                <td><?php echo $v['mobile']; ?></td>
                <td><?php echo $v['email']; ?></td>
                <td><?php echo date('Y-m-d H:i:s', $v['last_login_time']); ?></td>
                <td><?php echo $v['last_login_ip']; ?></td>
                <td><input type="checkbox" name="status" <?php if($v['status'] == 1): ?>checked=""<?php endif; if($v['id'] == 1): ?>disabled<?php endif; ?> value="<?php echo $v['status']; ?>" lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_user&ids='.$v['id']); ?>"></td>
                <td>
                    <?php if(ADMIN_ID != 1 && $v['id'] == 1): else: ?>
                    <div class="layui-btn-group">
                        <div class="layui-btn-group">
                        <a href="<?php echo url('editUser?id='.$v['id']); ?>" class="layui-btn layui-btn-primary layui-btn-small"><i class="layui-icon">&#xe642;</i></a>
                        <a href="<?php echo url('log/index?uid='.$v['id']); ?>" class="layui-btn layui-btn-primary layui-btn-small" title="查看操作日志"><i class="layui-icon">&#xe60e;</i></a>
                        <a data-href="<?php echo url('delUser?ids='.$v['id']); ?>" class="layui-btn layui-btn-primary layui-btn-small j-tr-del"><i class="layui-icon">&#xe640;</i></a>
                        </div>
                    </div>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <?php echo $pages; ?>
</div>
</form>
    </div>
</div>
<?php break; case "3": ?>

<div class="page-toolbar">
    <div class="page-filter fr">
        <form class="layui-form layui-form-pane" action="<?php echo url(); ?>" method="get">
        <div class="layui-form-item">
            <label class="layui-form-label">搜索</label>
            <div class="layui-input-inline">
                <input type="text" name="q" value="<?php echo input('get.q'); ?>" lay-verify="required" placeholder="请输入关键词搜索" autocomplete="off" class="layui-input">
            </div>
        </div>
        </form>
    </div>
<form class="page-list-form">
    <div class="layui-btn-group fl">
        <a href="<?php echo url('addUser'); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加</a>
        <a data-href="<?php echo url('status?table=admin_user&val=1'); ?>" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-qiyong"></i>启用</a>
        <a data-href="<?php echo url('status?table=admin_user&val=0'); ?>" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-jinyong1"></i>禁用</a>
        <a data-href="<?php echo url('delUser'); ?>" class="layui-btn layui-btn-primary j-page-btns confirm"><i class="aicon ai-jinyong"></i>删除</a>
    </div>
</div>
<div class="layui-form">
    <table class="layui-table mt10" lay-even="" lay-skin="row">
        <colgroup>
            <col width="50">
        </colgroup>
        <thead>
            <tr>
                <th><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></th>
                <th>用户名</th>
                <th>昵称</th>
                <th>角色</th>
                <th>手机</th>
                <th>邮箱</th>
                <th>最后登陆时间</th>
                <th>最后登陆IP</th>
                <th>状态</th>
                <th>操作</th>
            </tr> 
        </thead>
        <tbody>
            <?php if(is_array($data_list) || $data_list instanceof \think\Collection || $data_list instanceof \think\Paginator): $i = 0; $__LIST__ = $data_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><input type="checkbox" name="ids[]" value="<?php echo $v['id']; ?>" <?php if($v['id'] == 1): ?>disabled<?php else: ?>class="layui-checkbox checkbox-ids"<?php endif; ?> lay-skin="primary"></td>
                <td><?php echo $v['username']; ?></td>
                <td><?php echo $v['nick']; ?></td>
                <td><?php echo $role_list[$v['role_id']]; ?></td>
                <td><?php echo $v['mobile']; ?></td>
                <td><?php echo $v['email']; ?></td>
                <td><?php echo date('Y-m-d H:i:s', $v['last_login_time']); ?></td>
                <td><?php echo $v['last_login_ip']; ?></td>
                <td><input type="checkbox" name="status" <?php if($v['status'] == 1): ?>checked=""<?php endif; if($v['id'] == 1): ?>disabled<?php endif; ?> value="<?php echo $v['status']; ?>" lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_user&ids='.$v['id']); ?>"></td>
                <td>
                    <?php if(ADMIN_ID != 1 && $v['id'] == 1): else: ?>
                    <div class="layui-btn-group">
                        <div class="layui-btn-group">
                        <a href="<?php echo url('editUser?id='.$v['id']); ?>" class="layui-btn layui-btn-primary layui-btn-small"><i class="layui-icon">&#xe642;</i></a>
                        <a href="<?php echo url('log/index?uid='.$v['id']); ?>" class="layui-btn layui-btn-primary layui-btn-small" title="查看操作日志"><i class="layui-icon">&#xe60e;</i></a>
                        <a data-href="<?php echo url('delUser?ids='.$v['id']); ?>" class="layui-btn layui-btn-primary layui-btn-small j-tr-del"><i class="layui-icon">&#xe640;</i></a>
                        </div>
                    </div>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <?php echo $pages; ?>
</div>
</form>
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
            <div class="page-toolbar">
    <div class="page-filter fr">
        <form class="layui-form layui-form-pane" action="<?php echo url(); ?>" method="get">
        <div class="layui-form-item">
            <label class="layui-form-label">搜索</label>
            <div class="layui-input-inline">
                <input type="text" name="q" value="<?php echo input('get.q'); ?>" lay-verify="required" placeholder="请输入关键词搜索" autocomplete="off" class="layui-input">
            </div>
        </div>
        </form>
    </div>
<form class="page-list-form">
    <div class="layui-btn-group fl">
        <a href="<?php echo url('addUser'); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加</a>
        <a data-href="<?php echo url('status?table=admin_user&val=1'); ?>" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-qiyong"></i>启用</a>
        <a data-href="<?php echo url('status?table=admin_user&val=0'); ?>" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-jinyong1"></i>禁用</a>
        <a data-href="<?php echo url('delUser'); ?>" class="layui-btn layui-btn-primary j-page-btns confirm"><i class="aicon ai-jinyong"></i>删除</a>
    </div>
</div>
<div class="layui-form">
    <table class="layui-table mt10" lay-even="" lay-skin="row">
        <colgroup>
            <col width="50">
        </colgroup>
        <thead>
            <tr>
                <th><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></th>
                <th>用户名</th>
                <th>昵称</th>
                <th>角色</th>
                <th>手机</th>
                <th>邮箱</th>
                <th>最后登陆时间</th>
                <th>最后登陆IP</th>
                <th>状态</th>
                <th>操作</th>
            </tr> 
        </thead>
        <tbody>
            <?php if(is_array($data_list) || $data_list instanceof \think\Collection || $data_list instanceof \think\Paginator): $i = 0; $__LIST__ = $data_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><input type="checkbox" name="ids[]" value="<?php echo $v['id']; ?>" <?php if($v['id'] == 1): ?>disabled<?php else: ?>class="layui-checkbox checkbox-ids"<?php endif; ?> lay-skin="primary"></td>
                <td><?php echo $v['username']; ?></td>
                <td><?php echo $v['nick']; ?></td>
                <td><?php echo $role_list[$v['role_id']]; ?></td>
                <td><?php echo $v['mobile']; ?></td>
                <td><?php echo $v['email']; ?></td>
                <td><?php echo date('Y-m-d H:i:s', $v['last_login_time']); ?></td>
                <td><?php echo $v['last_login_ip']; ?></td>
                <td><input type="checkbox" name="status" <?php if($v['status'] == 1): ?>checked=""<?php endif; if($v['id'] == 1): ?>disabled<?php endif; ?> value="<?php echo $v['status']; ?>" lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_user&ids='.$v['id']); ?>"></td>
                <td>
                    <?php if(ADMIN_ID != 1 && $v['id'] == 1): else: ?>
                    <div class="layui-btn-group">
                        <div class="layui-btn-group">
                        <a href="<?php echo url('editUser?id='.$v['id']); ?>" class="layui-btn layui-btn-primary layui-btn-small"><i class="layui-icon">&#xe642;</i></a>
                        <a href="<?php echo url('log/index?uid='.$v['id']); ?>" class="layui-btn layui-btn-primary layui-btn-small" title="查看操作日志"><i class="layui-icon">&#xe60e;</i></a>
                        <a data-href="<?php echo url('delUser?ids='.$v['id']); ?>" class="layui-btn layui-btn-primary layui-btn-small j-tr-del"><i class="layui-icon">&#xe640;</i></a>
                        </div>
                    </div>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <?php echo $pages; ?>
</div>
</form>
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