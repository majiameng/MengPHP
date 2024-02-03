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

use app\admin\model\AdminAnnex as AnnexModel;
use think\facade\View;

/**
 * 附件控制器
 * @package app\admin\controller
 */

class Annex extends Admin
{

    /**
     * 附件管理
     * @return mixed
     */
    public function index() 
    {
        return View::fetch();
    }

    /**
     * 附件上传
     * @param string $from 来源
     * @param string $group 附件分组,默认sys[系统]，模块格式：m_模块名，插件：p_插件名
     * @param string $water 水印，参数为空默认调用系统配置，no直接关闭水印，image 图片水印，text文字水印
     * @param string $thumb 缩略图，参数为空默认调用系统配置，no直接关闭缩略图，如需生成 500x500 的缩略图，则 500x500多个规格请用";"隔开
     * @param string $thumb_type 缩略图方式
     * @param string $input 文件表单字段名
     * @author 马佳萌 <666@majiameng.com>
     * @return json
     */
    public function upload($from = 'input', $group = 'sys', $water = '', $thumb = '', $thumb_type = '', $input = 'file')
    {
        return json(AnnexModel::upload($from, $group, $water, $thumb, $thumb_type, $input));
    }

    /**
     * favicon 图标上传
     * @return json
     */
    public function favicon()
    {
        return json(AnnexModel::favicon());
    }

    /**
     * 上传保护文件
     * @return json
     */
    public function protect()
    {
        return json(AnnexModel::protect());
    }
}
