<?php
/**
 * Created by PhpStorm.
 * User: Kilingzhang  <slight@kilingzhang.com>
 * Date: 2017/8/19
 * Time: 2:34
 */

namespace Utils;

use Utils\Snoopy;

class Request
{
    // General
    protected $_MODE = false;
    protected $_MODULUS = '00e0b509f6259df8642dbc35662901477df22677ec152b5ff68ace615bb7b725152b3ab17a876aea8a5aa76d2e417629ec4ee341f56135fccf695280104e0312ecbda92557c93870114af6c9d05c4f7f0c3685b7a46bee255932575cce10b424d813cfe4875d3e82047b97ddef52741d546b8e289dc6935b3ece0462db0a22b8e7';
    protected $_NONCE = '0CoJUm6Qyw8W8jud';
    protected $_PUBKEY = '010001';
    protected $_VI = '0102030405060708';
    protected $_USERAGENT;
    protected $_COOKIE = 'os=pc; osver=Microsoft-Windows-10-Professional-build-10586-64bit; appver=2.0.3.131777; channel=netease; __remember_me=true';
    protected $_REFERER = 'http://music.163.com/';
    // use static secretKey, without RSA algorithm
    protected $_secretKey = 'TA3YiYCfY2dDJQgg';
    protected $_encSecKey = '84ca47bca10bad09a6b04c5c927ef077d9b9f1e37098aa3eac6ea70eb59df0aa28b691b7e75e4f1f9831754919ea784c8f74fbfadf2898b0be17849fd656060162857830e241aba44991601f137624094c114ea8d17bce815b0cd4e5b8e2fbaba978c6d1d14dc3d1faf852bdd28818031ccdaaa13a6018e1024e2aae98844210';


    protected $snoopy;


    public function __construct()
    {
        $this->snoopy = new Snoopy();
    }

    public static function randomUserAgent()
    {
        $userAgentList = [
            'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36',
            'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143 Safari/601.1',
            'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143 Safari/601.1',
            'Mozilla/5.0 (Linux; Android 5.0; SM-G900P Build/LRX21T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Mobile Safari/537.36',
            'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Mobile Safari/537.36',
            'Mozilla/5.0 (Linux; Android 5.1.1; Nexus 6 Build/LYZ28E) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Mobile Safari/537.36',
            'Mozilla/5.0 (iPhone; CPU iPhone OS 10_3_2 like Mac OS X) AppleWebKit/603.2.4 (KHTML, like Gecko) Mobile/14F89;GameHelper',
            'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/603.2.4 (KHTML, like Gecko) Version/10.1.1 Safari/603.2.4',
            'Mozilla/5.0 (iPhone; CPU iPhone OS 10_0 like Mac OS X) AppleWebKit/602.1.38 (KHTML, like Gecko) Version/10.0 Mobile/14A300 Safari/602.1',
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36',
            'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:46.0) Gecko/20100101 Firefox/46.0',
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:46.0) Gecko/20100101 Firefox/46.0',
            'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0)',
            'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0)',
            'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/5.0)',
            'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Win64; x64; Trident/6.0)',
            'Mozilla/5.0 (Windows NT 6.3; Win64, x64; Trident/7.0; rv:11.0) like Gecko',
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36 Edge/13.10586',
            'Mozilla/5.0 (iPad; CPU OS 10_0 like Mac OS X) AppleWebKit/602.1.38 (KHTML, like Gecko) Version/10.0 Mobile/14A300 Safari/602.1'
        ];
        $num = rand(0, count($userAgentList) - 1);
        return $userAgentList[$num];
    }


    // encrypt mod
    protected function prepare($raw)
    {
        $data['params'] = $this->aes_encode(json_encode($raw), $this->_NONCE);
        $data['params'] = $this->aes_encode($data['params'], $this->_secretKey);
        $data['encSecKey'] = $this->_encSecKey;
        return $data;
    }

    protected function aes_encode($secretData, $secret)
    {
        return openssl_encrypt($secretData, 'aes-128-cbc', $secret, false, $this->_VI);
    }

    //Snoopy
    public function createWebAPIRequest(
        $host,
        $path,
        $method = 'POST',
        $data,
        $cookie = null,
        $callback = null,
        $errorcallback = null
    )
    {
        $this->_USERAGENT = self::randomUserAgent();
        $this->snoopy->agent = $this->_USERAGENT;
        $this->snoopy->rawheaders['Cookies'] = $this->_COOKIE;
        $this->snoopy->referer = $this->_REFERER;
        $this->snoopy->host = 'music.163.com';
        $data = $this->prepare($data);
        $this->snoopy->submit($host . $path, $data);
        $this->snoopy->setcookies();
        return $this->snoopy->results;

    }


    //Snoopy PlayMp4
    public function PlayMp4(
        $url
    )
    {
       

    }


}