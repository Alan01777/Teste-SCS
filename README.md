## Teste SCS DEVOPS
## FRANCISCO ALAN OLIVEIRA DA COSTA ALVES

# Sobre o APP
A aplicação foi feita em laravel e utiliza o banco de dados Mariadb, nginx (reverse-proxy), adminer e o próprio Laravel. O objetivo do App é proporcionar ao usuário a possibilidade de criar uma lista de tarefas (task list) que pode ser modificada ou deletada do banco de dados após sua criação.

# Configuração manual do APP
1. Clone o repositório
```bash
git clone https://github.com/Alan01777/Teste-SCS.git
cd Teste-SCS
```
2. Subindo os containers
```bash
docker compose up -d
```
3. Criando o arquivo .env do Laravel
```bash
cp .env.example .env
```
4. Gerando a chave do laravel
```bash
docker compose exec laravel-app php artisan key:generate
```
5. instalando o composer
```bash
docker compose exec laravel-app composer install
```

## .env e docker-compose.yaml
Seus parâmetros de configuração do .env devem estar de acordo com os especificados no docker-compose.
Por exemplo:
- docker-compose.yaml
```bash
 mysql:
        image: mariadb:10.8.3
        container_name: "mariadb"
        command: --default-authentication-plugin=mysql_native_password
        restart: always
        environment:
            MYSQL_USER: root
            MYSQL_PASSWORD: root
            MYSQL_DATABASE: Task-List
            MYSQL_ROOT_PASSWORD: root
```
- .env:
```bash
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=Task-List
DB_USERNAME=root
DB_PASSWORD=root
```
Por fim, faça as migration do laravel
```bash
docker compose exec laravel-app php artisan migrate
```

## Configuração via script
Dê permissão de execução ao script "install.sh" e faça sua execução
```bash
chmod +x install.sh
./install.sh
```
