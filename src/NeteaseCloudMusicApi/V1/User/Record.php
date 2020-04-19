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
 * Class Record
 * @package NeteaseCloudMusicApi\V1\User
 *
 * 获取用户播放记录
 * 说明:登陆后调用此接口,传入用户 id,可获取用户播放记录
 *
 * 必选参数:
 * uid : 用户 id
 *
 * 可选参数:
 * type : type=1时只返回weekData, type=0时返回allData
 *
 * 接口地址:
 * /user/record
 *
 * 调用例子:
 * http://i.music.163.com/user/record?uid=251183635&type=1
 *
 */
class Record extends Controller
{
    protected $uri = 'https://music.163.com/weapi/event/get/{$uid}';

    protected $params = [
        'uid' => [
            'value' => null,
            'route' => 'uid'
        ],
        'type' => 1,
    ];
}