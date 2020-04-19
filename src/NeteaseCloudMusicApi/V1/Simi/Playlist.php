<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-20
 * Time: 00:26
 */

namespace NeteaseCloudMusicApi\V1\Simi;

use NeteaseCloudMusicApi\Controller;

/**
 * Class Playlist
 * @package NeteaseCloudMusicApi\V1\Simi
 *
 * 获取相似歌单
 * 说明:调用此接口,传入歌曲 id,可获得相似歌单
 *
 * 必选参数:
 * id: 歌曲 id
 *
 * 接口地址:
 * /simi/playlist
 *
 * 调用例子:
 * http://i.music.163.com/simi/playlist?id=347230 (对应'光辉岁月'相似歌单)
 *
 */
class Playlist extends Controller
{
    protected $uri = 'https://music.163.com/weapi/discovery/simiPlaylist';

    protected $params = [
        'id' => [
            'value' => null,
            'as' => 'songid'
        ],
        'offset' => 0,
        'limit' => 30,
    ];
}