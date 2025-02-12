# dev version only, do not use on production
FROM php:8.4-fpm
ENV APP_ENV=dev

RUN apt-get update && apt-get install -y \
    zlib1g-dev libpng-dev libzip-dev libicu-dev librabbitmq-dev supervisor unzip \
    net-tools iputils-ping traceroute \
    && docker-php-ext-install opcache gd zip intl bcmath calendar \
    && docker-php-ext-enable opcache gd zip intl bcmath calendar \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

COPY php.ini /usr/local/etc/php/conf.d/custom-php.ini
COPY php-fpm.conf /usr/local/etc/php-fpm.d/php-fpm.conf
COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/dev
RUN if [ -f composer.json ]; then composer install; fi
