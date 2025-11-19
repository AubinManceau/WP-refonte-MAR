FROM php:8.2-fpm-alpine

ARG UID=1000
ARG GID=1000

RUN apk add --no-cache \
        $PHPIZE_DEPS \
        mariadb-client \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && addgroup -g $GID appgroup \
    && adduser -D -u $UID -G appgroup appuser \
    && chown -R appuser:appgroup /var/www/html

WORKDIR /var/www/html
USER appuser
