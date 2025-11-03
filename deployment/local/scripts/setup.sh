#!/bin/sh

echo "Project setup"

docker-compose exec -T app composer install --no-interaction
docker-compose exec -T app composer run-script post-create-project-cmd --no-interaction
