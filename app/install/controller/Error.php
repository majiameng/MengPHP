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
namespace app\install\controller;
use app\common\controller\Common;
use app\admin\model\AdminUser as UserModel;
use think\exception\ValidateException;
use think\facade\Db;
use think\facade\View;

class Error extends Common
{
    /**
     * Db Config
     * @var string[]
     */
    public $config;

    public function index($step = 0)
    {
        switch ($step) {
            case 2:
                session('install_error', false);
                return self::step2();
                break;
            case 3:
                if (session('install_error')) {
                    return $this->error('环境检测未通过，不能进行下一步操作！');
                }
                return self::step3();
                break;
            case 4:
                if (session('install_error')) {
                    return $this->error('环境检测未通过，不能进行下一步操作！');
                }
                return self::step4();
                break;
            case 5:
                if (session('install_error')) {
                    return $this->error('初始失败！');
                }
                return self::step5();
                break;

            default:
                session('install_error', false);
                return View::fetch('index');
                break;
        }
    }

    /**
     * 第二步：环境检测
     * @return mixed
     */
    private function step2()
    {
        $data = [];
        $data['env'] = self::checkNnv();
        $data['dir'] = self::checkDir();
        $data['func'] = self::checkFunc();
        View::assign('data', $data);
        return View::fetch('step2');
    }

    /**
     * 第三步：初始化配置
     * @return mixed
     */
    private function step3()
    {
        return View::fetch('step3');
    }

    /**
     * 第四步：执行安装
     * @return mixed
     */
    private function step4()
    {
        if ($this->request->isPost()) {
            if (!is_writable(root_path().'.example.env')) {
                return $this->error('[.env]无读写权限！');
            }
            $data = input('post.');
            $data['type'] = 'mysql';
            $rule = [
                'hostname|服务器地址' => 'require',
                'hostport|数据库端口' => 'require|number',
                'database|数据库名称' => 'require',
                'username|数据库账号' => 'require',
                'prefix|数据库前缀' => 'require|regex:^[a-z0-9]{1,20}[_]{1}',
                'cover|覆盖数据库' => 'require|in:0,1',
            ];
            $message = [
                'hostname.require' => '服务器地址不能为空',
                'hostport.require' => '数据库端口不能为空',
                'database.require' => '数据库名称不能为空',
                'username.require' => '数据库账号不能为空',
                'prefix.require' => '数据库前缀不能为空',
                'cover.require' => '覆盖数据库不能为空',
            ];
            try {
                validate($rule,$message)->check($data);
            } catch (ValidateException $e) {
                // 验证失败 输出错误信息
                $this->error($e->getError());
            }
            $cover = $data['cover'];
            unset($data['cover']);
            // 获取原始数据库配置
            $this->config = config('database.connections.mysql');
            foreach ($data as $k => $v) {
                if (array_key_exists($k, $this->config) === false) {
                    return $this->error('参数'.$k.'不存在！');
                }
            }
            // 不存在的数据库会导致连接失败
            $database = $data['database'];
            unset($data['database']);

            //设置配置文件
            $this->config = array_merge($this->config,$data);
            config(['connections'=>['mysql'=>$this->config]],'database');

            // 检测数据库连接
            try{
                Db::execute('select version()');
            }catch(\Exception $e){
                $this->error('数据库连接失败，请检查数据库配置！');
            }

            // 不覆盖检测是否已存在数据库
            if (!$cover) {
                $check = Db::execute('SELECT * FROM information_schema.schemata WHERE schema_name="'.$database.'"');
                if ($check) {
                    $this->error('该数据库已存在，如需覆盖，请选择覆盖数据库！');
                }
            }
            // 创建数据库
            if (!Db::execute("CREATE DATABASE IF NOT EXISTS `{$database}` DEFAULT CHARACTER SET utf8")) {
                return $this->error(Db::getError());
            }
            $data['database'] = $database;
            // 生成配置文件
            self::mkDatabase($data);
            return $this->success('数据库连接成功', '');
        } else {
            return $this->error('非法访问');
        }
    }

    /**
     * 第五步：数据库安装
     * @return mixed
     */
    private function step5()
    {
        $account = input('post.account');
        $password = input('post.password');

        if (empty(env('DB_HOST')) || empty(env('DB_NAME')) || empty(env('DB_USER'))) {
            return $this->error('请先点击测试数据库连接！');
        }
        if (empty($account) || empty($password)) {
            return $this->error('请填写管理账号和密码！');
        }
        $rule = [
            'account|管理员账号' => 'require|alphaNum',
            'password|管理员密码' => 'require|length:6,20',
        ];
        $validate = $this->validate(['account' => $account, 'password' => $password], $rule);
        if (true !== $validate) {
            return $this->error($validate);
        }
        // 导入系统初始数据库结构
        // 导入SQL
        $sql_file = app_path().'sql/install.sql';
        if (file_exists($sql_file)) {
            $sql = file_get_contents($sql_file);
            $sql_list = parse_sql($sql, 0, ['meng_' => env('DB_PREFIX')]);
            if ($sql_list) {
                $sql_list = array_filter($sql_list);
                foreach ($sql_list as $v) {
                    try {
                        Db::execute($v);
                    } catch(\Exception $e) {
                        return $this->error('导入SQL失败，请检查install.sql的语句是否正确');
                    }
                }
            }
        }
        // 注册管理员账号
        $user = new UserModel;
        $map = [];
        $map['role_id'] = 1;
        $map['nick'] = '超级管理员';
        $map['username'] = $account;
        $map['password'] = $password;
        $map['auth'] = '';
        $map['email'] = '';
        $map['mobile'] = '';
        $map['last_login_ip'] = '';
        $map['last_login_time'] = request()->time();
        $res = $user->create($map);
        if (!$res) {
            return $this->error($user->getError() ? $user->getError() : '管理员账号设置失败！');
        }
        file_put_contents(app_path().'install.lock', date('Y-m-d H:i:s'));
        //站点密匙
        $auth = password_hash(request()->time(), PASSWORD_DEFAULT);
        $hs_auth = <<<INFO
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
 return ['key' => '{$auth}'];
INFO;
        file_put_contents(config_path().'/mengphp_auth.php', $hs_auth);
        // 获取站点根目录
        $root_dir = request()->baseFile();
        $root_dir  = preg_replace(['/index.php$/'], [''], $root_dir);

        //创建后台入口文件
        self::mkAdmin();
        return $this->success('系统安装成功，欢迎您使用MengPHP后台管理框架', $root_dir.'admin.php');
    }

