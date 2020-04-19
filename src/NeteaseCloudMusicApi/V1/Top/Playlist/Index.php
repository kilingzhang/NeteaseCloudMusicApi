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
 * Class Index
 * @package NeteaseCloudMusicApi\V1\Top\Playlist
 *
 * 歌单(网友精选碟)
 * 说明:调用此接口,可获取网友精选碟歌单
 *
 * 可选参数:
 * order: 可选值为 'new' 和 'hot',分别对应最新和最热,默认为 'hot'
 *
 * 接口地址:
 * /top/playlist
 *
 * 调用例子:
 * http://i.music.163.com/top/playlist?limit=10&order=new&cat=%E5%85%A8%E9%83%A8
 *
 */
class Index extends Controller
{
    protected $uri = 'https://music.163.com/weapi/playlist/list';

    protected $params = [
        'cat' => '全部',
        'order' => 'hot',
        'total' => true,
        'offset' => 0,
        'limit' => 20,
    ];
}