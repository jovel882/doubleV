#!/bin/bash

apk add --update nodejs npm && cp .env.example .env && sed -i -r 's/^(DB_HOST=).*/\1mdb_doublev/' ".env" && sed -i -r 's/^(DB_DATABASE=).*/\1${MYSQL_DATABASE}/' ".env" && sed -i -r 's/^(DB_PASSWORD=).*/\1${MYSQL_ROOT_PASSWORD}/' ".env" && composer install && php artisan key:generate && php artisan migrate --seed && php artisan passport:keys && npm install && npm run build 