    /**
     * 环境检测
     * @return array
     */
    private function checkNnv()
    {
        $items = [
            'os'      => ['操作系统', '不限制', '类Unix', PHP_OS, 'ok'],
            'php'     => ['PHP版本', '5.5', '5.5及以上', PHP_VERSION, 'ok'],
            'gd'      => ['GD库', '2.0', '2.0及以上', '未知', 'ok'],
        ];
        if ($items['php'][3] < $items['php'][1]) {
            $items['php'][4] = 'no';
            session('install_error', true);
        }
        $tmp = function_exists('gd_info') ? gd_info() : [];
        if (empty($tmp['GD Version'])) {
            $items['gd'][3] = '未安装';
            $items['gd'][4] = 'no';
            session('install_error', true);
        } else {
            $items['gd'][3] = $tmp['GD Version'];
        }

        return $items;
    }

    /**
     * 目录权限检查
     * @return array
     */
    private function checkDir()
    {
        $items = [
            ['dir', './../app', '读写', '读写', 'ok'],
            ['dir', './../extend', '读写', '读写', 'ok'],
            ['dir', './../backup', '读写', '读写', 'ok'],
            ['dir', './static', '读写', '读写', 'ok'],
            ['dir', './upload', '读写', '读写', 'ok'],
            ['file', './../version.php', '读写', '读写', 'ok'],
            ['file', './../.env', '读写', '读写', 'ok'],
            ['file', './admin.php', '读写', '读写', 'ok'],
        ];
        foreach ($items as &$v) {
            if ($v[0] == 'dir') {// 文件夹
                if(!is_writable($v[1])) {
                    if(is_dir($v[1])) {
                        $v[3] = '不可写';
                        $v[4] = 'no';
                    } else {
                        $v[3] = '不存在';
                        $v[4] = 'no';
                    }
                    session('install_error', true);
                }
            } else {// 文件
                if(!is_writable($v[1])) {
                    $v[3] = '不可写';
                    $v[4] = 'no';
                    session('install_error', true);
                }
            }
        }
        return $items;
    }

    /**
     * 函数及扩展检查
     * @return array
     */
    private function checkFunc()
    {
        $items = [
            ['pdo', '支持', 'yes', '类'],
            ['pdo_mysql', '支持', 'yes', '模块'],
            ['zip', '支持', 'yes', '模块'],
            ['fileinfo', '支持', 'yes', '模块'],
            ['curl', '支持', 'yes', '模块'],
            ['xml', '支持', 'yes', '函数'],
            ['file_get_contents', '支持', 'yes', '函数'],
            ['mb_strlen', '支持', 'yes', '函数'],
            ['gzopen', '支持', 'yes', '函数'],
        ];

        foreach ($items as &$v) {
            if(('类'==$v[3] && !class_exists($v[0])) || ('模块'==$v[3] && !extension_loaded($v[0])) || ('函数'==$v[3] && !function_exists($v[0])) ) {
                $v[1] = '不支持';
                $v[2] = 'no';
                session('install_error', true);
            }
        }

        return $items;
    }

    /**
     * 生成数据库配置文件
     * @return array
     */
    private function mkDatabase(array $data)
    {
        $code = <<<INFO
APP_DEBUG = true

DB_TYPE = mysql
DB_HOST = {$data['hostname']}
DB_NAME = {$data['database']}
DB_USER = {$data['username']}
DB_PASS = {$data['password']}
DB_PORT = {$data['hostport']}
DB_PREFIX = {$data['prefix']}
DB_CHARSET = utf8

DEFAULT_LANG = zh-cn
INFO;
        file_put_contents(root_path().'.env', $code);
        // 判断写入是否成功
        \think\facade\Env::load(root_path().'.env');
        if (empty(env('DB_NAME')) || env('DB_NAME') != $data['database']) {
            return $this->error('[.env]数据库配置写入失败！');
            exit;
        }
    }

    /**
     * 生成数据库配置文件
     * @return array
     */
    private function mkAdmin()
    {
        $code = '<?php
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

require __DIR__ . "/../vendor/autoload.php";

// 执行HTTP应用并响应
$http = (new App())->http;

define("ENTRANCE", "admin");
$response = $http->name("admin")->run();

$response->send();

$http->end($response);';


        file_put_contents(public_path().'/admin.php', $code);
    }
}
