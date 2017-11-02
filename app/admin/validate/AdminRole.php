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
 * 角色验证器
 * @package app\admin\validate
 */
class AdminRole extends Validate
{
    //定义验证规则
    protected $rule = [
        'name|角色名称' => 'require|unique:admin_role',
        'auth|设置权限'    => 'require',
        'status|状态设置'  => 'require|in:0,1',
    ];

    //定义验证提示
    protected $message = [
        'name.require' => '请输入角色名称',
        'name.unique' => '角色名称已存在',
        'auth.require'    => '请设置权限',
        'status.require'    => '请设置角色状态',
    ];
}
