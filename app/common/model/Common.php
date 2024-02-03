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
namespace app\common\model;

use think\Model;

/**
 * 公共模型
 * @package app\common\model
 */
class Common extends Model
{
    // 定义时间戳字段名
    protected $createTime = 'ctime';
    protected $updateTime = 'mtime';

    // 自动写入时间戳
    protected $autoWriteTimestamp = true;

    public $error;
    public $validate;

    /**
     * 自动验证数据
     * @access protected
     * @param array $data  验证数据
     * @param mixed $validate  验证规则
     * @param bool  $batch 批量验证
     * @return bool
     */
    protected function validateData($data, $validate = null, $batch = null){
        if (is_array($validate)) {
            $v = validate($validate);
        } else {
            if (strpos($validate, '.')) {
                // 支持场景
                list($validate, $scene) = explode('.', $validate);
            }
            $validateClass = '\\app\\common\\validate\\'.$validate;
            if(!class_exists($validateClass)){
                $validateClass = '\\app\\admin\\validate\\'.$validate;
            }
            $v = new $validateClass;
            if (!empty($scene)) {
                $v->scene($scene);
            }
        }

        if (!$v->check($data)) {
            $this->error = $v->getError();
        }
        return true;
    }

    /**
     * @return mixed
     */
    public function getError(){
        return $this->error;
    }

}
