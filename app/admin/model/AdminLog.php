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
namespace app\admin\model;

use app\common\model\Common;

/**
 * 后台日志模型
 * @package app\admin\model
 */
class AdminLog extends Common
{

    public function username()
    {
        return $this->belongsTo('AdminUser', 'uid', 'id')->field('nick');
    }
}
