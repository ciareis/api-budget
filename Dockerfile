FROM php:8.0.10-alpine

# Repository/Image Maintainer
LABEL maintainer="Leandro Henrique <emtudo@gmail.com>"

ENV SWOOLE_VERSION 4.7.1

WORKDIR /app

RUN apk add --no-cache \
    freetype \
    libjpeg-turbo \
    libpng \
    libstdc++ \
    libbz2 \
    bzip2 \
    libzip \
    libxml2 \
    gmp \
    zlib \
    openssl \
    yaml

RUN apk add --no-cache --virtual .build-deps $PHPIZE_DEPS \
    \
    linux-headers \
    git \
    make \
    automake \
    autoconf \
    gcc \
    g++ \
    zlib-dev \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    bzip2-dev \
    libzip-dev \
    libxml2-dev \
    gmp-dev \
    openssl-dev \
    yaml-dev \
    \
    && docker-php-ext-install \
    \
    calendar \
    bz2 \
    zip \
    soap \
    iconv \
    exif \
    gmp \
    bcmath \
    sockets \
    mysqli \
    pdo_mysql \
    opcache \
    \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    \
    && pecl install redis yaml \
    && docker-php-ext-enable redis yaml \
    && mkdir -p /build \
    && cd /build \
    && git clone -b v${SWOOLE_VERSION} https://github.com/swoole/swoole-src.git \
    && cd swoole-src \
    && phpize \
    && ./configure --with-php-config=/usr/local/bin/php-config \
    --enable-openssl \
    --enable-http2 \
    --enable-swoole-json \
    && make && make install \
    && cd && rm -rf /build \
    && apk del .build-deps

RUN echo -e "extension=swoole\nswoole.use_shortname='Off'" > /usr/local/etc/php/conf.d/docker-php-ext-swoole.ini

# pdo_pgsql
RUN set -ex \
	&& apk --no-cache add postgresql-libs postgresql-dev \
	&& docker-php-ext-install pgsql pdo_pgsql pcntl \
	&& apk del postgresql-dev
# extensoes disponíveis
# bcmath bz2 calendar ctype curl dba dom enchant exif ffi fileinfo filter ftp gd gettext gmp hash iconv imap intl json ldap mbstring mysqli oci8 odbc opcache pcntl pdo pdo_dblib pdo_firebird pdo_mysql pdo_oci pdo_odbc pdo_pgsql pdo_sqlite pgsql phar posix pspell readline reflection session shmop simplexml snmp soap sockets sodium spl standard sysvmsg sysvsem sysvshm tidy tokenizer xml xmlreader xmlwriter xsl zend_test zip

# RUN rm -rf /var/cache/apk/*

# composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

VOLUME [ "/app" ]
EXPOSE 80

# especificar trabalhadores
# --workers=4
# Especificar a quantidade de trabalhadores de tarefas
# --task-workers=6
# limitar quantidade de requisições por trabalhado para evitar vazamento de memória
# --max-requests=250
CMD ["php", "artisan", "octane:start", "--host=0.0.0.0", "--port=80"]
