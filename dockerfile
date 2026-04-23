FROM php:8.2-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN a2enmod rewrite

COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

RUN mkdir -p /var/www/html/img/uploads/categories \
    && mkdir -p /var/www/html/img/uploads/gallery \
    && mkdir -p /var/www/html/img/uploads/news \
    && mkdir -p /var/www/html/img/uploads/servicegallery \
    && chmod -R 777 /var/www/html/img/uploads

EXPOSE 80