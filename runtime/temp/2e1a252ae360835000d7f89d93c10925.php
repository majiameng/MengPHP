<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:56:"E:\phpstudy\WWW\my\meng/app/admin\view\develop\lists.php";i:1508330954;s:49:"E:\phpstudy\WWW\my\meng/app/admin\view\layout.php";i:1509698566;s:49:"E:\phpstudy\WWW\my\meng/app/admin\view\header.php";i:1509678508;s:49:"E:\phpstudy\WWW\my\meng/app/admin\view\footer.php";i:1509500460;}*/ ?>
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
            <div class="layui-tab-item layui-show">
    <!--
    +----------------------------------------------------------------------
    | 列表页实例模板，可直接复制以下代码使用
    +----------------------------------------------------------------------
    -->
    <form class="page-list-form">
    <div class="layui-collapse page-tips">
      <div class="layui-colla-item">
        <h2 class="layui-colla-title">温馨提示</h2>
        <div class="layui-colla-content">
          <p>此页面为后台数据管理标准模板，您可以直接复制使用修改</p>
        </div>
      </div>
    </div>
    <div class="page-toolbar">
        <div class="layui-btn-group fl">
            <a href="" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加</a>
            <a href="" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-qiyong"></i>启用</a>
            <a href="" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-jinyong1"></i>禁用</a>
            <a href="" class="layui-btn layui-btn-primary j-page-btns confirm"><i class="aicon ai-jinyong"></i>删除</a>
        </div>
        <div class="page-filter fr">
            <form class="layui-form layui-form-pane" action="<?php echo url(); ?>" method="get">
            <div class="layui-form-item">
                <label class="layui-form-label">搜索</label>
                <div class="layui-input-inline">
                    <input type="text" name="q" lay-verify="required" placeholder="请输入关键词搜索" autocomplete="off" class="layui-input">
                </div>
            </div>
            </form>
        </div>
    </div>
    <div class="layui-form">
        <table class="layui-table mt10" lay-even="" lay-skin="row">
            <colgroup>
                <col width="50">
                <col width="150">
                <col width="200">
                <col width="300">
                <col width="100">
                <col width="80">
                <col>
            </colgroup>
            <thead>
                <tr>
                    <th><input type="checkbox" lay-skin="primary" lay-filter="allChoose"></th>
                    <th>民族</th>
                    <th>出场时间</th>
                    <th>格言</th>
                    <th>排序</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr> 
            </thead>
            <tbody>
                <tr>
                    <td><input type="checkbox" class="layui-checkbox checkbox-ids" name="ids[]" lay-skin="primary"></td>
                    <td>汉族</td>
                    <td>1989-10-14</td>
                    <td>人生似修行</td>
                    <td>
                        <input type="text" class="layui-input j-ajax-input input-sort" onkeyup="value=value.replace(/[^\d]/g,'')" 
value="100" data-value="" data-href="">
                    </td>
                    <td>
                        <input type="checkbox" name="status" checked="" value="0" lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="">
                    </td>
                    <td>
                        <div class="layui-btn-group">
                            <div class="layui-btn-group">
                            <a data-href="" class="layui-btn layui-btn-primary layui-btn-small">文字</a>
                            <a data-href="" class="layui-btn layui-btn-primary layui-btn-small"><i class="layui-icon">&#xe654;</i></a>
                            <a data-href="" class="layui-btn layui-btn-primary layui-btn-small"><i class="layui-icon">&#xe642;</i></a>
                            <a data-href="" class="layui-btn layui-btn-primary layui-btn-small j-tr-del"><i class="layui-icon">&#xe640;</i></a>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </form>
</div>
<div class="layui-tab-item">
    <style type="text/css">
    .site-demo-code{
    left: 0;
    top: 0;
    width: 100%;
    height: 600px;
    border: none;
    padding: 10px;
    font-size: 12px;
    background-color: #F7FBFF;
    color: #881280;
    font-family: Courier New;}
    </style>
    <textarea class="layui-border-box site-demo-text site-demo-code" spellcheck="false" readonly>
