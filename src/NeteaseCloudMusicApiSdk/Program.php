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

class Program
{

    use EnableDIAnnotations;

    /**
     *
     * 推荐节目
     * 说明:调用此接口,可获取推荐电台
     *
     * 接口地址:
     * /program/recommend
     *
     * 调用例子:
     * /program/recommend
     *
     *
     * @route GET /program/recommend
     * @return string json
     */
    public function recommend()
    {
        $Request = new Request();
        $data = array(
            'cateId' => '',
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/program/recommend/v1",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }


}