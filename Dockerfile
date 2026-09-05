# ==========================================
# Dockerfile untuk deploy Laravel 13 ke Render.com
# ==========================================
FROM php:8.3-apache

# Install dependency sistem & ekstensi PHP yang dibutuhkan Laravel
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libzip-dev \
    libsqlite3-dev \
    sqlite3 \
    && docker-php-ext-install pdo pdo_sqlite zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Aktifkan mod_rewrite Apache (dibutuhkan Laravel untuk routing)
RUN a2enmod rewrite

# Arahkan document root Apache ke folder public/ Laravel
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy source code project
COPY . .

# Install dependency PHP (tanpa dev dependency, dioptimasi untuk production)
RUN composer install --optimize-autoloader --no-dev --no-interaction

# Siapkan file .env dari .env.example jika belum ada, buat database sqlite, set permission
RUN cp -n .env.example .env || true \
    && mkdir -p database && touch database/database.sqlite \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage bootstrap/cache database

EXPOSE 80

# Jalankan migrasi + optimize cache saat container start, lalu jalankan Apache
CMD php artisan config:clear \
    && php artisan migrate --force \
    && php artisan storage:link || true \
    && apache2-foreground
