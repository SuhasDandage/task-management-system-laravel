# Use official PHP image with extensions
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libonig-dev \
    libzip-dev \
    curl \
    && docker-php-ext-install pdo pdo_pgsql mbstring zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Copy existing .env file
# (Optional, you can also use Render environment variables)
# COPY .env .

# Cache configs
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Expose port
EXPOSE 8000

# Start Laravel
CMD php artisan serve --host=0.0.0.0 --port=8000
