<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-20
 * Time: 01:06
 */

namespace NeteaseCloudMusicApi\V1\Personalized;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Index
 * @package NeteaseCloudMusicApi\V1\Personalized
 *
 * 推荐歌单
 * 说明:调用此接口,可获取推荐歌单
 *
 * 接口地址:
 * /personalized
 *
 * 调用例子:
 * http://i.music.163.com/personalized
 *
 */
class Index extends Controller
{
    protected $uri = 'https://music.163.com/weapi/personalized/playlist';
}