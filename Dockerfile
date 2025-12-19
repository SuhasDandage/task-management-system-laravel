FROM php:8.2-cli

# System deps
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpq-dev \
    libzip-dev \
    zip \
    nodejs \
    npm \
    && docker-php-ext-install pdo pdo_pgsql zip

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

# PHP deps
RUN composer install --no-dev --optimize-autoloader

# Frontend build
RUN npm install --legacy-peer-deps && npm run build

# Create required Laravel directories & permissions
RUN mkdir -p \
    storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache \
    && chmod -R 777 storage bootstrap/cache

# Expose port
EXPOSE 8000

# Clear caches & start app (NO shell needed)
CMD php artisan serve --host=0.0.0.0 --port=8000

