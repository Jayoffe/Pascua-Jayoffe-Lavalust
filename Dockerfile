FROM php:8.2-apache

# Install PDO MySQL extension for database access
RUN docker-php-ext-install pdo pdo_mysql

# Enable Apache rewrite module for LavaLust URL routing
RUN a2enmod rewrite

# Copy your application files into the container
COPY . /var/www/html/

# Set ownership to Apache's default user
RUN chown -R www-data:www-data /var/www/html
