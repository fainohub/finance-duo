CONTAINER_NAME=app

build:
	docker-compose build $(CONTAINER_NAME)

up:
	docker-compose up -d

sh:
	docker-compose exec $(CONTAINER_NAME) sh

install:
	docker-compose exec $(CONTAINER_NAME) composer install

update:
	docker-compose exec $(CONTAINER_NAME) sh -c "COMPOSER_MEMORY_LIMIT=-1 composer update"

migrate:
	docker-compose exec $(CONTAINER_NAME) php artisan migrate

test:
	docker-compose exec $(CONTAINER_NAME) ./vendor/bin/phpunit