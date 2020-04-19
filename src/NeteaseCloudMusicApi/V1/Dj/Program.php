<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-19
 * Time: 23:02
 */

namespace NeteaseCloudMusicApi\V1\Dj;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Program
 * @package NeteaseCloudMusicApi\V1\Dj
 *
 * 电台-节目
 * 说明:登陆后调用此接口,传入rid,可查看对应电台的电台节目以及对应的 id, 需要注意的是这个接口返回的 mp3Url 已经无效,都为 null, 但是通过调用 /music/url 这个接口,传入节目 id 仍然能获取到节目音频,如 /music/url?id=478446370 获取代码时间的一个节目的音频
 *
 * 必选参数:
 * rid: 电台 的 id
 *
 * 接口地址:
 * /dj/sub
 *
 * 调用例子:
 * http://i.music.163.com/dj/program?rid=336355127
 *
 */
class Program extends Controller
{
    protected $uri = 'http://music.163.com/weapi/dj/program/byradio';

    protected $params = [
        'asc' => '',
        'rid' => [
            'value' => null,
            'as' => 'radioId'
        ],
        'limit' => 30,
        'offset' => 0,
    ];
}