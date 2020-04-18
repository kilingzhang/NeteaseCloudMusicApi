<?php
/**
 * Created by PhpStorm.
 * User: Kilingzhang
 * Date: 2017/8/19
 * Time: 2:34
 */

namespace Utils;

class Request
{
    protected $iv = '0102030405060708';
    protected $presetKey = '0CoJUm6Qyw8W8jud';
    protected $linuxapiKey = 'rFgB&h#%2?^eDg:Q';
    protected $eapiKey = 'e82ckenh8dichen8';
    protected $publicKey = '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDgtQn2JZ34ZC28NWYpAUd98iZ37BUrX/aKzmFbt7clFSs6sXqHauqKWqdtLkF2KexO40H1YTX8z2lSgBBOAxLsvaklV8k4cBFK9snQXE9/DDaFt6Rr7iVZMldczhC0JNgTz+SHXT6CBHuX3e9SdB1Ua44oncaTWz7OBGLbCiK45wIDAQAB
-----END PUBLIC KEY-----';
    // use static secretKey, without RSA algorithm
    protected $secretKey = 'TA3YiYCfY2dDJQgg';
    protected $encSecKey = '84ca47bca10bad09a6b04c5c927ef077d9b9f1e37098aa3eac6ea70eb59df0aa28b691b7e75e4f1f9831754919ea784c8f74fbfadf2898b0be17849fd656060162857830e241aba44991601f137624094c114ea8d17bce815b0cd4e5b8e2fbaba978c6d1d14dc3d1faf852bdd28818031ccdaaa13a6018e1024e2aae98844210';
    protected $base62 = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    protected $userAgent;
    protected $cookies = 'os=pc; osver=Microsoft-Windows-10-Professional-build-10586-64bit; appver=2.0.3.131777; channel=netease; __remember_me=true';
    protected $referer = 'https://music.163.com/';


    protected $snoopy;


    public function __construct()
    {
        $this->snoopy = new Snoopy();
    }

    public function setCookie($key, $value)
    {
        $this->snoopy->cookies[$key] = $value;
        return $this;
    }

    public function setCookies($cookies = [])
    {
        foreach ($cookies as $key => $cookie) {
            $this->snoopy->cookies[$key] = $cookie;
        }
        return $this;
    }

    public function setHeader($key, $value)
    {
        $this->snoopy->headers[$key] = $value;
    }

    public function setHeaders($headers = [])
    {
        foreach ($headers as $key => $header) {
            $this->snoopy->headers[$key] = $header;
        }
        return $this;
    }

    public function setAgent($agent)
    {
        $this->snoopy->agent = $agent;
        return $this;
    }

    /**
     * @param $uri
     * @param $data
     * @param array $options
     * @return array
     */
    public function createRequest(
        $uri,
        $data,
        $options = [
            'ua' => '',
            'crypto' => 'weapi'
        ]
    ): array
    {
        $ua = empty($options['ua']) ? '' : $options['ua'];
        $this->userAgent = self::randomUserAgent($ua);
        $this->snoopy->agent = $this->userAgent;
        $this->snoopy->rawheaders['Cookies'] = $this->cookies;
        $this->snoopy->cookies['__remember_me'] = true;
        $this->snoopy->cookies['MUSIC_U'] = isset($_COOKIE['MUSIC_U']) ? $_COOKIE['MUSIC_U'] : null;
        $this->snoopy->cookies['__csrf'] = isset($_COOKIE['__csrf']) ? $_COOKIE['__csrf'] : null;
        $this->snoopy->referer = $this->referer;
        $this->snoopy->host = 'music.163.com';

        switch ($options['crypto']) {
            default:
            case "weapi":
                $data = $this->encryptWeapi($data);
                break;
            case "eapi":
                $headers = [
//                    'osver' => '', //系统版本
//                    'deviceId' => '', //encrypt.base64.encode(imei + '\t02:00:00:00:00:00\t5106025eb79a5247\t70ffbaac7')
                    'appver' => '6.1.1', // app版本
                    'versioncode' => '140', //版本号
//                    'mobilename' => '', //设备model
                    'buildver' => substr(time(), 0, 10),
                    'resolution' => '1920x1080', //设备分辨率
//                    '__csrf' => '',
                    'os' => 'android',
//                    'channel' => '',
                    'requestId' => sprintf("%d_%04d", time(), rand(0, 1000))
                ];
                $data['header'] = $headers;
                $this->setHeaders($headers);
                $data = $this->encryptEApi($options['url'], $data);
                break;
            case "linuxapi":
                $uri = 'https://music.163.com/api/linux/forward';
                $data = $this->encryptLinux([
                    'method' => 'POST',
                    'url' => $options['url'],
                    'params' => $data
                ]);
                break;
        }

        $this->snoopy->submit($uri, $data);
        preg_match('/(\d{2,})/', $this->snoopy->response_code, $code);
        $responseCode = $code[0];
        $responseCode != 200 && Response::json($responseCode, $this->snoopy->results, []);
        $response = empty($this->snoopy->results) ? [] : json_decode($this->snoopy->results, true);

        switch ($options['crypto']) {
            default:
            case "weapi":
            case "linuxapi":
                return $response;
                break;
            case "eapi":
                return empty($response['data']) ? [] : $response['data'];
                break;
        }
    }

