#!/usr/bin/env bash

docker stop netease_cloud_music_api_container
docker rm netease_cloud_music_api_container
docker rmi kilingzhang/netease-cloud-music-api:dev

docker build -t kilingzhang/netease-cloud-music-api:dev .

docker run -itd --name=netease_cloud_music_api_container \
  -p 80:80 \
  -v $(pwd):/var/www/html/NeteaseCloudMusicApi \
  kilingzhang/netease-cloud-music-api:dev

docker exec -it netease_cloud_music_api_container sh
