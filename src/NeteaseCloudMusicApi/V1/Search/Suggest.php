<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-19
 * Time: 02:51
 */

namespace NeteaseCloudMusicApi\V1\Search;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Suggest
 * @package NeteaseCloudMusicApi\V1\Search
 *
 * 搜索建议
 * 说明:调用此接口,传入搜索关键词可获得搜索建议,搜索结果同时包含单曲,歌手,歌单,mv 信息
 *
 * 必选参数:
 * keywords : 关键词
 *
 * 可选参数:
 * limit : 返回数量,默认为30
 * offset : 偏移数量，用于分页,如: 如:(页数-1)*30, 其中 30 为 limit 的值,默认为0
 * type: 搜索类型；默认为1即单曲,取值意义:
 *
 * 1: 单曲
 * 10: 专辑
 * 100: 歌手
 * 1000: 歌单
 * 1002: 用户
 * 1004: MV
 * 1006: 歌词
 * 1009: 电台
 *
 * 接口地址:
 * /search/suggest
 *
 * 调用例子:
 * http://i.music.163.com/search/suggest?keywords=%E6%88%91%E7%9A%84%E4%B8%80%E4%B8%AA%E9%81%93%E5%A7%91%E6%9C%8B%E5%8F%8B
 *
 */
class Suggest extends Controller
{
    protected $uri = 'https://music.163.com/weapi/search/suggest/web';

    protected $params = [
        'keywords' => [
            'value' => null,
            'as' => 's'
        ],
        'limit' => 30,
        'offset' => 0,
        'type' => 1,
        'csrf_token' => '',
        'total' => 'true',
    ];

    protected $options = [
        'crypto' => 'weapi',
    ];

    protected function newResponse(array $response): array
    {
        return empty($response['result']) ? [] : $response['result'];
    }
}