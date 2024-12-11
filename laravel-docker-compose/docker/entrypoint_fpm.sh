#!/bin/sh

# WAITING FOR MYSQL CONTAINER
echo "Waiting for MySQL to be ready..."
until nc -z -v -w30 mysql 3306
do
  echo "Waiting for MySQL..."
  sleep 5
done
echo "MySQL is ready."

# CLEARING LARAVEL CACHE
php artisan optimize:clear
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan event:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

# RUN DATABASE MIGRATIONS
php artisan migrate --force

# STARTING PHP FPM IN BACKGROUND
php-fpm -D

# STARTING NGINX IN BACKGROUND
nginx -g "daemon off;"