<!--
+----------------------------------------------------------------------
| 列表页实例模板，Ctrl+A 可直接复制以下代码使用
+----------------------------------------------------------------------
-->
<form class="page-list-form">
<div class="layui-collapse page-tips">
  <div class="layui-colla-item">
    <h2 class="layui-colla-title">温馨提示</h2>
    <div class="layui-colla-content">
      <p>此页面为后台数据管理标准模板，您可以直接复制使用修改</p>
    </div>
  </div>
</div>
<div class="page-toolbar">
    <div class="layui-btn-group fl">
        
        <a href="{:url('add')}" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加</a>
        <a href="{:url('status?table=表名(无表前缀)&val=1')}" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-qiyong"></i>启用</a>
        <a href="{:url('status?table=表名(无表前缀)&val=0')}" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-jinyong1"></i>禁用</a>
        <a href="{:url('del?table=表名(无表前缀)')}" class="layui-btn layui-btn-primary j-page-btns confirm"><i class="aicon ai-jinyong"></i>删除</a>
        
    </div>
    <div class="page-filter fr">
        <form class="layui-form layui-form-pane" action="{:url()}" method="get">
        <div class="layui-form-item">
            <label class="layui-form-label">搜索</label>
            <div class="layui-input-inline">
                <input type="text" name="q" lay-verify="required" placeholder="请输入关键词搜索" autocomplete="off" class="layui-input">
            </div>
        </div>
        </form>
    </div>
</div>
<div class="layui-form">
    <table class="layui-table mt10" lay-even="" lay-skin="row">
        <colgroup>
            <col width="50">
            <col width="150">
            <col width="200">
            <col width="300">
            <col width="100">
            <col width="80">
            <col>
        </colgroup>
        <thead>
            <tr>
                <th><input type="checkbox" lay-skin="primary" lay-filter="allChoose"></th>
                <th>民族</th>
                <th>出场时间</th>
                <th>格言</th>
                <th>排序</th>
                <th>状态</th>
                <th>操作</th>
            </tr> 
        </thead>
        <tbody>
            
            {volist name="data_list" id="vo"}
            <tr>
                <td><input type="checkbox" class="layui-checkbox checkbox-ids" name="ids[]" value="{$vo['id']}" lay-skin="primary"></td>
                <td>汉族</td>
                <td>1989-10-14</td>
                <td>人生似修行</td>
                <td>
                    <input type="text" class="layui-input j-ajax-input input-sort" onkeyup="value=value.replace(/[^\d]/g,'')" 
value="{$vo['sort']}" data-value="{$vo['sort']}" data-href="{:url('sort?table=test_table&ids='.$vo['id'])}">
                </td>
                <td>
                    <input type="checkbox" name="status" {if condition="$vo['status'] eq 1"}checked=""{/if} value="{$vo['status']}" lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="{:url('status?table=表名(无表前缀)&ids='.$vo['id'])}">
                </td>
                <td>
                    <div class="layui-btn-group">
                        <div class="layui-btn-group">
                        <a data-href="" class="layui-btn layui-btn-primary layui-btn-small">文字</a>
                        <a data-href="{:url('edit?id='.$vo['id'])}" class="layui-btn layui-btn-primary layui-btn-small"><i class="layui-icon">&#xe642;</i></a>
                        <a data-href="{:url('del?table=表名(无表前缀)&id='.$vo['id'])}" class="layui-btn layui-btn-primary layui-btn-small j-tr-del"><i class="layui-icon">&#xe640;</i></a>
                        </div>
                    </div>
                </td>
            </tr>
            {/volist}
            
        </tbody>
    </table>
