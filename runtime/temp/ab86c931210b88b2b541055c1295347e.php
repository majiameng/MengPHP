<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:55:"E:\phpstudy\WWW\my\meng/app/admin\view\develop\edit.php";i:1509689686;s:49:"E:\phpstudy\WWW\my\meng/app/admin\view\layout.php";i:1509698566;s:49:"E:\phpstudy\WWW\my\meng/app/admin\view\header.php";i:1509678508;s:49:"E:\phpstudy\WWW\my\meng/app/admin\view\footer.php";i:1509500460;}*/ ?>
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
    | 添加修改实例模板，可直接复制以下代码使用
    | select元素需要加type="select"
    | 所有可编辑的表单元素需要按以下格式添加class名：class="field-字段名"
    +----------------------------------------------------------------------
    -->
    <div class="layui-collapse page-tips">
      <div class="layui-colla-item">
        <h2 class="layui-colla-title">温馨提示</h2>
        <div class="layui-colla-content">
          <p>此页面为后台[添加/修改]标准模板，您可以直接复制使用修改</p>
        </div>
      </div>
    </div>
    <form class="layui-form layui-form-pane" action="<?php echo url(); ?>" id="editForm" method="post">
        <fieldset class="layui-elem-field layui-field-title">
          <legend>表单集合</legend>
        </fieldset>
        <div class="layui-form-item">
            <label class="layui-form-label">角色分组</label>
            <div class="layui-input-inline">
                <select name="role_id" class="field-role_id" type="select">
                    <option value="0">超级管理员</option>
                    <option value="1" selected="">普通管理员</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">用户名</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input field-username" name="username" lay-verify="title" autocomplete="off" placeholder="请输入用户名">
            </div>
            <div class="layui-form-mid layui-word-aux">表单操作提示</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">会员</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input" name="member" lay-verify="" autocomplete="off" placeholder="会员选择">
            </div>
            <a href="<?php echo url('admin/member/pop?callback=func'); ?>" title="选择会员" class="layui-btn layui-btn-primary j-iframe-pop fl">选择会员</a>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">系统图标</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input" id="input-icon" name="icon" lay-verify="" autocomplete="off" placeholder="可自定义或使用系统图标">
            </div>
            <i class="" id="form-icon-preview"></i>
            <a href="<?php echo url('login/icon?input=input-icon&show=form-icon-preview'); ?>" class="layui-btn layui-btn-primary j-iframe-pop fl" title="选择图标">选择图标</a>
        </div>
        <!--图片-->
        <div class="layui-form-item">
            <label class="layui-form-label">图片上传</label>
            <div class="layui-input-inline upload">
                <button type="button" name="upload" class="layui-btn layui-btn-primary layui-upload" lay-type="image" lay-data="{accept:'image'}">请上传图片</button>
                <input type="hidden" class="upload-input" name="image" value="">
                <img src="" style="display:none;border-radius:5px;border:1px solid #ccc" width="36" height="36">
            </div>
            <div class="layui-form-mid layui-word-aux"></div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">昵&nbsp;&nbsp;&nbsp;&nbsp;称</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input field-nick" name="nick" lay-verify="title" autocomplete="off" placeholder="请输入用户名">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">登陆密码</label>
            <div class="layui-input-inline">
                <input type="password" class="layui-input" name="password" lay-verify="password" autocomplete="off" placeholder="******">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">联系邮箱</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input field-email" name="email" lay-verify="title" autocomplete="off" placeholder="请输入邮箱地址">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">联系手机</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input field-mobile" name="mobile" lay-verify="title" autocomplete="off" placeholder="请输入手机号码">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">CKEditor</label>
            <div class="layui-input-block">
                <textarea id="ckeditor" name="content">CKEditor 1</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">CKEditor</label>
            <div class="layui-input-block">
                <textarea id="ckeditor2" name="content">CKEditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">kindEditor</label>
            <div class="layui-input-block">
                <textarea id="kindeditor1" name="content1">kindEditor 1</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">kindEditor</label>
            <div class="layui-input-block">
                <textarea id="kindeditor2" name="content2">kindEditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">UEditor</label>
            <div class="layui-input-block">
                <textarea id="UEditor1" name="content3">kindEditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">UEditor</label>
            <div class="layui-input-block">
                <textarea id="UEditor2" name="content3">kindEditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">UMditor</label>
            <div class="layui-input-block">
                <textarea id="UMeditor1" name="UMditor1">UMditor 1</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">UMditor</label>
            <div class="layui-input-block">
                <textarea id="UMeditor2" name="UMditor2">UMditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">状&nbsp;&nbsp;&nbsp;&nbsp;态</label>
            <div class="layui-input-inline">
                <input type="radio" class="field-status" name="status" value="1" title="启用">
                <input type="radio" class="field-status" name="status" value="0" title="禁用">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <input type="hidden" class="field-id" name="id">
                <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交</button>
                <a href="<?php echo url('index'); ?>" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
            </div>
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
| 添加修改实例模板，Ctrl+A 可直接复制以下代码使用
| select元素需要加type="select"
| 所有可编辑的表单元素需要按以下格式添加class名：class="field-字段名"
+----------------------------------------------------------------------
-->
<div class="layui-collapse page-tips">
  <div class="layui-colla-item">
    <h2 class="layui-colla-title">温馨提示</h2>
    <div class="layui-colla-content">
      <p>此页面为后台[添加/修改]标准模板，您可以直接复制使用修改</p>
    </div>
  </div>
</div>

