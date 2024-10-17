FROM alpine:3.20.3
RUN apk cache clean \
    && apk update && apk upgrade \
    && apk add nginx \
    && rm -rf /var/cache/apk/*

RUN adduser -D -g 'www' www
RUN mkdir /var/www/html \
    && chown -R www:www /var/lib/nginx \
    && chown -R www:www /var/www/html
RUN mv /etc/nginx/nginx.conf /etc/nginx/nginx.conf.orig

USER www