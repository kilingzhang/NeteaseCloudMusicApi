<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-20
 * Time: 00:44
 */

namespace NeteaseCloudMusicApi\V1\Top;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Artists
 * @package NeteaseCloudMusicApi\V1\Top
 *
 * 热门歌手
 * 说明:调用此接口,可获取热门歌手数据
 *
 * 可选参数:
 * limit: 取出数量,默认为50
 *
 * offset: 偏移数量,用于分页,如:(页数-1)*50, 其中 50 为 limit 的值,默认为0
 *
 * 接口地址:
 * /top/artists
 *
 * 调用例子:
 * http://i.music.163.com/top/artists
 *
 */
class Artists extends Controller
{
    protected $uri = 'https://music.163.com/weapi/artist/top';

    protected $params = [
        'total' => true,
        'offset' => 0,
        'limit' => 20,
    ];
}