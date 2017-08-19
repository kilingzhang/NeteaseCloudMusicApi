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

class Banner
{

    use EnableDIAnnotations;

    /**
     * @route GET /banner
     * @return string json
     */
    public function banner()
    {
        $Request = new Request();
        $data = array(

            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/v2/banner/get",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }


}