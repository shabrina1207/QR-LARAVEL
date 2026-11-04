FROM php:8.2-apache

# Install ekstensi sistem yang dibutuhkan Laravel & SQLite
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Aktifkan mod_rewrite Apache untuk routing Laravel
RUN a2enmod rewrite

# Salin semua kode proyek ke dalam server
COPY . /var/www/html

# Setel folder public Laravel sebagai root direktori web
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Berikan izin akses folder agar Laravel bisa menulis log dan database
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# Jalankan migrasi database otomatis dan nyalakan server Apache
CMD touch database/database.sqlite && chmod 777 database/database.sqlite && php artisan migrate --force && apache2-foreground
