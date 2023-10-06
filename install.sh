# Subir os containers
echo ""
echo "Subindo os containers..."
docker compose up -d

# Aguardar alguns segundos para os containers iniciarem
echo ""
echo "Aguardando os containers serem inicializados..."
sleep 15

# Acessar o container e executar o comando "composer install"
echo ""
echo "Instalando as dependências do PHP..."
docker compose exec laravel-app composer install

# Copiar o arquivo .env.example para o diretório do backend
echo ""
echo "Configurando o arquivo .env..."
cp .env.example .env

# Executar o comando "php artisan key:generate" no container backend
echo ""
echo "Gerando a chave do Laravel..."
chmod 664 backend/.env
docker compose exec laravel-app php artisan key:generate
docker compose exec laravel-app php artisan migrate

echo "Setup concluído com sucesso!"
