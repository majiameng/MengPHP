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
 * 等级验证器
 * @package app\common\validate
 */
class AdminMemberLevel extends Validate
{
    //定义验证规则
    protected $rule = [
        'name|等级名称' => 'require|unique:admin_member_level',
        'status|状态设置'  => 'require|in:0,1',
    ];

    //定义验证提示
    protected $message = [
        'name.require' => '请填写等级名称',
        'name.unique' => '等级名称已存在',
        'status.require'    => '请设置等级状态',
    ];
}
