<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-19
 * Time: 22:52
 */

namespace NeteaseCloudMusicApi\V1\Dj\Recommend;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Type
 * @package NeteaseCloudMusicApi\V1\Dj\Recommend
 *
 * 电台-分类推荐
 * 说明:登陆后调用此接口,可获得推荐电台
 *
 * 必选参数:
 * type: 电台类型,数字,可通过/dj/catelist获取,对应关系为 id 对应 此接口的 type, name 对应类型意义
 *
 * 接口地址:
 * /dj/recommend/type
 *
 * 调用例子:
 * http://i.music.163.com/dj/recommend/type?type=1
 *
 */
class Type extends Controller
{
    protected $uri = 'https://music.163.com/weapi/djradio/recommend';

    protected $params = [
        'type' => [
            'value' => null,
            'as' => 'cateId'
        ]
    ];
}