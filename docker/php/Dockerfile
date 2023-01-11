FROM php:8.1.0-fpm

WORKDIR /var/www

RUN apt-get update

RUN apt-get install -y \
         apt-transport-https \
         build-essential \
         libzip-dev \
         libpng-dev \
         libjpeg62-turbo-dev \
         libfreetype6-dev \
         locales \
         zip \
         jpegoptim optipng pngquant gifsicle \
         unzip \
         curl \
         nano \
         cron \
         supervisor \
         rsyslog \
         sudo \
         dos2unix \
         procps \
         git \
         ffmpeg \
        libmagickwand-dev

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql zip exif pcntl
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install -j$(nproc) gd

RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

COPY ../www /var/www

COPY --chown=www:www ../www /var/www

USER www

EXPOSE 9000

CMD ["php-fpm"]