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
 * 获取歌曲详情
 * 说明:调用此接口,传入音乐 id, 可获得歌曲详情
 *
 * 必选参数:
 * ids: 音乐 id,如 ids=1318877129,1426285166
 *
 *  接口地址:
 *  /song/detail
 *
 * 调用例子:
 * http://i.music.163.com/song/detail?ids=1318877129,1426285166
 *
 */
class Detail extends Controller
{
    protected $uri = 'https://music.163.com/weapi/v3/song/detail';

    protected $params = [
        'ids' => null,
    ];

    protected function parseParams($params): array
    {
        $ids = explode(',', $params['ids']);
        $c = array_map(function ($item) {
            return ['id' => $item];
        }, $ids);

        $params['ids'] = json_encode($ids);
        $params['c'] = json_encode($c);

        return $params;
    }
}