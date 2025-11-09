FROM php:8.2-apache

# Enable extensions
RUN docker-php-ext-install pdo pdo_mysql

# Copy project files
COPY . /var/www/html/

# Set Apache to listen on Railway's port
RUN sed -i 's/80/${PORT}/g' /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf

# Expose port
EXPOSE ${PORT}

CMD ["apache2-foreground"]
