FROM php:7.4-fpm-alpine

ADD . /var/www/html/NeteaseCloudMusicApi

RUN set -ex \
    && sed -i 's/dl-cdn.alpinelinux.org/mirrors.ustc.edu.cn/g' /etc/apk/repositories \
    && apk add  \
       nginx composer \
    && cd /var/www/html/NeteaseCloudMusicApi \
    && composer install \
    && cp service.sh /opt/ \
    && cp nginx.conf /etc/nginx/nginx.conf \
    && cp i.music.163.com.fpm.conf /usr/local/etc/php-fpm.d \
    && cp i.music.163.com.conf /etc/nginx/conf.d \
    && chmod +x /opt/service.sh


ENTRYPOINT ["/opt/service.sh"]