<form class="layui-form layui-form-pane" action="{:url('')}" id="editForm" method="post">
    <fieldset class="layui-elem-field layui-field-title">
      <legend>表单集合</legend>
    </fieldset>
    <div class="layui-form-item">
        <label class="layui-form-label">角色分组</label>
        <div class="layui-input-inline">
            <select name="role_id" class="field-role_id" type="select">
                <option value="0">超级管理员</option>
                <option value="1" selected="">普通管理员</option>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">用户名</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="username" lay-verify="title" autocomplete="off" placeholder="请输入用户名">
        </div>
        <div class="layui-form-mid layui-word-aux">表单操作提示</div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">会员</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input" name="member" lay-verify="" autocomplete="off" placeholder="会员选择">
        </div>
        <a href="{:url('admin/member/pop?callback=func')}" class="layui-btn layui-btn-primary j-iframe-pop fl">选择会员</a>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">系统图标</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input" id="input-icon" name="icon" lay-verify="" autocomplete="off" placeholder="可自定义或使用系统图标">
        </div>
        <i class="" id="form-icon-preview"></i>
        <a href="{:url('admin/login/icon?input=input-icon&show=form-icon-preview')}" class="layui-btn layui-btn-primary j-iframe-pop fl">选择图标</a>
    </div>
    <!--图片-->
    <div class="layui-form-item">
        <label class="layui-form-label">图片上传</label>
        <div class="layui-input-inline upload">
            <button type="button" name="upload" class="layui-btn layui-btn-primary layui-upload" lay-type="image" lay-data="{accept:'image'}">请上传图片</button>
            <input type="hidden" class="upload-input" name="image" value="">
            <img src="" style="display:none;border-radius:5px;border:1px solid #ccc" width="36" height="36">
        </div>
        <div class="layui-form-mid layui-word-aux"></div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">昵&nbsp;&nbsp;&nbsp;&nbsp;称</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-nick" name="nick" lay-verify="title" autocomplete="off" placeholder="请输入用户名">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">登陆密码</label>
        <div class="layui-input-inline">
            <input type="password" class="layui-input" name="password" lay-verify="password" autocomplete="off" placeholder="******">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">联系邮箱</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-email" name="email" lay-verify="title" autocomplete="off" placeholder="请输入邮箱地址">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">联系手机</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-mobile" name="mobile" lay-verify="title" autocomplete="off" placeholder="请输入手机号码">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">CKEditor</label>
        <div class="layui-input-block">
            <[删除我]textarea id="ckeditor" name="content">CKEditor 1</[删除我]textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">CKEditor</label>
        <div class="layui-input-block">
            <[删除我]textarea id="ckeditor2" name="content">CKEditor 2</[删除我]textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">kindEditor</label>
        <div class="layui-input-block">
            <[删除我]textarea name="content1">kindEditor 1</[删除我]textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">kindEditor</label>
        <div class="layui-input-block">
            <[删除我]textarea name="content2">kindEditor 2</[删除我]textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">UEditor</label>
        <div class="layui-input-block">
            <[删除我]textarea id="UEditor1" name="content3">kindEditor 2</[删除我]textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">UEditor</label>
        <div class="layui-input-block">
            <[删除我]textarea id="UEditor2" name="content3">kindEditor 2</[删除我]textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">UMditor</label>
        <div class="layui-input-block">
            <[删除我]textarea id="UMeditor1" name="UMditor1">UMditor 1</[删除我]textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">UMditor</label>
        <div class="layui-input-block">
            <[删除我]textarea id="UMeditor2" name="UMditor2">UMditor 2</[删除我]textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">状&nbsp;&nbsp;&nbsp;&nbsp;态</label>
        <div class="layui-input-inline">
            <input type="radio" class="field-status" name="status" value="1" title="启用">
            <input type="radio" class="field-status" name="status" value="0" title="禁用">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <input type="hidden" class="field-id" name="id">
            <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交</button>
            <a href="{:url('index')}" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
        </div>
    </div>
</form>

