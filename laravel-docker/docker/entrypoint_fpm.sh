#!/bin/sh

# STARTING PHP FPM IN BACKGROUND
php-fpm -D

# STARTING NGINX IN BACKGROUND
nginx -g "daemon off;"
