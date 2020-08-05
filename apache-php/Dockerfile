FROM php:7.2.1-apache
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
RUN a2enmod rewrite
