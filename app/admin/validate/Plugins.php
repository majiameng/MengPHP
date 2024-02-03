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
namespace app\admin\validate;

use think\Validate;

/**
 * 插件验证器
 * @package app\admin\validate
 */
class Plugins extends Validate
{
    //定义验证规则
    protected $rule = [
        'name|插件名' => 'require|unique:admin_plugins',
        'title|插件标题'    => 'require',
        'identifier|插件标识'  => 'require|unique:admin_plugins',
    ];
}
