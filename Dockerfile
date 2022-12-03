FROM php:7.4-fpm-alpine

ADD . /var/www/html/NeteaseCloudMusicApi

ADD docker-entrypoint.sh .
ADD i.music.163.com.fpm.conf /usr/local/etc/php-fpm.d/
ADD i.music.163.com.vhost.conf /etc/nginx/conf.d/
ADD nginx.conf /etc/nginx/nginx.conf

RUN set -ex \
    && addgroup -g 1000 -S www && adduser -s /sbin/nologin -S -D -u 1000 -G www www \
    && sed -i 's/dl-cdn.alpinelinux.org/mirrors.ustc.edu.cn/g' /etc/apk/repositories \
    && apk add nginx composer

ENTRYPOINT ["./docker-entrypoint.sh"]