<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-20
 * Time: 00:06
 */

namespace NeteaseCloudMusicApi\V1\Playlist;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Tracks
 * @package NeteaseCloudMusicApi\V1\Playlist
 *
 * 收藏单曲到歌单
 * 说明:调用此接口,传入音乐 id和 limit 参数, 可获得该专辑的所有评论(需要登录)
 *
 * 必选参数:
 * op: 从歌单增加单曲为add,删除为 del pid: 歌单id tracks: 歌曲id
 *
 * 接口地址:
 * /playlist/tracks
 *
 * 调用例子:
 * http://i.music.163.com/playlist/tracks?op=add&pid=313997889&tracks=1426285166
 *
 */
class Tracks extends Controller
{
    protected $uri = 'https://music.163.com/weapi/playlist/manipulate/tracks';

    protected $params = [
        'op' => null,
        'pid' => null,
        'tracks' => null,
    ];

    protected function parseParams($params): array
    {
        $params['trackIds'] = "[{$params['tracks']}]";
        return $params;
    }
}