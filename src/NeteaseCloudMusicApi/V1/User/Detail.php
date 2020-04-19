<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-19
 * Time: 21:37
 */

namespace NeteaseCloudMusicApi\V1\User;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Detail
 * @package NeteaseCloudMusicApi\V1\User
 *
 * 获取用户详情
 * 说明:登陆后调用此接口,传入用户 id, 可以获取用户详情
 *
 * 必选参数:
 * uid : 用户 id
 *
 * 接口地址:
 * /user/detail
 *
 * 调用例子:
 * http://i.music.163.com/user/detail?uid=251183635
 *
 */
class Detail extends Controller
{
    protected $uri = 'https://music.163.com/weapi/v1/user/detail/{$uid}';

    protected $params = [
        'uid' => [
            'value' => null,
            'route' => 'uid'
        ]
    ];
}