<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-18
 * Time: 17:20
 */

/**
 * @param array $data
 * @param bool $isExit
 */
function dd($data = [], $isExit = true)
{
    if (isset($_SERVER['SHELL']) || (PHP_SAPI === 'cli')) {
        echo "\n";
    } else {
        echo "<pre>";
    }
    var_dump($data);
    if (isset($_SERVER['SHELL']) || (PHP_SAPI === 'cli')) {
        echo "\n";
    } else {
        echo "</pre>";
    }
    $isExit && exit;
}