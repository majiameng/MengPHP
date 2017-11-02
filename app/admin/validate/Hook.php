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
namespace app\admin\validate;

use think\Validate;

/**
 * 钩子验证器
 * @package app\admin\validate
 */
class Hook extends Validate
{
    //定义验证规则
    protected $rule = [
        // 'name|钩子名称' => 'require|unique:admin_hook',
    ];
}
