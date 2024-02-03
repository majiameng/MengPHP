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
use app\common\util\Dir;
use app\common\util\PclZip;
use function app\common\model\db;

/**
 * 语言包模型
 * @package app\common\model
 */
class AdminLanguage extends Common
{

    /**
     * 入库
     * @param array $data 入库数据
     * @author 马佳萌 <666@majiameng.com>
     * @return bool
     */  
    public function storage($data = [])
    {
        if (empty($data)) {
            $data = request()->post();
        }

        // 验证
        $valid = $this->validate('AdminLanguage');
        if($valid->check($data) !== true) {
            $this->error = $valid->getError();
            return false;
        }

        if (isset($data['id']) && !empty($data['id'])) {
            if ($data['id'] == 1) {// 禁止修改ID为1的语言包
                return false;
            }
            $old = self::get($data['id']);
            $res = $this->update($data);
            // 如果之前没有上传语言包，则允许上传一次语言包
            if (empty($old->pack) && !empty($data['pack'])) {
                self::install($data['id'], $data['code'], $data['pack']);
            }
        } else {
            $res = $this->create($data);
            self::install($res->id, $data['code'], $data['pack']);
        }
        if (!$res) {
            $this->error = '保存失败！';
            return false;
        }
        // 更新语言包缓存
        self::lists('', true);
        return $res;
    }

    /**
     * 获取语言包列表
     * @param  string $name 配置名
     * @param  bool $update 是否更新缓存
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    public function lists($name = '', $update = false)
    {
        $result = cache('sys_language');
        if (!$result || $update == true) {
            $result = self::order('sort asc')->column('id,code,name,icon,pack', 'code');
            cache('sys_language', $result);
        }
        $lang = config('lang.default_lang');
        if ($name) {
            if (isset($result[$name])) {
                return $result[$name]['id'];
            } else {
                $lang = current($result);
                return $lang['id'];
            }
        }
        return $result;
    }

    /**
     * 安装语言包
     * @param  int $id 数据ID
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    private function install($id, $code, $pack) 
    {
        if (empty($pack)) {
            return false;
        }
        $pack = '.'.$pack;
        if (file_exists($pack)) {
            $decom_path = runtime_path().'lang'.DIRECTORY_SEPARATOR;
            if (!is_dir($decom_path)) {
                Dir::create($decom_path, 0777, true);
            }
            // 解压升级包
            $archive = new PclZip();
            $archive->PclZip($pack);
            if(!$archive->extract(PCLZIP_OPT_PATH, $decom_path, PCLZIP_OPT_REPLACE_NEWER)) {
                $this->error = '语言包解压失败！';
                return false;
            }
            // 导入语言包到admin
            $admin_lang = $decom_path.'admin'.DIRECTORY_SEPARATOR.$code.'.php';
            if (file_exists($admin_lang)) {
                copy($admin_lang, app_path().'admin'.DIRECTORY_SEPARATOR.'lang'.DIRECTORY_SEPARATOR.$code.'.php');
            }
            // 导入语言包到common
            $common_lang = $decom_path.'common'.DIRECTORY_SEPARATOR.$code.'.php';
            if (file_exists($common_lang)) {
                copy($common_lang, app_path().'common'.DIRECTORY_SEPARATOR.'lang'.DIRECTORY_SEPARATOR.$code.'.php');
            }
            // 导入后台菜单
            if (file_exists($decom_path.'menu.php')) {
                $menu = include_once $decom_path.'menu.php';
                $menu_data = [];
                foreach ($menu as $key => $v) {
                    $menu_data[$key]['menu_id'] = $v['menu_id'];
                    $menu_data[$key]['title'] = $v['title'];
                    $menu_data[$key]['lang'] = $id;
                }
                if ($menu_data) {
                    db('admin_menu_lang')->insertAll($menu_data);
                }
            }
            Dir::delDir($decom_path);
        }
        return true;
    }

    /**
     * 删除语言包
     * @param  int $id 数据ID
     * @author 马佳萌 <666@majiameng.com>
     * @return mixed
     */
    public function del($id = 0)
    {
        if ($id == 1) {
            return false;
        }
        $lang = self::get($id);
        if (!$lang) {
            return true;
        }
        // 删除语言包相关文件
        $admin_lang = app_path().'admin'.DIRECTORY_SEPARATOR.'lang'.DIRECTORY_SEPARATOR.$lang['code'].'.php';
        if (file_exists($admin_lang)) {
            unlink($admin_lang);
        }
        $common_lang = app_path().'common'.DIRECTORY_SEPARATOR.'lang'.DIRECTORY_SEPARATOR.$lang['code'].'.php';
        if (file_exists($common_lang)) {
            unlink($common_lang);
        }
        if (file_exists('.'.$lang->pack)) {
            unlink('.'.$lang->pack);
        }
        // 删除管理菜单
        db('admin_menu_lang')->where(['lang' => $id])->delete();
        self::where(['id' => $id])->delete();
        // 更新语言包缓存
        self::lists('', true);
        return true;
    }
}