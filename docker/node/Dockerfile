FROM alpine:3.20.3

ARG GROUP_APP=www-data
ARG USER_APP=www-data

RUN apk add --no-cache nodejs npm

RUN adduser -D -g '${GROUP_APP}' ${USER_APP}

WORKDIR /var/www/html

RUN chown -R ${GROUP_APP}:${USER_APP} /var/www/html
USER ${USER_APP}

# Команда по умолчанию
CMD ["tail", "-f", "/dev/null"]
