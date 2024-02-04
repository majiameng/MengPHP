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
/**
 * 系统扩展配置，非TP框架配置
 */
return [
    // +----------------------------------------------------------------------
    // | 系统相关设置
    // +----------------------------------------------------------------------
    // 系统数据表
    'tables'            => [
        'admin_config', 
        'admin_menu', 
        'admin_module', 
        'admin_role', 
        'admin_user',
        'admin_hook',
        'admin_hook_plugins',
        'admin_plugins',
        'admin_member',
        'admin_member_level',
    ],
    // 系统会员等级，此处只为声明配置，app/common/behavior/Base.php 里面赋值
    'member_level'      => [],
    // 系统设置分组
    'config_group'      => [
        'base'      => '基础',
        'sys'       => '系统',
        'upload'    => '上传',
        'develop'   => '开发',
        'databases'  => '数据库',
    ],
    // 系统标准模块
    'modules' => ['admin', 'common', 'index', 'install', 'mengphp', 'plugin'],
    // 系统标准配置文件
    'config' => ['app', 'cache', 'captcha', 'console', 'cookie', 'database', 'filesystem', 'jump', 'lang', 'log', 'mengphp_auth', 'middleware', 'route', 'session', 'system', 'trace', 'view'],
];