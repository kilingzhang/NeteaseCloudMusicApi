<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-19
 * Time: 22:30
 */

namespace NeteaseCloudMusicApi\V1\Personal;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Fm
 * @package NeteaseCloudMusicApi\V1\Personal
 *
 * 私人 FM
 * 说明:私人 FM( 需要登录)
 *
 * 接口地址:
 * /personal/fm
 *
 * 调用例子:
 * http://i.music.163.com/personal/fm
 *
 */
class Fm extends Controller
{
    protected $uri = 'https://music.163.com/weapi/v1/radio/get';
}