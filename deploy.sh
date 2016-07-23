#!/bin/sh

composer update
php artisan migrate
php artisan db:seed --class=UsersTableSeeder
php artisan np:sync