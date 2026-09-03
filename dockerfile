FROM php:8.2-apache

# Install required PHP extensions for MySQL/PDO
RUN docker-php-ext-install pdo pdo_mysql

# Enable Apache rewrite module (required for LavaLust routing)
RUN a2enmod rewrite

# Copy project files into the Apache web directory
COPY . /var/www/html/

# Set correct permissions
RUN chown -R www-data:www-data /var/www/html