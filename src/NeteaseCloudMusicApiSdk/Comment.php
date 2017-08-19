<?php
/**
 * Created by PhpStorm.
 * User: Kilingzhang  <slight@kilingzhang.com>
 * Date: 2017/8/19
 * Time: 19:22
 */

namespace NeteaseCloudMusicApiSdk;

use PhpBoot\Application;
use PhpBoot\DI\Traits\EnableDIAnnotations;
use Utils\Request;
use Utils\Snoopy;

class Comment
{

    use EnableDIAnnotations;

    /**
     *
     * 歌曲评论
     * 说明:调用此接口,传入音乐 id和 limit 参数, 可获得该音乐的所有评论(不需要登录)
     *
     *  必选参数:
     *  id: 音乐 id
     *
     *  可选参数:
     * limit: 取出评论数量,默认为20
     *
     *  offset: 偏移数量,用于分页,如:(评论页数-1)*20, 其中 20 为 limit 的值
     *
     *  接口地址:
     *  /comment/music
     *
     *  调用例子:
     *   /comment/music?id=186016&limit=1 对应晴天评论
     *
     * @route GET /comment/music
     * @param string $id
     * @param string $offset
     * @param string $limit
     * @return string json
     */
    public function music($id, $offset = 0, $limit = 20)
    {
        $rid = $id;
        $Request = new Request();
        $data = array(
            'rid' => $rid,
            'offset' => $offset,
            'limit' => $limit,
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/v1/resource/comments/R_SO_4_{$rid}/?csrf_token=",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }


    /**
     *
     * 专辑评论
     * 说明:调用此接口,传入音乐 id和 limit 参数, 可获得该专辑的所有评论(不需要登录)
     *
     * 必选参数:
     * id: 专辑 id
     *
     * 可选参数:
     * limit: 取出评论数量,默认为20
     *
     * offset: 偏移数量,用于分页,如:(评论页数-1)*20, 其中 20 为 limit 的值
     *
     *  接口地址:
     * /comment/album
     *
     * 调用例子:
     * /comment/album?id=32311
     *
     * @route GET /comment/album
     * @param string $id
     * @param string $offset
     * @param string $limit
     * @return string json
     */
    public function album($id, $offset = 0, $limit = 20)
    {
        $rid = $id;
        $Request = new Request();
        $data = array(
            'rid' => $rid,
            'offset' => $offset,
            'limit' => $limit,
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/v1/resource/comments/R_AL_3_{$rid}/?csrf_token=",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }

    /**
     *
     *  歌单评论
     *  说明:调用此接口,传入音乐 id和 limit 参数, 可获得该歌单的所有评论(不需要登录)
     *
     *  必选参数:
     * id: 歌单 id
     *
     *   可选参数:
     *   limit: 取出评论数量,默认为20
     *
     *   offset: 偏移数量,用于分页,如:(评论页数-1)*20, 其中 20 为 limit 的值
     *
     *  接口地址:
     *  /comment/playlist
     *
     * 调用例子:
     * /comment/playlist?id=705123491
     *
     * @route GET /comment/playlist
     * @param string $id
     * @param string $offset
     * @param string $limit
     * @return string json
     */
    public function playlist($id, $offset = 0, $limit = 20)
    {
        $rid = $id;
        $Request = new Request();
        $data = array(
            'rid' => $rid,
            'offset' => $offset,
            'limit' => $limit,
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/v1/resource/comments/A_PL_0_{$rid}/?csrf_token=",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }


    /**
     *
     * mv 评论
     * 说明:调用此接口,传入音乐 id和 limit 参数, 可获得该 mv 的所有评论(不需要登录)
     *
     * 必选参数:
     *  id: mv id
     *
     * 可选参数:
     * limit: 取出评论数量,默认为20
     *
     * offset: 偏移数量,用于分页,如:(评论页数-1)*20, 其中 20 为 limit 的值
     *
     * 接口地址:
     * /comment/mv
     *
     * 调用例子:
     * /comment/mv?id=5436712
     *
     * @route GET /comment/mv
     * @param string $id
     * @param string $offset
     * @param string $limit
     * @return string json
     */
    public function mv($id, $offset = 0, $limit = 20)
    {
        $rid = $id;
        $Request = new Request();
        $data = array(
            'rid' => $rid,
            'offset' => $offset,
            'limit' => $limit,
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/v1/resource/comments/R_MV_5_{$rid}/?csrf_token=",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }

    /**
     *
     * 电台节目评论
     * 说明:调用此接口,传入音乐 id和 limit 参数, 可获得该 电台节目 的所有评论(不需要登录)
     *
     * 必选参数:
     * id: 电台节目的 id
     *
     * 可选参数:
     * limit: 取出评论数量,默认为20
     *
     * offset: 偏移数量,用于分页,如:(评论页数-1)*20, 其中 20 为 limit 的值
     *
     * 接口地址:
     * /comment/dj
     *
     * 调用例子:
     * /comment/dj?id=794062371
     *
     * @route GET /comment/dj
     * @param string $id
     * @param string $offset
     * @param string $limit
     * @return string json
     */
    public function dj($id, $offset = 0, $limit = 20)
    {
        $rid = $id;
        $Request = new Request();
        $data = array(
            'rid' => $rid,
            'offset' => $offset,
            'limit' => $limit,
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/v1/resource/comments/A_DJ_1_{$rid}/?csrf_token=",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }


    public function like()
    {

    }

}