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
 * Class Album
 * @package NeteaseCloudMusicApi\V1\Top
 *
 * 新碟上架
 * 说明:调用此接口,可获取新碟上架列表,如需具体音乐信息需要调用获取专辑列表接口 /album ,
 * 然后传入 id, 如 /album?id=32311&limit=30
 *
 * 可选参数:
 * limit: 取出数量,默认为50
 * offset: 偏移数量,用于分页,如:(页数-1)*50, 其中 50 为 limit 的值,默认为0
 * area ALL, ZH,EA,KR,JP
 *
 * 接口地址:
 * /top/album
 *
 * 调用例子:
 * http://i.music.163.com/top/album?area=all
 *
 */
class Album extends Controller
{
    protected $uri = 'https://music.163.com/weapi/album/new';

    protected $params = [
        'area' => 'all',
        'total' => true,
        'offset' => 0,
        'limit' => 30,
    ];
}