    public static function randomUserAgent($ua = '')
    {
        $userAgentList = [
            'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36',
            'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143 Safari/601.1',
            'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143 Safari/601.1',
            'Mozilla/5.0 (Linux; Android 5.0; SM-G900P Build/LRX21T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Mobile Safari/537.36',
            'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Mobile Safari/537.36',
            'Mozilla/5.0 (Linux; Android 5.1.1; Nexus 6 Build/LYZ28E) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Mobile Safari/537.36',
            'Mozilla/5.0 (iPhone; CPU iPhone OS 10_3_2 like Mac OS X) AppleWebKit/603.2.4 (KHTML, like Gecko) Mobile/14F89;GameHelper',
            'Mozilla/5.0 (iPhone; CPU iPhone OS 10_0 like Mac OS X) AppleWebKit/602.1.38 (KHTML, like Gecko) Version/10.0 Mobile/14A300 Safari/602.1',
            'Mozilla/5.0 (iPad; CPU OS 10_0 like Mac OS X) AppleWebKit/602.1.38 (KHTML, like Gecko) Version/10.0 Mobile/14A300 Safari/602.1',
            'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:46.0) Gecko/20100101 Firefox/46.0',
            'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36',
            'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/603.2.4 (KHTML, like Gecko) Version/10.1.1 Safari/603.2.4',
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:46.0) Gecko/20100101 Firefox/46.0',
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36',
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36 Edge/13.10586'
        ];

        if ($ua === 'pc') {
            $num = rand(8, count($userAgentList) - 1);
        } elseif ($ua === 'mobile') {
            $num = rand(1, 7);
        } elseif ($ua === 'linux') {
            return 0;
        } else {
            $num = rand(1, count($userAgentList) - 1);
        }

        return $userAgentList[$num];
    }

    /**
     * @param $raw
     * @return array
     */
    protected function encryptWeapi($raw): array
    {
        $data['params'] = $this->aes_encode(json_encode($raw), $this->presetKey, 'cbc', $this->iv, false);
        $data['params'] = $this->aes_encode($data['params'], $this->secretKey, 'cbc', $this->iv, false);
        $data['encSecKey'] = $this->encSecKey;
        return $data;
    }

    /**
     * @param $raw
     * @return array
     */
    protected function encryptLinux($raw): array
    {
        $text = json_encode($raw);
        $data['eparams'] = $this->aes_encode($text, $this->linuxapiKey, 'ecb', '');
        $data['eparams'] = strtoupper(bin2hex($data['eparams']));
        return $data;
    }

    /**
     * @param $url
     * @param $raw
     * @return array
     */
    protected function encryptEApi($url, $raw): array
    {
        $text = json_encode($raw);
        $digest = md5("nobody{$url}use{$text}md5forencrypt");
        $data['params'] = "{$url}-36cd479b6b5-{$text}-36cd479b6b5-{$digest}";
        $data['params'] = $this->aes_encode($data['params'], $this->eapiKey, 'ecb', '');
        $data['params'] = strtoupper(bin2hex($data['params']));
        return $data;
    }

    /**
     * @param $secret
     * @return array
     */
    protected function decrypt($secret): array
    {
        return [];
    }

    /**
     * @param $secretData
     * @param $secret
     * @param $mode
     * @param $iv
     * @param bool $options
     * @return string
     */
    protected function aes_encode($secretData, $secret, $mode, $iv, $options = true)
    {
        return openssl_encrypt($secretData, 'aes-128-' . $mode, $secret, $options, $iv);
    }

    /**
     * @param $secretData
     * @param $secret
     * @param $mode
     * @param $iv
     * @param bool $options
     * @return string
     */
    protected function aes_decode($secretData, $secret, $mode, $iv, $options = true)
    {
        return openssl_decrypt($secretData, 'aes-128-' . $mode, $secret, $options, $iv);
    }
}