FROM alpine:3.20.3

RUN apk update && apk upgrade && rm -rf /var/cache/apk/*
RUN apk add --no-cache nginx

RUN adduser -D -g 'www' www

RUN mkdir -p /var/lib/nginx/logs && \
    touch /var/lib/nginx/logs/error.log && \
    touch /var/lib/nginx/logs/access.log && \
    chown -R www:www /var/lib/nginx && \
    chown -R www:www /var/lib/nginx/logs/error.log && \
    chown -R www:www /var/lib/nginx/logs/access.log && \
    mkdir -p /run/nginx && \
    chown -R www:www /run/nginx && \
    mkdir /var/www/html && \
    chown -R www:www /var/www/html && \
    mv /etc/nginx/nginx.conf /etc/nginx/nginx.conf.orig

COPY conf.d/nginx.conf /etc/nginx/nginx.conf

WORKDIR /var/www/html
USER www
CMD ["nginx", "-g", "daemon off;"]
