<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-19
 * Time: 22:54
 */

namespace NeteaseCloudMusicApi\V1\Dj;


use NeteaseCloudMusicApi\Controller;


/**
 * Class Sub
 * @package NeteaseCloudMusicApi\V1\Dj
 *
 * 电台-订阅
 * 说明:登陆后调用此接口,传入rid,可订阅 dj,dj 的 rid 可通过搜索指定 type='1009'获取其 id,如/search?keywords=代码时间&type=1009
 *
 * 必选参数:
 * rid: 电台 的 id
 *
 * 接口地址:
 * /dj/sub
 *
 * 调用例子:
 * http://i.music.163.com/dj/sub?rid=336355127
 *
 */
class Sub extends Controller
{
    protected $uri = 'https://music.163.com/weapi/djradio/sub';

    protected $params = [
        'rid' => [
            'value' => null,
            'as' => 'id'
        ]
    ];
}