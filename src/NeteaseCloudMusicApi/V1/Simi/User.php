<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-20
 * Time: 00:32
 */

namespace NeteaseCloudMusicApi\V1\Simi;


use NeteaseCloudMusicApi\Controller;

/**
 * Class User
 * @package NeteaseCloudMusicApi\V1\Simi
 *
 * 获取最近5个听了这首歌的用户
 * 说明:调用此接口,传入歌曲 id,最近5个听了这首歌的用户
 *
 * 必选参数:
 * id: 歌曲 id
 *
 * 接口地址:
 * /simi/user
 *
 * 调用例子:
 * http://i.music.163.com/simi/user?id=1426285166 (对应'光辉岁月'相似歌曲)
 *
 */
class User extends Controller
{
    protected $uri = 'https://music.163.com/weapi/discovery/simiUser';

    protected $params = [
        'id' => [
            'value' => null,
            'as' => 'songid'
        ],
        'offset' => 0,
        'limit' => 50,
    ];
}