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

class Simi
{

    use EnableDIAnnotations;

    //TODO 需要登录貌似

    /**
     *
     * 获取相似歌手
     * 说明:调用此接口,传入歌手 id,可获得相似歌手
     *
     * 必选参数:
     * id: 歌手 id
     *
     * 接口地址:
     * /simi/artist
     *
     * 调用例子:
     * /simi/artist?id=6452 (对应和周杰伦相似歌手)
     * @route GET /simi/artist
     * @param string $id
     * @return string json
     */
    public function artist($id)
    {
        $Request = new Request();
        $data = array(
            'artistid' => $id,
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/discovery/simiArtist",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }

    //TODO 需要登录貌似

    /**
     *
     * 获取相似歌单
     * 说明:调用此接口,传入歌曲 id,可获得相似歌单
     *
     * 必选参数:
     * id: 歌曲 id
     *
     * 接口地址:
     * /simi/playlist
     *
     * 调用例子:
     * /simi/playlist?id=347230 (对应'光辉岁月'相似歌单)
     * @route GET /simi/playlist
     * @param string $id
     * @param int $offset
     * @param int $limit
     * @return string json
     */
    public function playlist($id, $offset = 0, $limit = 50)
    {
        $Request = new Request();
        $data = array(
            'songid' => $id,
            'offset' => $offset,
            'limit' => $limit,
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/discovery/simiPlaylist",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }


    /**
     *
     * 相似 mv
     * 说明:调用此接口,传入 mvid 可获取相似 mv 必选参数:  mvid: mv id
     *
     * 接口地址:
     * /simi/mv
     *
     * 调用例子:
     * /simi/mv?mvid=5436712
     *
     * @route GET /simi/mv
     * @param string $mvid
     * @return string json
     */
    public function mv($mvid)
    {
        $Request = new Request();
        $data = array(
            'mvid' => $mvid,
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/discovery/simiMV",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }


    //TODO 需要登录貌似

    /**
     *
     * 获取相似音乐
     * 说明:调用此接口,传入歌曲 id,可获得相似歌曲
     *
     * 必选参数:
     * id: 歌曲 id
     *
     * 接口地址:
     * /simi/song
     *
     * 调用例子:
     * /simi/song?id=347230 (对应'光辉岁月'相似歌曲)
     * @route GET /simi/song
     * @param string $id
     * @param int $offset
     * @param int $limit
     * @return string json
     */
    public function song($id, $offset = 0, $limit = 50)
    {
        $Request = new Request();
        $data = array(
            'songid' => $id,
            'offset' => $offset,
            'limit' => $limit,
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/v1/discovery/simiSong",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }

    //TODO 需要登录貌似
    /**
     *
     * 获取最近5个听了这首歌的用户
     * 说明:调用此接口,传入歌曲 id,最近5个听了这首歌的用户
     *
     * 必选参数:
     * id: 歌曲 id
     *
     * 接口地址:
     * /simi/user
     *
     * 调用例子:
     * /simi/user?id=347230 (对应'光辉岁月'相似歌曲)
     * @route GET /simi/user
     * @param string $id
     * @param int $offset
     * @param int $limit
     * @return string json
     */
    public function user($id, $offset = 0, $limit = 50)
    {
        $Request = new Request();
        $data = array(
            'songid' => $id,
            'offset' => $offset,
            'limit' => $limit,
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/discovery/simiUser",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }



}