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

class Dj
{

    use EnableDIAnnotations;

    /**
     * 电台-推荐
     * 说明:登陆后调用此接口,可获得推荐电台
     *
     * 接口地址:
     * /dj/recommend
     *
     * 调用例子:
     * /dj/recommend
     *
     * @route GET /dj/recommend
     * @return string json
     */
    public function recommend()
    {
        $Request = new Request();
        $data = array(
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/djradio/recommend/v1",
            'POST',
            $data
        );
        return json_decode($response, true);
    }


    /**
     * 电台-分类
     * 说明:登陆后调用此接口,可获得电台类型
     *
     * 接口地址:
     * /dj/catelist
     *
     * 调用例子:
     * /dj/catelist
     *
     * @route GET /dj/catelist
     * @return string json
     */
    public function catelist()
    {
        $Request = new Request();
        $data = array(
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/djradio/category/get",
            'POST',
            $data
        );
        return json_decode($response, true);
    }


    /**
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
     * /dj/recommend/type?type=1
     *
     * @route GET /dj/recommend/type
     * @param int $type
     * @return string json
     */
    public function type($type)
    {
        $Request = new Request();
        $data = array(
            'csrf_token' => '',
            'cateId' => $type,
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/djradio/recommend",
            'POST',
            $data
        );
        return json_decode($response, true);
    }


    /**
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
     * /dj/sub?rid=336355127&t=1 (对应关注'代码时间')
     * /dj/sub?rid=336355127&t=0 (对应取消关注'代码时间')
     *
     * @route GET /dj/sub
     * @param int $rid
     * @return string json
     */
    public function sub($rid, $t = 1)
    {
        $Request = new Request();
        $data = array(
            'csrf_token' => '',
            'id' => $rid,
        );
        $action = $t == 1 ? 'sub' : 'unsub';
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/djradio/{$action}",
            'POST',
            $data
        );
        return json_decode($response, true);
    }


    /**
     * 电台-详情
     * 说明:登陆后调用此接口,传入rid,可获得对应电台的详情介绍
     *
     * 必选参数:
     * rid: 电台 的 id
     *
     * 接口地址:
     * /dj/detail?rid=336355127
     *
     * 调用例子:
     * /dj/detail?rid=336355127 (对应'代码时间'的详情介绍)
     *
     * @route GET /dj/detail
     * @param int $rid
     * @return string json
     */
    public function detail($rid)
    {
        $Request = new Request();
        $data = array(
            'csrf_token' => '',
            'id' => $rid,
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/djradio/get",
            'POST',
            $data
        );
        return json_decode($response, true);
    }


    /**
     * 电台-节目
     * 说明:登陆后调用此接口,传入rid,可查看对应电台的电台节目以及对应的 id, 需要注意的是这个接口返回的 mp3Url 已经无效,都为 null, 但是通过调用 /music/url 这个接口,传入节目 id 仍然能获取到节目音频,如 /music/url?id=478446370 获取代码时间的一个节目的音频
     *
     * 必选参数:
     * rid: 电台 的 id
     *
     * 接口地址:
     * /dj/sub
     *
     * 调用例子:
     * /dj/program?rid=336355127 (对应'代码时间'的节目列表)
     *
     * @route GET /dj/program
     * @param int $rid
     * @return string json
     */
    public function program($rid, $limit = 30, $offset = 0)
    {
        $Request = new Request();
        $data = array(
            'csrf_token' => '',
            'asc' => '',
            'radioId' => $rid,
            'limit' => $limit,
            'offset' => $offset,
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/dj/program/byradio",
            'POST',
            $data
        );
        return json_decode($response, true);
    }

}