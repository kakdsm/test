FROM php:8.2-apache

# Install MySQL PDO driver (this solves the error)
RUN docker-php-ext-install pdo pdo_mysql

# Enable Apache rewrite
RUN a2enmod rewrite

# Copy files to Apache root
COPY . /var/www/html/

EXPOSE 80
