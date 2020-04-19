<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-19
 * Time: 02:50
 */

namespace NeteaseCloudMusicApi\V1\Artist;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Desc
 * @package NeteaseCloudMusicApi\V1\Artist
 *
 * 获取歌手单曲
 * 说明:调用此接口,传入歌手 id,可获得歌手单曲
 *
 * 必选参数:
 * id: 歌手 id,可由搜索接口获得
 *
 * 接口地址:
 * /artist
 *
 * 调用例子:
 * http://i.music.163.com/artist?id=6452
 *
 */
class Index extends Controller
{
    protected $uri = 'https://music.163.com/weapi/v1/artist/{$id}?offset={$offset}&limit={$limit}';

    protected $params = [
        'id' => [
            'value' => null,
            'route' => 'id',
        ],
        'offset' => [
            'value' => 0,
            'route' => 'offset',
        ],
        'limit' => [
            'value' => 50,
            'route' => 'limit',
        ],
        'csrf_token' => '',
    ];
}