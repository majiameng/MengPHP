{include file="index/head" /}
<style type="text/css">
.layui-table td, .layui-table th{text-align:left;}
.layui-table tbody tr.no{background-color:#f00;color:#fff;}
</style>
<div class="header">
    <h1>感谢您选择{:config('hisiphp.name')}</h1>
</div>
<div class="install-box">
    <fieldset class="layui-elem-field layui-field-title">
        <legend>数据库配置</legend>
    </fieldset>
    <form class="layui-form layui-form-pane" action="?step=4" method="post">
        <div class="layui-form-item">
            <label class="layui-form-label">服务器地址</label>
            <div class="layui-input-inline w200">
                <input type="text" class="layui-input" name="hostname" lay-verify="title" value="127.0.0.1">
            </div>
            <div class="layui-form-mid layui-word-aux">数据库服务器地址，一般为127.0.0.1</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">数据库端口</label>
            <div class="layui-input-inline w200">
                <input type="text" class="layui-input" name="hostport" lay-verify="title" value="3306">
            </div>
            <div class="layui-form-mid layui-word-aux">系统数据库端口，一般为3306</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">数据库名称</label>
            <div class="layui-input-inline w200">
                <input type="text" class="layui-input" name="database" lay-verify="title">
            </div>
            <div class="layui-form-mid layui-word-aux">系统数据库名,必须包含字母</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">数据库账号</label>
            <div class="layui-input-inline w200">
                <input type="text" class="layui-input" name="username" lay-verify="title">
            </div>
            <div class="layui-form-mid layui-word-aux">连接数据库的用户名</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">数据库密码</label>
            <div class="layui-input-inline w200">
                <input type="password" class="layui-input" name="password" lay-verify="title">
            </div>
            <div class="layui-form-mid layui-word-aux">连接数据库的密码</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">数据库前缀</label>
            <div class="layui-input-inline w200">
                <input type="text" class="layui-input" name="prefix" lay-verify="title" value="meng_">
            </div>
            <div class="layui-form-mid layui-word-aux">建议使用默认,数据库前缀必须带 '_'</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">覆盖数据库</label>
            <div class="layui-input-inline w200">
                <input type="radio" name="cover" value="1" title="覆盖">
                <input type="radio" name="cover" value="0" title="不覆盖" checked>
            </div>
            <div class="layui-form-mid layui-word-aux">建议使用默认,数据库前缀必须带 '_'</div>
        </div>
        <div class="layui-form-item">
            <button type="submit" class="layui-btn fl" style="margin-left:120px;" lay-submit="" lay-filter="formSubmit">测试数据库连接</button>
        </div>
    </form>
    <form class="layui-form layui-form-pane" action="?step=5" method="post">
        <fieldset class="layui-elem-field layui-field-title">
            <legend>管理账号设置</legend>
        </fieldset>
        <div class="layui-form-item">
            <label class="layui-form-label">管理员账号</label>
            <div class="layui-input-inline w200">
                <input type="text" class="layui-input" name="account" lay-verify="title">
            </div>
            <div class="layui-form-mid layui-word-aux">管理员账号最少4位</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">管理员密码</label>
            <div class="layui-input-inline w200">
                <input type="password" class="layui-input" name="password" lay-verify="title">
            </div>
            <div class="layui-form-mid layui-word-aux">保证密码最少6位</div>
        </div>
        <div class="step-btns">
            <a href="?step=2" class="layui-btn layui-btn-primary layui-btn-big fl">返回上一步</a>
            <button type="submit" class="layui-btn layui-btn-big layui-btn-normal fr" lay-submit="" lay-filter="formSubmit">立即执行安装</button>
        </div>
    </form>
</div>
{include file="index/foot" /}
