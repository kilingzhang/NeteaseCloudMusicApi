<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-18
 * Time: 17:09
 */

namespace NeteaseCloudMusicApi;

use Throwable;
use Utils\Response;

class Bootstrap
{
    public function __construct()
    {
        try {
            $this->useNamespaces(NAMESPACES);
        } catch (\Exception $e) {
            Response::fail([], $e->getMessage());
        }
    }

    /**
     * @param string $namespaces
     * @return \NeteaseCloudMusicApi\Controller
     */
    private function useNamespaces(string $namespaces): Controller
    {
        return new $namespaces;
    }
}