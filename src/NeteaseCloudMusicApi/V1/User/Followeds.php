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
 * Class Followeds
 * @package NeteaseCloudMusicApi\V1\User
 *
 * 获取用户关注列表
 * 说明:登陆后调用此接口,传入用户 id, 可以获取用户关注列表
 *
 * 必选参数:
 * uid : 用户 id
 *
 * 可选参数:
 * limit : 返回数量,默认为30
 * offset : 偏移数量，用于分页,如: 如:(页数-1)*30, 其中 30 为 limit 的值,默认为0
 *
 * 接口地址:
 * /user/followeds
 *
 * 调用例子:
 * http://i.music.163.com/user/followeds?uid=251183635
 *
 */
class Followeds extends Controller
{
    protected $uri = 'https://music.163.com/weapi/user/getfolloweds/{$uid}';

    protected $params = [
        'uid' => [
            'value' => null,
            'route' => 'uid'
        ],
        'order' => true,
        'limit' => 30,
        'offset' => 0,
    ];
}