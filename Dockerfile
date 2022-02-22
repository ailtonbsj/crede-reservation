FROM php:7.2-apache

RUN apt-get update && apt-get install -y libpq-dev
RUN docker-php-ext-install pdo_pgsql
RUN a2enmod rewrite
RUN cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini

COPY ./crede-reservation /var/www/html/crede-reservation
COPY redirect.php /var/www/html/index.php

CMD docker-php-entrypoint apache2-foreground