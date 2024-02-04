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
use app\admin\model\AdminConfig as ConfigModel;
use think\facade\View;

/**
 * 配置管理控制器
 * @package app\admin\controller
 */

class Config extends Admin
{
    public function index($group = 'base')
    {
        $tab_data = ['menu'=>[]];
        $config_group = config('system.sys.config_group');
        if(!empty($config_group)){
            foreach ($config_group as $key => $value) {
                $arr = [];
                $arr['title'] = $value;
                $arr['url'] = '?group='.$key;
                $tab_data['menu'][] = $arr;
            }
        }
        $tab_data['current'] = url('?group='.$group);

        $map = [];
        $map['group'] = $group;
        $data_list = ConfigModel::where($map)->order('sort,id')->paginate();
        $pages = $data_list->render();
        View::assign('data_list', $data_list);
        View::assign('pages', $pages);
        View::assign('tab_data', $tab_data);
        View::assign('tab_type', 1);
        return View::fetch();
    }

    /**
     * 添加配置
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    public function add()
    {
        if ($this->request->isPost()) {
            $data = $this->request->post();
            switch ($data['type']) {
                case 'switch':
                case 'radio':
                case 'checkbox':
                case 'select':
                    if (!$data['options']) {
                        return $this->error('请填写配置选项！');
                    }
                    break;
                default:
                    break;
            }
            // 验证
            $result = $this->validate($data, 'AdminConfig');
            if($result !== true) {
                return $this->error($result);
            }
            if (!ConfigModel::create($data)) {
                return $this->error('添加失败！');
            }
            // 更新配置缓存
            ConfigModel::getConfig('', true);
            return $this->success('添加成功。');
        }
        return View::fetch('form');
    }

    /**
     * 修改配置
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    public function edit($id = 0)
    {
        $row = ConfigModel::where('id', $id)->field('id,group,title,name,value,type,options,tips,status,system')->find();
        if ($row['system'] == 1) {
            return $this->error('禁止编辑此配置！');
        }
        if ($this->request->isPost()) {
            $data = $this->request->post();
            // 验证
            $result = $this->validate($data, 'AdminConfig');
            if($result !== true) {
                return $this->error($result);
            }
            if (!ConfigModel::update($data)) {
                return $this->error('保存失败！');
            }
            // 更新配置缓存
            ConfigModel::getConfig('', true);
            return $this->success('保存成功。');
        }
        $row['tips'] = htmlspecialchars_decode($row['tips']);
        $row['value'] = htmlspecialchars_decode($row['value']);
        View::assign('data_info', $row);
        return View::fetch('form');
    }

    /**
     * 删除配置
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    public function del()
    {
        $id = input('param.ids/a');
        $model = new ConfigModel();
        if ($model->del($id)) {
            return $this->success('删除成功。');
        }
        // 更新配置缓存
        ConfigModel::getConfig('', true);
        return $this->error($model->getError());
    }
}
