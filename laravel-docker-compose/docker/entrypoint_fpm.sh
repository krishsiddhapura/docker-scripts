#!/bin/sh

# Wait for MySQL to be ready
echo "Waiting for MySQL to be ready..."
until nc -z -v -w30 mysql 3306
do
  echo "Waiting for MySQL..."
  sleep 5
done
echo "MySQL is ready."

# Clear and rebuild Laravel caches
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

# Run database migrations
php artisan migrate --force

# STARTING PHP FPM IN BACKGROUND
php-fpm -D

# STARTING NGINX IN BACKGROUND
nginx -g "daemon off;"
