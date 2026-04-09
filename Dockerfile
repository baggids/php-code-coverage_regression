FROM php:8.5-cli-alpine

# Install Xdebug (needed for coverage)
RUN apk add --no-cache --virtual .build-deps $PHPIZE_DEPS autoconf g++ make linux-headers \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && apk del .build-deps

# Configure Xdebug for coverage
RUN printf "xdebug.mode=coverage\nxdebug.start_with_request=no\n" \
    > /usr/local/etc/php/conf.d/20-xdebug.ini

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER=1

WORKDIR /app

# Only copy dependency manifests — source code is mounted at runtime via volume
COPY composer.json composer.lock* ./
RUN composer install --prefer-dist --no-scripts --no-progress --optimize-autoloader
