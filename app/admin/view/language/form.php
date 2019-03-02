<form class="layui-form layui-form-pane" action="{:url()}" method="post" id="editForm">
<div class="page-form">
    <div class="layui-form-item">
        <label class="layui-form-label">语言名称</label>
        <div class="layui-input-inline w200">
            <input type="text" class="layui-input field-name" name="name" lay-verify="required" autocomplete="off" placeholder="请填写语言名称">
        </div>
        <div class="layui-form-mid layui-word-aux">长度建议控制在2-5个字符</div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">语言代码</label>
        <div class="layui-input-inline w200">
            <input type="text" class="layui-input field-code" name="code" lay-verify="required" autocomplete="off" placeholder="请填写语言代码">
        </div>
        <div class="layui-form-mid layui-word-aux">例如：中文，填写 zh-cn</div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">本地化</label>
        <div class="layui-input-inline w200">
            <input type="text" class="layui-input field-locale" name="locale" lay-verify="required" autocomplete="off" placeholder="请填写本地化代码">
        </div>
        <div class="layui-form-mid layui-word-aux">例如: en_US.UTF-8,en_US,en-gb,en_gb,english</div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">状态设置</label>
        <div class="layui-input-inline">
            <input type="radio" class="field-status" name="status" value="1" title="启用" checked>
            <input type="radio" class="field-status" name="status" value="0" title="禁用">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">上传语言包</label>
        <div class="layui-input-inline upload">
            <button type="button" name="upload" class="layui-btn layui-btn-primary layui-upload" lay-data="{exts:'zip', accept:'file'}">请上传语言包(zip)</button>
            <input type="hidden" class="upload-input field-pack" name="pack" value="">
        </div>
        <div class="layui-form-mid layui-word-aux">如果不上传语言包，则后台不支持切换到此语言包，<span class="red">请确认/app/admin/lang/ 和 /app/admin/lang/有读写权限</span></div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">排序</label>
        <div class="layui-input-inline w200">
            <input type="text" class="layui-input field-sort" name="sort" lay-verify="required" autocomplete="off" value="1">
        </div>
        <div class="layui-form-mid layui-word-aux">数字越小越靠前</div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <input type="hidden" class="field-id" name="id">
            <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交</button>
            <a href="{:url('index')}" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
        </div>
    </div>
</div>
</form>
<script>
var formData = {:json_encode($data_info)};
layui.use(['jquery', 'upload'], function() {
    var $ = layui.jquery, layer = layui.layer, upload = layui.upload;
    upload.render({
        elem: '.layui-upload'
        ,url: '{:url("admin/annex/upload?thumb=no&water=no")}'
        ,method: 'post'
        ,before: function(input) {
            layer.msg('文件上传中...', {time:3000000});
        },done: function(res, index, upload) {
            var obj = this.item;
            if (res.code == 0) {
                layer.msg(res.msg);
                return false;
            }
            layer.msg('文件上传成功');
            var input = $(obj).parents('.upload').find('.upload-input');
            input.val(res.data.file);
        }
    });
});
</script>
<script src="__ADMIN_JS__/footer.js"></script>