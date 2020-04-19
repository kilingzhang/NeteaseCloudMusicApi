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
 * 获取歌手 mv
 * 说明:
 * 调用此接口,传入歌手 id,可获得歌手 mv 信息
 * 具体 mv 播放地址可调用 /mv 传入此接口获得的mvid来拿到
 * 如:
 * /artist/mv?id=6452
 * /mv?mvid=5461064
 *
 * 必选参数:
 * id: 歌手 id,可由搜索接口获得
 *
 * 接口地址:
 * /artist/mv
 *
 * 调用例子:
 * http://i.music.163.com/artist/mv?id=6452
 */
class Mv extends Controller
{
    protected $uri = 'https://music.163.com/weapi/artist/mvs';

    protected $params = [
        'id' => [
            'value' => null,
            'as' => 'artistId'
        ],
        'total' => true,
        'offset' => 0,
        'limit' => 50,
    ];
}