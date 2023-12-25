<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-19
 * Time: 03:18
 */

namespace NeteaseCloudMusicApi\V1;


use NeteaseCloudMusicApi\Controller;
use Utils\Response;

class Index extends Controller
{
    public function run()
    {
        Response::json(
            0,
            'it`s work successfully',
            [
                'docs' => 'https://docs.neteasecloudmusicapi.binaryify.com',
                'github' => 'https://github.com/kilingzhang/NeteaseCloudMusicApi',
            ]
        );
    }
}