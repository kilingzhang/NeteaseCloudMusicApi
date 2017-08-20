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

class Like
{

    use EnableDIAnnotations;


    /**
     *
     * 喜欢音乐
     * 说明:调用此接口,传入音乐 id, 可喜欢该音乐
     *
     * 必选参数:
     * id: 歌曲 id
     *
     * 可选参数:
     * like: 布尔值,默认为 true 即喜欢,若传 false, 则取消喜欢
     *
     * 接口地址:
     * /like
     *
     * 调用例子:
     * /like?id=347230
     *
     * @route GET /like
     * @param int $id
     * @param boolean $like
     * @param int $alg
     * @param int $time
     * @return string json
     */
    public function songs($id, $like = true, $alg = 'itembased', $time = 25)
    {
        $trackId = $id;
        $Request = new Request();
        $data = array(
            'trackId' => $trackId,
            'like' => $like,
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/radio/like?alg={$alg}&trackId={$trackId}&like={$like}&time={$time}",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }

}