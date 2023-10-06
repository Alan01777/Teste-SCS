#!/bin/bash

# Copie o arquivo .env.example
cp .env.example .env

# Iniciar os contêineres Docker
docker compose up -d

# Acesse o contêiner PHP e instale as dependências do Composer
docker compose exec laravel-app bash -c "composer install"

# Gere a chave de aplicativo Laravel
docker compose exec laravel-app bash -c "php artisan key:generate"

# Execute as migrações e seeders (se necessário)
docker compose exec laravel-app bash -c "php artisan migrate"
docker compose exec laravel-app bash -c "php artisan db:seed"

# Exiba a URL de acesso à aplicação
echo "Sua aplicação Laravel está disponível em http://localhost:8000"
