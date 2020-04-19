<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-19
 * Time: 22:12
 */

namespace NeteaseCloudMusicApi\V1\Music;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Url
 * @package NeteaseCloudMusicApi\V1\Music
 *
 * 获取音乐 url
 * 说明:使用歌单详情接口后,能得到的音乐的 id, 但不能得到的音乐 url, 调用此接口,传入的音乐 id(可多个,用逗号隔开),可以获取对应的音乐的 url(不需要登录)
 *
 *  必选参数:
 * id : 音乐 id
 *
 * 接口地址:
 * /music/url
 *
 * 调用例子:
 * http://i.music.163.com/music/url?ids=1318877129
 * http://i.music.163.com/music/url?ids=1318877129,1426285166
 *
 */
class Url extends Controller
{
    protected $uri = 'https://music.163.com/weapi/song/enhance/player/url';

    protected $params = [
        'ids' => null,
        'br' => 999000
    ];

    protected function parseParams($params): array
    {
        $params['ids'] = json_encode(explode(',', $params['ids']));
        return $params;
    }
}