</div>
</form>
    </textarea>
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
        <div class="layui-tab-item layui-show">
    <!--
    +----------------------------------------------------------------------
    | 列表页实例模板，可直接复制以下代码使用
    +----------------------------------------------------------------------
    -->
    <form class="page-list-form">
    <div class="layui-collapse page-tips">
      <div class="layui-colla-item">
        <h2 class="layui-colla-title">温馨提示</h2>
        <div class="layui-colla-content">
          <p>此页面为后台数据管理标准模板，您可以直接复制使用修改</p>
        </div>
      </div>
    </div>
    <div class="page-toolbar">
        <div class="layui-btn-group fl">
            <a href="" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加</a>
            <a href="" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-qiyong"></i>启用</a>
            <a href="" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-jinyong1"></i>禁用</a>
            <a href="" class="layui-btn layui-btn-primary j-page-btns confirm"><i class="aicon ai-jinyong"></i>删除</a>
        </div>
        <div class="page-filter fr">
            <form class="layui-form layui-form-pane" action="<?php echo url(); ?>" method="get">
            <div class="layui-form-item">
                <label class="layui-form-label">搜索</label>
                <div class="layui-input-inline">
                    <input type="text" name="q" lay-verify="required" placeholder="请输入关键词搜索" autocomplete="off" class="layui-input">
                </div>
            </div>
            </form>
        </div>
    </div>
    <div class="layui-form">
        <table class="layui-table mt10" lay-even="" lay-skin="row">
            <colgroup>
                <col width="50">
                <col width="150">
                <col width="200">
                <col width="300">
                <col width="100">
                <col width="80">
                <col>
            </colgroup>
            <thead>
                <tr>
                    <th><input type="checkbox" lay-skin="primary" lay-filter="allChoose"></th>
                    <th>民族</th>
                    <th>出场时间</th>
                    <th>格言</th>
                    <th>排序</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr> 
            </thead>
            <tbody>
                <tr>
                    <td><input type="checkbox" class="layui-checkbox checkbox-ids" name="ids[]" lay-skin="primary"></td>
                    <td>汉族</td>
                    <td>1989-10-14</td>
                    <td>人生似修行</td>
                    <td>
                        <input type="text" class="layui-input j-ajax-input input-sort" onkeyup="value=value.replace(/[^\d]/g,'')" 
value="100" data-value="" data-href="">
                    </td>
                    <td>
                        <input type="checkbox" name="status" checked="" value="0" lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="">
                    </td>
                    <td>
                        <div class="layui-btn-group">
                            <div class="layui-btn-group">
                            <a data-href="" class="layui-btn layui-btn-primary layui-btn-small">文字</a>
                            <a data-href="" class="layui-btn layui-btn-primary layui-btn-small"><i class="layui-icon">&#xe654;</i></a>
                            <a data-href="" class="layui-btn layui-btn-primary layui-btn-small"><i class="layui-icon">&#xe642;</i></a>
                            <a data-href="" class="layui-btn layui-btn-primary layui-btn-small j-tr-del"><i class="layui-icon">&#xe640;</i></a>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </form>
</div>
<div class="layui-tab-item">
    <style type="text/css">
    .site-demo-code{
    left: 0;
    top: 0;
    width: 100%;
    height: 600px;
    border: none;
    padding: 10px;
    font-size: 12px;
    background-color: #F7FBFF;
    color: #881280;
    font-family: Courier New;}
    </style>
    <textarea class="layui-border-box site-demo-text site-demo-code" spellcheck="false" readonly>
<!--
+----------------------------------------------------------------------
| 列表页实例模板，Ctrl+A 可直接复制以下代码使用
+----------------------------------------------------------------------
-->
<form class="page-list-form">
<div class="layui-collapse page-tips">
  <div class="layui-colla-item">
    <h2 class="layui-colla-title">温馨提示</h2>
    <div class="layui-colla-content">
      <p>此页面为后台数据管理标准模板，您可以直接复制使用修改</p>
    </div>
  </div>
</div>
<div class="page-toolbar">
    <div class="layui-btn-group fl">
        
        <a href="{:url('add')}" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加</a>
        <a href="{:url('status?table=表名(无表前缀)&val=1')}" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-qiyong"></i>启用</a>
        <a href="{:url('status?table=表名(无表前缀)&val=0')}" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-jinyong1"></i>禁用</a>
        <a href="{:url('del?table=表名(无表前缀)')}" class="layui-btn layui-btn-primary j-page-btns confirm"><i class="aicon ai-jinyong"></i>删除</a>
        
    </div>
    <div class="page-filter fr">
        <form class="layui-form layui-form-pane" action="{:url()}" method="get">
        <div class="layui-form-item">
            <label class="layui-form-label">搜索</label>
            <div class="layui-input-inline">
                <input type="text" name="q" lay-verify="required" placeholder="请输入关键词搜索" autocomplete="off" class="layui-input">
            </div>
        </div>
        </form>
    </div>
