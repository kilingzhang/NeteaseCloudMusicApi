<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-19
 * Time: 22:20
 */

namespace NeteaseCloudMusicApi\V1\Song;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Detail
 * @package NeteaseCloudMusicApi\V1\Song
 *
 * 获取音乐 url
 * 说明 : 使用歌单详情接口后 , 能得到的音乐的 id, 但不能得到的音乐 url, 调用此接口 , 传入的音乐 id( 可多个 , 用逗号隔开 ), 可以获取对应的音乐的 url( 不需要登录 )
 *
 * 注 : 部分用户反馈获取的 url 会 403,hwaphon 找到的 解决方案是当获取到音乐的 id 后，将 https://music.163.com/song/media/outer/url?id=id.mp3 以 src 赋予 Audio 即可播放
 *
 * 必选参数 : id : 音乐 id
 *
 * 可选参数 : br: 码率,默认设置了 999000 即最大码率,如果要 320k 则可设置为 320000,其他类推
 * 接口地址 : /song/url
 *
 * 调用例子 :
 * http://i.music.163.com/song/url?ids=33894312
 * http://i.music.163.com/song/url?ids=405998841,33894312
 *
 */
class Url extends Controller
{
    protected $uri = 'https://music.163.com/api/song/enhance/player/url';

    protected $params = [
        'ids' => null,
        'br' => 999000
    ];

    protected $options = [
        'crypto' => 'linuxapi',
        'ua' => 'pc',
        'url' => 'https://music.163.com/api/song/enhance/player/url'
    ];

    protected function parseParams($params): array
    {
        $params['ids'] = "[{$params['ids']}]";
        $params['br'] = intval($params['br']);
        return $params;
    }
}