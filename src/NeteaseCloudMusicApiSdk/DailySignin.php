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

class DailySignin
{

    use EnableDIAnnotations;

    /**
     *
     * 签到
     * 说明:调用此接口,传入签到类型(可不传,默认安卓端签到),可签到(需要登录),其中安卓端签到可获得3点经验, web/PC 端签到可获得2点经验
     * 可选参数:
     * type: 签到类型,默认 0, 其中 0 为安卓端签到,1为 web/PC 签到
     *
     * 接口地址:
     * /daily_signin
     *
     * 调用例子:
     * /daily_signin
     * @route GET /daily_signin
     * @param int $type
     * @return string json
     */
    public function daily_signin($type = 0)
    {
        $Request = new Request();
        $data = array(
            'type' => $type,
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/point/dailyTask",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }


}