</div>
<div class="layui-form">
    <table class="layui-table mt10" lay-even="" lay-skin="row">
        <colgroup>
            <col width="50">
            <col width="150">
            <col width="200">
            <col width="300">
            <col width="100">
            <col width="80">
            <col>
        </colgroup>
        <thead>
            <tr>
                <th><input type="checkbox" lay-skin="primary" lay-filter="allChoose"></th>
                <th>民族</th>
                <th>出场时间</th>
                <th>格言</th>
                <th>排序</th>
                <th>状态</th>
                <th>操作</th>
            </tr> 
        </thead>
        <tbody>
            
            {volist name="data_list" id="vo"}
            <tr>
                <td><input type="checkbox" class="layui-checkbox checkbox-ids" name="ids[]" value="{$vo['id']}" lay-skin="primary"></td>
                <td>汉族</td>
                <td>1989-10-14</td>
                <td>人生似修行</td>
                <td>
                    <input type="text" class="layui-input j-ajax-input input-sort" onkeyup="value=value.replace(/[^\d]/g,'')" 
value="{$vo['sort']}" data-value="{$vo['sort']}" data-href="{:url('sort?table=test_table&ids='.$vo['id'])}">
                </td>
                <td>
                    <input type="checkbox" name="status" {if condition="$vo['status'] eq 1"}checked=""{/if} value="{$vo['status']}" lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="{:url('status?table=表名(无表前缀)&ids='.$vo['id'])}">
                </td>
                <td>
                    <div class="layui-btn-group">
                        <div class="layui-btn-group">
                        <a data-href="" class="layui-btn layui-btn-primary layui-btn-small">文字</a>
                        <a data-href="{:url('edit?id='.$vo['id'])}" class="layui-btn layui-btn-primary layui-btn-small"><i class="layui-icon">&#xe642;</i></a>
                        <a data-href="{:url('del?table=表名(无表前缀)&id='.$vo['id'])}" class="layui-btn layui-btn-primary layui-btn-small j-tr-del"><i class="layui-icon">&#xe640;</i></a>
                        </div>
                    </div>
                </td>
            </tr>
            {/volist}
            
        </tbody>
    </table>
</div>
</form>
    </textarea>
</div>
    </div>
</div>
<?php break; case "3": ?>

<div class="layui-tab-item layui-show">
    <!--
    +----------------------------------------------------------------------
    | 列表页实例模板，可直接复制以下代码使用
    +----------------------------------------------------------------------
    -->
    <form class="page-list-form">
    <div class="layui-collapse page-tips">
      <div class="layui-colla-item">
        <h2 class="layui-colla-title">温馨提示</h2>
        <div class="layui-colla-content">
          <p>此页面为后台数据管理标准模板，您可以直接复制使用修改</p>
        </div>
      </div>
    </div>
    <div class="page-toolbar">
        <div class="layui-btn-group fl">
            <a href="" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加</a>
            <a href="" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-qiyong"></i>启用</a>
            <a href="" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-jinyong1"></i>禁用</a>
            <a href="" class="layui-btn layui-btn-primary j-page-btns confirm"><i class="aicon ai-jinyong"></i>删除</a>
        </div>
        <div class="page-filter fr">
            <form class="layui-form layui-form-pane" action="<?php echo url(); ?>" method="get">
            <div class="layui-form-item">
                <label class="layui-form-label">搜索</label>
                <div class="layui-input-inline">
                    <input type="text" name="q" lay-verify="required" placeholder="请输入关键词搜索" autocomplete="off" class="layui-input">
                </div>
            </div>
            </form>
        </div>
    </div>
    <div class="layui-form">
        <table class="layui-table mt10" lay-even="" lay-skin="row">
            <colgroup>
                <col width="50">
                <col width="150">
                <col width="200">
                <col width="300">
                <col width="100">
                <col width="80">
                <col>
            </colgroup>
            <thead>
                <tr>
                    <th><input type="checkbox" lay-skin="primary" lay-filter="allChoose"></th>
                    <th>民族</th>
                    <th>出场时间</th>
                    <th>格言</th>
                    <th>排序</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr> 
            </thead>
            <tbody>
                <tr>
                    <td><input type="checkbox" class="layui-checkbox checkbox-ids" name="ids[]" lay-skin="primary"></td>
                    <td>汉族</td>
                    <td>1989-10-14</td>
                    <td>人生似修行</td>
                    <td>
                        <input type="text" class="layui-input j-ajax-input input-sort" onkeyup="value=value.replace(/[^\d]/g,'')" 
