<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-19
 * Time: 23:09
 */

namespace NeteaseCloudMusicApi\V1\Program;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Recommend
 * @package NeteaseCloudMusicApi\V1\Program
 *
 * 推荐节目
 * 说明:调用此接口,可获取推荐电台
 *
 * 接口地址:
 * /program/recommend
 *
 * 调用例子:
 * http://i.music.163.com/program/recommend
 *
 */
class Recommend extends Controller
{
    protected $uri = 'https://music.163.com/weapi/program/recommend/v1';

    protected $params = [
        'limit' => 10,
        'offset' => 0
    ];
}