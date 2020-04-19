<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-19
 * Time: 02:50
 */

namespace NeteaseCloudMusicApi\V1\Banner;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Index
 * @package NeteaseCloudMusicApi\V1\Banner
 *
 * 说明 : 调用此接口 , 可获取 banner( 轮播图 ) 数据
 * 可选参数 :
 * type:资源类型,对应以下类型,默认为 0 即PC
 * 0: pc
 * 1: android
 * 2: iphone
 * 3: ipad
 *
 * 接口地址:
 * /banner
 *
 * 调用例子:
 * http://i.music.163.com/banner?type=1
 */
class Index extends Controller
{
    protected $uri = 'https://music.163.com/api/v2/banner/get';

    protected $params = [
        'type' => [
            'value' => null,
            'as' => 'clientType',
            'enum' => [
                0 => 'pc',
                1 => 'android',
                2 => 'iphone',
                3 => 'ipad',
            ]
        ],
    ];

    protected $options = [
        'crypto' => 'linuxapi',
        'url' => 'https://music.163.com/api/v2/banner/get',
    ];
}