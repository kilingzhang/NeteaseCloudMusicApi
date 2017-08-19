<?php
/**
 * Created by PhpStorm.
 * User: Kilingzhang  <slight@kilingzhang.com>
 * Date: 2017/8/19
 * Time: 2:50
 */

namespace NeteaseCloudMusicApiSdk;

use PhpBoot\Application;
use PhpBoot\DI\Traits\EnableDIAnnotations;
use Utils\Request;
use Utils\Snoopy;

class Login
{

    use EnableDIAnnotations;

    /**
     * 登录
     * 说明:登录有两个接口
     *
     * 1. 手机登录
     *
     * 必选参数:
     * phone: 手机号码
     * password: 密码
     *
     * 接口地址:
     * /login/cellphone
     *
     * 调用例子:
     * /login/cellphone?phone=xxx&password=yyy
     *
     * @route GET /login/cellphone
     * @param string $phone
     * @param string $pass
     * @return string json
     */
    public function cellPhoneLogin($phone, $pass)
    {
        $Request = new Request();
        $data = array(
            'phone' => $phone,
            'password' => md5($pass),
            'rememberLogin' => 'true'
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/login/cellphone",
            'POST',
            $data
        );
        return json_decode($response, true);
    }


}