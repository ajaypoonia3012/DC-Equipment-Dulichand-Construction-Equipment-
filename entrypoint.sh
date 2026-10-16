#!/bin/bash

# Ensure SQLite database file exists if using sqlite
if [ "$DB_CONNECTION" = "sqlite" ] || [ -z "$DB_CONNECTION" ]; then
    mkdir -p /var/www/html/database
    touch /var/www/html/database/database.sqlite
    chmod -R 775 /var/www/html/database
    chown -R www-data:www-data /var/www/html/database
fi

php artisan config:clear
php artisan cache:clear
php artisan storage:link
php artisan migrate --force --seed
apache2-foreground
