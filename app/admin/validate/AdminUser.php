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
 * 用户验证器
 * @package app\admin\validate
 */
class AdminUser extends Validate
{
    //定义验证规则
    protected $rule = [
        'username|用户名' => 'require|alphaNum|unique:admin_user',
        'nick|昵称'       => 'require|unique:admin_user',
        'role_id|角色'    => 'requireWith:role_id|notIn:0,1',
        'email|邮箱'     => 'requireWith:email|email|unique:admin_user',
        'password|密码'  => 'require|length:6,20',
        'mobile|手机号'   => 'requireWith:mobile|regex:^1\d{10}',
    ];

    //定义验证提示
    protected $message = [
        'username.require' => '请输入用户名',
        'role_id.require'  => '请选择角色分组',
        'role_id.notIn'    => '禁止设置为超级管理员',
        'email.require'    => '邮箱不能为空',
        'email.email'      => '邮箱格式不正确',
        'email.unique'     => '该邮箱已存在',
        'password.require' => '密码不能为空',
        'password.length'  => '密码长度6-20位',
        'mobile.regex'     => '手机号不正确',
    ];

    //定义验证场景
    protected $scene = [
        //更新
        'update'  =>  ['username', 'email', 'password' => 'length:6,20', 'mobile', 'role_id'],
        //更新个人信息
        'info'  =>  ['username', 'email', 'password' => 'length:6,20', 'mobile'],
        //登录
        'login'  =>  ['username' => 'require|alphaNum|token', 'password'],
    ];
}
