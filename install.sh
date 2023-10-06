#!/bin/bash

# Crie o arquivo .env a partir do .env.example
cp .env.example .env

# Inicie os contêineres Docker
docker-compose up -d

# Instale as dependências do Composer
docker-compose exec laravel-app bash -c "composer install"

# Gere a chave de aplicativo Laravel
docker-compose exec laravel-app bash -c "php artisan key:generate"

echo "Aguarde até que o banco de dados esteja pronto para aceitar conexões..."
sleep(20)

# Execute as migrações do banco de dados
docker-compose exec laravel-app bash -c "php artisan migrate"

# Execute os seeders do banco de dados (se necessário)
docker-compose exec laravel-app bash -c "php artisan db:seed"

# Exiba a URL de acesso à aplicação
echo "Sua aplicação Laravel está disponível em http://localhost:8000"
