<?php

return [
    //App
    'host' => 'api.netease.com',

    //DB
    'DB.connection'=> 'mysql:dbname=phpboot-example;host=127.0.0.1',
    'DB.username'=> 'root',
    'DB.password'=> '',
    'DB.options' => [],
//    // 如果要将系统缓存改成文件方式, 取消下面的注释。默认系统缓存是 APC
//    // 注意这里的系统缓存指路由、依赖注入方式等信息的缓存, 而不是业务接口返回数据的缓存。
//    // 所以这里不要使用 redis 等远程缓存
//    \Doctrine\Common\Cache\Cache::class =>
//        \DI\object(\Doctrine\Common\Cache\FilesystemCache::class)
//            ->constructorParameter('directory', sys_get_temp_dir()),

    //异常输出类
    \PhpBoot\Controller\ExceptionRenderer::class =>
        \DI\object(\Utils\ExceptionRenderer::class)
];