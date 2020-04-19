<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-20
 * Time: 01:11
 */

namespace NeteaseCloudMusicApi\V1\Personalized;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Privatecontent
 * @package NeteaseCloudMusicApi\V1\Personalized
 *
 * 独家放送
 * 说明:调用此接口,可获取独家放送
 *
 * 接口地址:
 * /personalized/privatecontent
 *
 * 调用例子:
 * http://i.music.163.com/personalized/privatecontent
 *
 */
class Privatecontent extends Controller
{
    protected $uri = 'https://music.163.com/weapi/personalized/privatecontent';
}