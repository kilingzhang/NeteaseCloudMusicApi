<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-20
 * Time: 00:30
 */

namespace NeteaseCloudMusicApi\V1\Simi;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Mv
 * @package NeteaseCloudMusicApi\V1\Simi
 *
 * 相似 mv
 * 说明:调用此接口,传入 mvid 可获取相似 mv 必选参数:  mvid: mv id
 *
 * 接口地址:
 * /simi/mv
 *
 * 调用例子:
 * http://i.music.163.com/simi/mv?id=5436712
 *
 */
class Mv extends Controller
{
    protected $uri = 'https://music.163.com/weapi/discovery/simiMV';

    protected $params = [
        'id' => [
            'value' => null,
            'as' => 'mvid'
        ]
    ];
}