FROM php:7.4-fpm

# instala dependências
RUN apt-get update && apt-get install -y \
  build-essential \
  libpng-dev \
  libjpeg62-turbo-dev \
  libfreetype6-dev \
  locales \
  libzip-dev \
  zip \
  jpegoptim optipng pngquant gifsicle \
  vim \
  unzip \
  git \
  curl \
  libonig-dev \
  libxml2-dev \
  libpq-dev

# instala extensões PHP
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd

# instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# define a diretório de trabalho
WORKDIR /var/www/html

# copia o código fonte
COPY . .

# instala as dependências do Composer
RUN composer install --no-dev --no-scripts --no-progress --prefer-dist

# ajusta as permissões
RUN chown -R www-data:www-data /var/www/html \
  && chmod -R 775 /var/www/html \
  && find /var/www/html -type f -exec chmod 664 {} \; \
  && find /var/www/html -type d -exec chmod 775 {} \;

# expõe a porta
EXPOSE 9000

# inicia o servidor web
CMD ["php-fpm"]