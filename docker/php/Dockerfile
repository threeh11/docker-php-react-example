FROM alpine:3.20.3

ARG PHP_VERSION
ARG GROUP_APP
ARG USER_APP

RUN apk update && apk upgrade \
    && rm -rf /var/cache/apk/*

# Installing bash
RUN apk add bash
RUN sed -i 's/bin\/ash/bin\/bash/g' /etc/passwd

# Installing PHP
RUN apk add --no-cache php${PHP_VERSION} \
    php${PHP_VERSION}-common \
    php${PHP_VERSION}-fpm \
    php${PHP_VERSION}-pdo \
    php${PHP_VERSION}-opcache \
    php${PHP_VERSION}-zip \
    php${PHP_VERSION}-phar \
    php${PHP_VERSION}-iconv \
    php${PHP_VERSION}-cli \
    php${PHP_VERSION}-curl \
    php${PHP_VERSION}-openssl \
    php${PHP_VERSION}-mbstring \
    php${PHP_VERSION}-tokenizer \
    php${PHP_VERSION}-fileinfo \
    php${PHP_VERSION}-json \
    php${PHP_VERSION}-xml \
    php${PHP_VERSION}-xmlwriter \
    php${PHP_VERSION}-simplexml \
    php${PHP_VERSION}-dom \
    php${PHP_VERSION}-pdo_mysql \
    php${PHP_VERSION}-pdo_sqlite \
    php${PHP_VERSION}-tokenizer \
    php${PHP_VERSION}-pecl-redis \
    && rm -rf /var/cache/apk/*

RUN echo "UTC" > /etc/timezone
RUN apk add --no-cache zip unzip curl supervisor

COPY php.ini /usr/local/etc/php/conf.d/php.ini

# Installing composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN rm -rf composer-setup.php

RUN adduser -D -g ${GROUP_APP} ${USER_APP}
USER ${USER_APP}

WORKDIR /var/www