<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-18
 * Time: 16:47
 */

namespace Utils;


class Response
{

    const SUCCESS_CODE = 200;
    const FAILED_CODE = 500;

    /**
     * @param int $code
     * @param string $message
     * @return string
     */
    private static function getMessage(int $code, string $message = null): string
    {
        $messages = [
            self::SUCCESS_CODE => 'success',
            self::FAILED_CODE => 'failed',
        ];

        return empty($message) ? $messages[$code] : $message;
    }

    /**
     * @param int $code
     * @param string $message
     * @param array $data
     */
    public static function json(int $code, string $message, array $data): void
    {
        exit(json_encode([
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ]));
    }

    /**
     * @param array $data
     */
    public static function success(array $data): void
    {
        self::json(
            self::SUCCESS_CODE,
            self::getMessage(self::SUCCESS_CODE),
            $data
        );
    }

    /**
     * @param array $data
     * @param string $message
     */
    public static function fail(array $data = [], string $message = null): void
    {
        self::json(
            self::FAILED_CODE,
            self::getMessage(self::FAILED_CODE, $message),
            $data
        );
    }
}