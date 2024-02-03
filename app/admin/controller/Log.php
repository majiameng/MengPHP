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
namespace app\admin\controller;
use app\admin\model\AdminLog as LogModel;
use think\facade\View;

/**
 * 日志管理控制器
 * @package app\admin\controller
 */
class Log extends Admin
{
    /**
     * 日志首页
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    public function index()
    {
        $uid = input('param.uid/d');
        $map = [];
        if ($uid) {
            $map['uid'] = $uid;
        }
        $data_list = LogModel::where($map)->paginate();
        // 分页
        $pages = $data_list->render();
        View::assign('data_list', $data_list);
        View::assign('pages', $pages);
        return View::fetch();
    }
    /**
     * 清空日志
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    public function clear()
    {
        if (!LogModel::where('id > 0')->delete()) {
            return $this->error('日志清空失败');
        }
        return $this->success('日志清空成功');
    }
}
