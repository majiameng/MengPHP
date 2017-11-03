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
namespace app\admin\controller;

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
    protected function _initialize()
    {
        parent::_initialize();

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
        $this->assign('tab_data', $this->tab_data);
        $this->assign('tab_type', 2);
        return $this->fetch();
    }

    /**
     * 编辑演示
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    public function edit()
    {
        $this->assign('tab_data', $this->tab_data);
        $this->assign('tab_type', 2);
        return $this->fetch();
    }
}
