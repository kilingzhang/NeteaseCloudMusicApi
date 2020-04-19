<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-19
 * Time: 03:03
 */

namespace NeteaseCloudMusicApi\V1\Search;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Multimatch
 * @package NeteaseCloudMusicApi\V1\Search
 *
 * 搜索多重匹配
 * 说明:调用此接口,传入搜索关键词可获得搜索结果
 * 必选参数:
 * keywords : 关键词
 *
 * 接口地址:
 * /search/multimatch
 *
 * 调用例子:
 * http://i.music.163.com/search/multimatch?keywords=%E6%88%91%E7%9A%84%E4%B8%80%E4%B8%AA%E9%81%93%E5%A7%91%E6%9C%8B%E5%8F%8B
 *
 */
class Multimatch extends Controller
{
    protected $uri = 'https://music.163.com/weapi/search/suggest/multimatch';

    protected $params = [
        'keywords' => [
            'value' => null,
            'as' => 's'
        ],
        'type' => 1,
    ];

    protected function newResponse(array $response): array
    {
        return empty($response['result']) ? [] : $response['result'];
    }
}