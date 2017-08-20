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

class TrashFm
{

    use EnableDIAnnotations;

    /**
     *
     * 垃圾桶
     * 说明:调用此接口,传入音乐 id, 可把该音乐从私人 FM中移除至垃圾桶
     *
     * 必选参数:
     * id: 歌曲 id
     *
     * 接口地址:
     * /fm_trash
     *
     * 调用例子:
     * /fm_trash?id=347230
     *
     * @route GET /fm_trash
     * @param int $id
     * @param int $alg
     * @param int $time
     * @return string json
     */
    public function fm_trash($id, $alg = 'RT', $time = 25)
    {
        $songId = $id;
        $Request = new Request();
        $data = array(
            'songId' => $songId,
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/radio/trash/add?alg={$alg}&songId={$songId}&time={$time}",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }


}