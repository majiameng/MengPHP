<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:55:"E:\phpstudy\WWW\my\meng/app/admin\view\system\index.php";i:1509517151;s:49:"E:\phpstudy\WWW\my\meng/app/admin\view\layout.php";i:1509698566;s:49:"E:\phpstudy\WWW\my\meng/app/admin\view\header.php";i:1509678508;s:49:"E:\phpstudy\WWW\my\meng/app/admin\view\footer.php";i:1509500460;}*/ ?>
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
            
<form action="<?php echo url('?group='.input('param.group', 'base')); ?>" class="page-list-form layui-form layui-form-pane" method="post">
    <?php if(is_array($data_list) || $data_list instanceof \think\Collection || $data_list instanceof \think\Paginator): $i = 0; $__LIST__ = $data_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;switch($v['type']): case "textarea": ?>
            <!--多行文本-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline">
                    <textarea rows="6"  class="layui-textarea" name="id[<?php echo $v['id']; ?>]" autocomplete="off" placeholder="请填写<?php echo $v['title']; ?>"><?php echo htmlspecialchars_decode($v['value']); ?></textarea>
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "array": ?>
            <!--文本域-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline">
                    <textarea rows="6" class="layui-textarea" name="id[<?php echo $v['id']; ?>]" autocomplete="off" placeholder="请填写<?php echo $v['title']; ?>"><?php echo $v['value']; ?></textarea>
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "switch": ?>
            <!--开关-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline">
                    <input type="checkbox" name="id[<?php echo $v['id']; ?>]" value="1" lay-skin="switch" lay-text="<?php echo $v['options'][1]; ?>|<?php echo $v['options'][0]; ?>" <?php if($v['value'] == 1): ?>checked=""<?php endif; ?>>
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "select": ?>
            <!--下拉框-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline">
                    <select name="id[<?php echo $v['id']; ?>]">
                        <?php if(is_array($v['options']) || $v['options'] instanceof \think\Collection || $v['options'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v['options'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $key; ?>" <?php if($key == $v['value']): ?>selected<?php endif; ?>><?php echo $vv; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "radio": ?>
            <!--单选-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline">
                    <?php if(is_array($v['options']) || $v['options'] instanceof \think\Collection || $v['options'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v['options'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><input type="radio" name="id[<?php echo $v['id']; ?>]" value="<?php echo $key; ?>" title="<?php echo $vv; ?>" <?php if($key == $v['value']): ?>checked<?php endif; ?>>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "checkbox": ?>
            <!--多选-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline">
                    <?php $value = json_decode($v['value']); if(is_array($v['options']) || $v['options'] instanceof \think\Collection || $v['options'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v['options'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><input type="checkbox" name="id[<?php echo $v['id']; ?>][]" value="<?php echo $key; ?>" title="<?php echo $vv; ?>" lay-skin="primary" <?php if(in_array($key, $value)): ?>checked<?php endif; ?>>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "date": ?>
            <!--日期-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline">
                    <input type="text" class="layui-input layui-date" name="id[<?php echo $v['id']; ?>]" value="<?php echo $v['value']; ?>" autocomplete="off" placeholder="请填写<?php echo $v['title']; ?>" onclick="layui.laydate({elem: this,format:'YYYY-MM-DD'})">
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "datetime": ?>
            <!--日期+时间-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline">
                    <input type="text" class="layui-input layui-date" name="id[<?php echo $v['id']; ?>]" value="<?php echo $v['value']; ?>" autocomplete="off" placeholder="请填写<?php echo $v['title']; ?>" onclick="layui.laydate({elem: this,format:'YYYY-MM-DD hh:mm:ss'})">
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "image": ?>
            <!--图片-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline upload">
                    <button type="button" name="upload" class="layui-btn layui-btn-primary layui-upload" lay-type="image" lay-data="{ <?php if(!empty($v['url'])): ?>url: '<?php echo url($v['url']); ?>', <?php endif; ?>exts:'<?php echo str_replace(',', '|', config('upload.upload_image_ext')); ?>', accept:'image'}">请上传<?php echo $v['title']; ?></button>
                    <input type="hidden" class="upload-input" name="id[<?php echo $v['id']; ?>]" value="<?php echo $v['value']; ?>">
                    <?php if($v['value']): ?>
                        <img src="<?php echo $v['value']; ?>" style="display:inline-block;border-radius:5px;border:1px solid #ccc" width="36" height="36">
                    <?php else: ?>
                        <img src="" style="display:none;border-radius:5px;border:1px solid #ccc" width="36" height="36">
                    <?php endif; ?>
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "file": ?>
            <!--文件-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline upload">
                    <button type="button" name="upload" class="layui-btn layui-btn-primary layui-upload" lay-data="{ <?php if(!empty($v['url'])): ?>url: '<?php echo url($v['url']); ?>', <?php endif; ?>exts:'<?php echo str_replace(',', '|', config('upload.upload_file_ext')); ?>', accept:'file'}">请上传<?php echo $v['title']; ?></button>
                    <input type="hidden" class="upload-input" name="id[<?php echo $v['id']; ?>]" value="<?php echo $v['value']; ?>">
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "hidden": ?>
            <input type="hidden" name="id[<?php echo $v['id']; ?>]" value="<?php echo $v['value']; ?>">
        <?php break; default: ?>
            <!--单行文本-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline">
                    <input type="text" class="layui-input" name="id[<?php echo $v['id']; ?>]" value="<?php echo $v['value']; ?>" autocomplete="off" placeholder="请填写<?php echo $v['title']; ?>">
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
    <?php endswitch; ?>
    <input type="hidden" name="type[<?php echo $v['id']; ?>]" value="<?php echo $v['type']; ?>">
    <?php if(isset($v['module'])): ?>
        <input type="hidden" name="module" value="<?php echo $v['module']; ?>">
    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交</button>
        </div>
    </div>
</form>
<script>
layui.use(['jquery', 'laydate', 'upload'], function() {
    var $ = layui.jquery, laydate = layui.laydate, layer = layui.layer, upload = layui.upload;
    upload.render({
        elem: '.layui-upload',
        url: '<?php echo url("admin/annex/upload?thumb=no&water=no"); ?>'
        ,method: 'post'
        ,before: function(input) {
            layer.msg('文件上传中...', {time:3000000});
        },done: function(res, index, upload) {
            var obj = this.item;
            if (res.code == 0) {
                layer.msg(res.msg);
                return false;
            }
            layer.closeAll();
            var input = $(obj).parents('.upload').find('.upload-input');
            if ($(obj).attr('lay-type') == 'image') {
                input.siblings('img').attr('src', res.data.file).show();
            }
            input.val(res.data.file);
        }
    });
    // 日期渲染
    laydate.render({elem: '.layui-date'});
});
</script>
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
        
<form action="<?php echo url('?group='.input('param.group', 'base')); ?>" class="page-list-form layui-form layui-form-pane" method="post">
    <?php if(is_array($data_list) || $data_list instanceof \think\Collection || $data_list instanceof \think\Paginator): $i = 0; $__LIST__ = $data_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;switch($v['type']): case "textarea": ?>
            <!--多行文本-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline">
                    <textarea rows="6"  class="layui-textarea" name="id[<?php echo $v['id']; ?>]" autocomplete="off" placeholder="请填写<?php echo $v['title']; ?>"><?php echo htmlspecialchars_decode($v['value']); ?></textarea>
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "array": ?>
            <!--文本域-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline">
                    <textarea rows="6" class="layui-textarea" name="id[<?php echo $v['id']; ?>]" autocomplete="off" placeholder="请填写<?php echo $v['title']; ?>"><?php echo $v['value']; ?></textarea>
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "switch": ?>
            <!--开关-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline">
                    <input type="checkbox" name="id[<?php echo $v['id']; ?>]" value="1" lay-skin="switch" lay-text="<?php echo $v['options'][1]; ?>|<?php echo $v['options'][0]; ?>" <?php if($v['value'] == 1): ?>checked=""<?php endif; ?>>
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "select": ?>
            <!--下拉框-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline">
                    <select name="id[<?php echo $v['id']; ?>]">
                        <?php if(is_array($v['options']) || $v['options'] instanceof \think\Collection || $v['options'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v['options'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $key; ?>" <?php if($key == $v['value']): ?>selected<?php endif; ?>><?php echo $vv; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "radio": ?>
            <!--单选-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline">
                    <?php if(is_array($v['options']) || $v['options'] instanceof \think\Collection || $v['options'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v['options'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><input type="radio" name="id[<?php echo $v['id']; ?>]" value="<?php echo $key; ?>" title="<?php echo $vv; ?>" <?php if($key == $v['value']): ?>checked<?php endif; ?>>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "checkbox": ?>
            <!--多选-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline">
                    <?php $value = json_decode($v['value']); if(is_array($v['options']) || $v['options'] instanceof \think\Collection || $v['options'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v['options'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><input type="checkbox" name="id[<?php echo $v['id']; ?>][]" value="<?php echo $key; ?>" title="<?php echo $vv; ?>" lay-skin="primary" <?php if(in_array($key, $value)): ?>checked<?php endif; ?>>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "date": ?>
            <!--日期-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline">
                    <input type="text" class="layui-input layui-date" name="id[<?php echo $v['id']; ?>]" value="<?php echo $v['value']; ?>" autocomplete="off" placeholder="请填写<?php echo $v['title']; ?>" onclick="layui.laydate({elem: this,format:'YYYY-MM-DD'})">
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "datetime": ?>
            <!--日期+时间-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline">
                    <input type="text" class="layui-input layui-date" name="id[<?php echo $v['id']; ?>]" value="<?php echo $v['value']; ?>" autocomplete="off" placeholder="请填写<?php echo $v['title']; ?>" onclick="layui.laydate({elem: this,format:'YYYY-MM-DD hh:mm:ss'})">
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "image": ?>
            <!--图片-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline upload">
                    <button type="button" name="upload" class="layui-btn layui-btn-primary layui-upload" lay-type="image" lay-data="{ <?php if(!empty($v['url'])): ?>url: '<?php echo url($v['url']); ?>', <?php endif; ?>exts:'<?php echo str_replace(',', '|', config('upload.upload_image_ext')); ?>', accept:'image'}">请上传<?php echo $v['title']; ?></button>
                    <input type="hidden" class="upload-input" name="id[<?php echo $v['id']; ?>]" value="<?php echo $v['value']; ?>">
                    <?php if($v['value']): ?>
                        <img src="<?php echo $v['value']; ?>" style="display:inline-block;border-radius:5px;border:1px solid #ccc" width="36" height="36">
                    <?php else: ?>
                        <img src="" style="display:none;border-radius:5px;border:1px solid #ccc" width="36" height="36">
                    <?php endif; ?>
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "file": ?>
            <!--文件-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline upload">
                    <button type="button" name="upload" class="layui-btn layui-btn-primary layui-upload" lay-data="{ <?php if(!empty($v['url'])): ?>url: '<?php echo url($v['url']); ?>', <?php endif; ?>exts:'<?php echo str_replace(',', '|', config('upload.upload_file_ext')); ?>', accept:'file'}">请上传<?php echo $v['title']; ?></button>
                    <input type="hidden" class="upload-input" name="id[<?php echo $v['id']; ?>]" value="<?php echo $v['value']; ?>">
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "hidden": ?>
            <input type="hidden" name="id[<?php echo $v['id']; ?>]" value="<?php echo $v['value']; ?>">
        <?php break; default: ?>
            <!--单行文本-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline">
                    <input type="text" class="layui-input" name="id[<?php echo $v['id']; ?>]" value="<?php echo $v['value']; ?>" autocomplete="off" placeholder="请填写<?php echo $v['title']; ?>">
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
    <?php endswitch; ?>
    <input type="hidden" name="type[<?php echo $v['id']; ?>]" value="<?php echo $v['type']; ?>">
    <?php if(isset($v['module'])): ?>
        <input type="hidden" name="module" value="<?php echo $v['module']; ?>">
    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交</button>
        </div>
    </div>
</form>
<script>
layui.use(['jquery', 'laydate', 'upload'], function() {
    var $ = layui.jquery, laydate = layui.laydate, layer = layui.layer, upload = layui.upload;
    upload.render({
        elem: '.layui-upload',
        url: '<?php echo url("admin/annex/upload?thumb=no&water=no"); ?>'
        ,method: 'post'
        ,before: function(input) {
            layer.msg('文件上传中...', {time:3000000});
        },done: function(res, index, upload) {
            var obj = this.item;
            if (res.code == 0) {
                layer.msg(res.msg);
                return false;
            }
            layer.closeAll();
            var input = $(obj).parents('.upload').find('.upload-input');
            if ($(obj).attr('lay-type') == 'image') {
                input.siblings('img').attr('src', res.data.file).show();
            }
            input.val(res.data.file);
        }
    });
    // 日期渲染
    laydate.render({elem: '.layui-date'});
});
</script>
    </div>
</div>
<?php break; case "3": ?>


<form action="<?php echo url('?group='.input('param.group', 'base')); ?>" class="page-list-form layui-form layui-form-pane" method="post">
    <?php if(is_array($data_list) || $data_list instanceof \think\Collection || $data_list instanceof \think\Paginator): $i = 0; $__LIST__ = $data_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;switch($v['type']): case "textarea": ?>
            <!--多行文本-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline">
                    <textarea rows="6"  class="layui-textarea" name="id[<?php echo $v['id']; ?>]" autocomplete="off" placeholder="请填写<?php echo $v['title']; ?>"><?php echo htmlspecialchars_decode($v['value']); ?></textarea>
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "array": ?>
            <!--文本域-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline">
                    <textarea rows="6" class="layui-textarea" name="id[<?php echo $v['id']; ?>]" autocomplete="off" placeholder="请填写<?php echo $v['title']; ?>"><?php echo $v['value']; ?></textarea>
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "switch": ?>
            <!--开关-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline">
                    <input type="checkbox" name="id[<?php echo $v['id']; ?>]" value="1" lay-skin="switch" lay-text="<?php echo $v['options'][1]; ?>|<?php echo $v['options'][0]; ?>" <?php if($v['value'] == 1): ?>checked=""<?php endif; ?>>
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "select": ?>
            <!--下拉框-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline">
                    <select name="id[<?php echo $v['id']; ?>]">
                        <?php if(is_array($v['options']) || $v['options'] instanceof \think\Collection || $v['options'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v['options'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $key; ?>" <?php if($key == $v['value']): ?>selected<?php endif; ?>><?php echo $vv; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "radio": ?>
            <!--单选-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline">
                    <?php if(is_array($v['options']) || $v['options'] instanceof \think\Collection || $v['options'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v['options'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><input type="radio" name="id[<?php echo $v['id']; ?>]" value="<?php echo $key; ?>" title="<?php echo $vv; ?>" <?php if($key == $v['value']): ?>checked<?php endif; ?>>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "checkbox": ?>
            <!--多选-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline">
                    <?php $value = json_decode($v['value']); if(is_array($v['options']) || $v['options'] instanceof \think\Collection || $v['options'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v['options'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><input type="checkbox" name="id[<?php echo $v['id']; ?>][]" value="<?php echo $key; ?>" title="<?php echo $vv; ?>" lay-skin="primary" <?php if(in_array($key, $value)): ?>checked<?php endif; ?>>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "date": ?>
            <!--日期-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline">
                    <input type="text" class="layui-input layui-date" name="id[<?php echo $v['id']; ?>]" value="<?php echo $v['value']; ?>" autocomplete="off" placeholder="请填写<?php echo $v['title']; ?>" onclick="layui.laydate({elem: this,format:'YYYY-MM-DD'})">
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "datetime": ?>
            <!--日期+时间-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline">
                    <input type="text" class="layui-input layui-date" name="id[<?php echo $v['id']; ?>]" value="<?php echo $v['value']; ?>" autocomplete="off" placeholder="请填写<?php echo $v['title']; ?>" onclick="layui.laydate({elem: this,format:'YYYY-MM-DD hh:mm:ss'})">
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "image": ?>
            <!--图片-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline upload">
                    <button type="button" name="upload" class="layui-btn layui-btn-primary layui-upload" lay-type="image" lay-data="{ <?php if(!empty($v['url'])): ?>url: '<?php echo url($v['url']); ?>', <?php endif; ?>exts:'<?php echo str_replace(',', '|', config('upload.upload_image_ext')); ?>', accept:'image'}">请上传<?php echo $v['title']; ?></button>
                    <input type="hidden" class="upload-input" name="id[<?php echo $v['id']; ?>]" value="<?php echo $v['value']; ?>">
                    <?php if($v['value']): ?>
                        <img src="<?php echo $v['value']; ?>" style="display:inline-block;border-radius:5px;border:1px solid #ccc" width="36" height="36">
                    <?php else: ?>
                        <img src="" style="display:none;border-radius:5px;border:1px solid #ccc" width="36" height="36">
                    <?php endif; ?>
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "file": ?>
            <!--文件-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline upload">
                    <button type="button" name="upload" class="layui-btn layui-btn-primary layui-upload" lay-data="{ <?php if(!empty($v['url'])): ?>url: '<?php echo url($v['url']); ?>', <?php endif; ?>exts:'<?php echo str_replace(',', '|', config('upload.upload_file_ext')); ?>', accept:'file'}">请上传<?php echo $v['title']; ?></button>
                    <input type="hidden" class="upload-input" name="id[<?php echo $v['id']; ?>]" value="<?php echo $v['value']; ?>">
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "hidden": ?>
            <input type="hidden" name="id[<?php echo $v['id']; ?>]" value="<?php echo $v['value']; ?>">
        <?php break; default: ?>
            <!--单行文本-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline">
                    <input type="text" class="layui-input" name="id[<?php echo $v['id']; ?>]" value="<?php echo $v['value']; ?>" autocomplete="off" placeholder="请填写<?php echo $v['title']; ?>">
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
    <?php endswitch; ?>
    <input type="hidden" name="type[<?php echo $v['id']; ?>]" value="<?php echo $v['type']; ?>">
    <?php if(isset($v['module'])): ?>
        <input type="hidden" name="module" value="<?php echo $v['module']; ?>">
    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交</button>
        </div>
    </div>
</form>
<script>
layui.use(['jquery', 'laydate', 'upload'], function() {
    var $ = layui.jquery, laydate = layui.laydate, layer = layui.layer, upload = layui.upload;
    upload.render({
        elem: '.layui-upload',
        url: '<?php echo url("admin/annex/upload?thumb=no&water=no"); ?>'
        ,method: 'post'
        ,before: function(input) {
            layer.msg('文件上传中...', {time:3000000});
        },done: function(res, index, upload) {
            var obj = this.item;
            if (res.code == 0) {
                layer.msg(res.msg);
                return false;
            }
            layer.closeAll();
            var input = $(obj).parents('.upload').find('.upload-input');
            if ($(obj).attr('lay-type') == 'image') {
                input.siblings('img').attr('src', res.data.file).show();
            }
            input.val(res.data.file);
        }
    });
    // 日期渲染
    laydate.render({elem: '.layui-date'});
});
</script>
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
            
<form action="<?php echo url('?group='.input('param.group', 'base')); ?>" class="page-list-form layui-form layui-form-pane" method="post">
    <?php if(is_array($data_list) || $data_list instanceof \think\Collection || $data_list instanceof \think\Paginator): $i = 0; $__LIST__ = $data_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;switch($v['type']): case "textarea": ?>
            <!--多行文本-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline">
                    <textarea rows="6"  class="layui-textarea" name="id[<?php echo $v['id']; ?>]" autocomplete="off" placeholder="请填写<?php echo $v['title']; ?>"><?php echo htmlspecialchars_decode($v['value']); ?></textarea>
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "array": ?>
            <!--文本域-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline">
                    <textarea rows="6" class="layui-textarea" name="id[<?php echo $v['id']; ?>]" autocomplete="off" placeholder="请填写<?php echo $v['title']; ?>"><?php echo $v['value']; ?></textarea>
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "switch": ?>
            <!--开关-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline">
                    <input type="checkbox" name="id[<?php echo $v['id']; ?>]" value="1" lay-skin="switch" lay-text="<?php echo $v['options'][1]; ?>|<?php echo $v['options'][0]; ?>" <?php if($v['value'] == 1): ?>checked=""<?php endif; ?>>
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "select": ?>
            <!--下拉框-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline">
                    <select name="id[<?php echo $v['id']; ?>]">
                        <?php if(is_array($v['options']) || $v['options'] instanceof \think\Collection || $v['options'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v['options'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $key; ?>" <?php if($key == $v['value']): ?>selected<?php endif; ?>><?php echo $vv; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "radio": ?>
            <!--单选-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline">
                    <?php if(is_array($v['options']) || $v['options'] instanceof \think\Collection || $v['options'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v['options'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><input type="radio" name="id[<?php echo $v['id']; ?>]" value="<?php echo $key; ?>" title="<?php echo $vv; ?>" <?php if($key == $v['value']): ?>checked<?php endif; ?>>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "checkbox": ?>
            <!--多选-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline">
                    <?php $value = json_decode($v['value']); if(is_array($v['options']) || $v['options'] instanceof \think\Collection || $v['options'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v['options'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><input type="checkbox" name="id[<?php echo $v['id']; ?>][]" value="<?php echo $key; ?>" title="<?php echo $vv; ?>" lay-skin="primary" <?php if(in_array($key, $value)): ?>checked<?php endif; ?>>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "date": ?>
            <!--日期-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline">
                    <input type="text" class="layui-input layui-date" name="id[<?php echo $v['id']; ?>]" value="<?php echo $v['value']; ?>" autocomplete="off" placeholder="请填写<?php echo $v['title']; ?>" onclick="layui.laydate({elem: this,format:'YYYY-MM-DD'})">
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "datetime": ?>
            <!--日期+时间-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline">
                    <input type="text" class="layui-input layui-date" name="id[<?php echo $v['id']; ?>]" value="<?php echo $v['value']; ?>" autocomplete="off" placeholder="请填写<?php echo $v['title']; ?>" onclick="layui.laydate({elem: this,format:'YYYY-MM-DD hh:mm:ss'})">
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "image": ?>
            <!--图片-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline upload">
                    <button type="button" name="upload" class="layui-btn layui-btn-primary layui-upload" lay-type="image" lay-data="{ <?php if(!empty($v['url'])): ?>url: '<?php echo url($v['url']); ?>', <?php endif; ?>exts:'<?php echo str_replace(',', '|', config('upload.upload_image_ext')); ?>', accept:'image'}">请上传<?php echo $v['title']; ?></button>
                    <input type="hidden" class="upload-input" name="id[<?php echo $v['id']; ?>]" value="<?php echo $v['value']; ?>">
                    <?php if($v['value']): ?>
                        <img src="<?php echo $v['value']; ?>" style="display:inline-block;border-radius:5px;border:1px solid #ccc" width="36" height="36">
                    <?php else: ?>
                        <img src="" style="display:none;border-radius:5px;border:1px solid #ccc" width="36" height="36">
                    <?php endif; ?>
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "file": ?>
            <!--文件-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline upload">
                    <button type="button" name="upload" class="layui-btn layui-btn-primary layui-upload" lay-data="{ <?php if(!empty($v['url'])): ?>url: '<?php echo url($v['url']); ?>', <?php endif; ?>exts:'<?php echo str_replace(',', '|', config('upload.upload_file_ext')); ?>', accept:'file'}">请上传<?php echo $v['title']; ?></button>
                    <input type="hidden" class="upload-input" name="id[<?php echo $v['id']; ?>]" value="<?php echo $v['value']; ?>">
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
        <?php break; case "hidden": ?>
            <input type="hidden" name="id[<?php echo $v['id']; ?>]" value="<?php echo $v['value']; ?>">
        <?php break; default: ?>
            <!--单行文本-->
            <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $v['title']; ?></label>
                <div class="layui-input-inline">
                    <input type="text" class="layui-input" name="id[<?php echo $v['id']; ?>]" value="<?php echo $v['value']; ?>" autocomplete="off" placeholder="请填写<?php echo $v['title']; ?>">
                </div>
                <div class="layui-form-mid layui-word-aux"><?php echo htmlspecialchars_decode($v['tips']); ?><br>调用方式：<code>config('<?php echo input('param.group', 'base'); ?>.<?php echo $v['name']; ?>')</code></div>
            </div>
    <?php endswitch; ?>
    <input type="hidden" name="type[<?php echo $v['id']; ?>]" value="<?php echo $v['type']; ?>">
    <?php if(isset($v['module'])): ?>
        <input type="hidden" name="module" value="<?php echo $v['module']; ?>">
    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交</button>
        </div>
    </div>
</form>
<script>
layui.use(['jquery', 'laydate', 'upload'], function() {
    var $ = layui.jquery, laydate = layui.laydate, layer = layui.layer, upload = layui.upload;
    upload.render({
        elem: '.layui-upload',
        url: '<?php echo url("admin/annex/upload?thumb=no&water=no"); ?>'
        ,method: 'post'
        ,before: function(input) {
            layer.msg('文件上传中...', {time:3000000});
        },done: function(res, index, upload) {
            var obj = this.item;
            if (res.code == 0) {
                layer.msg(res.msg);
                return false;
            }
            layer.closeAll();
            var input = $(obj).parents('.upload').find('.upload-input');
            if ($(obj).attr('lay-type') == 'image') {
                input.siblings('img').attr('src', res.data.file).show();
            }
            input.val(res.data.file);
        }
    });
    // 日期渲染
    laydate.render({elem: '.layui-date'});
});
</script>
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