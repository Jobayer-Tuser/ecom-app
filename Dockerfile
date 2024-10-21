FROM php:8.2-fpm

WORKDIR /var/www/html

COPY . .

RUN apt-get update  \
    && apt-get install --quiet --yes --no-install-recommends \
    libzip-dev unzip \
    && docker-php-ext-install zip pdo pdo_mysql \
    && pecl install -o -f redis-7.4.2 \
    && docker-php-ext-enable redis

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN groupadd --gid 1000 appuser && useradd --uid 1000 -g appuser \
    -G www-data,root --shell /bin/bash  \
    --create-home appuser

USER appuser
