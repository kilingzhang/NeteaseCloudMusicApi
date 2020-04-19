<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-20
 * Time: 01:10
 */

namespace NeteaseCloudMusicApi\V1\Personalized;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Djprogram
 * @package NeteaseCloudMusicApi\V1\Personalized
 *
 * 推荐电台
 * 说明:调用此接口,可获取推荐电台
 *
 * 接口地址:
 * /personalized/djprogram
 *
 * 调用例子:
 * http://i.music.163.com/personalized/djprogram
 *
 */
class Djprogram extends Controller
{
    protected $uri = 'https://music.163.com/weapi/personalized/djprogram';
}