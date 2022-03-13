FROM php:7.2-apache

RUN apt-get update && apt-get install -y libpq-dev libzip-dev zlib1g-dev
RUN docker-php-ext-install pdo_pgsql
RUN docker-php-ext-install zip
RUN a2enmod rewrite
RUN cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini
RUN curl https://getcomposer.org/installer --output composer-setup.php
RUN php composer-setup.php
RUN rm composer-setup.php
RUN mv composer.phar /usr/local/bin/composer

WORKDIR /var/www/html/
COPY ./crede-reservation ./crede-reservation
COPY index.php ./
COPY keys.json ../
COPY composer.json ./
RUN composer i

CMD docker-php-entrypoint apache2-foreground