<title>管理控制台 -  Powered by {:config('mengphp.name')}</title>
<meta http-equiv="Access-Control-Allow-Origin" content="*">
<link rel="stylesheet" href="__PUBLIC_LAYUI__/css/layui.css">
<link rel="stylesheet" href="__ADMIN_CSS__/style.css">
<link rel="stylesheet" href="__STATIC__/fonts/font-awesome/min.css">
<div style="display:block;width:100%;overflow:hidden;">
</div>
<div class="layui-tab layui-tab-card">
    <ul class="layui-tab-title">
        <li class="layui-this">后台首页</li>
    </ul>
    <div class="layui-tab-content">
        <div class="layui-tab-item layui-show">

            <div class="layui-row">
                <div class="layui-col-xs12 layui-col-sm6 layui-col-md6">
                    <table class="layui-table" lay-skin="line">
                        <colgroup>
                            <col width="160">
                            <col>
                        </colgroup>
                        <thead>
                        <tr>
                            <th colspan="2">系统信息</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>系统版本</td>
                            <td>MengPHP v{:config('mengphp.version')}</td>
                        </tr>
                        <tr>
                            <td>服务器环境</td>
                            <td>{$Think.const.PHP_OS} / {$_SERVER["SERVER_SOFTWARE"]}</td>
                        </tr>
                        <tr>
                            <td>PHP/MySql版本</td>
                            <td>PHP {$Think.const.PHP_VERSION} / MySql {:db()->query('select version() as version')[0]['version']}</td>
                        </tr>
                        <tr>
                            <td>ThinkPHP版本</td>
                            <td>{$Think.VERSION}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="layui-col-xs12 layui-col-sm6 layui-col-md6">

                    <table class="layui-table" lay-skin="line">
                        <colgroup>
                            <col width="160">
                            <col>
                        </colgroup>
                        <thead>
                        <tr>
                            <th colspan="2">产品信息</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>产品名称</td>
                            <td>MengPHP开发框架(简单.快速、高效.稳定)</td>
                        </tr>
                        <tr>
                            <td>官方网站</td>
                            <td><a href="http://www.majiemeng.com" target="_blank" rel="noreferrer">http://www.majiameng.com</a></td>
                        </tr>
                        <tr>
                            <td>官方QQ群</td>
                            <td>暂无
                                <!--<a href="http://shang.qq.com/wpa/qunwpa?idkey=f70e4d4e0ad2ed6ad67a8b467475e695b286d536c7ff850db945542188871fc6" target="_blank" rel="noreferrer">群①：50304283</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://shang.qq.com/wpa/qunwpa?idkey=7f77ff420f91ae529eef4045557d25553f3362f4c076d575a09974396597c88c" target="_blank" rel="noreferrer">群②：640279557</a>-->
                            </td>
                        </tr>
                        <tr>
                            <td>联系我们</td>
                            <td><a href="mailto:666@majiameng.com" target="_blank" rel="noreferrer">666@majiameng.com</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="__PUBLIC_LAYUI__/layui.js"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
<script>
    layui.use('element', function(){
        var $ = layui.jquery,element = layui.element; //Tab的切换功能，切换事件监听等
    });
</script>