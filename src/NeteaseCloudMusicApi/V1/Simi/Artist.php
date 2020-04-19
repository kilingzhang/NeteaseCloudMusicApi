<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-20
 * Time: 00:25
 */

namespace NeteaseCloudMusicApi\V1\Simi;

use NeteaseCloudMusicApi\Controller;

/**
 * Class Artist
 * @package NeteaseCloudMusicApi\V1\Simi
 *
 * 获取相似歌手
 * 说明:调用此接口,传入歌手 id,可获得相似歌手
 *
 * 必选参数:
 * id: 歌手 id
 *
 * 接口地址:
 * /simi/artist
 *
 * 调用例子:
 * http://i.music.163.com/simi/artist?id=6452 (对应和周杰伦相似歌手)
 *
 */
class Artist extends Controller
{
    protected $uri = 'https://music.163.com/weapi/discovery/simiArtist';

    protected $params = [
        'id' => [
            'value' => null,
            'as' => 'artistid'
        ]
    ];
}