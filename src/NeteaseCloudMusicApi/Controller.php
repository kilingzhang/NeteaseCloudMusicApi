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
     * @var bool
     */
    protected $debug = true;
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
        $this->run();
    }

    /**
     * @throws \Exception
     */
    public function run()
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
                        self::get($key, $param['value'], $param['enum']),
                        $this->uri
                    );
                    continue;
                }

                $params[$param['as']] = self::get($key, $param['value'], $param['enum']);
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
     * @param array|null $enum
     * @return null
     * @throws \Exception
     */
    protected function get(string $key, $value = null, array $enum = null)
    {
        if (!isset($_GET[$key]) && $value === null) {
            throw new \Exception(sprintf("{%s}参数不存在", $key));
        }
        $value = !isset($_GET[$key]) ? $value : $_GET[$key];
        return !empty($enum) && isset($enum[$value]) ? $enum[$value] : $value;
    }

    /**
     * @param string $key
     * @param null $value
     * @param array|null $enum
     * @return null
     * @throws \Exception
     */
    protected function post(string $key, $value = null, array $enum = null)
    {
        if (!isset($_POST[$key]) && $value === null) {
            throw new \Exception(sprintf("{%s}参数不存在", $key));
        }
        $value = !isset($_POST[$key]) ? $value : $_POST[$key];
        return !empty($enum) && isset($enum[$value]) ? $enum[$value] : $value;
    }
}