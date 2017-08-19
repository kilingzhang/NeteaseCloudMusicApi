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

class Lyric
{

    use EnableDIAnnotations;

    /**
     * 获取歌词
     * 说明:调用此接口,传入音乐 id 可获得对应音乐的歌词(不需要登录)
     *
     * 必选参数:
     * id: 音乐 id
     *
     * 接口地址:
     * /lyric
     *
     * 调用例子:
     * /lyric?id=347230
     *
     * @route GET /lyric
     * @param string $id
     * @return string json
     */
    public function lyric($id)
    {
        $Request = new Request();
        $data = array(
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/song/lyric?os=osx&id=$id&lv=-1&kv=-1&tv=-1",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }


}