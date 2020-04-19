<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-19
 * Time: 13:26
 */

namespace NeteaseCloudMusicApi\V1\Mv;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Index
 * @package NeteaseCloudMusicApi\V1\Mv
 *
 * 获取 mv 数据
 * 说明:调用此接口,传入 mvid (在搜索音乐的时候传 type=1004获得) ,可获取对应 MV 数据,数据包含 mv 名字,歌手,发布时间, mv 视频地址等数据,其中 mv 视频网易做了防盗链处理,不能直接播放,需要播放的话需要调用'播放 mv' 接口
 *
 * 必选参数:
 * id: mv 的 id
 *
 * 接口地址:
 * /mv
 *
 * 调用例子:
 * http://i.music.163.com/mv?id=5436712
 *
 */
class Index extends Controller
{
    protected $uri = 'https://music.163.com/weapi/mv/detail';

    protected $params = [
      'id' => null,
    ];
}