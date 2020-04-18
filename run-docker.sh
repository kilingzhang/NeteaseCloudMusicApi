#!/usr/bin/env bash

docker build  -t  kilingzhang/netease-cloud-music-api:dev .

docker stop php_container
docker rm php_container

docker run -itd  --name=php_container \
-p 80:80 \
-v /Users/kilingzhang/fpm.d:/usr/local/etc/php-fpm.d \
-v /Users/kilingzhang/Code:/var/www/html \
-v /Users/kilingzhang/vhost:/etc/nginx/conf.d \
kilingzhang/netease-cloud-music-api:dev

docker  exec -it php_container sh