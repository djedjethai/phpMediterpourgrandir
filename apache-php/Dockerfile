# base stage
FROM php:7.2.1-apache as base
RUN docker-php-ext-install pdo pdo_mysql mysqli
# Enable apache rewrite
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
# Install spatialite and create symlink for libproj.so.0
# COPY sqlite3_ext /etc/sqlite3_ext
RUN apt-get update && apt-get -y install gdal-bin
RUN ln -s /usr/lib/x86_64-linux-gnu/libproj.so.12 /usr/lib/x86_64-linux-gnu/libproj.so.0
#Install gd library for images
RUN apt-get install libpng-dev libfreetype6-dev libjpeg62-turbo-dev -qy \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd
#Copy php ini
COPY php.ini /usr/local/etc/php/php.ini
# install ping cmd
# RUN composer update
WORKDIR /var/www/html/
# RUN apt-get install iputils-ping
# Install git
RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y git
# Install composer & update packages
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
# Install unzip utility and libs needed by zip PHP extension 
RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    unzip
RUN docker-php-ext-install zip
RUN  apt-get clean
RUN a2enmod rewrite

# development stage
FROM base as dev

# stage delete dev package

# production stage
FROM base as prod
WORKDIR /var/www/html
COPY ./MediterPourGrandir/ .
# WORKDIR /MediterPourGrandir/
RUN composer update
RUN apt-get -y remove git 
