<?php
/**
 * Created by PhpStorm.
 * User: Kilingzhang  <slight@kilingzhang.com>
 * Date: 2017/8/19
 * Time: 14:25
 */

require_once "Autoloader.php";
require_once "vendor/autoload.php";
use PhpBoot\Docgen\Swagger\Swagger;
use PhpBoot\Docgen\Swagger\SwaggerProvider;
use PhpBoot\Application;
use PhpBoot\Controller\Hooks\Cors;
header("Content-Type: charset=utf-8");
ini_set('date.timezone','Asia/Shanghai');

// 加载配置
$app = \PhpBoot\Application::createByDefault(
    'Config.php'
);


//接口文档自动导出功能, 如果要关闭此功能, 只需注释掉这块代码{{
SwaggerProvider::register($app, function(Swagger $swagger)use($app){
    $swagger->schemes = ['http'];
    $swagger->host = $app->get('host');
    $swagger->info->title = '网易云音乐API';
    $swagger->info->description = "网易云音乐API";
});
//}}
$app->loadRoutesFromPath( 'src/NeteaseCloudMusicApiSdk', 'NeteaseCloudMusicApiSdk');

//执行请求
$app->dispatch();






