<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-19
 * Time: 02:29
 */

namespace NeteaseCloudMusicApi\V1\Album;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Index
 * @package NeteaseCloudMusicApi\V1\Album

 * 获取专辑内容
 * 说明:调用此接口,传入专辑 id,可获得专辑内容
 *
 * 必选参数:
 * id: 专辑 id
 *
 * 接口地址:
 * /album
 *
 * 调用例子:
 * http://i.music.163.com/album?id=32311
 *
 */
class Index extends Controller
{
    protected $uri = 'https://music.163.com/weapi/v1/album/{$id}';

    protected $params = [
        'id' => [
            'value' => null,
            'route' => 'id',
        ],
    ];
}