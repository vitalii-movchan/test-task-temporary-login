#!/bin/sh

echo "Docker setup"

docker-compose build
docker-compose up -d

echo "Project setup"

docker-compose exec -T app composer install --no-interaction
docker-compose exec -T app composer run-script post-create-project-cmd --no-interaction
