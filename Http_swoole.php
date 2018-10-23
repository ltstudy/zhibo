<?php
namespace Yii;

use \tsingsun\swoole\server\Server;
//站点根目录,相当于nginx的root配置
defined('WEBROOT') or define('WEBROOT', __DIR__);
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');
//协程开关,请严格根据您的环境配置
defined('COROUTINE_ENV') or define('COROUTINE_ENV', true);

//require(__DIR__ . '/../../vendor/autoload.php');
require(__DIR__ . '/vendor/autoload.php');
$config = [
    'class'=>'tsingsun\swoole\server\HttpServer',
    //Swoole的配置,根据实际情况配置
    'setting' => [
        'daemonize'=>0,
        'max_coro_num'=>3000,
        'reactor_num'=>1,
        'worker_num'=>1,
        'task_worker_num'=>1,
        'pid_file' => __DIR__ . '/runtime/testHttp.pid',
        'log_file' => __DIR__.'/runtime/logs/swoole.log',
        'debug_mode'=> 1,
        'user'=>'tsingsun',
        'group'=>'staff',
        // 4.0 新增选项
        'enable_coroutine' => COROUTINE_ENV
    ],
];

Server::run($config,function (Server $server){
    $starter = new \tsingsun\swoole\bootstrap\WebApp($server);
    //初始化函数独立,为了在启动时,不会加载Yii相关的文件,在库更新时采用reload平滑启动服务器
    $starter->init = function (\tsingsun\swoole\bootstrap\BaseBootstrap $bootstrap) {
        //需要使用Yii-Swoole项目的Yii文件,
        require(__DIR__ . '/vendor/tsingsun/yii2-swoole/src/Yii.php');
        //原项目的配置文件引入
        $config = \yii\helpers\ArrayHelper::merge(
//            require(__DIR__ . '/config/main.php'),
//            require(__DIR__ . '/config/main-local.php')
            require(__DIR__ . '/config/web.php'),
            require(__DIR__ . '/config/console.php')
        );
        $bootstrap->appConfig = $config;
    };
    $server->bootstrap = $starter;
    $server->start();
});