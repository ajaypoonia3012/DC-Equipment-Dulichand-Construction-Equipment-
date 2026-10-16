#!/bin/bash
php artisan config:clear
php artisan cache:clear
php artisan storage:link
php artisan migrate --force --seed
apache2-foreground
