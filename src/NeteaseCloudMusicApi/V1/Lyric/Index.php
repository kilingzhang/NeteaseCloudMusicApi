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