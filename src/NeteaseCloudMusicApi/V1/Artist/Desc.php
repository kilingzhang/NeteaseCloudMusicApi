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
 * 获取歌手描述
 * 说明:调用此接口,传入歌手 id,可获得歌手描述
 *
 * 必选参数:
 * id: 歌手 id
 *
 * 接口地址:
 * /artist/desc
 *
 * 调用例子:
 * http://i.music.163.com/artist/desc?id=6452 (周杰伦)
 *
 */
class Desc extends Controller
{
    protected $uri = 'https://music.163.com/weapi/artist/introduction';

    protected $params = [
        'id' => null,
        'csrf_token' => '',
    ];
}