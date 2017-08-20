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

class Event
{

    use EnableDIAnnotations;



    /**
     * 获取动态消息
     * 说明:调用此接口,可获取各种动态,对应网页版网易云，朋友界面里的各种动态消息，如分享的视频，音乐，照片等！
     *
     * 必选参数:
     * 未知
     *
     * 接口地址:
     * /event
     *
     * 调用例子:
     * /event
     *
     * @route GET /event
     * @return string json
     */
    public function event()
    {
        $Request = new Request();
        $data = array(
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/v1/event/get",
            'POST',
            $data
        );
        return json_decode($response, true);
    }


}