<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-18
 * Time: 15:43
 */

namespace NeteaseCloudMusicApi;


use Utils\Request;
use Utils\Response;

abstract class Controller
{
    /**
     * @var string
     */
    protected $uri = '';
    /**
     * @var array
     */
    protected $params = [];
    /**
     * @var array
     */
    protected $options = [];

    /**
     * Controller constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        Response::success($this->request());
    }

    /**
     * @return array
     * @throws \Exception
     */
    final protected function request()
    {
        $params = [];
        foreach ($this->params as $key => $param) {
            if (is_array($param)) {

                if (isset($param['route'])) {
                    $this->uri = str_replace(
                        sprintf("{\$%s}", $param['route']),
                        self::get($key, $param['value']),
                        $this->uri
                    );
                    continue;
                }

                $params[$param['as']] = self::get($key, $param['value']);
            } else {
                $params[$key] = self::get($key, $param);
            }
        }

        return $this->newResponse(
            $this->newRequest(new Request)->createRequest(
                $this->uri,
                $params,
                $this->options
            )
        );
    }

    protected function newRequest(Request $request): Request
    {
        return $request;
    }

    protected function newResponse(array $response): array
    {
        return $response;
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
}