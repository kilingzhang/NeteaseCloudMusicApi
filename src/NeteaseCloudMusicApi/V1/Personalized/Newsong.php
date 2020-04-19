<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-20
 * Time: 01:08
 */

namespace NeteaseCloudMusicApi\V1\Personalized;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Newsong
 * @package NeteaseCloudMusicApi\V1\Personalized
 *
 * 推荐新音乐
 * 说明:调用此接口,可获取推荐新音乐
 *
 * 接口地址:
 * /personalized/newsong
 *
 * 调用例子:
 * http://i.music.163.com/personalized/newsong
 *
 */
class Newsong extends Controller
{
    protected $uri = 'https://music.163.com/weapi/personalized/newsong';
}