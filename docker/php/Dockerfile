FROM php:8.2-fpm

# Install required extensions and tools
RUN apt-get update && apt-get install -y \
    zip unzip git curl libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www/html

# Copy the application code (optional if you're mounting it)
# COPY . /var/www/html

# Run Composer install (optional if you're running it manually)
# RUN composer install --no-dev --optimize-autoloader

# Expose port 9000
EXPOSE 9000

CMD ["php-fpm"]