<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-19
 * Time: 23:37
 */

namespace NeteaseCloudMusicApi\V1\Fm;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Trash
 * @package NeteaseCloudMusicApi\V1\Fm
 *
 * 垃圾桶
 * 说明:调用此接口,传入音乐 id, 可把该音乐从私人 FM中移除至垃圾桶
 *
 * 必选参数:
 * id: 歌曲 id
 *
 * 接口地址:
 * /fm/trash
 *
 * 调用例子:
 * http://i.music.163.com/fm/trash?id=347230
 *
 */
class Trash extends Controller
{
    protected $uri = 'https://music.163.com/weapi/radio/trash/add?alg={$alg}&songId={$id}&time={$time}';

    protected $params = [
        'id' => [
            'value' => null,
            'route' => 'id'
        ],
        'alg' => [
            'value' => 'RT',
            'route' => 'alg'
        ],
        'time' => [
            'value' => 25,
            'route' => 'time'
        ],
    ];

    protected function parseParams($params): array
    {
        $params['songId'] = $params['id'];
        return $params;
    }
}