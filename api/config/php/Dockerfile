# Usa a imagem oficial do PHP 7.2 FPM como base
FROM php:7.2-fpm

# Atualiza o gerenciador de pacotes e instala algumas dependências
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-configure zip --with-libzip \
    && docker-php-ext-install zip pdo pdo_mysql mysqli mbstring

# Configuração do Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Define o diretório de trabalho como /var/www
WORKDIR /var/www

# Expõe a porta 9000 para conexão com o Nginx ou outro servidor web
EXPOSE 9000

# Comando padrão para iniciar o PHP-FPM
CMD ["php-fpm"]