value="100" data-value="" data-href="">
                    </td>
                    <td>
                        <input type="checkbox" name="status" checked="" value="0" lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="">
                    </td>
                    <td>
                        <div class="layui-btn-group">
                            <div class="layui-btn-group">
                            <a data-href="" class="layui-btn layui-btn-primary layui-btn-small">文字</a>
                            <a data-href="" class="layui-btn layui-btn-primary layui-btn-small"><i class="layui-icon">&#xe654;</i></a>
                            <a data-href="" class="layui-btn layui-btn-primary layui-btn-small"><i class="layui-icon">&#xe642;</i></a>
                            <a data-href="" class="layui-btn layui-btn-primary layui-btn-small j-tr-del"><i class="layui-icon">&#xe640;</i></a>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </form>
</div>
<div class="layui-tab-item">
    <style type="text/css">
    .site-demo-code{
    left: 0;
    top: 0;
    width: 100%;
    height: 600px;
    border: none;
    padding: 10px;
    font-size: 12px;
    background-color: #F7FBFF;
    color: #881280;
    font-family: Courier New;}
    </style>
    <textarea class="layui-border-box site-demo-text site-demo-code" spellcheck="false" readonly>
<!--
+----------------------------------------------------------------------
| 列表页实例模板，Ctrl+A 可直接复制以下代码使用
+----------------------------------------------------------------------
-->
<form class="page-list-form">
<div class="layui-collapse page-tips">
  <div class="layui-colla-item">
    <h2 class="layui-colla-title">温馨提示</h2>
    <div class="layui-colla-content">
      <p>此页面为后台数据管理标准模板，您可以直接复制使用修改</p>
    </div>
  </div>
</div>
<div class="page-toolbar">
    <div class="layui-btn-group fl">
        
        <a href="{:url('add')}" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加</a>
        <a href="{:url('status?table=表名(无表前缀)&val=1')}" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-qiyong"></i>启用</a>
        <a href="{:url('status?table=表名(无表前缀)&val=0')}" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-jinyong1"></i>禁用</a>
        <a href="{:url('del?table=表名(无表前缀)')}" class="layui-btn layui-btn-primary j-page-btns confirm"><i class="aicon ai-jinyong"></i>删除</a>
        
    </div>
    <div class="page-filter fr">
        <form class="layui-form layui-form-pane" action="{:url()}" method="get">
        <div class="layui-form-item">
            <label class="layui-form-label">搜索</label>
            <div class="layui-input-inline">
                <input type="text" name="q" lay-verify="required" placeholder="请输入关键词搜索" autocomplete="off" class="layui-input">
            </div>
        </div>
        </form>
    </div>
</div>
<div class="layui-form">
    <table class="layui-table mt10" lay-even="" lay-skin="row">
        <colgroup>
            <col width="50">
            <col width="150">
            <col width="200">
            <col width="300">
            <col width="100">
            <col width="80">
            <col>
        </colgroup>
        <thead>
            <tr>
                <th><input type="checkbox" lay-skin="primary" lay-filter="allChoose"></th>
                <th>民族</th>
                <th>出场时间</th>
                <th>格言</th>
                <th>排序</th>
                <th>状态</th>
                <th>操作</th>
            </tr> 
        </thead>
        <tbody>
            
            {volist name="data_list" id="vo"}
            <tr>
                <td><input type="checkbox" class="layui-checkbox checkbox-ids" name="ids[]" value="{$vo['id']}" lay-skin="primary"></td>
                <td>汉族</td>
                <td>1989-10-14</td>
                <td>人生似修行</td>
                <td>
                    <input type="text" class="layui-input j-ajax-input input-sort" onkeyup="value=value.replace(/[^\d]/g,'')" 
