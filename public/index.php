<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2019 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]
namespace think;

require __DIR__ . '/../vendor/autoload.php';
/** 设置跨域问题 */
header("Access-Control-Allow-Origin: *");//origin
header("Access-Control-Allow-Credentials:true");//是否允许后续请求携带认证信息（cookies）,该值只能是true,否则不返回
header("Access-Control-Allow-Methods:GET, POST, PATCH, PUT, DELETE, OPTIONS");//允许的请求类型
header("Access-Control-Allow-Headers:Content-Length, Authorization, Accept, X-Requested-With, X-ELEME-USERID, X-Eleme-RequestID, X-Shard, Accesstoken,Token, X-AdminId, X-AdminToken, permissionId, Content-Type, If-Match, If-Modified-Since, If-None-Match, If-Unmodified-Since, Sign,Timestamp");//该次请求的自定义请求头字段

// 执行HTTP应用并响应
$http = (new  App())->http;

// 定义应用目录
define('APP_PATH', __DIR__ . '/../app/');

// 检查是否安装
if(!is_file(APP_PATH.'install/install.lock')) {
    if (!is_writable(__DIR__ . '/../runtime')) {
        echo '请开启[runtime]文件夹的读写权限';
        exit;
    }
    $response = $http->name('install')->run();
}else{
    $response = $http->run();
}
$response->send();
$http->end($response);
