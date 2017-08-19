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

class Recommend
{

    use EnableDIAnnotations;

    /**
     *
     * 获取每日推荐歌单
     * 说明:调用此接口,可获得每日推荐歌单(需要登录)
     *
     * 接口地址:
     * /recommend/resource
     *
     * 调用例子:
     * /recommend/resource
     * @route GET /recommend/resource
     * @return string json
     */
    public function resource()
    {
        $Request = new Request();
        $data = array(
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/v1/discovery/recommend/resource",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }


    /**
     *
     * 获取每日推荐歌曲
     * 说明:调用此接口,可获得每日推荐歌曲(需要登录)
     *
     * 接口地址:
     * /recommend/songs
     *
     * 调用例子:
     * /recommend/songs
     *
     * @route GET /recommend/songs
     * @param boolean $total
     * @param int $limit
     * @param int $offset
     * @return string json
     */
    public function songs($total = true , $offset = 0, $limit = 20)
    {
        $Request = new Request();
        $data = array(
            'total'=>$total,
            'offset'=>$offset,
            'limit'=>$limit,
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/v1/discovery/recommend/songs",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }




}