FROM php:7.2-fpm
COPY php.ini /usr/local/etc/php/
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install mbstring
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer