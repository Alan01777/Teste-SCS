# imagem base do PHP 8.1 com PHP-FPM
FROM php:8.1-fpm

# Limite de memória do PHP
ENV PHP_MEMORY_LIMIT=256M

# Nome de usuário desejado
ARG user=scs
ARG uid=1000

# Atualiza e instala as dependências do sistema
RUN apt-get update \
    && apt-get install -y \
        apt-utils \
    && apt-get install -y \
        libzip-dev \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-install -j$(nproc) zip

# Limpa a cache do apt
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instala as extensões do PHP necessárias para o MariaDB
RUN docker-php-ext-install pdo pdo_mysql

# Obtem a versão mais recente do Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Cria um usuário do sistema para executar comandos do Composer e Artisan
RUN useradd -G www-data,root -u $uid -d /home/$user $user \
    && mkdir -p /home/$user/.composer \
    && chown -R $user:$user /home/$user

WORKDIR /var/www

EXPOSE 9000

USER $user
