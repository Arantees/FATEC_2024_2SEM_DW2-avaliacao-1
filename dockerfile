FROM php:8.2-fpm

# Instala extensões PHP adicionais se necessário
RUN docker-php-ext-install pdo pdo_mysql

# Define o diretório de trabalho
WORKDIR /var/www/html

# Copia o código da aplicação
COPY ./app /var/www/html

# Configura permissões
RUN chown -R www-data:www-data /var/www/html