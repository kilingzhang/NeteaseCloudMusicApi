<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-18
 * Time: 22:25
 */

namespace NeteaseCloudMusicApi\V1\Lyric;


use NeteaseCloudMusicApi\Controller;
use Utils\Request;

/**
 * Class Index
 * @package NeteaseCloudMusicApi\V1\Lyric
 *
 * 获取歌词
 * 说明 : 调用此接口 , 传入音乐 id 可获得对应音乐的歌词 ( 不需要登录 )
 *
 * 必选参数 : id: 音乐 id
 *
 * 接口地址 : /lyric
 *
 * 调用例子 : http://i.music.163.com/lyric?id=33894312
 *
 */
class Index extends Controller
{
    protected $uri = 'https://music.163.com/api/song/lyric';

    protected $params = [
        'id' => null,
        'lv' => -1,
        'kv' => -1,
        'tv' => -1
    ];

    protected $options = [
        'crypto' => 'linuxapi',
        'url' => 'https://music.163.com/api/song/lyric'
    ];

    protected function newRequest(Request $request): Request
    {
        return $request->setCookie('os', 'pc');
    }
}