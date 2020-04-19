<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-19
 * Time: 21:50
 */

namespace NeteaseCloudMusicApi\V1\User\Cloud;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Index
 * @package NeteaseCloudMusicApi\V1\User
 *
 * 云盘
 * 说明:登陆后调用此接口,可获取云盘数据,获取的数据没有对应 url,
 * 需要再调用一次 /music/url 获取 url
 *
 * 接口地址:
 * /user/cloud
 *
 * 调用例子:
 * http://i.music.163.com/user/cloud
 *
 */
class Index extends Controller
{
    protected $uri = 'https://music.163.com/weapi/v1/cloud/get';

    protected $params = [
        'limit' => 30,
        'offset' => 0,
    ];
}