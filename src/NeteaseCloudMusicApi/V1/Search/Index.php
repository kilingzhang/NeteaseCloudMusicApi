<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-18
 * Time: 15:44
 */

namespace NeteaseCloudMusicApi\V1\Search;

use NeteaseCloudMusicApi\Controller;

/**
 * Class Index
 * @package NeteaseCloudMusicApi\V1\Search
 *
 * 搜索
 * 说明:调用此接口,传入搜索关键词可以搜索该音乐/专辑/歌手/歌单/用户,关键词可以多个,以空格隔开,
 * 如"我的一个道姑朋友 "(不需要登录),
 * 搜索获取的 mp3url 不能直接用,可通过 /music/url 接口传入歌曲 id 获取具体的播放链接
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
 * /search
 *
 * 调用例子:
 * http://i.music.163.com/search?keywords=%E6%88%91%E7%9A%84%E4%B8%80%E4%B8%AA%E9%81%93%E5%A7%91%E6%9C%8B%E5%8F%8B
 *
 */
class Index extends Controller
{
    protected $uri = 'https://music.163.com/weapi/search/get';

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
}