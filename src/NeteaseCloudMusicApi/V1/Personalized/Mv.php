<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-20
 * Time: 01:08
 */

namespace NeteaseCloudMusicApi\V1\Personalized;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Mv
 * @package NeteaseCloudMusicApi\V1\Personalized
 *
 * 推荐 mv
 * 说明:调用此接口,可获取推荐 mv
 *
 * 接口地址:
 * /personalized/mv
 *
 * 调用例子:
 * http://i.music.163.com/personalized/mv
 *
 */
class Mv extends Controller
{
    protected $uri = 'https://music.163.com/weapi/personalized/mv';
}