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
namespace app\admin\model;

use think\Model;
use app\admin\model\AdminUser as UserModel;
/**
 * 后台日志模型
 * @package app\admin\model
 */
class AdminLog extends Model
{
    // 定义时间戳字段名
    protected $createTime = 'ctime';
    protected $updateTime = 'mtime';

    // 自动写入时间戳
    protected $autoWriteTimestamp = true;
    
    public function username()
    {
        return $this->belongsTo('AdminUser', 'uid', 'id')->field('nick');
    }
}
