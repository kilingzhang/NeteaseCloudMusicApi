<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-19
 * Time: 13:55
 */

namespace NeteaseCloudMusicApi\V1\Mv;


use NeteaseCloudMusicApi\Controller;

/**
 * Class First
 * @package NeteaseCloudMusicApi\V1\Mv
 *
 * 说明 : 调用此接口 , 可获取最新 mv
 *
 * 可选参数 : area: 地区,可选值为全部,内地,港台,欧美,日本,韩国,不填则为全部
 *
 * 可选参数 : limit: 取出数量 , 默认为 30
 *
 * 接口地址 : /mv/first
 *
 * 调用例子 : http://i.music.163.com/mv/first?limit=10
 */
class First extends Controller
{
    protected $uri = 'https://music.163.com/weapi/mv/first';

    protected $params = [
        'area' => '',
        'total' => true,
        'limit' => 20,
    ];
}