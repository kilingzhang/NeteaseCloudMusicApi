<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-20
 * Time: 00:32
 */

namespace NeteaseCloudMusicApi\V1\Simi;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Song
 * @package NeteaseCloudMusicApi\V1\Simi
 *
 * 获取相似音乐
 * 说明:调用此接口,传入歌曲 id,可获得相似歌曲
 *
 * 必选参数:
 * id: 歌曲 id
 *
 * 接口地址:
 * /simi/song
 *
 * 调用例子:
 * http://i.music.163.com/simi/song?id=347230 (对应'光辉岁月'相似歌曲)
 *
 */
class Song extends Controller
{
    protected $uri = 'https://music.163.com/weapi/v1/discovery/simiSong';

    protected $params = [
        'id' => [
            'value' => null,
            'as' => 'songid'
        ],
        'offset' => 0,
        'limit' => 50,
    ];
}