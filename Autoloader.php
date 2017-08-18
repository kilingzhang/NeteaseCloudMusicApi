<?php
/**
 * Created by PhpStorm.
 * User: Kilingzhang
 * Date: 2017/6/28
 * Time: 15:51
 */

spl_autoload_register(function($className){
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $file = __DIR__.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.$path.'.php';
    if(is_file($file)) require $file;
});