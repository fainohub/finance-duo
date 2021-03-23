#!/bin/bash

if [ -f ".env" ]; then
    echo "Env configured!"
else
    echo "Copy env.example"

    cp .env.example .env
fi

docker-compose build app

docker-compose up -d

docker-compose exec app composer install

docker-compose exec app php artisan migrate