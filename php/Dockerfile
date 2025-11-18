FROM php:8.2-fpm-alpine

RUN apk add --no-cache \
        $PHPIZE_DEPS \
        mariadb-client \
        && docker-php-ext-install mysqli pdo pdo_mysql

WORKDIR /var/www/html
