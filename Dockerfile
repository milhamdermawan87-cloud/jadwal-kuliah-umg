FROM php:8.3-apache

RUN docker-php-ext-install pdo pdo_mysql gd

RUN a2enmod rewrite

COPY . /var/www/html

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache && \
    chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

RUN apt-get update && apt-get install -y nodejs npm && \
    npm install && npm run build && \
    apt-get remove -y nodejs npm && apt-get autoremove -y && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    composer install --no-dev --optimize-autoloader && \
    rm -rf /var/www/html/node_modules /var/www/html/.env

COPY .env.railway /var/www/html/.env

RUN php artisan key:generate
