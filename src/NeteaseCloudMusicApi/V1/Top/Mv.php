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
 * Class Mv
 * @package NeteaseCloudMusicApi\V1\Top
 *
 *  mv 排行
 * 说明:调用此接口,可获取 mv 排行
 *
 * 可选参数:
 * limit: 取出数量,默认为 30
 *
 * offset: 偏移数量,用于分页,如:(页数-1)*30, 其中 30 为 limit 的值,默认为0
 *
 * 接口地址:
 * top/mv
 *
 * 调用例子:
 * http://i.music.163.com/top/mv
 *
 */
class Mv extends Controller
{
    protected $uri = 'https://music.163.com/weapi/mv/toplist';

    protected $params = [
        'total' => true,
        'offset' => 0,
        'limit' => 20,
    ];
}