# Utiliza la imagen oficial de PHP con Apache como base
FROM php:8.0.2-apache

# Instala las dependencias requeridas por Laravel
RUN apt-get update && \
    apt-get install -y \
        libpng-dev \
        libonig-dev \
        libxml2-dev \
        zip \
        unzip \
        libzip-dev && \
    docker-php-ext-install \
        pdo_mysql \
        mbstring \
        exif \
        pcntl \
        bcmath \
        gd \
        zip && \
    a2enmod rewrite

# Copia los archivos de tu proyecto a la carpeta de trabajo del contenedor
COPY . /var/www/html

# Establece los permisos adecuados para los archivos de Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Instala las dependencias de Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    composer install --no-dev --optimize-autoloader

# Expone el puerto 80 del contenedor
EXPOSE 80

# Ejecuta los comandos de Laravel para generar una clave de aplicación
RUN php artisan key:generate
