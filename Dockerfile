FROM php:7.2-apache

RUN apt-get update && apt-get install -y libpq-dev
RUN docker-php-ext-install pdo_pgsql
RUN a2enmod rewrite
RUN cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini

COPY ./crede-reservation /var/www/html/crede-reservation
COPY pgdb.sql /

# RUN apt-get -q update && apt-get -qy install netcat
# ADD https://raw.githubusercontent.com/eficode/wait-for/   master/wait-for /bin/wait-for
# RUN chmod +x /bin/wait-for
# pg_restore -h $DATABASE_SERV -U $DATABASE_USER -d $DATABASE_NAME -v < pgdb.sql


CMD docker-php-entrypoint apache2-foreground