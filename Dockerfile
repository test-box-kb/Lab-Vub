FROM php:8.2-apache

# Cài Xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Bật mod_rewrite (nếu cần)
RUN a2enmod rewrite

# Copy cấu hình Xdebug
COPY docker/php/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

RUN apt-get update && \
    apt-get install -y iputils-ping \
    dnsutils default-mysql-client && \
    docker-php-ext-install mysqli && \
    rm -rf /var/lib/apt/lists/*


