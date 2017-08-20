<?php
/**
 * Created by PhpStorm.
 * User: Kilingzhang  <slight@kilingzhang.com>
 * Date: 2017/8/20
 * Time: 1:59
 */

namespace NeteaseCloudMusicApiSdk;
use PhpBoot\Application;
use PhpBoot\DI\Traits\EnableDIAnnotations;
use Utils\Request;
use Utils\Snoopy;

class Personalized
{

    use EnableDIAnnotations;

    /**
     *
     * 推荐歌单
     * 说明:调用此接口,可获取推荐歌单
     *
     * 接口地址:
     * /personalized
     *
     * 调用例子:
     * /personalized
     *
     *
     * @route GET /personalized
     * @return string json
     */
    public function personalized()
    {
        $Request = new Request();
        $data = array(
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/personalized/playlist",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }


    /**
     *
     * 推荐 mv
     * 说明:调用此接口,可获取推荐 mv
     *
     * 接口地址:
     * /personalized/mv
     *
     * 调用例子:
     * /personalized/mv
     *
     *
     * @route GET /personalized/mv
     * @return string json
     */
    public function mv()
    {
        $Request = new Request();
        $data = array(
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/personalized/mv",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }


    /**
     *
     * 推荐新音乐
     * 说明:调用此接口,可获取推荐新音乐
     *
     * 接口地址:
     * /personalized/newsong
     *
     * 调用例子:
     * /personalized/newsong
     *
     *
     * @route GET /personalized/newsong
     * @return string json
     */
    public function newsong()
    {
        $Request = new Request();
        $data = array(
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/personalized/newsong",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }


    /**
     *
     * 推荐电台
     * 说明:调用此接口,可获取推荐电台
     *
     * 接口地址:
     * /personalized/djprogram
     *
     * 调用例子:
     * /personalized/djprogram
     *
     *
     * @route GET /personalized/djprogram
     * @return string json
     */
    public function djprogram()
    {
        $Request = new Request();
        $data = array(
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/personalized/djprogram",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }

    /**
     *
     * 独家放送
     * 说明:调用此接口,可获取独家放送
     *
     * 接口地址:
     * /personalized/privatecontent
     *
     * 调用例子:
     * /personalized/privatecontent
     *
     *
     * @route GET /personalized/privatecontent
     * @return string json
     */
    public function privatecontent()
    {
        $Request = new Request();
        $data = array(
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/personalized/privatecontent",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }

}