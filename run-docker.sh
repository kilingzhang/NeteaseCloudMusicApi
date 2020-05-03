#!/usr/bin/env bash

docker build  -t  kilingzhang/netease-cloud-music-api:dev .

docker stop php_container
docker rm php_container

docker run -itd  --name=php_container \
-p 80:80 \
kilingzhang/netease-cloud-music-api:dev

#docker run -itd  --name=php_container \
#-p 80:80 \
#-v  /Users/kilingzhang/Code/NeteaseCloudMusicApi-php:/var/www/html/NeteaseCloudMusicApi \
#kilingzhang/netease-cloud-music-api:dev

docker exec -it php_container sh