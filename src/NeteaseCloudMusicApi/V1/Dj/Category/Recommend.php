<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-19
 * Time: 23:17
 */

namespace NeteaseCloudMusicApi\V1\Dj\Category;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Recommend
 * @package NeteaseCloudMusicApi\V1\Dj\Category
 *
 * http://i.music.163.com/dj/category/recommend
 *
 */
class Recommend extends Controller
{
    protected $uri = 'http://music.163.com/weapi/djradio/home/category/recommend';
}