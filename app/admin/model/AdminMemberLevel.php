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

use app\admin\model\AdminMember as MemberModel;
use app\common\model\Common;

/**
 * 会员等级模型
 * @package app\common\model
 */
class AdminMemberLevel extends Common
{

    /**
     * 获取所有会员等级(下拉列)
     * @param int $id 选中的ID
     * @author 马佳萌 <666@majiameng.com>
     * @return string
     */
    public static function getOption($id = 0)
    {
        $rows = self::column('id,name');
        $str = '';
        foreach ($rows as $v) {
            if ($id == $v['id']) {
                $str .= '<option value="'.$v['id'].'" selected>'.$v['name'].'</option>';
            } else {
                $str .= '<option value="'.$v['id'].'">'.$v['name'].'</option>';
            }
        }
        return $str;
    }

    /**
     * 删除会员
     * @param string $id 会员ID
     * @author 马佳萌 <666@majiameng.com>
     * @return bool
     */
    public function del($id = 0) 
    {
        if (is_array($id)) {
            $error = '';
            foreach ($id as $k => $v) {
                if ($v <= 0) {
                    $error .= '参数传递错误['.$v.']！<br>';
                    continue;
                }

                // 判断是否有会员绑定此等级
                if (MemberModel::where('level_id', $v)->find()) {
                    $error .= '删除失败，已有会员绑定此等级ID['.$v.']！<br>';
                    continue;
                }
                $map = [];
                $map['id'] = $v;
                self::where($map)->delete();
            }

            if ($error) {
                $this->error = $error;
                return false;
            }
        } else {
            $id = (int)$id;
            if ($id <= 0) {
                $this->error = '参数传递错误！';
                return false;
            }

            // 判断是否有会员绑定此等级
            if (MemberModel::where('level_id', $id)->find()) {
                $this->error = '删除失败，已有会员绑定此等级ID！<br>';
                return false;
            }

            $map = [];
            $map['id'] = $id;
            self::where($map)->delete();
        }

        return true;
    }

    /**
     * 获取所有会员等级
     * @author 马佳萌 <666@majiameng.com>
     * @return array
     */
    public static function getAll()
    {
        return self::column('id,name,discount,min_exper,max_exper');
    }
}
