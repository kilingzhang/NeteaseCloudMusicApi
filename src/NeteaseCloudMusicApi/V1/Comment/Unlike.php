<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-19
 * Time: 17:34
 */

namespace NeteaseCloudMusicApi\V1\Comment;


use NeteaseCloudMusicApi\Controller;
use Utils\Request;

/**
 * Class Unlike
 * @package NeteaseCloudMusicApi\V1\Comment
 *
 * 给评论取消点赞
 * 说明:调用此接口,传入 type, 资源 id, 和评论id cid和 是否点赞参数 t 即可给对应评论点赞(需要登录)
 *
 * 必选参数:
 * id : 资源 id, 如歌曲 id,mv id
 *
 * cid : 评论 id
 *
 * type: 0: 歌曲 1: mv 2: 歌单 3: 专辑 4: 电台 5: 视频 6: 动态
 *
 * 接口地址:
 * comment/unlike
 *
 * 调用例子:
 * http://i.music.163.com/comment/unlike?id=186016&type=0&cid=4956438 对应给晴天最热门的那条评论点赞
 *
 * 注意： 动态点赞不需要传入 id 参数，需要传入动态的 `threadId` 参数,
 * 如：`/comment/unlike?type=6&cid=1419532712&threadId=A_EV_2_6559519868_32953014`，
 *`threadId` 可通过 `/event`，`/user/event` 接口获取
 *
 */
class Unlike extends Controller
{
    protected $uri = 'https://music.163.com/weapi/v1/comment/unlike';

    protected $params = [
        'id' => null,
        'type' => null,
        'cid' => [
            'value' => null,
            'as' => 'commentId',
        ],
        'threadId' => '',
    ];

    protected function newRequest(Request $request): Request
    {
        return $request->setCookie('os', 'pc');
    }

    /**
     * @param $params
     * @return array
     * @throws \Exception
     */
    protected function parseParams($params): array
    {
        $typeMap = array(
            'R_SO_4_', //  歌曲
            'R_MV_5_', //  MV
            'A_PL_0_', //  歌单
            'R_AL_3_', //  专辑
            'A_DJ_1_', //  电台,
            'R_VI_62_', //  视频
            'A_EV_2_'  //  动态
        );

        $type = $typeMap[$params['type']];
        $threadId = $type . $params['id'];

        if ($params['type'] == 6) {
            $threadId = self::get('threadId');
        }

        $params['threadId'] = $threadId;

        unset($params['type']);
        unset($params['id']);

        return $params;
    }
}