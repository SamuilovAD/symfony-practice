run:
	docker compose up -d
phpcs:
	docker compose exec php ./vendor/bin/php-cs-fixer fix src

phpstan:
	docker compose exec php ./vendor/bin/phpstan analyse src
