<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-19
 * Time: 21:50
 */

namespace NeteaseCloudMusicApi\V1\User\Cloud;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Detail
 * @package NeteaseCloudMusicApi\V1\User
 *
 * 云盘数据详情
 *
 * 接口地址:
 * /user/cloud/search
 *
 * 调用例子:
 * http://i.music.163.com/user/cloud/detail?id=102138
 *
 */
class Detail extends Controller
{
    protected $uri = 'https://music.163.com/weapi/v1/cloud/get/byids';

    protected $params = [
        'id' => [
            'value' => null,
            'as' => 'songIds'
        ],
    ];

    protected function parseParams($params): array
    {
        $params['songIds'] = explode(',', $params['songIds']);
        return $params;
    }

    protected function newResponse(array $response): array
    {
        return empty($response['data']) ? [] : $response['data'];
    }
}