value="{$vo['sort']}" data-value="{$vo['sort']}" data-href="{:url('sort?table=test_table&ids='.$vo['id'])}">
                </td>
                <td>
                    <input type="checkbox" name="status" {if condition="$vo['status'] eq 1"}checked=""{/if} value="{$vo['status']}" lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="{:url('status?table=表名(无表前缀)&ids='.$vo['id'])}">
                </td>
                <td>
                    <div class="layui-btn-group">
                        <div class="layui-btn-group">
                        <a data-href="" class="layui-btn layui-btn-primary layui-btn-small">文字</a>
                        <a data-href="{:url('edit?id='.$vo['id'])}" class="layui-btn layui-btn-primary layui-btn-small"><i class="layui-icon">&#xe642;</i></a>
                        <a data-href="{:url('del?table=表名(无表前缀)&id='.$vo['id'])}" class="layui-btn layui-btn-primary layui-btn-small j-tr-del"><i class="layui-icon">&#xe640;</i></a>
                        </div>
                    </div>
                </td>
            </tr>
            {/volist}
            
        </tbody>
    </table>
</div>
</form>
    </textarea>
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
            <div class="layui-tab-item layui-show">
    <!--
    +----------------------------------------------------------------------
    | 列表页实例模板，可直接复制以下代码使用
    +----------------------------------------------------------------------
    -->
    <form class="page-list-form">
    <div class="layui-collapse page-tips">
      <div class="layui-colla-item">
        <h2 class="layui-colla-title">温馨提示</h2>
        <div class="layui-colla-content">
          <p>此页面为后台数据管理标准模板，您可以直接复制使用修改</p>
        </div>
      </div>
    </div>
    <div class="page-toolbar">
        <div class="layui-btn-group fl">
            <a href="" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加</a>
            <a href="" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-qiyong"></i>启用</a>
            <a href="" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-jinyong1"></i>禁用</a>
            <a href="" class="layui-btn layui-btn-primary j-page-btns confirm"><i class="aicon ai-jinyong"></i>删除</a>
        </div>
        <div class="page-filter fr">
            <form class="layui-form layui-form-pane" action="<?php echo url(); ?>" method="get">
            <div class="layui-form-item">
                <label class="layui-form-label">搜索</label>
                <div class="layui-input-inline">
                    <input type="text" name="q" lay-verify="required" placeholder="请输入关键词搜索" autocomplete="off" class="layui-input">
                </div>
            </div>
            </form>
        </div>
    </div>
    <div class="layui-form">
        <table class="layui-table mt10" lay-even="" lay-skin="row">
            <colgroup>
                <col width="50">
                <col width="150">
                <col width="200">
                <col width="300">
                <col width="100">
                <col width="80">
                <col>
            </colgroup>
            <thead>
                <tr>
                    <th><input type="checkbox" lay-skin="primary" lay-filter="allChoose"></th>
                    <th>民族</th>
                    <th>出场时间</th>
                    <th>格言</th>
                    <th>排序</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr> 
            </thead>
            <tbody>
                <tr>
                    <td><input type="checkbox" class="layui-checkbox checkbox-ids" name="ids[]" lay-skin="primary"></td>
                    <td>汉族</td>
                    <td>1989-10-14</td>
                    <td>人生似修行</td>
                    <td>
                        <input type="text" class="layui-input j-ajax-input input-sort" onkeyup="value=value.replace(/[^\d]/g,'')" 
value="100" data-value="" data-href="">
                    </td>
                    <td>
                        <input type="checkbox" name="status" checked="" value="0" lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="">
                    </td>
                    <td>
                        <div class="layui-btn-group">
                            <div class="layui-btn-group">
                            <a data-href="" class="layui-btn layui-btn-primary layui-btn-small">文字</a>
                            <a data-href="" class="layui-btn layui-btn-primary layui-btn-small"><i class="layui-icon">&#xe654;</i></a>
                            <a data-href="" class="layui-btn layui-btn-primary layui-btn-small"><i class="layui-icon">&#xe642;</i></a>
                            <a data-href="" class="layui-btn layui-btn-primary layui-btn-small j-tr-del"><i class="layui-icon">&#xe640;</i></a>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </form>
