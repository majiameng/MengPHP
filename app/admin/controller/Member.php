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

use app\admin\model\AdminMember as MemberModel;
use app\admin\model\AdminMemberLevel as LevelModel;
use think\facade\View;

/**
 * 会员管理控制器
 * @package app\admin\controller
 */
class Member extends Admin
{

    /**
     * 会员列表
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    public function index($q = '')
    {
        $map = [];
        if ($q) {
            if (preg_match("/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/", $q)) {// 邮箱
                $map['email'] = $q;
            } elseif (preg_match("/^1\d{10}$/", $q)) {// 手机号
                $map['mobile'] = $q;
            } else {// 用户名、昵称
                $map['username'] = ['like', '%'.$q.'%'];
            }
        }
        
        $data_list = MemberModel::where($map)->paginate();
        // 分页
        $pages = $data_list->render();
        View::assign('data_list', $data_list);
        View::assign('pages', $pages);
        return View::fetch();
    }

    /**
     * 添加会员
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    public function add()
    {
        if ($this->request->isPost()) {
            $data = $this->request->post();
            // 验证
            $result = $this->validate($data, 'AdminMember');
            if($result !== true) {
                return $this->error($result);
            }
            unset($data['id']);
            if (!MemberModel::create($data)) {
                return $this->error('添加失败！');
            }
            return $this->success('添加成功。');
        }

        View::assign('level_option', LevelModel::getOption());
        return View::fetch('form');
    }

    /**
     * 修改会员
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    public function edit($id = 0)
    {
        if ($this->request->isPost()) {
            $data = $this->request->post();
            if ($data['mobile'] == 0) {
                unset($data['mobile']);
            }
            // 验证
            $result = $this->validate($data, 'AdminMember.update');
            if($result !== true) {
                return $this->error($result);
            }
            if (!MemberModel::update($data)) {
                return $this->error('修改失败！');
            }
            return $this->success('修改成功。');
        }

        $row = MemberModel::where('id', $id)->field('id,username,level_id,nick,email,mobile,expire_time')->find()->toArray();
        View::assign('data_info', $row);
        View::assign('level_option', LevelModel::getOption($row['level_id']));
        return View::fetch('form');
    }

    /**
     * 会员列表弹窗
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    public function pop() {
        $q = input('param.q/s');
        $callback = input('param.callback/s');
        if (!$callback) {
            echo '<br><br>callback为必传参数！';
            exit;
        }

        $map = [];
        if ($q) {
            if (preg_match("/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/", $q)) {// 邮箱
                $map['email'] = $q;
            } elseif (preg_match("/^1\d{10}$/", $q)) {// 手机号
                $map['mobile'] = $q;
            } else {// 用户名、昵称
                $map['username'] = ['like', '%'.$q.'%'];
            }
        }
        
        $data_list = MemberModel::where($map)->paginate(10, true);
        // 分页
        $pages = $data_list->render();
        View::assign('data_list', $data_list);
        View::assign('pages', $pages);
        View::assign('callback', $callback);
        View::engine()->layout(false);
        return View::fetch();
    }

    // +----------------------------------------------------------------------
    // | 会员等级
    // +----------------------------------------------------------------------

    /**
     * 会员等级列表
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    public function level()
    {
        $data_list = LevelModel::field('id,name,intro,discount,min_exper,max_exper,ctime,default,status')->paginate();
        // 分页
        $pages = $data_list->render();
        View::assign('data_list', $data_list);
        View::assign('pages', $pages);
        return View::fetch();
    }

    /**
     * 添加会员等级
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    public function addLevel()
    {
        if ($this->request->isPost()) {
            $data = $this->request->post();
            // 验证
            $result = $this->validate($data, 'AdminMemberLevel');
            if($result !== true) {
                return $this->error($result);
            }
            unset($data['id']);
            if (!LevelModel::create($data)) {
                return $this->error('添加失败！');
            }
            // 更新缓存
            cache('system_member_level', LevelModel::getAll());
            return $this->success('添加成功。');
        }

        return View::fetch('levelform');
    }

    /**
     * 修改会员等级
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    public function editLevel($id = 0)
    {
        if ($this->request->isPost()) {
            $data = $this->request->post();
            // 验证
            $result = $this->validate($data, 'AdminMemberLevel');
            if($result !== true) {
                return $this->error($result);
            }
            if (!LevelModel::update($data)) {
                return $this->error('修改失败！');
            }
            // 更新缓存
            cache('system_member_level', LevelModel::getAll());
            return $this->success('修改成功。');
        }
        $row = LevelModel::where('id', $id)->find()->toArray();

        View::assign('data_info', $row);
        return View::fetch('levelform');
    }

    /**
     * 删除会员等级
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    public function delLevel()
    {
        $ids = input('param.ids/a');
        $model = new LevelModel;
        if (!$model->del($ids)) {
            return $this->error($model->getError());
        }
        return $this->success('删除成功');
    }

    /**
     * 设置默认等级
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    public function setDefault($id = 0)
    {
        LevelModel::update(['default' => 0], [['id','<>', $id]]);
        if (LevelModel::where('id', $id)->update(['default'=> 1]) === false) {
            return $this->error('设置失败！');
        }

        return $this->success('设置成功。');
    }
}
