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

class Artists
{

    use EnableDIAnnotations;

    /**
     *
     * 获取歌手单曲
     * 说明:调用此接口,传入歌手 id,可获得歌手单曲
     *
     * 必选参数:
     * id: 歌手 id,可由搜索接口获得
     *
     * 接口地址:
     * /artists
     *
     * 调用例子:
     * /artists?id=6452
     * @route GET /artists
     * @param string $id
     * @param int $offset
     * @param int $limit
     * @return string json
     */
    public function artists($id, $offset = 0, $limit = 50)
    {
        $Request = new Request();
        $data = array(

            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/v1/artist/{$id}?offset={$offset}&limit={$limit}",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }


    /**
     *
     * 获取歌手 mv
     * 说明:调用此接口,传入歌手 id,可获得歌手 mv 信息,具体 mv 播放地址可调用/mv传入此接口获得的mvid 来拿到,如: /artist/mv?id=6452,/mv?mvid=5461064
     *
     * 必选参数:
     * id: 歌手 id,可由搜索接口获得
     *
     * 接口地址:
     * /artist/mv
     *
     * 调用例子:
     * /artist/mv?id=6452
     * @route GET /artist/mv
     * @param string $id
     * @param boolean $total
     * @param int $limit
     * @param int $offset
     * @return string json
     */
    public function mv($id,$total = true , $offset = 0, $limit = 50)
    {
        $Request = new Request();
        $data = array(
            'artistId'=>$id,
            'total'=>$total,
            'offset'=>$offset,
            'limit'=>$limit,
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/artist/mvs",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }


    /**
     *
     * 获取歌手专辑
     * 说明:调用此接口,传入歌手 id,可获得歌手专辑内容
     *
     * 必选参数:
     * id: 歌手 id
     *
     * 可选参数:
     * limit: 取出数量,默认为50
     *
     * offset: 偏移数量,用于分页,如:(页数-1)*50, 其中 50 为 limit 的值,默认为0
     *
     * 接口地址:
     * /artist/album
     *
     * 调用例子:
     * /artist/album?id=6452&limit=30 (周杰伦)
     *
     * @route GET /artist/album
     * @param string $id
     * @param boolean $total
     * @param int $limit
     * @param int $offset
     * @return string json
     */
    public function album($id,$total = true , $offset = 0, $limit = 50)
    {
        $Request = new Request();
        $data = array(
            'total'=>$total,
            'offset'=>$offset,
            'limit'=>$limit,
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/artist/albums/{$id}",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }



}