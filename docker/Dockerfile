# Set the base image for subsequent instructions
FROM php:7.4-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y  \
		libfreetype6-dev \
		libjpeg62-turbo-dev \
        wget \
        libldb-dev \
        vim \
        unzip \
        libpq-dev \
        libjpeg-dev \
        libgif-dev \
        apt-utils \
        netcat  \
        libmcrypt-dev  \
        libjpeg-dev  \
        libpng-dev  \
        libfreetype6-dev  \
        libzip-dev \
        libmagickwand-dev --no-install-recommends \
        && pecl install imagick \
        && docker-php-ext-install -j$(nproc) pdo_mysql mysqli pgsql pdo_pgsql zip exif pcntl\
        && docker-php-ext-install -j$(nproc) sockets pcntl \
        && docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/  \
        && docker-php-ext-install -j$(nproc) gd \
        && docker-php-ext-enable imagick \
        # Install Redis and xDebug
        && pecl install redis \
        && pecl install xdebug \
        && docker-php-ext-enable redis xdebug \
        ## Install Composer
        && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
        && composer --version


COPY . .

CMD ["bash", "./run.sh"]


EXPOSE 9000

