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
 * 必选参数 :
 * email: 163 网易邮箱
 *
 * password: 密码
 *
 * 接口地址 : /login
 *
 * 调用例子 : http://i.music.163.com/login?email=xxx@163.com&password=yyy
 *
 */
class Email extends Controller
{
    protected $uri = 'https://music.163.com/weapi/login';

    protected $params = [
        'email' => [
            'value' => null,
            'as' => 'username'
        ],
        'password' => [
            'value' => null,
            'encrypt' => 'md5'
        ],
        'rememberLogin' => true,
    ];

    protected $options = [
        'ua' => 'pc'
    ];

    protected function newRequest(Request $request): Request
    {
        return $request->setCookie('os', 'pc');
    }
}