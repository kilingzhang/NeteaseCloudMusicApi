<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-20
 * Time: 00:03
 */

namespace NeteaseCloudMusicApi\V1\Playlist;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Detail
 * @package NeteaseCloudMusicApi\V1\Playlist
 *
 * 获取歌单详情
 * 说明:歌单能看到歌单名字,但看不到具体歌单内容,调用此接口,传入歌单 id,可以获取对应歌单内的所有的音乐
 *
 * 必选参数:
 * id : 歌单 id
 *
 * 接口地址:
 * /playlist/detail
 *
 * 调用例子:
 * http://i.music.163.com/playlist/detail?id=24381616
 *
 */
class Detail extends Controller
{
    protected $uri = 'https://music.163.com/weapi/v3/playlist/detail';

    protected $params = [
        'id' => null,
        'offset' => 0,
        'limit' => 30,
        'total' => true,
        'n' => 30,
    ];
}