<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-18
 * Time: 15:44
 */

namespace NeteaseCloudMusicApi\V1\Search;

use NeteaseCloudMusicApi\Controller;
use Utils\Request;
use Utils\Response;

class Defaultkeyword extends Controller
{
    /**
     * @throws \Exception
     */
    public function run()
    {
        $response = $this->defaultkeyword();
        Response::success($response);
    }

    // 默认搜索关键词
    public function defaultkeyword(): array
    {
        $data = array();

        return (new Request)->createRequest(
            "http://interface3.music.163.com/eapi/search/defaultkeyword/get",
            $data,
            [
                'crypto' => 'eapi',
                'url' => '/api/search/defaultkeyword/get'
            ]
        );
    }
}