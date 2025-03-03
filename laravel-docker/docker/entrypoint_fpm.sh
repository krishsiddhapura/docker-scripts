#!/bin/sh

# CLEAR LARAVEL CACHE
php artisan cache:clear
php artisan view:cache
php artisan view:clear
php artisan config:cache
php artisan config:clear
php artisan event:cache
php artisan event:clear
php artisan route:cache
php artisan route:clear
php artisan optimize:clear

# STARTING SUPERVISOR
supervisord -c /etc/supervisor/supervisord.conf
exec "$@"

# STARTING PHP FPM IN BACKGROUND
php-fpm -D

# STARTING NGINX IN BACKGROUND
nginx -g "daemon off;"
