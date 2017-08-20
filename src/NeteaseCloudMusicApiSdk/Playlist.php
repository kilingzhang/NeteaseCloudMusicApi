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


    //TODO　未测试
    /**
     * 收藏单曲到歌单
     * 说明:调用此接口,传入音乐 id和 limit 参数, 可获得该专辑的所有评论(需要登录)
     *
     * 必选参数:
     * op: 从歌单增加单曲为add,删除为 del pid: 歌单id tracks: 歌曲id
     *
     * 接口地址:
     * /playlist/tracks
     *
     * 调用例子:
     * /playlist/tracks?op=add&pid=24381616&tracks=347230 (对应把'海阔天空'添加到'我'的歌单,测试的时候请把这里的 pid换成你自己的)
     * @route GET /playlist/tracks
     * @param int $pid
     * @param string $op
     * @param int $tracks
     * @return string json
     *
     */
    public function tracks($pid,$tracks,$op = 'add')
    {
        $Request = new Request();
        $data = array(
            'op' => $op,
            'pid' => $pid,
            'tracks' => $tracks,
            'trackIds' => "[$tracks]",
            'csrf_token' => '',
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/playlist/manipulate/tracks",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }

}