</div>
<div class="layui-tab-item">
    <style type="text/css">
    .site-demo-code{
    left: 0;
    top: 0;
    width: 100%;
    height: 600px;
    border: none;
    padding: 10px;
    font-size: 12px;
    background-color: #F7FBFF;
    color: #881280;
    font-family: Courier New;}
    </style>
    <textarea class="layui-border-box site-demo-text site-demo-code" spellcheck="false" readonly>
<!--
+----------------------------------------------------------------------
| 列表页实例模板，Ctrl+A 可直接复制以下代码使用
+----------------------------------------------------------------------
-->
<form class="page-list-form">
<div class="layui-collapse page-tips">
  <div class="layui-colla-item">
    <h2 class="layui-colla-title">温馨提示</h2>
    <div class="layui-colla-content">
      <p>此页面为后台数据管理标准模板，您可以直接复制使用修改</p>
    </div>
  </div>
</div>
<div class="page-toolbar">
    <div class="layui-btn-group fl">
        
        <a href="{:url('add')}" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加</a>
        <a href="{:url('status?table=表名(无表前缀)&val=1')}" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-qiyong"></i>启用</a>
        <a href="{:url('status?table=表名(无表前缀)&val=0')}" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-jinyong1"></i>禁用</a>
        <a href="{:url('del?table=表名(无表前缀)')}" class="layui-btn layui-btn-primary j-page-btns confirm"><i class="aicon ai-jinyong"></i>删除</a>
        
    </div>
    <div class="page-filter fr">
        <form class="layui-form layui-form-pane" action="{:url()}" method="get">
        <div class="layui-form-item">
            <label class="layui-form-label">搜索</label>
            <div class="layui-input-inline">
                <input type="text" name="q" lay-verify="required" placeholder="请输入关键词搜索" autocomplete="off" class="layui-input">
            </div>
        </div>
        </form>
    </div>
</div>
<div class="layui-form">
    <table class="layui-table mt10" lay-even="" lay-skin="row">
        <colgroup>
            <col width="50">
            <col width="150">
            <col width="200">
            <col width="300">
            <col width="100">
            <col width="80">
            <col>
        </colgroup>
        <thead>
            <tr>
                <th><input type="checkbox" lay-skin="primary" lay-filter="allChoose"></th>
                <th>民族</th>
                <th>出场时间</th>
                <th>格言</th>
                <th>排序</th>
                <th>状态</th>
                <th>操作</th>
            </tr> 
        </thead>
        <tbody>
            
            {volist name="data_list" id="vo"}
            <tr>
                <td><input type="checkbox" class="layui-checkbox checkbox-ids" name="ids[]" value="{$vo['id']}" lay-skin="primary"></td>
                <td>汉族</td>
                <td>1989-10-14</td>
                <td>人生似修行</td>
                <td>
                    <input type="text" class="layui-input j-ajax-input input-sort" onkeyup="value=value.replace(/[^\d]/g,'')" 
value="{$vo['sort']}" data-value="{$vo['sort']}" data-href="{:url('sort?table=test_table&ids='.$vo['id'])}">
                </td>
                <td>
                    <input type="checkbox" name="status" {if condition="$vo['status'] eq 1"}checked=""{/if} value="{$vo['status']}" lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="{:url('status?table=表名(无表前缀)&ids='.$vo['id'])}">
                </td>
                <td>
                    <div class="layui-btn-group">
                        <div class="layui-btn-group">
                        <a data-href="" class="layui-btn layui-btn-primary layui-btn-small">文字</a>
                        <a data-href="{:url('edit?id='.$vo['id'])}" class="layui-btn layui-btn-primary layui-btn-small"><i class="layui-icon">&#xe642;</i></a>
                        <a data-href="{:url('del?table=表名(无表前缀)&id='.$vo['id'])}" class="layui-btn layui-btn-primary layui-btn-small j-tr-del"><i class="layui-icon">&#xe640;</i></a>
                        </div>
                    </div>
                </td>
            </tr>
            {/volist}
            
        </tbody>
    </table>
</div>
</form>
    </textarea>
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