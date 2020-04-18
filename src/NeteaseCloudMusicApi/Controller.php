<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-18
 * Time: 15:43
 */

namespace NeteaseCloudMusicApi;



abstract class Controller
{
    public function __construct()
    {
        $this->run();
    }

    /**
     * @param string $key
     * @param null $value
     * @return null
     * @throws \Exception
     */
    protected function get(string $key, $value = null)
    {
        if (!isset($_GET[$key]) && $value === null) {
            throw new \Exception(sprintf("{%s}参数不存在", $key));
        }
        return !isset($_GET[$key]) ? $value : $_GET[$key];
    }

    abstract public function run();
}