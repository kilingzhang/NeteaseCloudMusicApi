<?php
/**
 * Created by PhpStorm.
 * User: Kilingzhang  <slight@kilingzhang.com>
 * Date: 2017/8/19
 * Time: 13:54
 */

namespace NeteaseCloudMusicApiSdk;

use PhpBoot\Application;
use PhpBoot\DI\Traits\EnableDIAnnotations;
use Utils\Request;
use Utils\Snoopy;


class Search
{

    use EnableDIAnnotations;


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
     * @route GET /search
     * @param string $keywords
     * @param int $limit
     * @param int $offset
     * @param int $type
     * @return string json
     */
    public function search($keywords, $limit = 30, $offset = 0, $type = 1)
    {
        $Request = new Request();
        $data = array(
            's' => $keywords,
            'type' => $type,
            'limit' => $limit,
            'total' => 'true',
            'offset' => $offset,
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/search/get",
            'POST',
            $data
        );
        return json_decode($response, true);
    }


    /**
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
     * /search/suggest?keywords=我的一个道姑朋友
     *
     * @route GET /search/suggest
     * @param string $keyword
     * @param int $limit
     * @param int $offset
     * @param int $type
     * @return string json
     */
    public function suggest($keyword, $limit = 30, $offset = 0, $type = 1)
    {
        $Request = new Request();
        $data = array(
            's' => $keyword,
            'type' => $type,
            'limit' => $limit,
            'total' => 'true',
            'offset' => $offset,
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/search/suggest/web",
            'POST',
            $data
        );
        return json_decode($response, true);
    }


    /**
     * 搜索多重匹配
     * 说明:调用此接口,传入搜索关键词可获得搜索结果
     * 必选参数:
     * keywords : 关键词
     *
     * 接口地址:
     * /search/multimatch
     *
     * 调用例子:
     * /search/multimatch?keywords=海阔天空
     *
     * @route GET /search/suggest/multimatch
     * @param string $keyword
     * @param int $type
     * @return string json
     */
    public function multimatch($keyword, $type = 1)
    {
        $Request = new Request();
        $data = array(
            's' => $keyword || '',
            'type' => $type || 1,
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/search/suggest/multimatch",
            'POST',
            $data
        );
        return json_decode($response, true);
    }


}

