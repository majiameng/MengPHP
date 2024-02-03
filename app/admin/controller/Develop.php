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
use think\facade\View;

/**
 * 后台开发工具控制器
 * 仅供开发人员使用
 * @package app\admin\controller
 */
class Develop extends Admin
{
    public $tab_data = [];
    /**
     * 初始化方法
     */
    protected function initialize()
    {
        parent::initialize();

        $tab_data['menu'] = [
            [
                'title' => '模板预览'
            ],
            [
                'title' => '查看代码'
            ],
        ];

        $this->tab_data = $tab_data;
    }

    /**
     * 列表演示
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    public function lists()
    {
        View::assign('tab_data', $this->tab_data);
        View::assign('tab_type', 2);
        return View::fetch();
    }

    /**
     * 编辑演示
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    public function edit()
    {
        View::assign('tab_data', $this->tab_data);
        View::assign('tab_type', 2);
        return View::fetch();
    }
}
