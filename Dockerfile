FROM php:7.4-fpm-alpine

ADD . /tmp/NeteaseCloudMusicApi

RUN set -ex \
    && sed -i 's/dl-cdn.alpinelinux.org/mirrors.ustc.edu.cn/g' /etc/apk/repositories \
    && apk add  \
       nginx \
    && cd /tmp/NeteaseCloudMusicApi \
    && cp service.sh /opt/ \
    && cp nginx.conf /etc/nginx/nginx.conf \
    && cp i.music.163.com.fpm.conf /usr/local/etc/php-fpm.d \
    && cp i.music.163.com.conf /etc/nginx/conf.d \
    && cat /etc/nginx/conf.d/i.music.163.com.conf \
    && chmod +x /opt/service.sh \
    && rm -rf /tmp/NeteaseCloudMusicApi


ENTRYPOINT ["/opt/service.sh"]