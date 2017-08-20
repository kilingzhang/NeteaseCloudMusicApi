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

class User
{
    //251183635
    use EnableDIAnnotations;


    /**
     * 获取用户详情
     * 说明:登陆后调用此接口,传入用户 id, 可以获取用户详情
     *
     * 必选参数:
     * uid : 用户 id
     *
     * 接口地址:
     * /user/detail
     *
     * 调用例子:
     * /user/detail?uid=251183635
     *
     * @route GET /user/detail
     * @param string $uid
     * @return string json
     */
    public function detail($uid)
    {
        $Request = new Request();
        $data = array(
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/v1/user/detail/{$uid}",
            'POST',
            $data
        );
        return json_decode($response, true);
    }


    /**
     * 获取用户电台
     * 说明:登陆后调用此接口,传入用户 id, 可以获取用户电台
     *
     * 必选参数:
     * uid : 用户 id
     *
     * 接口地址:
     * /user/dj
     *
     * 调用例子:
     * /user/dj?uid=251183635
     *
     * @route GET /user/dj
     * @param string $uid
     * @return string json
     */
    public function dj($uid)
    {
        $Request = new Request();
        $data = array(
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/dj/program/{$uid}",
            'POST',
            $data
        );
        return json_decode($response, true);
    }


    /**
     * 获取用户关注列表
     * 说明:登陆后调用此接口,传入用户 id, 可以获取用户关注列表
     *
     * 必选参数:
     * uid : 用户 id
     *
     * 可选参数:
     * limit : 返回数量,默认为30
     * offset : 偏移数量，用于分页,如: 如:(页数-1)*30, 其中 30 为 limit 的值,默认为0
     *
     * 接口地址:
     * /user/follows
     *
     * 调用例子:
     * /user/follows?uid=251183635
     *
     * @route GET /user/follows
     * @param string $uid
     * @param string $limit
     * @param string $offset
     * @return string json
     */
    public function follows($uid, $limit = 30, $offset = 0)
    {
        $Request = new Request();
        $data = array(
            'csrf_token' => '',
            'order' => true,
            'limit' => $limit,
            'offset' => $offset,
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/user/getfollows/{$uid}",
            'POST',
            $data
        );
        return json_decode($response, true);
    }

    /**
     * 获取用户粉丝列表
     * 说明:登陆后调用此接口,传入用户 id, 可以获取用户粉丝列表
     *
     * 必选参数:
     * uid : 用户 id
     *
     * 可选参数:
     * limit : 返回数量,默认为30
     * offset : 偏移数量，用于分页,如: 如:(页数-1)*30, 其中 30 为 limit 的值,默认为0
     *
     * 接口地址:
     * /user/followeds
     *
     * 调用例子:
     * /user/followeds?uid=251183635
     *
     * @route GET /user/followeds
     * @param string $uid
     * @param string $limit
     * @param string $offset
     * @return string json
     */
    public function followeds($uid, $limit = 30, $offset = 0)
    {
        $Request = new Request();
        $data = array(
            'csrf_token' => '',
            'userId' => $uid,
            'limit' => $limit,
            'offset' => $offset,
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/user/getfolloweds",
            'POST',
            $data
        );
        return json_decode($response, true);
    }

    /**
     * 获取用户动态
     * 说明:登陆后调用此接口,传入用户 id, 可以获取用户动态
     *
     * 必选参数:
     * uid : 用户 id
     *
     * 接口地址:
     * /user/event
     *
     * 调用例子:
     * /user/event?uid=251183635
     *
     * @route GET /user/event
     * @param string $uid
     * @return string json
     */
    public function event($uid)
    {
        $Request = new Request();
        $data = array(
            'csrf_token' => '',
            'time' => -1,
            'getcounts' => true,
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/event/get/{$uid}",
            'POST',
            $data
        );
        return json_decode($response, true);
    }


    /**
     * 获取用户播放记录
     * 说明:登陆后调用此接口,传入用户 id,可获取用户播放记录
     *
     * 必选参数:
     * uid : 用户 id
     *
     * 可选参数:
     * type : type=1时只返回weekData, type=0时返回allData
     *
     * 接口地址:
     * /user/record
     *
     * 调用例子:
     * /user/record?uid=251183635&type=1
     *
     * @route GET /user/record
     * @param string $uid
     * @param string $type
     * @return string json
     */
    public function record($uid, $type = 0)
    {
        $Request = new Request();
        $data = array(
            'csrf_token' => '',
            'type' => $type,
            'uid' => $uid,
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/v1/play/record",
            'POST',
            $data
        );
        return json_decode($response, true);
    }

    /**
     * 云盘
     * 说明:登陆后调用此接口,可获取云盘数据,获取的数据没有对应 url,需要再调用一次 /music/url 获取 url
     *
     * 接口地址:
     * /user/cloud
     *
     * 调用例子:
     * /user/cloud
     *
     * @route GET /user/cloud
     * @param string $limit
     * @param string $offset
     * @return string json
     */
    public function cloud($limit = 30, $offset = 0)
    {
        $Request = new Request();
        $data = array(
            'csrf_token' => '',
            'limit' => $limit,
            'offset' => $offset,
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/v1/cloud/get",
            'POST',
            $data
        );
        return json_decode($response, true);
    }


    /**
     * 云盘搜索
     *
     * 接口地址:
     * /user/cloud/search
     *
     * 调用例子:
     * /user/cloud/search?$byids=xxx&id=xxx
     *
     * @route GET /user/cloud/search
     * @param string $byids
     * @param string $id
     * @return string json
     */
    public function search($byids, $id)
    {
        $Request = new Request();
        $data = array(
            'csrf_token' => '',
            'byids' => $byids,
            'id' => $id,
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/v1/cloud/get/byids",
            'POST',
            $data
        );
        return json_decode($response, true);
    }

}