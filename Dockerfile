FROM php:8.1-cli

# Gərəkli paketləri yükləyirik
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    git \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Composer yüklə
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
