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

class PlayList
{

    use EnableDIAnnotations;

    /**
     * 获取歌单详情
     * 说明:歌单能看到歌单名字,但看不到具体歌单内容,调用此接口,传入歌单 id,可以获取对应歌单内的所有的音乐
     *
     * 必选参数:
     * id : 歌单 id
     *
     * 接口地址:
     * /playlist/detail
     *
     * 调用例子:
     * /playlist/detail?id=24381616
     * @route GET /playlist/detail
     * @param int $id
     * @param int $offset
     * @param boolean $total
     * @param int $limit
     * @param int $n
     * @return string json
     *
     */
    public function detail($id, $offset = 0, $total = true, $limit = 1000, $n = 1000)
    {
        $Request = new Request();
        $data = array(
            'id' => $id,
            'offset' => $offset,
            'limit' => $limit,
            'total' => $total,
            'n' => $n,
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/v3/playlist/detail",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }


}