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

class Mv
{

    use EnableDIAnnotations;


    /**
     * 最新 mv
     * 说明:调用此接口,可获取最新 mv
     *
     * 可选参数:
     * limit: 取出数量,默认为 30
     *
     * 接口地址:
     * /mv/first
     *
     * 调用例子:
     * /mv/first?limit=10
     *
     * @route GET /mv/first
     * @param string $limit
     * @param string $total
     * @return string json
     */
    public function first($total = true, $limit = 20)
    {
        $Request = new Request();
        $data = array(
            'total' => $total,
            'limit' => $limit,
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/mv/first",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }


    /**
     * 获取 mv 数据
     * 说明:调用此接口,传入 mvid (在搜索音乐的时候传 type=1004获得) ,可获取对应 MV 数据,数据包含 mv 名字,歌手,发布时间, mv 视频地址等数据,其中 mv 视频网易做了防盗链处理,不能直接播放,需要播放的话需要调用'播放 mv' 接口
     *
     * 必选参数:
     * mvid: mv 的 id
     *
     * 接口地址:
     * /mv
     *
     * 调用例子:
     * /mv?mvid=5436712
     *
     * @route GET /mv
     * @param string $mvid
     * @return string json
     */
    public function mv($mvid)
    {
        $Request = new Request();
        $data = array(
            'id' => $mvid,
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/mv/detail",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }


    /**
     * 播放 mv
     * 说明:调用此接口,传入 mv 地址,可播放 mv,也可将接口嵌入 video 标签使用,由于使用了 'pipe',进度条无法通过拖动进度条控制进度,如有解决方案可提出 PR 或者自行改造
     *
     * 可选参数:
     * url: mv 的 地址
     *
     * 接口地址:
     * /mv/url
     *
     * 调用例子:
     * /mv/url?url=http://v4.music.126.net/20170422034915/c98eab2f5e2c85fc8de2ab3f0f8ed1c6/web/cloudmusic/MjQ3NDQ3MjUw/89a6a279dc2acfcd068b45ce72b1f560/533e4183a709699d566180ed0cd9abe9.mp4
     *
     *
     * @route GET /mv/url
     * @param string $url
     * @return string json
     */
    public function url($url)
    {
        $Request = new Request();
        $response = $Request->PlayMp4(
            $url
        );
    }




}