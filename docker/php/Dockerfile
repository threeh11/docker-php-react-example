FROM alpine:3.20.3

ARG PHP_VERSION=83
ARG GROUP_APP=www-data
ARG USER_APP=www-data

RUN apk update && apk upgrade && rm -rf /var/cache/apk/*

RUN apk add --no-cache bash && \
    sed -i 's/bin\/ash/bin\/bash/g' /etc/passwd

RUN apk add --no-cache \
    php${PHP_VERSION} \
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
    php${PHP_VERSION}-pecl-redis

RUN apk add --no-cache zip unzip curl supervisor

RUN echo "UTC" > /etc/timezone

COPY php.ini /usr/local/etc/php/conf.d/php.ini

ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php && \
    HASH=$(curl -sS https://composer.github.io/installer.sig) && \
    php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    rm -rf composer-setup.php

RUN addgroup -S ${GROUP_APP} && adduser -S ${USER_APP} -G ${GROUP_APP}

RUN mkdir -p /var/log/php${PHP_VERSION} && \
    touch /var/log/php${PHP_VERSION}/error.log && \
    chown -R ${GROUP_APP}:${USER_APP} /var/log/php${PHP_VERSION} && \
    chmod -R 755 /var/log/php${PHP_VERSION}

RUN mkdir -p /run/php

USER ${USER_APP}
COPY php-fpm.conf /usr/local/etc/php-fpm.d/www.conf
WORKDIR /var/www/html

CMD ["/usr/sbin/php-fpm83", "-F"]
