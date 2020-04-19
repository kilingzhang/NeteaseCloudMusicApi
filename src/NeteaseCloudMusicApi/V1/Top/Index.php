<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-20
 * Time: 00:46
 */

namespace NeteaseCloudMusicApi\V1\Top;


use NeteaseCloudMusicApi\Controller;

/**
 * Class Index
 * @package NeteaseCloudMusicApi\V1\Top
 *
 * 排行榜
 * 说明:调用此接口,传入数字 id, 可获取不同排行榜
 *
 * 必选参数:
 * id: 对象 key, 对应以下排行榜
 *
 * "0": 云音乐新歌榜,
 * "1": 云音乐热歌榜,
 * "2": 网易原创歌曲榜,
 * "3": 云音乐飙升榜,
 * "4": 云音乐电音榜,
 * "5": UK排行榜周榜,
 * "6": 美国Billboard周榜
 * "7": KTV嗨榜,
 * "8": iTunes榜,
 * "9": Hit FM Top榜,
 * "10": 日本Oricon周榜
 * "11": 韩国Melon排行榜周榜,
 * "12": 韩国Mnet排行榜周榜,
 * "13": 韩国Melon原声周榜,
 * "14": 中国TOP排行榜(港台榜),
 * "15": 中国TOP排行榜(内地榜)
 * "16": 香港电台中文歌曲龙虎榜,
 * "17": 华语金曲榜,
 * "18": 中国嘻哈榜,
 * "19": 法国 NRJ EuroHot 30周榜,
 * "20": 台湾Hito排行榜,
 * "21": Beatport全球电子舞曲榜
 * 接口地址:
 * /top
 *
 * 调用例子:
 * http://i.music.163.com/top?id=6
 *
 */
class Index extends Controller
{
    protected $uri = 'https://music.163.com';

    private $tops = array(
        array('云音乐新歌榜', '/api/playlist/detail?id=3779629'),
        array('云音乐热歌榜', '/api/playlist/detail?id=3778678'),
        array('网易原创歌曲榜', '/api/playlist/detail?id=2884035'),
        array('云音乐飙升榜', '/api/playlist/detail?id=19723756'),
        array('云音乐电音榜', '/api/playlist/detail?id=10520166'),
        array('UK排行榜周榜', '/api/playlist/detail?id=180106'),
        array('美国Billboard周榜', '/api/playlist/detail?id=60198'),
        array('KTV嗨榜', '/api/playlist/detail?id=21845217'),
        array('iTunes榜', '/api/playlist/detail?id=11641012'),
        array('Hit FM Top榜', '/api/playlist/detail?id=120001'),
        array('日本Oricon周榜', '/api/playlist/detail?id=60131'),
        array('韩国Melon排行榜周榜', '/api/playlist/detail?id=3733003'),
        array('韩国Mnet排行榜周榜', '/api/playlist/detail?id=60255'),
        array('韩国Melon原声周榜', '/api/playlist/detail?id=46772709'),
        array('中国TOP排行榜(港台榜)', '/api/playlist/detail?id=112504'),
        array('中国TOP排行榜(内地榜)', '/api/playlist/detail?id=64016'),
        array('香港电台中文歌曲龙虎榜', '/api/playlist/detail?id=10169002'),
        array('华语金曲榜', '/api/playlist/detail?id=4395559'),
        array('中国嘻哈榜', '/api/playlist/detail?id=1899724'),
        array('法国 NRJ EuroHot 30周榜', '/api/playlist/detail?id=27135204'),
        array('台湾Hito排行榜', '/api/playlist/detail?id=112463'),
        array('Beatport全球电子舞曲榜', '/api/playlist/detail?id=3812895'),
    );

    protected $params = [
        'id' => null,
    ];

    /**
     * @throws \Exception
     */
    protected function beforeRequest()
    {
        $this->uri .= $this->tops[self::get('id')][1];
    }
}