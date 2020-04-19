# 网易云音乐 API

[![Latest Stable Version](https://poser.pugx.org/kilingzhang/netease-cloud-music-api/v/stable)](https://packagist.org/packages/kilingzhang/netease-cloud-music-api) [![Latest Unstable Version](https://poser.pugx.org/kilingzhang/netease-cloud-music-api/v/unstable)](https://packagist.org/packages/kilingzhang/netease-cloud-music-api) [![License](https://poser.pugx.org/kilingzhang/netease-cloud-music-api/license)](https://packagist.org/packages/kilingzhang/netease-cloud-music-api)
## 描述

网易云音乐 API
网易云音乐 PHP 版 API
跨站请求伪造 (CSRF), 伪造请求头,调用网易云音乐官方 API
>注：本接口仅限学习使用，请不要用于非法用途。请支持正版。~~网易大法好~~

## 灵感来自
曾经用过[@metowolf](https://github.com/metowolf/NeteaseCloudMusicApi)大大的网易接口，也是我搞网易云音乐接口的启蒙。本来想用此接口仿写个网易云音乐app。但是接口不全最后写到一半放弃了。直到遇到[@Binaryify](https://binaryify.github.io/NeteaseCloudMusicApi/)大大的nodejs版60+的API。感觉发现了新大陆/\*哈哈哈哈\*/。可是美中不足的就是这是nodejs，我一个phper当然想用php来实现。所以直接照搬了[@Binaryify](https://binaryify.github.io/NeteaseCloudMusicApi/)大大的接口，改成了PHP版本。也方便日后phper直接来使用。

- [Binaryify/NeteaseCloudMusicApi](https://binaryify.github.io/NeteaseCloudMusicApi/)
- [metowolf/NeteaseCloudMusicApi](https://github.com/metowolf/NeteaseCloudMusicApi)

## log

- 2020-04-20 更新全部已有接口 修复失效接口 (距离上次更新竟然已经三年了 - -)
- 2017-08-21 nodejs版接口基本完成php的转换

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

## 说明

>本接口依照RESTful规范设计（并不完全 - -|| 

## 环境要求


## 镜像安装
    
    vi /etc/hosts
    
    127.0.0.1  i.music.163.com
    
    docker build  -t  kilingzhang/netease-cloud-music-api:dev .
    
    docker stop php_container
    docker rm php_container
    
    docker run -itd  --name=php_container \
    -p 80:80 \
    kilingzhang/netease-cloud-music-api:dev
    
    curl http://i.music.163.com
    
    {"code":0,"message":"it`s work successfully","data":{"docs":"https:\/\/blog.kilingzhang.com\/NeteaseCloudMusicApi","github":"https:\/\/github.com\/kilingzhang\/NeteaseCloudMusicApi"}}
    
## 源码安装

1. 安装 composer (已安装可忽略)
    
        curl -s http://getcomposer.org/installer | php
    
2. 安装 NeteaseCloudMusicApi

        git clone https://github.com/kilingzhang/NeteaseCloudMusicApi.git

3. 依赖安装

        composer install

4. nginx
    
        server {
        
            listen 80;
            server_name i.music.163.com;
            root /var/www/html/NeteaseCloudMusicApi;
            index index.php;
        
            location / {
                try_files $uri $uri/ /index.php?$query_string;
            }
        
            location ~ \.php$ {
                fastcgi_pass  127.0.0.1:5337;
                fastcgi_index index.php;
                fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
                include fastcgi_params;
            }
        }

## 使用文档

[在线文档](https://kilingzhang.github.io/NeteaseCloudMusicApi/)
<a href="https://kilingzhang.github.io/NeteaseCloudMusicApi/">![docs](http://markdown-1252847423.file.myqcloud.com/docs.png)</a>

    

## Swagger文档输出



## License
[The MIT License (MIT)](https://github.com/kilingzhang/NeteaseCloudMusicApi/blob/master/LICENSE)


  [1]: http://markdown-1252847423.costj.myqcloud.com/docs.png