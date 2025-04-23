# Use official PHP image with Apache
FROM php:8.2-apache

# Enable Apache rewrite module
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy the public app files
COPY ./Public/ /var/www/html/

# Copy shared backend file(s)
COPY ./db_conn.php /var/www/html/db_conn.php

# Set proper permissions (optional but safe)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expose port 80 for web traffic
EXPOSE 80
