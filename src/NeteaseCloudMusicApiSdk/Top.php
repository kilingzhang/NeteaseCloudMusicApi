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

class Top
{

    use EnableDIAnnotations;

    /**
     * 获取精品歌单
     * 说明:调用此接口,可获取精品歌单
     *
     * 可选参数:
     * cat: tag, 比如 "华语"、"古风" 、"欧美"、"流行",默认为"全部"
     *
     * limit: 取出评论数量,默认为20
     *
     * 接口地址:
     * /top/playlist/highquality
     *
     * 调用例子:
     * /top/playlist/highquality?limit=30
     *
     * @route GET /top/playlist/highquality
     * @param string $cat
     * @param string $offset
     * @param string $limit
     * @return string json
     */
    public function highquality($cat = null, $limit = 20, $offset = 0)
    {
        $Request = new Request();
        $data = array(
            'cat' => $cat == null ? '全部' : $cat,
            'offset' => $offset,
            'limit' => $limit,
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/playlist/highquality/list",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }


    /**
     * 歌单(网友精选碟)
     * 说明:调用此接口,可获取网友精选碟歌单
     *
     * 可选参数:
     * order: 可选值为 'new' 和 'hot',分别对应最新和最热,默认为 'hot'
     *
     * 接口地址:
     * /top/playlist
     *
     * 调用例子:
     * /top/playlist?limit=10&order=new
     *
     * @route GET /top/playlist
     * @param string $cat
     * @param string $order
     * @param string $offset
     * @param string $limit
     * @param string $total
     * @return string json
     */
    public function playlist($cat = null, $order = 'hot', $total = true, $limit = 20, $offset = 0)
    {
        $Request = new Request();
        $data = array(
            'cat' => $cat == null ? '全部' : $cat,
            'order' => $order,
            'total' => $total,
            'offset' => $offset,
            'limit' => $limit,
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/playlist/list",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }

    /**
     * 新碟上架
     * 说明:调用此接口,可获取新碟上架列表,如需具体音乐信息需要调用获取专辑列表接口 /album ,然后传入 id, 如 /album?id=32311&limit=30
     *
     * 可选参数:
     * limit: 取出数量,默认为50
     * offset: 偏移数量,用于分页,如:(页数-1)*50, 其中 50 为 limit 的值,默认为0
     * // type ALL, ZH,EA,KR,JP
     *
     * 接口地址:
     * /top/album
     *
     * 调用例子:
     * /top/album?offset=0&limit=30
     *
     * @route GET /top/album
     * @param string $area
     * @param string $offset
     * @param string $limit
     * @param string $total
     * @return string json
     */
    public function album($area = 'ALL', $total = true, $limit = 20, $offset = 0)
    {
        $Request = new Request();
        $data = array(
            'area' => $area,
            'total' => $total,
            'offset' => $offset,
            'limit' => $limit,
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/album/new",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }


    /**
     * 热门歌手
     * 说明:调用此接口,可获取热门歌手数据
     *
     * 可选参数:
     * limit: 取出数量,默认为50
     *
     * offset: 偏移数量,用于分页,如:(页数-1)*50, 其中 50 为 limit 的值,默认为0
     *
     * 接口地址:
     * /top/artists
     *
     * 调用例子:
     * /top/artists?offset=0&limit=30
     *
     * @route GET /top/artists
     * @param string $offset
     * @param string $limit
     * @param string $total
     * @return string json
     */
    public function artists($total = true, $limit = 20, $offset = 0)
    {
        $Request = new Request();
        $data = array(
            'total' => $total,
            'offset' => $offset,
            'limit' => $limit,
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/artist/top",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }


    /**
     *  mv 排行
     * 说明:调用此接口,可获取 mv 排行
     *
     * 可选参数:
     * limit: 取出数量,默认为 30
     *
     * offset: 偏移数量,用于分页,如:(页数-1)*30, 其中 30 为 limit 的值,默认为0
     *
     * 接口地址:
     * top/mv
     *
     * 调用例子:
     * top/mv?limit=10
     *
     * @route GET /top/mv
     * @param string $offset
     * @param string $limit
     * @param string $total
     * @return string json
     */
    public function mv($total = true, $limit = 20, $offset = 0)
    {
        $Request = new Request();
        $data = array(
            'total' => $total,
            'offset' => $offset,
            'limit' => $limit,
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            "/weapi/mv/toplist",
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }

    /**
     * 排行榜
     * 说明:调用此接口,传入数字 idx, 可获取不同排行榜
     *
     * 必选参数:
     * idx: 对象 key, 对应以下排行榜
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
     * /top/list
     *
     * 调用例子:
     * /top/list?idx=6
     *
     * @route GET /top/list
     * @param int $idx
     * @return string json
     */
    public function List($idx)
    {
        $top_list_all = array(
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
        $Request = new Request();
        $data = array(
        );
        $response = $Request->createWebAPIRequest(
            "http://music.163.com",
            $top_list_all[$idx][1],
            'POST',
            $data
        );
        return \GuzzleHttp\json_decode($response, true);
    }


}