<script>
/* 修改模式下需要将数据放入此变量 */
var formData = {:json_encode($data_info)};
// 会员选择回调函数
function func(data) {
    var $ = layui.jquery;
    $('input[name="member"]').val('['+data[0]['id']+']'+data[0]['username']);
}
layui.use(['upload'], function() {
    var $ = layui.jquery, layer = layui.layer, upload = layui.upload;
    /**
     * 附件上传url参数说明
     * @param string $from 来源
     * @param string $group 附件分组,默认sys[系统]，模块格式：m_模块名，插件：p_插件名
     * @param string $water 水印，参数为空默认调用系统配置，no直接关闭水印，image 图片水印，text文字水印
     * @param string $thumb 缩略图，参数为空默认调用系统配置，no直接关闭缩略图，如需生成 500x500 的缩略图，则 500x500多个规格请用";"隔开
     * @param string $thumb_type 缩略图方式
     * @param string $input 文件表单字段名
     */
    upload.render({
        elem: '.layui-upload'
        ,url: '{:url("admin/annex/upload?water=&thumb=&from=&group=")}'
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
});
</script>

<!--
/**
 * editor 富文本编辑器
 * @param array $obj 编辑器的容器ID
 * @param string $name [为了方便大家能在系统设置里面灵活选择编辑器，建议不要指定此参数]，目前支持的编辑器[ueditor,umeditor,ckeditor,kindeditor]
 * @param string $upload [选填]附件上传地址
 */
-->
{:editor(['UMeditor1', 'UMeditor2'])}
{:editor(['kindeditor1', 'kindeditor2'], 'kindeditor')}
{:editor(['UEditor1', 'UEditor2'], 'ueditor')}
{:editor(['ckeditor', 'ckeditor2'], 'ckeditor')}
<script src="__ADMIN_JS__/footer.js"></script>

    </textarea>
</div>

<script>
/* 修改模式下需要将数据放入此变量 */
var formData = {"id":1,"role_id":1,"nick":"\u8d85\u7ea7\u7ba1\u7406\u5458","email":"chenf4hua12@qq.com","mobile":13888888888,"status":0};
// 会员选择回调函数
function func(data) {
    var $ = layui.jquery;
    $('input[name="member"]').val('['+data[0]['id']+']'+data[0]['username']);
}
layui.use(['upload'], function() {
    var $ = layui.jquery, layer = layui.layer, upload = layui.upload;
    /**
     * 附件上传url参数说明
     * @param string $from 来源
     * @param string $group 附件分组,默认sys[系统]，模块格式：m_模块名，插件：p_插件名
     * @param string $water 水印，参数为空默认调用系统配置，no直接关闭水印，image 图片水印，text文字水印
     * @param string $thumb 缩略图，参数为空默认调用系统配置，no直接关闭缩略图，如需生成 500x500 的缩略图，则 500x500多个规格请用";"隔开
     * @param string $thumb_type 缩略图方式
     * @param string $input 文件表单字段名
     */
    upload.render({
        elem: '.layui-upload'
        ,url: '<?php echo url("admin/annex/upload?water=&thumb=&from=&group="); ?>'
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
});
</script>
<!--
/**
 * editor 富文本编辑器
 * @param array $obj 编辑器的容器ID
 * @param string $name [为了方便大家能在系统设置里面灵活选择编辑器，建议不要指定此参数]，目前支持的编辑器[ueditor,umeditor,ckeditor,kindeditor]
 * @param string $upload [选填]附件上传地址
 */
-->
<?php echo editor(['UMeditor1', 'UMeditor2']); ?>
<?php echo editor(['kindeditor1', 'kindeditor2'], 'kindeditor'); ?>
<?php echo editor(['ckeditor', 'ckeditor2'], 'ckeditor'); ?>
<?php echo editor(['UEditor1', 'UEditor2'], 'ueditor'); ?>
<script src="__ADMIN_JS__/footer.js"></script>
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
    | 添加修改实例模板，可直接复制以下代码使用
    | select元素需要加type="select"
    | 所有可编辑的表单元素需要按以下格式添加class名：class="field-字段名"
    +----------------------------------------------------------------------
    -->
    <div class="layui-collapse page-tips">
      <div class="layui-colla-item">
        <h2 class="layui-colla-title">温馨提示</h2>
        <div class="layui-colla-content">
          <p>此页面为后台[添加/修改]标准模板，您可以直接复制使用修改</p>
        </div>
      </div>
    </div>
    <form class="layui-form layui-form-pane" action="<?php echo url(); ?>" id="editForm" method="post">
        <fieldset class="layui-elem-field layui-field-title">
          <legend>表单集合</legend>
        </fieldset>
        <div class="layui-form-item">
            <label class="layui-form-label">角色分组</label>
            <div class="layui-input-inline">
                <select name="role_id" class="field-role_id" type="select">
                    <option value="0">超级管理员</option>
                    <option value="1" selected="">普通管理员</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">用户名</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input field-username" name="username" lay-verify="title" autocomplete="off" placeholder="请输入用户名">
            </div>
            <div class="layui-form-mid layui-word-aux">表单操作提示</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">会员</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input" name="member" lay-verify="" autocomplete="off" placeholder="会员选择">
            </div>
            <a href="<?php echo url('admin/member/pop?callback=func'); ?>" title="选择会员" class="layui-btn layui-btn-primary j-iframe-pop fl">选择会员</a>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">系统图标</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input" id="input-icon" name="icon" lay-verify="" autocomplete="off" placeholder="可自定义或使用系统图标">
            </div>
            <i class="" id="form-icon-preview"></i>
            <a href="<?php echo url('login/icon?input=input-icon&show=form-icon-preview'); ?>" class="layui-btn layui-btn-primary j-iframe-pop fl" title="选择图标">选择图标</a>
        </div>
        <!--图片-->
        <div class="layui-form-item">
            <label class="layui-form-label">图片上传</label>
            <div class="layui-input-inline upload">
                <button type="button" name="upload" class="layui-btn layui-btn-primary layui-upload" lay-type="image" lay-data="{accept:'image'}">请上传图片</button>
                <input type="hidden" class="upload-input" name="image" value="">
                <img src="" style="display:none;border-radius:5px;border:1px solid #ccc" width="36" height="36">
            </div>
            <div class="layui-form-mid layui-word-aux"></div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">昵&nbsp;&nbsp;&nbsp;&nbsp;称</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input field-nick" name="nick" lay-verify="title" autocomplete="off" placeholder="请输入用户名">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">登陆密码</label>
            <div class="layui-input-inline">
                <input type="password" class="layui-input" name="password" lay-verify="password" autocomplete="off" placeholder="******">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">联系邮箱</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input field-email" name="email" lay-verify="title" autocomplete="off" placeholder="请输入邮箱地址">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">联系手机</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input field-mobile" name="mobile" lay-verify="title" autocomplete="off" placeholder="请输入手机号码">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">CKEditor</label>
            <div class="layui-input-block">
                <textarea id="ckeditor" name="content">CKEditor 1</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">CKEditor</label>
            <div class="layui-input-block">
                <textarea id="ckeditor2" name="content">CKEditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">kindEditor</label>
            <div class="layui-input-block">
                <textarea id="kindeditor1" name="content1">kindEditor 1</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">kindEditor</label>
            <div class="layui-input-block">
                <textarea id="kindeditor2" name="content2">kindEditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">UEditor</label>
            <div class="layui-input-block">
                <textarea id="UEditor1" name="content3">kindEditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">UEditor</label>
            <div class="layui-input-block">
                <textarea id="UEditor2" name="content3">kindEditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">UMditor</label>
            <div class="layui-input-block">
                <textarea id="UMeditor1" name="UMditor1">UMditor 1</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">UMditor</label>
            <div class="layui-input-block">
                <textarea id="UMeditor2" name="UMditor2">UMditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">状&nbsp;&nbsp;&nbsp;&nbsp;态</label>
            <div class="layui-input-inline">
                <input type="radio" class="field-status" name="status" value="1" title="启用">
                <input type="radio" class="field-status" name="status" value="0" title="禁用">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <input type="hidden" class="field-id" name="id">
                <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交</button>
                <a href="<?php echo url('index'); ?>" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
            </div>
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
| 添加修改实例模板，Ctrl+A 可直接复制以下代码使用
| select元素需要加type="select"
| 所有可编辑的表单元素需要按以下格式添加class名：class="field-字段名"
+----------------------------------------------------------------------
-->
<div class="layui-collapse page-tips">
  <div class="layui-colla-item">
    <h2 class="layui-colla-title">温馨提示</h2>
    <div class="layui-colla-content">
      <p>此页面为后台[添加/修改]标准模板，您可以直接复制使用修改</p>
    </div>
  </div>
</div>

<form class="layui-form layui-form-pane" action="{:url('')}" id="editForm" method="post">
    <fieldset class="layui-elem-field layui-field-title">
      <legend>表单集合</legend>
    </fieldset>
    <div class="layui-form-item">
        <label class="layui-form-label">角色分组</label>
        <div class="layui-input-inline">
            <select name="role_id" class="field-role_id" type="select">
                <option value="0">超级管理员</option>
                <option value="1" selected="">普通管理员</option>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">用户名</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="username" lay-verify="title" autocomplete="off" placeholder="请输入用户名">
        </div>
        <div class="layui-form-mid layui-word-aux">表单操作提示</div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">会员</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input" name="member" lay-verify="" autocomplete="off" placeholder="会员选择">
        </div>
        <a href="{:url('admin/member/pop?callback=func')}" class="layui-btn layui-btn-primary j-iframe-pop fl">选择会员</a>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">系统图标</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input" id="input-icon" name="icon" lay-verify="" autocomplete="off" placeholder="可自定义或使用系统图标">
        </div>
        <i class="" id="form-icon-preview"></i>
        <a href="{:url('admin/login/icon?input=input-icon&show=form-icon-preview')}" class="layui-btn layui-btn-primary j-iframe-pop fl">选择图标</a>
    </div>
    <!--图片-->
    <div class="layui-form-item">
        <label class="layui-form-label">图片上传</label>
        <div class="layui-input-inline upload">
            <button type="button" name="upload" class="layui-btn layui-btn-primary layui-upload" lay-type="image" lay-data="{accept:'image'}">请上传图片</button>
            <input type="hidden" class="upload-input" name="image" value="">
            <img src="" style="display:none;border-radius:5px;border:1px solid #ccc" width="36" height="36">
        </div>
        <div class="layui-form-mid layui-word-aux"></div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">昵&nbsp;&nbsp;&nbsp;&nbsp;称</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-nick" name="nick" lay-verify="title" autocomplete="off" placeholder="请输入用户名">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">登陆密码</label>
        <div class="layui-input-inline">
            <input type="password" class="layui-input" name="password" lay-verify="password" autocomplete="off" placeholder="******">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">联系邮箱</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-email" name="email" lay-verify="title" autocomplete="off" placeholder="请输入邮箱地址">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">联系手机</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-mobile" name="mobile" lay-verify="title" autocomplete="off" placeholder="请输入手机号码">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">CKEditor</label>
        <div class="layui-input-block">
            <[删除我]textarea id="ckeditor" name="content">CKEditor 1</[删除我]textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">CKEditor</label>
        <div class="layui-input-block">
            <[删除我]textarea id="ckeditor2" name="content">CKEditor 2</[删除我]textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">kindEditor</label>
        <div class="layui-input-block">
            <[删除我]textarea name="content1">kindEditor 1</[删除我]textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">kindEditor</label>
        <div class="layui-input-block">
            <[删除我]textarea name="content2">kindEditor 2</[删除我]textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">UEditor</label>
        <div class="layui-input-block">
            <[删除我]textarea id="UEditor1" name="content3">kindEditor 2</[删除我]textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">UEditor</label>
        <div class="layui-input-block">
            <[删除我]textarea id="UEditor2" name="content3">kindEditor 2</[删除我]textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">UMditor</label>
        <div class="layui-input-block">
            <[删除我]textarea id="UMeditor1" name="UMditor1">UMditor 1</[删除我]textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">UMditor</label>
        <div class="layui-input-block">
            <[删除我]textarea id="UMeditor2" name="UMditor2">UMditor 2</[删除我]textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">状&nbsp;&nbsp;&nbsp;&nbsp;态</label>
        <div class="layui-input-inline">
            <input type="radio" class="field-status" name="status" value="1" title="启用">
            <input type="radio" class="field-status" name="status" value="0" title="禁用">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <input type="hidden" class="field-id" name="id">
            <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交</button>
            <a href="{:url('index')}" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
        </div>
    </div>
</form>

<script>
/* 修改模式下需要将数据放入此变量 */
var formData = {:json_encode($data_info)};
// 会员选择回调函数
function func(data) {
    var $ = layui.jquery;
    $('input[name="member"]').val('['+data[0]['id']+']'+data[0]['username']);
}
layui.use(['upload'], function() {
    var $ = layui.jquery, layer = layui.layer, upload = layui.upload;
    /**
     * 附件上传url参数说明
     * @param string $from 来源
     * @param string $group 附件分组,默认sys[系统]，模块格式：m_模块名，插件：p_插件名
     * @param string $water 水印，参数为空默认调用系统配置，no直接关闭水印，image 图片水印，text文字水印
     * @param string $thumb 缩略图，参数为空默认调用系统配置，no直接关闭缩略图，如需生成 500x500 的缩略图，则 500x500多个规格请用";"隔开
     * @param string $thumb_type 缩略图方式
     * @param string $input 文件表单字段名
     */
    upload.render({
        elem: '.layui-upload'
        ,url: '{:url("admin/annex/upload?water=&thumb=&from=&group=")}'
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
});
</script>

<!--
/**
 * editor 富文本编辑器
 * @param array $obj 编辑器的容器ID
 * @param string $name [为了方便大家能在系统设置里面灵活选择编辑器，建议不要指定此参数]，目前支持的编辑器[ueditor,umeditor,ckeditor,kindeditor]
 * @param string $upload [选填]附件上传地址
 */
-->
{:editor(['UMeditor1', 'UMeditor2'])}
{:editor(['kindeditor1', 'kindeditor2'], 'kindeditor')}
{:editor(['UEditor1', 'UEditor2'], 'ueditor')}
{:editor(['ckeditor', 'ckeditor2'], 'ckeditor')}
<script src="__ADMIN_JS__/footer.js"></script>

    </textarea>
</div>

<script>
/* 修改模式下需要将数据放入此变量 */
var formData = {"id":1,"role_id":1,"nick":"\u8d85\u7ea7\u7ba1\u7406\u5458","email":"chenf4hua12@qq.com","mobile":13888888888,"status":0};
// 会员选择回调函数
function func(data) {
    var $ = layui.jquery;
    $('input[name="member"]').val('['+data[0]['id']+']'+data[0]['username']);
}
layui.use(['upload'], function() {
    var $ = layui.jquery, layer = layui.layer, upload = layui.upload;
    /**
     * 附件上传url参数说明
     * @param string $from 来源
     * @param string $group 附件分组,默认sys[系统]，模块格式：m_模块名，插件：p_插件名
     * @param string $water 水印，参数为空默认调用系统配置，no直接关闭水印，image 图片水印，text文字水印
     * @param string $thumb 缩略图，参数为空默认调用系统配置，no直接关闭缩略图，如需生成 500x500 的缩略图，则 500x500多个规格请用";"隔开
     * @param string $thumb_type 缩略图方式
     * @param string $input 文件表单字段名
     */
    upload.render({
        elem: '.layui-upload'
        ,url: '<?php echo url("admin/annex/upload?water=&thumb=&from=&group="); ?>'
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
});
</script>
<!--
/**
 * editor 富文本编辑器
 * @param array $obj 编辑器的容器ID
 * @param string $name [为了方便大家能在系统设置里面灵活选择编辑器，建议不要指定此参数]，目前支持的编辑器[ueditor,umeditor,ckeditor,kindeditor]
 * @param string $upload [选填]附件上传地址
 */
-->
<?php echo editor(['UMeditor1', 'UMeditor2']); ?>
<?php echo editor(['kindeditor1', 'kindeditor2'], 'kindeditor'); ?>
<?php echo editor(['ckeditor', 'ckeditor2'], 'ckeditor'); ?>
<?php echo editor(['UEditor1', 'UEditor2'], 'ueditor'); ?>
<script src="__ADMIN_JS__/footer.js"></script>
    </div>
</div>
<?php break; case "3": ?>

<div class="layui-tab-item layui-show">
    <!--
    +----------------------------------------------------------------------
    | 添加修改实例模板，可直接复制以下代码使用
    | select元素需要加type="select"
    | 所有可编辑的表单元素需要按以下格式添加class名：class="field-字段名"
    +----------------------------------------------------------------------
    -->
    <div class="layui-collapse page-tips">
      <div class="layui-colla-item">
        <h2 class="layui-colla-title">温馨提示</h2>
        <div class="layui-colla-content">
          <p>此页面为后台[添加/修改]标准模板，您可以直接复制使用修改</p>
        </div>
      </div>
    </div>
    <form class="layui-form layui-form-pane" action="<?php echo url(); ?>" id="editForm" method="post">
        <fieldset class="layui-elem-field layui-field-title">
          <legend>表单集合</legend>
        </fieldset>
        <div class="layui-form-item">
            <label class="layui-form-label">角色分组</label>
            <div class="layui-input-inline">
                <select name="role_id" class="field-role_id" type="select">
                    <option value="0">超级管理员</option>
                    <option value="1" selected="">普通管理员</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">用户名</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input field-username" name="username" lay-verify="title" autocomplete="off" placeholder="请输入用户名">
            </div>
            <div class="layui-form-mid layui-word-aux">表单操作提示</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">会员</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input" name="member" lay-verify="" autocomplete="off" placeholder="会员选择">
            </div>
            <a href="<?php echo url('admin/member/pop?callback=func'); ?>" title="选择会员" class="layui-btn layui-btn-primary j-iframe-pop fl">选择会员</a>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">系统图标</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input" id="input-icon" name="icon" lay-verify="" autocomplete="off" placeholder="可自定义或使用系统图标">
            </div>
            <i class="" id="form-icon-preview"></i>
            <a href="<?php echo url('login/icon?input=input-icon&show=form-icon-preview'); ?>" class="layui-btn layui-btn-primary j-iframe-pop fl" title="选择图标">选择图标</a>
        </div>
        <!--图片-->
        <div class="layui-form-item">
            <label class="layui-form-label">图片上传</label>
            <div class="layui-input-inline upload">
                <button type="button" name="upload" class="layui-btn layui-btn-primary layui-upload" lay-type="image" lay-data="{accept:'image'}">请上传图片</button>
                <input type="hidden" class="upload-input" name="image" value="">
                <img src="" style="display:none;border-radius:5px;border:1px solid #ccc" width="36" height="36">
            </div>
            <div class="layui-form-mid layui-word-aux"></div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">昵&nbsp;&nbsp;&nbsp;&nbsp;称</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input field-nick" name="nick" lay-verify="title" autocomplete="off" placeholder="请输入用户名">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">登陆密码</label>
            <div class="layui-input-inline">
                <input type="password" class="layui-input" name="password" lay-verify="password" autocomplete="off" placeholder="******">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">联系邮箱</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input field-email" name="email" lay-verify="title" autocomplete="off" placeholder="请输入邮箱地址">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">联系手机</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input field-mobile" name="mobile" lay-verify="title" autocomplete="off" placeholder="请输入手机号码">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">CKEditor</label>
            <div class="layui-input-block">
                <textarea id="ckeditor" name="content">CKEditor 1</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">CKEditor</label>
            <div class="layui-input-block">
                <textarea id="ckeditor2" name="content">CKEditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">kindEditor</label>
            <div class="layui-input-block">
                <textarea id="kindeditor1" name="content1">kindEditor 1</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">kindEditor</label>
            <div class="layui-input-block">
                <textarea id="kindeditor2" name="content2">kindEditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">UEditor</label>
            <div class="layui-input-block">
                <textarea id="UEditor1" name="content3">kindEditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">UEditor</label>
            <div class="layui-input-block">
                <textarea id="UEditor2" name="content3">kindEditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">UMditor</label>
            <div class="layui-input-block">
                <textarea id="UMeditor1" name="UMditor1">UMditor 1</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">UMditor</label>
            <div class="layui-input-block">
                <textarea id="UMeditor2" name="UMditor2">UMditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">状&nbsp;&nbsp;&nbsp;&nbsp;态</label>
            <div class="layui-input-inline">
                <input type="radio" class="field-status" name="status" value="1" title="启用">
                <input type="radio" class="field-status" name="status" value="0" title="禁用">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <input type="hidden" class="field-id" name="id">
                <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交</button>
                <a href="<?php echo url('index'); ?>" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
            </div>
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
| 添加修改实例模板，Ctrl+A 可直接复制以下代码使用
| select元素需要加type="select"
| 所有可编辑的表单元素需要按以下格式添加class名：class="field-字段名"
+----------------------------------------------------------------------
-->
<div class="layui-collapse page-tips">
  <div class="layui-colla-item">
    <h2 class="layui-colla-title">温馨提示</h2>
    <div class="layui-colla-content">
      <p>此页面为后台[添加/修改]标准模板，您可以直接复制使用修改</p>
    </div>
  </div>
</div>

<form class="layui-form layui-form-pane" action="{:url('')}" id="editForm" method="post">
    <fieldset class="layui-elem-field layui-field-title">
      <legend>表单集合</legend>
    </fieldset>
    <div class="layui-form-item">
        <label class="layui-form-label">角色分组</label>
        <div class="layui-input-inline">
            <select name="role_id" class="field-role_id" type="select">
                <option value="0">超级管理员</option>
                <option value="1" selected="">普通管理员</option>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">用户名</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="username" lay-verify="title" autocomplete="off" placeholder="请输入用户名">
        </div>
        <div class="layui-form-mid layui-word-aux">表单操作提示</div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">会员</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input" name="member" lay-verify="" autocomplete="off" placeholder="会员选择">
        </div>
        <a href="{:url('admin/member/pop?callback=func')}" class="layui-btn layui-btn-primary j-iframe-pop fl">选择会员</a>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">系统图标</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input" id="input-icon" name="icon" lay-verify="" autocomplete="off" placeholder="可自定义或使用系统图标">
        </div>
        <i class="" id="form-icon-preview"></i>
        <a href="{:url('admin/login/icon?input=input-icon&show=form-icon-preview')}" class="layui-btn layui-btn-primary j-iframe-pop fl">选择图标</a>
    </div>
    <!--图片-->
    <div class="layui-form-item">
        <label class="layui-form-label">图片上传</label>
        <div class="layui-input-inline upload">
            <button type="button" name="upload" class="layui-btn layui-btn-primary layui-upload" lay-type="image" lay-data="{accept:'image'}">请上传图片</button>
            <input type="hidden" class="upload-input" name="image" value="">
            <img src="" style="display:none;border-radius:5px;border:1px solid #ccc" width="36" height="36">
        </div>
        <div class="layui-form-mid layui-word-aux"></div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">昵&nbsp;&nbsp;&nbsp;&nbsp;称</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-nick" name="nick" lay-verify="title" autocomplete="off" placeholder="请输入用户名">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">登陆密码</label>
        <div class="layui-input-inline">
            <input type="password" class="layui-input" name="password" lay-verify="password" autocomplete="off" placeholder="******">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">联系邮箱</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-email" name="email" lay-verify="title" autocomplete="off" placeholder="请输入邮箱地址">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">联系手机</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-mobile" name="mobile" lay-verify="title" autocomplete="off" placeholder="请输入手机号码">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">CKEditor</label>
        <div class="layui-input-block">
            <[删除我]textarea id="ckeditor" name="content">CKEditor 1</[删除我]textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">CKEditor</label>
        <div class="layui-input-block">
            <[删除我]textarea id="ckeditor2" name="content">CKEditor 2</[删除我]textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">kindEditor</label>
        <div class="layui-input-block">
            <[删除我]textarea name="content1">kindEditor 1</[删除我]textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">kindEditor</label>
        <div class="layui-input-block">
            <[删除我]textarea name="content2">kindEditor 2</[删除我]textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">UEditor</label>
        <div class="layui-input-block">
            <[删除我]textarea id="UEditor1" name="content3">kindEditor 2</[删除我]textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">UEditor</label>
        <div class="layui-input-block">
            <[删除我]textarea id="UEditor2" name="content3">kindEditor 2</[删除我]textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">UMditor</label>
        <div class="layui-input-block">
            <[删除我]textarea id="UMeditor1" name="UMditor1">UMditor 1</[删除我]textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">UMditor</label>
        <div class="layui-input-block">
            <[删除我]textarea id="UMeditor2" name="UMditor2">UMditor 2</[删除我]textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">状&nbsp;&nbsp;&nbsp;&nbsp;态</label>
        <div class="layui-input-inline">
            <input type="radio" class="field-status" name="status" value="1" title="启用">
            <input type="radio" class="field-status" name="status" value="0" title="禁用">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <input type="hidden" class="field-id" name="id">
            <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交</button>
            <a href="{:url('index')}" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
        </div>
    </div>
</form>

<script>
/* 修改模式下需要将数据放入此变量 */
var formData = {:json_encode($data_info)};
// 会员选择回调函数
function func(data) {
    var $ = layui.jquery;
    $('input[name="member"]').val('['+data[0]['id']+']'+data[0]['username']);
}
layui.use(['upload'], function() {
    var $ = layui.jquery, layer = layui.layer, upload = layui.upload;
    /**
     * 附件上传url参数说明
     * @param string $from 来源
     * @param string $group 附件分组,默认sys[系统]，模块格式：m_模块名，插件：p_插件名
     * @param string $water 水印，参数为空默认调用系统配置，no直接关闭水印，image 图片水印，text文字水印
     * @param string $thumb 缩略图，参数为空默认调用系统配置，no直接关闭缩略图，如需生成 500x500 的缩略图，则 500x500多个规格请用";"隔开
     * @param string $thumb_type 缩略图方式
     * @param string $input 文件表单字段名
     */
    upload.render({
        elem: '.layui-upload'
        ,url: '{:url("admin/annex/upload?water=&thumb=&from=&group=")}'
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
});
</script>

<!--
/**
 * editor 富文本编辑器
 * @param array $obj 编辑器的容器ID
 * @param string $name [为了方便大家能在系统设置里面灵活选择编辑器，建议不要指定此参数]，目前支持的编辑器[ueditor,umeditor,ckeditor,kindeditor]
 * @param string $upload [选填]附件上传地址
 */
-->
{:editor(['UMeditor1', 'UMeditor2'])}
{:editor(['kindeditor1', 'kindeditor2'], 'kindeditor')}
{:editor(['UEditor1', 'UEditor2'], 'ueditor')}
{:editor(['ckeditor', 'ckeditor2'], 'ckeditor')}
<script src="__ADMIN_JS__/footer.js"></script>

    </textarea>
</div>

<script>
/* 修改模式下需要将数据放入此变量 */
var formData = {"id":1,"role_id":1,"nick":"\u8d85\u7ea7\u7ba1\u7406\u5458","email":"chenf4hua12@qq.com","mobile":13888888888,"status":0};
// 会员选择回调函数
function func(data) {
    var $ = layui.jquery;
    $('input[name="member"]').val('['+data[0]['id']+']'+data[0]['username']);
}
layui.use(['upload'], function() {
    var $ = layui.jquery, layer = layui.layer, upload = layui.upload;
    /**
     * 附件上传url参数说明
     * @param string $from 来源
     * @param string $group 附件分组,默认sys[系统]，模块格式：m_模块名，插件：p_插件名
     * @param string $water 水印，参数为空默认调用系统配置，no直接关闭水印，image 图片水印，text文字水印
     * @param string $thumb 缩略图，参数为空默认调用系统配置，no直接关闭缩略图，如需生成 500x500 的缩略图，则 500x500多个规格请用";"隔开
     * @param string $thumb_type 缩略图方式
     * @param string $input 文件表单字段名
     */
    upload.render({
        elem: '.layui-upload'
        ,url: '<?php echo url("admin/annex/upload?water=&thumb=&from=&group="); ?>'
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
});
</script>
<!--
/**
 * editor 富文本编辑器
 * @param array $obj 编辑器的容器ID
 * @param string $name [为了方便大家能在系统设置里面灵活选择编辑器，建议不要指定此参数]，目前支持的编辑器[ueditor,umeditor,ckeditor,kindeditor]
 * @param string $upload [选填]附件上传地址
 */
-->
<?php echo editor(['UMeditor1', 'UMeditor2']); ?>
<?php echo editor(['kindeditor1', 'kindeditor2'], 'kindeditor'); ?>
<?php echo editor(['ckeditor', 'ckeditor2'], 'ckeditor'); ?>
<?php echo editor(['UEditor1', 'UEditor2'], 'ueditor'); ?>
<script src="__ADMIN_JS__/footer.js"></script>
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
    | 添加修改实例模板，可直接复制以下代码使用
    | select元素需要加type="select"
    | 所有可编辑的表单元素需要按以下格式添加class名：class="field-字段名"
    +----------------------------------------------------------------------
    -->
    <div class="layui-collapse page-tips">
      <div class="layui-colla-item">
        <h2 class="layui-colla-title">温馨提示</h2>
        <div class="layui-colla-content">
          <p>此页面为后台[添加/修改]标准模板，您可以直接复制使用修改</p>
        </div>
      </div>
    </div>
    <form class="layui-form layui-form-pane" action="<?php echo url(); ?>" id="editForm" method="post">
        <fieldset class="layui-elem-field layui-field-title">
          <legend>表单集合</legend>
        </fieldset>
        <div class="layui-form-item">
            <label class="layui-form-label">角色分组</label>
            <div class="layui-input-inline">
                <select name="role_id" class="field-role_id" type="select">
                    <option value="0">超级管理员</option>
                    <option value="1" selected="">普通管理员</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">用户名</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input field-username" name="username" lay-verify="title" autocomplete="off" placeholder="请输入用户名">
            </div>
            <div class="layui-form-mid layui-word-aux">表单操作提示</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">会员</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input" name="member" lay-verify="" autocomplete="off" placeholder="会员选择">
            </div>
            <a href="<?php echo url('admin/member/pop?callback=func'); ?>" title="选择会员" class="layui-btn layui-btn-primary j-iframe-pop fl">选择会员</a>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">系统图标</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input" id="input-icon" name="icon" lay-verify="" autocomplete="off" placeholder="可自定义或使用系统图标">
            </div>
            <i class="" id="form-icon-preview"></i>
            <a href="<?php echo url('login/icon?input=input-icon&show=form-icon-preview'); ?>" class="layui-btn layui-btn-primary j-iframe-pop fl" title="选择图标">选择图标</a>
        </div>
        <!--图片-->
        <div class="layui-form-item">
            <label class="layui-form-label">图片上传</label>
            <div class="layui-input-inline upload">
                <button type="button" name="upload" class="layui-btn layui-btn-primary layui-upload" lay-type="image" lay-data="{accept:'image'}">请上传图片</button>
                <input type="hidden" class="upload-input" name="image" value="">
                <img src="" style="display:none;border-radius:5px;border:1px solid #ccc" width="36" height="36">
            </div>
            <div class="layui-form-mid layui-word-aux"></div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">昵&nbsp;&nbsp;&nbsp;&nbsp;称</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input field-nick" name="nick" lay-verify="title" autocomplete="off" placeholder="请输入用户名">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">登陆密码</label>
            <div class="layui-input-inline">
                <input type="password" class="layui-input" name="password" lay-verify="password" autocomplete="off" placeholder="******">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">联系邮箱</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input field-email" name="email" lay-verify="title" autocomplete="off" placeholder="请输入邮箱地址">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">联系手机</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input field-mobile" name="mobile" lay-verify="title" autocomplete="off" placeholder="请输入手机号码">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">CKEditor</label>
            <div class="layui-input-block">
                <textarea id="ckeditor" name="content">CKEditor 1</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">CKEditor</label>
            <div class="layui-input-block">
                <textarea id="ckeditor2" name="content">CKEditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">kindEditor</label>
            <div class="layui-input-block">
                <textarea id="kindeditor1" name="content1">kindEditor 1</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">kindEditor</label>
            <div class="layui-input-block">
                <textarea id="kindeditor2" name="content2">kindEditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">UEditor</label>
            <div class="layui-input-block">
                <textarea id="UEditor1" name="content3">kindEditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">UEditor</label>
            <div class="layui-input-block">
                <textarea id="UEditor2" name="content3">kindEditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">UMditor</label>
            <div class="layui-input-block">
                <textarea id="UMeditor1" name="UMditor1">UMditor 1</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">UMditor</label>
            <div class="layui-input-block">
                <textarea id="UMeditor2" name="UMditor2">UMditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">状&nbsp;&nbsp;&nbsp;&nbsp;态</label>
            <div class="layui-input-inline">
                <input type="radio" class="field-status" name="status" value="1" title="启用">
                <input type="radio" class="field-status" name="status" value="0" title="禁用">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <input type="hidden" class="field-id" name="id">
                <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交</button>
                <a href="<?php echo url('index'); ?>" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
            </div>
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
| 添加修改实例模板，Ctrl+A 可直接复制以下代码使用
| select元素需要加type="select"
| 所有可编辑的表单元素需要按以下格式添加class名：class="field-字段名"
+----------------------------------------------------------------------
-->
<div class="layui-collapse page-tips">
  <div class="layui-colla-item">
    <h2 class="layui-colla-title">温馨提示</h2>
    <div class="layui-colla-content">
      <p>此页面为后台[添加/修改]标准模板，您可以直接复制使用修改</p>
    </div>
  </div>
</div>

<form class="layui-form layui-form-pane" action="{:url('')}" id="editForm" method="post">
    <fieldset class="layui-elem-field layui-field-title">
      <legend>表单集合</legend>
    </fieldset>
    <div class="layui-form-item">
        <label class="layui-form-label">角色分组</label>
        <div class="layui-input-inline">
            <select name="role_id" class="field-role_id" type="select">
                <option value="0">超级管理员</option>
                <option value="1" selected="">普通管理员</option>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">用户名</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="username" lay-verify="title" autocomplete="off" placeholder="请输入用户名">
        </div>
        <div class="layui-form-mid layui-word-aux">表单操作提示</div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">会员</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input" name="member" lay-verify="" autocomplete="off" placeholder="会员选择">
        </div>
        <a href="{:url('admin/member/pop?callback=func')}" class="layui-btn layui-btn-primary j-iframe-pop fl">选择会员</a>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">系统图标</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input" id="input-icon" name="icon" lay-verify="" autocomplete="off" placeholder="可自定义或使用系统图标">
        </div>
        <i class="" id="form-icon-preview"></i>
        <a href="{:url('admin/login/icon?input=input-icon&show=form-icon-preview')}" class="layui-btn layui-btn-primary j-iframe-pop fl">选择图标</a>
    </div>
    <!--图片-->
    <div class="layui-form-item">
        <label class="layui-form-label">图片上传</label>
        <div class="layui-input-inline upload">
            <button type="button" name="upload" class="layui-btn layui-btn-primary layui-upload" lay-type="image" lay-data="{accept:'image'}">请上传图片</button>
            <input type="hidden" class="upload-input" name="image" value="">
            <img src="" style="display:none;border-radius:5px;border:1px solid #ccc" width="36" height="36">
        </div>
        <div class="layui-form-mid layui-word-aux"></div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">昵&nbsp;&nbsp;&nbsp;&nbsp;称</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-nick" name="nick" lay-verify="title" autocomplete="off" placeholder="请输入用户名">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">登陆密码</label>
        <div class="layui-input-inline">
            <input type="password" class="layui-input" name="password" lay-verify="password" autocomplete="off" placeholder="******">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">联系邮箱</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-email" name="email" lay-verify="title" autocomplete="off" placeholder="请输入邮箱地址">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">联系手机</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-mobile" name="mobile" lay-verify="title" autocomplete="off" placeholder="请输入手机号码">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">CKEditor</label>
        <div class="layui-input-block">
            <[删除我]textarea id="ckeditor" name="content">CKEditor 1</[删除我]textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">CKEditor</label>
        <div class="layui-input-block">
            <[删除我]textarea id="ckeditor2" name="content">CKEditor 2</[删除我]textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">kindEditor</label>
        <div class="layui-input-block">
            <[删除我]textarea name="content1">kindEditor 1</[删除我]textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">kindEditor</label>
        <div class="layui-input-block">
            <[删除我]textarea name="content2">kindEditor 2</[删除我]textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">UEditor</label>
        <div class="layui-input-block">
            <[删除我]textarea id="UEditor1" name="content3">kindEditor 2</[删除我]textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">UEditor</label>
        <div class="layui-input-block">
            <[删除我]textarea id="UEditor2" name="content3">kindEditor 2</[删除我]textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">UMditor</label>
        <div class="layui-input-block">
            <[删除我]textarea id="UMeditor1" name="UMditor1">UMditor 1</[删除我]textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">UMditor</label>
        <div class="layui-input-block">
            <[删除我]textarea id="UMeditor2" name="UMditor2">UMditor 2</[删除我]textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">状&nbsp;&nbsp;&nbsp;&nbsp;态</label>
        <div class="layui-input-inline">
            <input type="radio" class="field-status" name="status" value="1" title="启用">
            <input type="radio" class="field-status" name="status" value="0" title="禁用">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <input type="hidden" class="field-id" name="id">
            <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交</button>
            <a href="{:url('index')}" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
        </div>
    </div>
</form>

<script>
/* 修改模式下需要将数据放入此变量 */
var formData = {:json_encode($data_info)};
// 会员选择回调函数
function func(data) {
    var $ = layui.jquery;
    $('input[name="member"]').val('['+data[0]['id']+']'+data[0]['username']);
}
layui.use(['upload'], function() {
    var $ = layui.jquery, layer = layui.layer, upload = layui.upload;
    /**
     * 附件上传url参数说明
     * @param string $from 来源
     * @param string $group 附件分组,默认sys[系统]，模块格式：m_模块名，插件：p_插件名
     * @param string $water 水印，参数为空默认调用系统配置，no直接关闭水印，image 图片水印，text文字水印
     * @param string $thumb 缩略图，参数为空默认调用系统配置，no直接关闭缩略图，如需生成 500x500 的缩略图，则 500x500多个规格请用";"隔开
     * @param string $thumb_type 缩略图方式
     * @param string $input 文件表单字段名
     */
    upload.render({
        elem: '.layui-upload'
        ,url: '{:url("admin/annex/upload?water=&thumb=&from=&group=")}'
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
});
</script>

<!--
/**
 * editor 富文本编辑器
 * @param array $obj 编辑器的容器ID
 * @param string $name [为了方便大家能在系统设置里面灵活选择编辑器，建议不要指定此参数]，目前支持的编辑器[ueditor,umeditor,ckeditor,kindeditor]
 * @param string $upload [选填]附件上传地址
 */
-->
{:editor(['UMeditor1', 'UMeditor2'])}
{:editor(['kindeditor1', 'kindeditor2'], 'kindeditor')}
{:editor(['UEditor1', 'UEditor2'], 'ueditor')}
{:editor(['ckeditor', 'ckeditor2'], 'ckeditor')}
<script src="__ADMIN_JS__/footer.js"></script>

    </textarea>
</div>

<script>
/* 修改模式下需要将数据放入此变量 */
var formData = {"id":1,"role_id":1,"nick":"\u8d85\u7ea7\u7ba1\u7406\u5458","email":"chenf4hua12@qq.com","mobile":13888888888,"status":0};
// 会员选择回调函数
function func(data) {
    var $ = layui.jquery;
    $('input[name="member"]').val('['+data[0]['id']+']'+data[0]['username']);
}
layui.use(['upload'], function() {
    var $ = layui.jquery, layer = layui.layer, upload = layui.upload;
    /**
     * 附件上传url参数说明
     * @param string $from 来源
     * @param string $group 附件分组,默认sys[系统]，模块格式：m_模块名，插件：p_插件名
     * @param string $water 水印，参数为空默认调用系统配置，no直接关闭水印，image 图片水印，text文字水印
     * @param string $thumb 缩略图，参数为空默认调用系统配置，no直接关闭缩略图，如需生成 500x500 的缩略图，则 500x500多个规格请用";"隔开
     * @param string $thumb_type 缩略图方式
     * @param string $input 文件表单字段名
     */
    upload.render({
        elem: '.layui-upload'
        ,url: '<?php echo url("admin/annex/upload?water=&thumb=&from=&group="); ?>'
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
});
</script>
<!--
/**
 * editor 富文本编辑器
 * @param array $obj 编辑器的容器ID
 * @param string $name [为了方便大家能在系统设置里面灵活选择编辑器，建议不要指定此参数]，目前支持的编辑器[ueditor,umeditor,ckeditor,kindeditor]
 * @param string $upload [选填]附件上传地址
 */
-->
<?php echo editor(['UMeditor1', 'UMeditor2']); ?>
<?php echo editor(['kindeditor1', 'kindeditor2'], 'kindeditor'); ?>
<?php echo editor(['ckeditor', 'ckeditor2'], 'ckeditor'); ?>
<?php echo editor(['UEditor1', 'UEditor2'], 'ueditor'); ?>
<script src="__ADMIN_JS__/footer.js"></script>
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