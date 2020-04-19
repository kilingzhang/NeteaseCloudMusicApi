<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-19
 * Time: 13:26
 */

namespace NeteaseCloudMusicApi\V1\Mv;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Index
 * @package NeteaseCloudMusicApi\V1\Mv
 *
 * mv 地址
 * 说明 : 调用此接口 , 传入 mv id,可获取 mv 播放地址
 *
 * 可选参数 : id: mv id
 *
 * 接口地址 : /mv/url
 *
 * 调用例子:
 * http://i.music.163.com/mv/url?id=5436712
 *
 */
class Url extends Controller
{
    protected $uri = 'https://music.163.com/weapi/song/enhance/play/mv/url';

    protected $params = [
        'id' => null,
        'r' => 1080
    ];
}