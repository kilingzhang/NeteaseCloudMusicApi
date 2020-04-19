<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-19
 * Time: 22:58
 */

namespace NeteaseCloudMusicApi\V1\Dj;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Detail
 * @package NeteaseCloudMusicApi\V1\Dj
 *
 * 电台-详情
 * 说明:登陆后调用此接口,传入rid,可获得对应电台的详情介绍
 *
 * 必选参数:
 * rid: 电台 的 id
 *
 * 接口地址:
 * /dj/detail?rid=336355127
 *
 * 调用例子:
 * http://i.music.163.com/dj/detail?rid=336355127
 *
 */
class Detail extends Controller
{
    protected $uri = 'http://music.163.com/weapi/djradio/get';

    protected $params = [
        'rid' => [
            'value' => null,
            'as' => 'id'
        ]
    ];
}