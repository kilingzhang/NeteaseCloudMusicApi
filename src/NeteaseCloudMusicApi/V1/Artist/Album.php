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
 * 获取歌手专辑
 * 说明:调用此接口,传入歌手 id,可获得歌手专辑内容
 *
 * 必选参数:
 * id: 歌手 id
 *
 * 可选参数:
 * limit: 取出数量,默认为50
 *
 * offset: 偏移数量,用于分页,如:(页数-1)*50, 其中 50 为 limit 的值,默认为0
 *
 * 接口地址:
 * /artist/album
 *
 * 调用例子:
 * http://i.music.163.com/artist/album?id=6452&limit=30 (周杰伦)
 *
 */
class Album extends Controller
{
    protected $uri = 'https://music.163.com/weapi/artist/albums/{$id}';

    protected $params = [
        'id' => [
            'value' => null,
            'route' => 'id'
        ],
        'total' => true,
        'offset' => 0,
        'limit' => 50,
        'csrf_token' => '',
    ];
}