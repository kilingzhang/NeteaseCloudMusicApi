<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-19
 * Time: 21:29
 */

namespace NeteaseCloudMusicApi\V1\Daily;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Signin
 * @package NeteaseCloudMusicApi\V1\Daily
 *
 * 0 安卓端签到 3点经验
 * 1 网页签到  2点经验
 * 签到成功  {'android': {'point': 3, 'code': 200}, 'web': {'point': 2, 'code': 200}}
 * 重复签到 {'android': {'code': -2, 'msg': '重复签到'}, 'web': {'code': -2, 'msg': '重复签到'}}
 * 未登录   {'android': {'code': 301}, 'web': {'code': 301}}
 *
 * http://i.music.163.com/daily/signin?type=0
 *
 */
class Signin extends Controller
{
    protected $uri = 'https://music.163.com/weapi/point/dailyTask';

    protected $params = [
        'type' => 0,
    ];
}