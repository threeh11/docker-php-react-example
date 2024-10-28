FROM postgres:14.8-alpine3.18

WORKDIR /var/lib/postgresql

RUN addgroup --system --gid 1000 db_postgres \
    && adduser --system --uid 1000 --ingroup db_postgres db_postgres

ENV POSTGRES_DB=${POSTGRES_DB}
ENV POSTGRES_USER=${POSTGRES_USER}
ENV POSTGRES_PASSWORD=${POSTGRES_PASSWORD}
ENV PGDATA="/var/lib/postgresql/data/pgdata"

RUN mkdir -p /var/lib/postgresql/data \
    && chown -R db_postgres:db_postgres /var/lib/postgresql/data \
    && chmod 755 /var/lib/postgresql/data

EXPOSE 5432
USER db_postgres
CMD ["postgres"]
