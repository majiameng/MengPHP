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
namespace app\admin\controller;
use think\facade\View;

/**
 * 后台默认首页控制器
 * @package app\admin\controller
 */
class Index extends Admin
{
    public $layout_off_action = ['index'];
    /**
     * 首页
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    public function index()
    {
        return View::fetch('index/index');
    }


    /**
     * 首页 页面
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     * @return mixed
     */
    public function index_page()
    {
        return View::fetch('index/index_page');
    }


}
