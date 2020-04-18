<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-18
 * Time: 15:44
 */

namespace NeteaseCloudMusicApi\V1\Search;

use NeteaseCloudMusicApi\Controller;
use Utils\Request;
use Utils\Response;

class Index extends Controller
{
    /**
     * @throws \Exception
     */
    public function run()
    {
        $keywords = self::get("keywords");
        $limit = self::get("limit", 30);
        $offset = self::get("offset", 0);
        $type = self::get("type", 1);
        $response = $this->search($keywords, $limit, $offset, $type);
        Response::success($response);
    }

    /**
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
     * /search?keywords=我的一个道姑朋友
     *
     * @param string $keywords
     * @param int $limit
     * @param int $offset
     * @param int $type
     * @return array
     */
    public function search(string $keywords, int $limit = 30, int $offset = 0, int $type = 1): array
    {
        $data = array(
            's' => $keywords,
            'type' => $type,
            'limit' => $limit,
            'total' => 'true',
            'offset' => $offset,
            'csrf_token' => '',
        );

        return (new Request)->createRequest(
            "http://music.163.com/weapi/search/get",
            $data,
            [
                'crypto' => 'weapi',
                'ua' => '',
            ]
        );
    }
}