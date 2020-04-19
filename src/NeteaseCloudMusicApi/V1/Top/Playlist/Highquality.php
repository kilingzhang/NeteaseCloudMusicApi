<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-20
 * Time: 00:43
 */

namespace NeteaseCloudMusicApi\V1\Top\Playlist;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Highquality
 * @package NeteaseCloudMusicApi\V1\Top\Playlist
 *
 * 获取精品歌单
 * 说明:调用此接口,可获取精品歌单
 *
 * 可选参数:
 * cat: tag, 比如 "华语"、"古风" 、"欧美"、"流行",默认为"全部"
 *
 * limit: 取出评论数量,默认为20
 *
 * 接口地址:
 * /top/playlist/highquality
 *
 * 调用例子:
 * http://i.music.163.com/top/playlist/highquality?limit=20&cat=%E5%85%A8%E9%83%A8
 *
 */
class Highquality extends Controller
{
    protected $uri = 'https://music.163.com/weapi/playlist/highquality/list';

    protected $params = [
        'cat' => '全部',
        'offset' => 0,
        'limit' => 20,
    ];
}