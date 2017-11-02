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
namespace app\common\controller;
/**
 * 插件类
 * @package app\common\controller
 */
abstract class Plugins
{
    /**
     * @var string 错误信息
     */
    protected $error = '';

    /**
     * 获取错误信息
     * @return string
     */
    final public function getError()
    {
        return $this->error;
    }

    /**
     * 必须实现安装方法
     * @return mixed
     */
    abstract public function install();

    /**
     * 必须实现卸载方法
     * @return mixed
     */
    abstract public function uninstall();
}
