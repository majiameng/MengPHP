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

use app\admin\model\AdminMenu as MenuModel;
use app\admin\model\AdminRole as RoleModel;
use app\admin\model\AdminUser as UserModel;
use think\facade\View;


/**
 * 后台用户、角色控制器
 * @package app\admin\controller
 */
class User extends Admin
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
                'title' => '管理员角色',
                'url' => 'admin/user/role',
            ],
            [
                'title' => '系统管理员',
                'url' => 'admin/user/index',
            ],
        ];
        $this->tab_data = $tab_data;
    }

    /**
     * 用户管理
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    public function index($q = '')
    {
        $sqlmap = [];
        if ($q) {
            $sqlmap['username'] = ['like', '%'.$q.'%'];
        }
        $data_list = UserModel::where($sqlmap)->paginate();
        // 分页
        $pages = $data_list->render();
        $tab_data = $this->tab_data;
        $tab_data['current'] = url('');

        $role_list = RoleModel::getAll();
        foreach ($role_list as $value){
            $role_list[$value['id']] = $value['name'];
        }
        View::assign('role_list', $role_list);
        View::assign('data_list', $data_list);
        View::assign('tab_data', $tab_data);
        View::assign('tab_type', 1);
        View::assign('pages', $pages);
        return View::fetch();
    }

    /**
     * 布局切换
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    public function iframe()
    {
        $val = input('param.val', 0);
        if ($val != 0 && $val != 1) {
            return $this->error('参数传递错误');
        }
        if (UserModel::where('id', ADMIN_ID)->update(['iframe'=> $val]) === false) {
            return $this->error('切换失败');
        }
        if ($val == 1) {
            cookie('hisi_iframe', 'yes');
        } else {
            cookie('hisi_iframe', null);
        }
        return $this->success('布局切换成功，跳转中...', url('index/index'));
    }

    /**
     * 添加用户
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    public function addUser()
    {
        if ($this->request->isPost()) {
            $data = $this->request->post();
            // 验证
            $result = $this->validate($data, 'AdminUser');
            if($result !== true) {
                return $this->error($result);
            }
            unset($data['id']);
            $data['last_login_ip'] = '';
            $data['auth'] = '';
            if (!UserModel::create($data)) {
                return $this->error('添加失败');
            }
            return $this->success('添加成功');
        }

        $tab_data = [];
        $tab_data['menu'] = [
            ['title' => '添加用户'],
        ];
        View::assign('menu_list', '');
        View::assign('role_option', RoleModel::getOption());
        View::assign('tab_data', $tab_data);
        View::assign('tab_type', 2);
        return View::fetch('userform');
    }

    /**
     * 修改用户
     * @param int $id
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    public function editUser($id = 0)
    {
        if ($id == 1 && ADMIN_ID != $id) {
            return $this->error('禁止修改超级管理员');
        }
        if ($this->request->isPost()) {
            $data = $this->request->post();
            $row = UserModel::where('id', $id)->field('role_id,auth')->find();
            if ($data['id'] == 1 || ADMIN_ID == $id) {// 禁止更改超管角色，当前登陆用户不可更改自己的角色和自定义权限
                unset($data['role_id'], $data['auth']);
                if (!$row['auth']) {
                    $data['auth'] = '';
                }
            } else if ($row['role_id'] != $data['role_id']) {// 如果分组不同，自定义权限无效
                $data['auth'] = '';
            }

            if (isset($data['role_id']) && RoleModel::where('id', $data['role_id'])->value('auth') == json_encode($data['auth'])) {// 如果自定义权限与角色权限一致，则设置自定义权限为空
                $data['auth'] = '';
            }

            if (!isset($data['auth'])) {
                $data['auth'] = '';
            }

            // 验证
            $result = $this->validate($data, 'AdminUser.update');
            if($result !== true) {
                return $this->error($result);
            }

            if ($data['password'] == '') {
                unset($data['password']);
            }

            if (!UserModel::update($data)) {
                return $this->error('修改失败');
            }
            return $this->success('修改成功');
        }

        $row = UserModel::where('id', $id)->field('id,username,role_id,nick,email,mobile,auth,status')->find()->toArray();
        if (!$row['auth']) {
            $auth = RoleModel::where('id', $row['role_id'])->value('auth');
            $row['auth'] = json_decode($auth);
        } else {
            $row['auth'] = json_decode($row['auth']);
        }
        $tab_data = [];
        $tab_data['menu'] = [
            ['title' => '修改用户'],
            ['title' => '设置权限'],
        ];

        View::assign('menu_list', MenuModel::getAllChild());
        View::assign('role_option', RoleModel::getOption());
        View::assign('tab_data', $tab_data);
        View::assign('tab_type', 2);
        View::assign('role_option', RoleModel::getOption($row['role_id']));
        View::assign('data_info', $row);
        return View::fetch('userform');
    }

    /**
     * 修改个人信息
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    public function info()
    {
        if ($this->request->isPost()) {
            $data = $this->request->post();
            $data['id'] = ADMIN_ID;
            // 防止伪造
            unset($data['role_id'], $data['status']);

            if ($data['password'] == '') {
                unset($data['password']);
            }
            // 验证
            $result = $this->validate($data, 'AdminUser.info');
            if($result !== true) {
                return $this->error($result);
            }

            if (!UserModel::update($data)) {
                return $this->error('修改失败');
            }
            return $this->success('修改成功');
        }

        $row = UserModel::where('id', ADMIN_ID)->field('username,nick,email,mobile')->find()->toArray();
        View::assign('data_info', $row);
        return View::fetch();
    }

    /**
     * 删除用户
     * @param int $id
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    public function delUser()
    {
        $ids   = input('param.ids/a');
        $model = new UserModel();
        if ($model->del($ids)) {
            return $this->success('删除成功');
        }
        return $this->error($model->getError());
    }

    // +----------------------------------------------------------------------
    // | 角色
    // +----------------------------------------------------------------------

    /**
     * 角色管理
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    public function role()
    {
        $tab_data = $this->tab_data;
        $tab_data['current'] = url('');
        $data_list = RoleModel::field('id,name,intro,ctime,status')->paginate();
        // 分页
        $pages = $data_list->render();
        View::assign('data_list', $data_list);
        View::assign('tab_data', $tab_data);
        View::assign('tab_type', 1);
        View::assign('pages', $pages);
        return View::fetch();
    }

    /**
     * 添加角色
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    public function addRole()
    {
        if ($this->request->isPost()) {
            $data = $this->request->post();
            // 验证
            $result = $this->validate($data, 'AdminRole');
            if($result !== true) {
                return $this->error($result);
            }
            unset($data['id']);
            if (!RoleModel::create($data)) {
                return $this->error('添加失败');
            }
            return $this->success('添加成功');
        }
        $tab_data = [];
        $tab_data['menu'] = [
            ['title' => '添加角色'],
            ['title' => '设置权限'],
        ];
        View::assign('menu_list', MenuModel::getAllChild());
        View::assign('tab_data', $tab_data);
        View::assign('tab_type', 2);
        return View::fetch('roleform');
    }

    /**
     * 修改角色
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    public function editRole($id = 0)
    {
        if ($id <= 1) {
            return $this->error('禁止编辑');
        }

        if ($this->request->isPost()) {
            $data = $this->request->post();
            // 当前登陆用户不可更改自己的分组角色
            if (ADMIN_ROLE == $data['id']) {
                return $this->error('禁止修改当前角色(原因：您不是超级管理员)');
            }

            // 验证
            $result = $this->validate($data, 'AdminRole');
            if($result !== true) {
                return $this->error($result);
            }
            if (!RoleModel::update($data)) {
                return $this->error('修改失败');
            }

            // 更新权限缓存
            cache('role_auth_'.$data['id'], $data['auth']);

            return $this->success('修改成功');
        }
        $tab_data = [];
        $tab_data['menu'] = [
            ['title' => '修改角色'],
            ['title' => '设置权限'],
        ];
        $row = RoleModel::where('id', $id)->field('id,name,intro,auth,status')->find()->toArray();
        $row['auth'] = json_decode($row['auth']);
        View::assign('data_info', $row);
        View::assign('menu_list', MenuModel::getAllChild());
        View::assign('tab_data', $tab_data);
        View::assign('tab_type', 2);
        return View::fetch('roleform');
    }
    /**
     * 删除角色
     * @param int $id
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    public function delRole()
    {
        $ids   = input('param.ids/a');
        $model = new RoleModel();
        if ($model->del($ids)) {
            return $this->success('删除成功');
        }
        return $this->error($model->getError());
    }
}
