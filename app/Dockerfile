FROM php:fpm

WORKDIR ./app

COPY . .

RUN apt-get update && \
    apt-get install -y libpq-dev && \
    docker-php-ext-install pdo pdo_pgsql pgsql

RUN php db/migration/migration.php
