<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-19
 * Time: 23:27
 */

namespace NeteaseCloudMusicApi\V1\Recommend;

use NeteaseCloudMusicApi\Controller;

/**
 * Class Resource
 * @package NeteaseCloudMusicApi\V1\Recommend
 *
 * 获取每日推荐歌单
 * 说明:调用此接口,可获得每日推荐歌单(需要登录)
 *
 * 接口地址:
 * /recommend/resource
 *
 * 调用例子:
 * http://i.music.163.com/recommend/resource
 *
 */
class Resource extends Controller
{
    protected  $uri = 'https://music.163.com/weapi/v1/discovery/recommend/resource';
}