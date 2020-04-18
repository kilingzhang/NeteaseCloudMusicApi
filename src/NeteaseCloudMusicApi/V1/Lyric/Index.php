<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-18
 * Time: 22:25
 */

namespace NeteaseCloudMusicApi\V1\Lyric;


use NeteaseCloudMusicApi\Controller;
use Utils\Request;
use Utils\Response;

class Index extends Controller
{
    /**
     * @throws \Exception
     */
    public function run()
    {
        $id = self::get('id');
        $response = $this->lyric($id);
        Response::success($response);
    }


    /**
     * @param string $id
     * @return array
     */
    public function lyric(string $id)
    {
        $data = array(
            'id' => $id,
            'lv' => -1,
            'kv' => -1,
            'tv' => -1
        );

        return (new Request)
            ->setCookie('os', 'pc')
            ->createRequest(
                "https://music.163.com/api/song/lyric",
                $data,
                [
                    'crypto' => 'linuxapi',
                    'url' => 'https://music.163.com/api/song/lyric'
                ]
            );
    }

}