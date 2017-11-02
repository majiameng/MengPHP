<form class="layui-form" action="{:url()}" method="post">
<div class="layui-tab-item layui-show layui-form-pane">
    <div class="layui-form-item">
        <label class="layui-form-label">角色名称</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-name" name="name" lay-verify="required" autocomplete="off" placeholder="请输入角色名称">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">角色简介</label>
        <div class="layui-input-inline">
            <textarea  class="layui-textarea field-intro" name="intro" lay-verify="" autocomplete="off" placeholder="[选填]角色简介"></textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">角色状态</label>
        <div class="layui-input-inline">
            <input type="radio" class="field-status" name="status" value="1" title="启用" checked>
            <input type="radio" class="field-status" name="status" value="0" title="禁用">
        </div>
    </div>
</div>
<div class="layui-tab-item layui-form">
    <div class="layui-form-item role-list-form">
    {volist name="menu_list" id="v"}
        <dl class="role-list-form-top">
            <dt><input type="checkbox" name="auth[]" lay-filter="roleAuth" value="{$v['id']}" data-parent="0" data-level="1" lay-skin="primary" title="{$v['title']}"></dt>
            <dd>
                {volist name="v['childs']" id="vv"}
                <dl>
                    <dt><input type="checkbox" name="auth[]" lay-filter="roleAuth" value="{$vv['id']}" data-pid="{$vv['pid']}" data-level="2" lay-skin="primary" title="{$vv['title']}"></dt>
                    <dd>
                        {volist name="vv['childs']" id="vvv"}
                        <dl>
                            <dt><input type="checkbox" name="auth[]" lay-filter="roleAuth" value="{$vvv['id']}" data-pid="{$vvv['pid']}" data-level="3" lay-skin="primary" title="{$vvv['title']}"></dt>
                            <dd>
                                {volist name="vvv['childs']" id="vvvv"}
                                    <input type="checkbox" name="auth[]" lay-filter="roleAuth" value="{$vvvv['id']}" data-pid="{$vvvv['pid']}" data-level="4" lay-skin="primary" title="{$vvvv['title']}">
                                {/volist}
                            </dd>
                        </dl>
                        {/volist}
                    </dd>
                </dl>
                {/volist}
            </dd>
        </dl>
    {/volist}
    </div>
</div>
<div class="layui-form-item">
    <div class="layui-input-block">
        <input type="hidden" class="field-id" name="id">
        <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交</button>
        <a href="{:url('role')}" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
    </div>
</div>
</form>
<script>
var formData = {:json_encode($data_info)};
layui.use(['form'], function() {
    var $ = layui.jquery, form = layui.form;
    /* 有BUG 待完善*/
    form.on('checkbox(roleAuth)', function(data) {
        var child = $(data.elem).parent('dt').siblings('dd').find('input');
        /* 自动选中父节点 */
        var check_parent = function (id) {
            var self = $('.role-list-form input[value="'+id+'"]');
            var pid = self.attr('data-pid') || '';
            self.prop('checked', true);
            if (pid == '') {
                return false;
            }
            check_parent(pid);
        };
        /* 自动选中子节点 */
        child.each(function(index, item) {
            item.checked = data.elem.checked;
        });
        check_parent($(data.elem).attr('data-pid'));
        form.render('checkbox');
    });

    /* 权限赋值 */
    if (formData) {
        for(var i in formData['auth']) {
            $('.role-list-form input[value="'+formData['auth'][i]+'"]').prop('checked', true);
        }
        form.render('checkbox');
    }
});
</script>
<script src="__ADMIN_JS__/footer.js"></script>