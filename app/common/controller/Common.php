<?php
/**
 * +------------------------------------------------------
 * | Copyright (c) 2016-2018 http://www.majiameng.com
 * +------------------------------------------------------
 * | MengPHP后台框架[基于ThinkPHP8开发]
 * +------------------------------------------------------
 * | Author: 马佳萌 <666@majiameng.com>,QQ:879042886
 * +------------------------------------------------------
 * | DateTime: 2023/10/01 12:14
 * +------------------------------------------------------
 */
namespace app\common\controller;

use app\BaseController;
use think\facade\View;

/**
 * 项目公共控制器
 * @package app\common\controller
 */
class Common extends BaseController
{
    /**
     * 渲染后台模板
     * 模块区分前后台时需用此方法
     * @param string $template 模板路径
     * @author 马佳萌 <666@majiameng.com>
     * @return string
     */
    protected function afetch($template = '') {
        if ($template) {
            return View::fetch($template);
        }
        $dispatch = request()->dispatch();
        if (!$dispatch['module'][2]) {
            $dispatch['module'][2] = 'index';
        }
        return View::fetch($dispatch['module'][1].DIRECTORY_SEPARATOR.$dispatch['module'][2]);
    }

    /**
     * 渲染插件模板
     * @param string $template 模板名称
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    final protected function pfetch($template = '', $vars = [])
    {
        $plugin = $_GET['_p'];
        $controller = $_GET['_c'];
        $action = $_GET['_a'];
        $template = $template ? $template : $controller.'/'.$action;
        if(defined('ENTRANCE') && ENTRANCE == 'admin') {
            $template = 'admin/'.$template;
        }
        $template_path = strtolower("plugins/{$plugin}/view/{$template}.".config('template.view_suffix'));
        return View::fetch($template_path, $vars);
    }
}