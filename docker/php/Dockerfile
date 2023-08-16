FROM php:8.2-fpm
COPY ./php.ini /usr/local/etc/php/php.ini

# Composerインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 環境変数
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

RUN apt-get update \
  && apt-get install -y git curl unzip zlib1g-dev mariadb-client vim libzip-dev \
  && docker-php-ext-install zip pdo_mysql

RUN curl -fsSL https://deb.nodesource.com/setup_19.x | bash - \
&& apt install -y nodejs

RUN pecl install xdebug \
&& docker-php-ext-enable xdebug
