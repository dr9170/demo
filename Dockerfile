FROM php:7.2-apache
RUN apt update
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
COPY index.php /var/www/html
COPY vista /var/www/html/vista
COPY controlador /var/www/html/controlador
COPY vendor /var/www/html/vendor
COPY config /var/www/html/config
