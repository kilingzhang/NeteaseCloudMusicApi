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

class PersonalFm
{

    use EnableDIAnnotations;

    /**
     *
     * 私人 FM
     * 说明:私人 FM( 需要登录)
     *
     * 接口地址:
     * /personal_fm
     *
     * 调用例子:
     * /personal_fm
     * @route GET /personal_fm
     * @return string json
     */
    public function personal_fm()
    {
        $Request = new Request();
        $data = array(
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/v1/radio/get",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }


}