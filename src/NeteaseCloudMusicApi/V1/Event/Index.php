<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-19
 * Time: 23:07
 */

namespace NeteaseCloudMusicApi\V1\Event;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Index
 * @package NeteaseCloudMusicApi\V1\Event
 *
 * 获取动态消息
 * 说明:调用此接口,可获取各种动态,对应网页版网易云，朋友界面里的各种动态消息，如分享的视频，音乐，照片等！
 *
 * 必选参数:
 * 未知
 *
 * 接口地址:
 * /event
 *
 * 调用例子:
 * http://i.music.163.com/event
 *
 */
class Index extends Controller
{
    protected $uri = 'https://music.163.com/weapi/v1/event/get';
}