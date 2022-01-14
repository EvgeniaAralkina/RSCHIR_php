FROM php:7.2-apache
RUN apt-get update
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo pdo_mysql
RUN apt-get install -y apache2-utils libaprutil1-dbd-mysql
RUN pecl install redis \
    && docker-php-ext-enable redis

COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN apt-get install unzip

RUN apt-get update -y && apt-get install -y libpng-dev
RUN docker-php-ext-install gd

