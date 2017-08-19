<?php
/**
 * Created by PhpStorm.
 * User: Kilingzhang  <slight@kilingzhang.com>
 * Date: 2017/8/19
 * Time: 19:04
 */

namespace NeteaseCloudMusicApiSdk;

use PhpBoot\Application;
use PhpBoot\DI\Traits\EnableDIAnnotations;
use Utils\Request;
use Utils\Snoopy;

class Music
{
    use EnableDIAnnotations;

    /**
     * 获取音乐 url
     * 说明:使用歌单详情接口后,能得到的音乐的 id, 但不能得到的音乐 url, 调用此接口,传入的音乐 id(可多个,用逗号隔开),可以获取对应的音乐的 url(不需要登录)
     *
     *  必选参数:
     * id : 音乐 id
     *
     * 接口地址:
     * /music/url
     *
     * 调用例子:
     * /music/url?ids=437250607
     * /music/url?ids=437250607,347231
     * @route GET /music/url
     * @param string $ids
     * @return string json
     */
    public function musicUrl($ids)
    {
        $ids = explode(',', $ids);
        $Request = new Request();
        $data = array(
            'ids' => json_encode($ids, JSON_UNESCAPED_UNICODE),
            'br' => 999000,
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/song/enhance/player/url",
            'POST',
            $data
        );
        return json_decode($response, true);
    }


}