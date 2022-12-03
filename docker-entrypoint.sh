#!/usr/bin/env sh

/usr/sbin/nginx

cd /var/www/html/NeteaseCloudMusicApi && composer install -vvv --ignore-platform-req=ext-dom --ignore-platform-req=ext-xml --ignore-platform-req=ext-xmlwriter --ignore-platform-req=ext-tokenizer

php-fpm
