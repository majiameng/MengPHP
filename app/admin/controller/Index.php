<?php
/**
 * +------------------------------------------------------
 * | Copyright (c) 2016-2018 http://www.majiameng.com
 * +------------------------------------------------------
 * | MengPHP后台框架[基于ThinkPHP5开发]
 * +------------------------------------------------------
 * | Author: 马佳萌 <666@majiameng.com>,QQ:879042886
 * +------------------------------------------------------
 * | DateTime: 2017/1/26 12:14
 * +------------------------------------------------------
 */
namespace app\admin\controller;
use app\common\util\Dir;

/**
 * 后台默认首页控制器
 * @package app\admin\controller
 */
class Index extends Admin
{
    /**
     * 首页
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    public function index()
    {
        return $this->fetch('index/index');
    }


    /**
     * 首页 页面
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     * @return mixed
     */
    public function index_page()
    {
        return $this->fetch('index/index_page');
    }


}
