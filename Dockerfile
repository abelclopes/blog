# Utiliza a imagem oficial do PHP 8 com Apache
FROM php:8.0-apache

# Define o diretório de trabalho dentro do container
WORKDIR /var/www/html

# Habilita o mod_rewrite do Apache
RUN a2enmod rewrite

# Instala extensões adicionais do PHP
# Este passo é opcional e depende das extensões que seu projeto precisa
RUN docker-php-ext-install pdo pdo_mysql

# Copia os arquivos do projeto para o diretório de trabalho
COPY . .

# Expõe a porta 80 para acesso ao serviço
EXPOSE 80
