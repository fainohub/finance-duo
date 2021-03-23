FROM php:7.4-fpm-alpine

# Arguments defined in docker-compose.yml
ARG user
ARG uid

RUN apk --update add --no-cache \
    ${PHPIZE_DEPS} \
    oniguruma-dev \
    libpng-dev \
    openssl-dev \
    supervisor \
    gd \
    nano \
    libxml2-dev \
    git \
    && rm -rf /var/cache/apk/*

RUN docker-php-ext-install \
    pdo_mysql \
    mbstring \
    gd \
    soap \
    xml \
    posix \
    tokenizer \
    ctype \
    pcntl \
    opcache

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN addgroup -g $uid -S $user \
    && adduser -u $uid -D -S -G $user -h /home/$user -g $user $user

# Set working directory
WORKDIR /var/www

USER $user