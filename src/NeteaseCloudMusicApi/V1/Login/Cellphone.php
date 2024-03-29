<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-19
 * Time: 14:01
 */

namespace NeteaseCloudMusicApi\V1\Login;


use NeteaseCloudMusicApi\Controller;
use Utils\Request;

/**
 * Class Cellphone
 * @package NeteaseCloudMusicApi\V1\Login
 *
 * 登录
 * 说明:登录有两个接口
 *
 * 1. 手机登录
 *
 * 必选参数:
 * phone: 手机号码
 * password: 密码
 * captcha: 验证码 /captcha/sent
 *
 * 接口地址:
 * /login/cellphone
 *
 * 调用例子:
 * http://i.music.163.com/login/cellphone?phone=17612345678&password=password&captcha=captcha
 *
 */
class Cellphone extends Controller
{
    protected $uri = 'https://music.163.com/weapi/login/cellphone';

    protected $params = [
        'phone' => null,
        'captcha' => null,
        'password' => '',
        'countrycode' => 86,
        'rememberLogin' => true,
    ];

    protected $options = [
        'ua' => 'pc'
    ];


    protected function newRequest(Request $request): Request
    {
        return $request->setCookie('os', 'ios')->setCookie('appver', '8.20.21');
    }

    protected function parseParams($params): array
    {
        $params['password'] = md5($params['password']);
        return $params;
    }
}