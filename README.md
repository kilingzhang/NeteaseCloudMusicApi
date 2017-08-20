# 网易云音乐 API

[![Latest Stable Version](https://poser.pugx.org/kilingzhang/netease-cloud-music-api/v/stable)](https://packagist.org/packages/kilingzhang/netease-cloud-music-api)
[![Latest Unstable Version](https://poser.pugx.org/kilingzhang/netease-cloud-music-api/v/unstable)](https://packagist.org/packages/kilingzhang/netease-cloud-music-api)
[![License](https://poser.pugx.org/kilingzhang/netease-cloud-music-api/license)](https://packagist.org/packages/kilingzhang/netease-cloud-music-api)
## 描述

网易云音乐 API

网易云音乐 PHP 版 API


## 灵感来自

- [Binaryify/NeteaseCloudMusicApi](https://binaryify.github.io/NeteaseCloudMusicApi/)
- [metowolf/NeteaseCloudMusicApi](https://github.com/metowolf/NeteaseCloudMusicApi)

## log

## 功能
1.  登录 
2.  刷新登录 
3.  获取用户信息,歌单，收藏，mv, dj 数量 
4.  获取用户歌单 
5.  获取用户电台 
6.  获取用户关注列表 
7.  获取用户粉丝列表 
8.  获取用户动态 
9.  获取用户播放记录 
10. 获取精品歌单 
11. 获取歌单详情
12. 搜索
13. 搜索建议
14. 获取歌词
15. 歌曲评论
16. 收藏单曲到歌单
17. 专辑评论
18. 歌单评论
19. mv 评论
20. 电台节目评论
21. banner
22. 获取歌曲详情
23. 获取专辑内容
24. 获取歌手单曲
25. 获取歌手 mv
26. 获取歌手专辑
27. 获取歌手描述
28. 获取相似歌手
29. 获取相似歌单
30. 相似 mv
31. 获取相似音乐
32. 获取最近5个听了这首歌的用户
33.  获取每日推荐歌单 
34.  获取每日推荐歌曲 
35.  私人 FM 
36.  签到 
37.  喜欢音乐 
38.  垃圾桶 
39. 歌单(网友精选碟)
40. 新碟上架
41. 热门歌手
42.  最新 mv 
43.  推荐 mv 
44.  推荐歌单 
45.  推荐新音乐 
46.  推荐电台 
47.  推荐节目  
48. 独家放送
49. mv 排行
50. 获取 mv 数据
51.  播放 mv 
52. 排行榜
53.  云盘 
54.  电台-推荐 
55.  电台-分类 
56.  电台-分类推荐 
57.  电台-订阅 
58.  电台-详情 
59.  电台-节目 
60.  给评论点赞 
61.  获取动态 

## 环境要求


## 安装



```

    composer require kilingzhang/netease-cloud-music-api
    
    {
        "require": {
    		"kilingzhang/netease-cloud-music-api": "^0.1.0"
        }
    }

    
    

```

## 引入运行

> 在根目录下 index.php 引入

```

    require_once "../vendor/autoload.php";
    use PhpBoot\Docgen\Swagger\Swagger;
    use PhpBoot\Docgen\Swagger\SwaggerProvider;
    use PhpBoot\Application;
    use PhpBoot\Controller\Hooks\Cors;
    ini_set('date.timezone','Asia/Shanghai');
    
    // 加载配置
    $app = \PhpBoot\Application::createByDefault(
        'config.php'
    );
    
    
    //接口文档自动导出功能, 如果要关闭此功能, 只需注释掉这块代码{{
    SwaggerProvider::register($app, function(Swagger $swagger)use($app){
        $swagger->schemes = ['http'];
        $swagger->host = $app->get('host');
        $swagger->info->title = '网易云音乐API';
        $swagger->info->description = "网易云音乐API-SDK";
    });
    //}}
    $app->loadRoutesFromPath( '../src/NeteaseCloudMusicApiSdk', 'NeteaseCloudMusicApiSdk');
    
    //执行请求
    $app->dispatch();

    
    
    
```

> config.php
```
return [
    //App
    'host' => 'api.netease.com',
    'basePath' => '/doc',

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

```

## 使用文档



## License
[The MIT License (MIT)](https://github.com/kilingzhang/NeteaseCloudMusicApi/blob/master/LICENSE)
