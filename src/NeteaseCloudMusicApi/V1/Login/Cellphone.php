<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-19
 * Time: 14:01
 */

namespace NeteaseCloudMusicApi\V1\Login;


use NeteaseCloudMusicApi\Controller;

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
 *
 * 接口地址:
 * /login/cellphone
 *
 * 调用例子:
 * http://i.music.163.com/login/cellphone?phone=17612345678&password=password
 *
 */
class Cellphone extends Controller
{
    protected $uri = 'https://music.163.com/weapi/login/cellphone';

    protected $params = [
        'phone' => null,
        'password' => [
            'value' => null,
        ],
        'countrycode' => 86,
        'rememberLogin' => true,
    ];

    protected $options = [
        'ua' => 'pc'
    ];

    protected function parseParams($params): array
    {
        $params['password'] = md5($params['password']);
        return $params;
    }
}