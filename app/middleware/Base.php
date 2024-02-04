<?php
declare (strict_types = 1);

namespace app\middleware;

use app\admin\model\AdminConfig as ConfigModel;
use app\admin\model\AdminMemberLevel;
use think\facade\Config;
use think\facade\Lang;
use think\facade\Route;

class Base
{
    /**
     * 处理请求
     *
     * @param \think\Request $request
     * @param \Closure       $next
     * @return Response
     */
    public function handle($request, \Closure $next)
    {
        $module = app('http')->getName();// 获取当前模块名称
        $controller = request()->controller();
        $action = $request->action();

        // 系统版本
        $version = include_once(root_path().'version.php');
        config($version['mengphp'],'mengphp');

        // 安装操作直接return
        if(defined('BIND_MODULE') && BIND_MODULE == 'install') return;

        // 设置系统配置
        $configAll = ConfigModel::getConfig();
        foreach ($configAll as $name=>$config){
            config($config,$name);
        }

        // 判断模块是否存在且已安装
        $theme = 'default';
        if ($module != 'index' && !defined('ENTRANCE')) {
            if (empty($module)) {
                $module = config('app.default_module');
            }
        }
        // 获取站点根目录
        $root_dir = request()->baseFile();
        $root_dir  = preg_replace(['/index.php$/', '/plugins.php$/', '/'.config('sys.admin_path').'$/'], ['', '', ''], $root_dir);
        define('ROOT_DIR', $root_dir);

        //静态目录扩展配置
        $view_replace_str = [
            // 站点根目录
            '__ROOT_DIR__'    => ROOT_DIR,
            // 静态资源根目录
            '__STATIC__'    => ROOT_DIR.'static',
            // 文件上传目录
            '__UPLOAD__'   => ROOT_DIR.'upload',
            // 插件目录
            '__PLUGINS__' => ROOT_DIR.'plugins',
            // 后台公共静态目录
            '__ADMIN_CSS__'      => ROOT_DIR.'static/admin/css',
            '__ADMIN_JS__'      => ROOT_DIR.'static/admin/js',
            '__ADMIN_IMG__'      => ROOT_DIR.'static/admin/image',
            // 后台模块静态目录
            '__ADMIN_MOD_CSS__'      => ROOT_DIR.'static/'.$module.'/css',
            '__ADMIN_MOD_JS__'      => ROOT_DIR.'static/'.$module.'/js',
            '__ADMIN_MOD_IMG__'      => ROOT_DIR.'static/'.$module.'/image',
            // 前台公共静态目录
            '__PUBLIC_CSS__'      => ROOT_DIR.'static/css',
            '__PUBLIC_JS__'      => ROOT_DIR.'static/js',
            '__PUBLIC_IMG__'      => ROOT_DIR.'static/image',
            '__PUBLIC_LAYER__'      => ROOT_DIR.'static/js/layer/layer-v3.1.0',
            '__PUBLIC_LAYUI__'      => ROOT_DIR.'static/js/layui/layui-v2.1.5',
            // 前台模块静态目录
            '__CSS__'      => ROOT_DIR.'theme/'.$module.'/'.$theme.'/static/css',
            '__JS__'      => ROOT_DIR.'theme/'.$module.'/'.$theme.'/static/js',
            '__IMG__'      => ROOT_DIR.'theme/'.$module.'/'.$theme.'/static/image',
        ];
        if (defined('PLUGIN_ENTRANCE')) {
            $plugins_name = isset($_GET['_p']) ? $_GET['_p'] : $action;
            $view_replace_str = array_merge($view_replace_str, [
                '__PLUGINS_CSS__' => ROOT_DIR.'plugins/'.$plugins_name.'/static/css',
                '__PLUGINS_JS__' => ROOT_DIR.'plugins/'.$plugins_name.'/static/js',
                '__PLUGINS_IMG__' => ROOT_DIR.'plugins/'.$plugins_name.'/static/image',
            ]);
        }
        config(['tpl_replace_string'=>$view_replace_str],'view');

        // 如果定义了入口为admin，则修改默认的访问控制器层
        if(defined('ENTRANCE') && ENTRANCE == 'admin') {
            if ($module == '') {
                header('Location: '.url('admin/login/index'));
                exit;
            }
            if ($module != 'admin' && $module != 'common' && $module != 'index' && $module != 'extra') {
                config('admin','url_controller_layer');
                // 后台模板路径保持系统默认
                config('','template.view_path');
            }

            // 设置后台默认语言到cookie
            if (isset($_GET['lang']) && !empty($_GET['lang'])) {
                cookie('admin_language', $_GET['lang']);
            } elseif (cookie('admin_language')) {
                Lang::setLangSet(cookie('admin_language'));
            } else {
                cookie('admin_language', config('lang.default_lang'));
            }

        } else {
            if (empty($module)) {
                $module = config('default_module');
            }

            if (config('base.site_status') != 1) {
                echo '站点已关闭！';
                exit;
            }
            // 设置前台默认语言到cookie
            if (isset($_GET['lang']) && !empty($_GET['lang'])) {
                cookie('_language', $_GET['lang']);
            } elseif (cookie('_language')) {
                Lang::setLangSet(cookie('_language'));
            } else {
                cookie('_language', Lang::getLangSet());
            }
        }

        // 会员等级缓存
        $member_level = cache('system_member_level');
        if (empty($member_level)) {
            $member_level = AdminMemberLevel::select()->toArray();
            cache('system_member_level', $member_level);
        }
        Config::set(['member_level'=>$member_level],'meng_system');
        return $next($request);
    }
}
