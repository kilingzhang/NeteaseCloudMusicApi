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

class Song
{

    use EnableDIAnnotations;

    /**
     *
     * 获取歌曲详情
     * 说明:调用此接口,传入音乐 id, 可获得歌曲详情
     *
     * 必选参数:
     * ids: 音乐 id,如 ids=437250607,347231
     *
     *  接口地址:
     *  /song/detail
     *
     * 调用例子:
     * /song/detail?ids=437250607,347231
     *
     * @route GET /song/detail
     * @param string $ids
     * @return string json
     */
    public function detail($ids)
    {
        $id = $ids;
        unset($ids);
        $id = explode(',',$id);
        for ($i=0;$i<count($id);$i++){
            $ids[$i]['id'] = (int)$id[$i];
        }
        $Request = new Request();
        $data = array(
            'c' => \GuzzleHttp\json_encode($ids, JSON_UNESCAPED_UNICODE),
            'ids' => \GuzzleHttp\json_encode($id,JSON_UNESCAPED_UNICODE),
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/v3/song/detail",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }


}