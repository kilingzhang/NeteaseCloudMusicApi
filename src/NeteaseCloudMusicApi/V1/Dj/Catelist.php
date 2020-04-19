<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-19
 * Time: 22:49
 */

namespace NeteaseCloudMusicApi\V1\Dj;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Catelist
 * @package NeteaseCloudMusicApi\V1\Dj
 *
 * 电台-分类
 * 说明:登陆后调用此接口,可获得电台类型
 *
 * 接口地址:
 * /dj/catelist
 *
 * 调用例子:
 * http://i.music.163.com/dj/catelist
 *
 */
class Catelist extends Controller
{
    protected $uri = 'https://music.163.com/weapi/djradio/category/get';
}