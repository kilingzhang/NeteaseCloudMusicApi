<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-19
 * Time: 14:01
 */

namespace NeteaseCloudMusicApi\V1\Captcha;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Cellphone
 * @package NeteaseCloudMusicApi\V1\Captcha
 *
 * 发送验证码
 *
 * 说明 : 调用此接口 ,传入手机号码, 可发送验证码
 *
 * *必选参数 :** `phone`: 手机号码
 *
 * *可选参数 :**
 * `ctcode`: 国家区号,默认 86 即中国
 *
 * *接口地址 :** `/captcha/sent`
 *
 * *调用例子 :** `/captcha/sent?phone=13xxx`
 *
 * 调用例子:
 * http://i.music.163.com/captcha/sent?phone=17612345678&countrycode=86
 *
 */
class Sent extends Controller
{
    protected $uri = 'https://music.163.com/api/sms/captcha/sent';

    protected $params = [
        'phone' => [
            'value' => null,
            'as' => 'cellphone',
        ],
        'countrycode' => [
            'value' => 86,
            'as' => 'ctcode',
        ],
    ];
}