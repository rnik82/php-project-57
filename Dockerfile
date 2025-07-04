FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev
RUN docker-php-ext-install pdo pdo_pgsql zip


RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

RUN curl -sL https://deb.nodesource.com/setup_20.x | bash -
RUN apt-get install -y nodejs

WORKDIR /app

COPY . .
RUN composer install
RUN npm ci
RUN npm run build

RUN php artisan config:clear && php artisan route:clear && php artisan view:clear
RUN php artisan config:cache && php artisan route:cache && php artisan view:cache

CMD ["bash", "-c", "php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=$PORT"]
