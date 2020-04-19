<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-19
 * Time: 22:48
 */

namespace NeteaseCloudMusicApi\V1\Dj\Recommend;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Index
 * @package NeteaseCloudMusicApi\V1\Dj\Recommend
 *
 * 电台-推荐
 * 说明:登陆后调用此接口,可获得推荐电台
 *
 * 接口地址:
 * /dj/recommend
 *
 * 调用例子:
 * http://i.music.163.com/dj/recommend
 *
 */
class Index extends Controller
{
    protected $uri = 'https://music.163.com/weapi/djradio/recommend/v1';
}