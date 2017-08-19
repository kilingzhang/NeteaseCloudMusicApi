<?php
/**
 * Created by PhpStorm.
 * User: Kilingzhang  <slight@kilingzhang.com>
 * Date: 2017/8/19
 * Time: 22:11
 */

namespace NeteaseCloudMusicApiSdk;
use PhpBoot\Application;
use PhpBoot\DI\Traits\EnableDIAnnotations;
use Utils\Request;
use Utils\Snoopy;

class Album
{

    use EnableDIAnnotations;

    /**
     *
     * 获取专辑内容
     * 说明:调用此接口,传入专辑 id,可获得专辑内容
     *
     * 必选参数:
     * id: 专辑 id
     *
     * 接口地址:
     * /album
     *
     * 调用例子:
     * /album?id=32311
     * @route GET /album
     * @param string $id
     * @return string json
     */
    public function album($id)
    {
        $Request = new Request();
        $data = array(
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/v1/album/{$id}",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }


    /**
     *
     * 获取歌手描述
     * 说明:调用此接口,传入歌手 id,可获得歌手描述
     *
     * 必选参数:
     * id: 歌手 id
     *
     * 接口地址:
     * /artist/desc
     *
     * 调用例子:
     * /artist/desc?id=6452 (周杰伦)
     *
     * @route GET /artist/desc
     * @param int $id
     * @return string json
     */
    public function desc($id)
    {
        $Request = new Request();
        $data = array(
            'id'=>$id,
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/artist/introduction",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }

}