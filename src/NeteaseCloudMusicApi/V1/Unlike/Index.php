<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-19
 * Time: 23:43
 */

namespace NeteaseCloudMusicApi\V1\Unlike;

use NeteaseCloudMusicApi\Controller;

/**
 * Class Index
 * @package NeteaseCloudMusicApi\V1\Unlike
 *
 * 喜欢音乐
 * 说明:调用此接口,传入音乐 id, 可喜欢该音乐
 *
 * 必选参数:
 * id: 歌曲 id
 *
 * 可选参数:
 * like: 布尔值,默认为 true 即喜欢,若传 false, 则取消喜欢
 *
 * 接口地址:
 * /like
 *
 * 调用例子:
 * http://i.music.163.com/unlike?id=347230
 *
 */
class Index extends Controller
{
    protected $uri = 'https://music.163.com/weapi/radio/like?alg={$alg}&trackId={$trackId}&like=false&time={$time}';

    protected $params = [
        'id' => [
            'value' => null,
            'route' => 'trackId'
        ],
        'alg' => [
            'value' => 'itembased',
            'route' => 'alg'
        ],
        'time' => [
            'value' => 25,
            'route' => 'time'
        ]
    ];

    protected function parseParams($params): array
    {
        $params['like'] = false;
        $params['trackId'] = $params['id'];
        return $params;
    }
}