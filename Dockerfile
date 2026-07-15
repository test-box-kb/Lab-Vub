FROM php:8.2-apache

RUN apt-get update && \
    apt-get install -y iputils-ping \
    dnsutils default-mysql-client && \
    docker-php-ext-install mysqli && \
    rm -rf /var/lib/apt/lists/*

COPY * /var/www/html

RUN chown -R www-data:www-data /var/www/html/uploads
RUN chown -R www-data:www-data /var/www/html/uploadfile
