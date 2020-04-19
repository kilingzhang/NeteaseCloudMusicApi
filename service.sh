#!/usr/bin/env sh

nginx

php-fpm > /var/log/php-fpm.log 2>&1 &


tail -f /var/log/php-fpm.log