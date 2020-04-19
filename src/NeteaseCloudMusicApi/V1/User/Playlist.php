<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-20
 * Time: 00:11
 */

namespace NeteaseCloudMusicApi\V1\User;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Playlist
 * @package NeteaseCloudMusicApi\V1\User
 *
 *
 *  http://i.music.163.com/user/playlist?uid=251183635
 */
class Playlist extends Controller
{
    protected $uri = 'https://music.163.com/weapi/user/playlist';

    protected $params = [
        'uid' => null,
        'limit' => 30,
        'offset' => 0
    ];
}