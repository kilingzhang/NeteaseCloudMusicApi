<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-19
 * Time: 23:30
 */

namespace NeteaseCloudMusicApi\V1\Recommend;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Songs
 * @package NeteaseCloudMusicApi\V1\Recommend
 *
 * 获取每日推荐歌曲
 * 说明:调用此接口,可获得每日推荐歌曲(需要登录)
 *
 * 接口地址:
 * /recommend/songs
 *
 * 调用例子:
 * http://i.music.163.com/recommend/songs
 *
 */
class Songs extends Controller
{
    protected $uri = 'https://music.163.com/weapi/v1/discovery/recommend/songs';

    protected $params = [
        'total' => true,
        'offset' => 0,
        'limit' => 20,
    ];
}