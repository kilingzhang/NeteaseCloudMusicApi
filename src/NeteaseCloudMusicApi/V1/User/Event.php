<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-19
 * Time: 21:45
 */

namespace NeteaseCloudMusicApi\V1\User;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Event
 * @package NeteaseCloudMusicApi\V1\User
 *
 * 获取用户动态
 * 说明:登陆后调用此接口,传入用户 id, 可以获取用户动态
 *
 * 必选参数:
 * uid : 用户 id
 *
 * 接口地址:
 * /user/event
 *
 * 调用例子:
 * http://i.music.163.com/user/event?uid=251183635
 *
 */
class Event extends Controller
{
    protected $uri = 'https://music.163.com/weapi/event/get/{$uid}';

    protected $params = [
        'uid' => [
            'value' => null,
            'route' => 'uid'
        ],
        'time' => -1,
        'getcounts' => true,
    ];
}