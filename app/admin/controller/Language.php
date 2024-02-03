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
use app\admin\model\AdminLanguage as LanguageModel;
use think\facade\View;

/**
 * 语言包管理控制器
 * @package app\admin\controller
 */

class Language extends Admin
{
    /**
     * 语言包管理首页
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    public function index()
    {
        $data_list = LanguageModel::order('sort asc')->column('id,code,name,icon,sort,status');
        View::assign('data_list', $data_list);
        return View::fetch();
    }

    /**
     * 添加语言包
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    public function add()
    {
        if ($this->request->isPost()) {
            $model = new LanguageModel();
            if (!$model->storage()) {
                return $this->error($model->getError());
            }
            return $this->success('保存成功。');
        }

        return View::fetch('form');
    }

    /**
     * 修改语言包
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    public function edit()
    {
        $id = get_num();
        if ($this->request->isPost()) {
            $model = new LanguageModel();
            if (!$model->storage()) {
                return $this->error($model->getError());
            }
            return $this->success('保存成功。');
        }
        $data_info = LanguageModel::get($id);
        View::assign('data_info', $data_info);
        return View::fetch('form');
    }

    /**
     * 删除语言包
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    public function del()
    {
        $id = get_num();
        $model = new LanguageModel(); 
        if ($model->del($id) === false) {
            return $this->error('删除失败！');
        }
        return $this->success('删除成功');
    }
}
