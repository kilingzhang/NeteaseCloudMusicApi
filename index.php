<?php
/**
 * Created by PhpStorm.
 * User: Kilingzhang
 * Date: 2020/4/18
 * Time: 14:25
 */
require_once "vendor/autoload.php";
ini_set('date.timezone', 'Asia/Chongqing');

!defined('PATH_INFO') && define('PATH_INFO', trim(parse_url($_SERVER['REQUEST_URI'])['path'], '/'));

$namespaces = explode('/', PATH_INFO);
$namespaces = array_map(function ($namespace) {
    return ucfirst($namespace);
}, $namespaces);

$namespaces = implode("\\", $namespaces);
$version = "V1";
$namespaces = sprintf("\\NeteaseCloudMusicApi\\%s\\%s", $version, $namespaces);
$namespaces = !class_exists($namespaces) ? sprintf("%s\\Index", $namespaces) : $namespaces;

!defined('NAMESPACES') && define('NAMESPACES', $namespaces);

new \NeteaseCloudMusicApi\Bootstrap;






