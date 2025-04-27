# Use Ubuntu 24.04 as the base image
FROM ubuntu:24.04

LABEL maintainer="Taylor Otwell & FrankenPHP Community"

# Arguments for Node version and PHP version
ARG NODE_VERSION=22
ARG PHP_VERSION=8.4

WORKDIR /var/www/html

# Set environment variables
ENV DEBIAN_FRONTEND=noninteractive
ENV TZ=UTC
# Set FrankenPHP version
ENV FRANKENPHP_VERSION=v1.1.0

# Set timezone
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Configure APT
RUN echo "Acquire::http::Pipeline-Depth 0;" > /etc/apt/apt.conf.d/99custom && \
    echo "Acquire::http::No-Cache true;" >> /etc/apt/apt.conf.d/99custom && \
    echo "Acquire::BrokenProxy    true;" >> /etc/apt/apt.conf.d/99custom

# Install system dependencies, PHP, Node.js, Composer, and FrankenPHP CLI
RUN apt-get update && apt-get upgrade -y \
    && mkdir -p /etc/apt/keyrings \
    && apt-get install -y --no-install-recommends gnupg curl ca-certificates zip unzip git sqlite3 libcap2-bin libpng-dev python3 dnsutils librsvg2-bin fswatch ffmpeg nano redis-server \
    # Add Ondrej PPA for PHP
    && curl -sS 'https://keyserver.ubuntu.com/pks/lookup?op=get&search=0xb8dc7e53946656efbce4c1dd71daeaab4ad4cab6' | gpg --dearmor | tee /etc/apt/keyrings/ppa_ondrej_php.gpg > /dev/null \
    && echo "deb [signed-by=/etc/apt/keyrings/ppa_ondrej_php.gpg] https://ppa.launchpadcontent.net/ondrej/php/ubuntu noble main" > /etc/apt/sources.list.d/ppa_ondrej_php.list \
    && apt-get update \
    # Install PHP extensions
    && apt-get install -y --no-install-recommends \
       php${PHP_VERSION}-cli php${PHP_VERSION}-dev \
       php${PHP_VERSION}-pgsql php${PHP_VERSION}-sqlite3 php${PHP_VERSION}-gd \
       php${PHP_VERSION}-curl php${PHP_VERSION}-mongodb \
       php${PHP_VERSION}-imap php${PHP_VERSION}-mysql php${PHP_VERSION}-mbstring \
       php${PHP_VERSION}-xml php${PHP_VERSION}-zip php${PHP_VERSION}-bcmath php${PHP_VERSION}-soap \
       php${PHP_VERSION}-intl php${PHP_VERSION}-readline \
       php${PHP_VERSION}-ldap \
       php${PHP_VERSION}-msgpack php${PHP_VERSION}-igbinary php${PHP_VERSION}-redis php${PHP_VERSION}-swoole \
       php${PHP_VERSION}-memcached php${PHP_VERSION}-pcov php${PHP_VERSION}-imagick php${PHP_VERSION}-xdebug \
    # Install Composer
    && curl -sLS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer \
    # Install Node.js
    && curl -fsSL https://deb.nodesource.com/gpgkey/nodesource-repo.gpg.key | gpg --dearmor -o /etc/apt/keyrings/nodesource.gpg \
    && echo "deb [signed-by=/etc/apt/keyrings/nodesource.gpg] https://deb.nodesource.com/node_$NODE_VERSION.x nodistro main" > /etc/apt/sources.list.d/nodesource.list \
    && apt-get update \
    && apt-get install -y --no-install-recommends nodejs \
    && npm install -g npm \
    && npm install -g pnpm \
    && npm install -g bun \
    # Install Yarn
    && curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | gpg --dearmor | tee /etc/apt/keyrings/yarn.gpg >/dev/null \
    && echo "deb [signed-by=/etc/apt/keyrings/yarn.gpg] https://dl.yarnpkg.com/debian/ stable main" > /etc/apt/sources.list.d/yarn.list \
    && apt-get update \
    && apt-get install -y --no-install-recommends yarn \
    # Install FrankenPHP CLI (using install script)
    && curl -fsSL https://frankenphp.dev/install.sh | sh \
    && mv frankenphp /usr/local/bin/frankenphp \
    # Clean up
    && apt-get -y autoremove \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Allow PHP to bind to ports < 1024
RUN setcap "cap_net_bind_service=+ep" /usr/bin/php${PHP_VERSION}

# Create /.composer directory and set permissions for the default www-data user
RUN mkdir /.composer && chown -R www-data:www-data /.composer

# Copy custom PHP configuration
COPY docker/8.4/php.ini /etc/php/${PHP_VERSION}/cli/conf.d/99-app.ini

# Copy application code
COPY . /var/www/html

# Copy .env file
COPY .env.example /var/www/html/.env

# Set permissions for storage and cache AFTER copying files
# Note: We only need to ensure www-data owns storage and bootstrap/cache
# The rest of the files can be owned by root (or the user running COPY)
RUN mkdir -p /var/www/html/storage/framework/sessions /var/www/html/storage/framework/views /var/www/html/storage/framework/cache /var/www/html/storage/logs /var/www/html/bootstrap/cache \
&& chown -R www-data:www-data /var/www/html/ \
&& find /var/www/html/storage -type d -exec chmod 775 {} \; \
&& find /var/www/html/storage -type f -exec chmod 664 {} \; \
&& find /var/www/html/bootstrap/cache -type d -exec chmod 775 {} \; \
&& find /var/www/html/bootstrap/cache -type f -exec chmod 664 {} \;

# Install PHP dependencies using Composer
RUN composer install --optimize-autoloader --classmap-authoritative --no-scripts

# Install Node.js dependencies using bun
RUN bun install

# Build the application assets using bun
RUN bun run build

# Generate application key
RUN php artisan key:generate

# Run migrations and seed the database if needed (optional, can also be done at runtime)
RUN touch database/database.sqlite
RUN chown -R www-data:www-data database/database.sqlite
RUN php artisan migrate:fresh --force
RUN php artisan db:seed --force

# Pull mmdb files for GeoIP
RUN php artisan geoip:download-mmdb

# Default command to run the Laravel development server
# Copy start script
COPY docker/start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

# Switch to the 'www-data' user
USER www-data

# Expose port 80 for the web server
EXPOSE 80

# Default command to run Redis and the Laravel development server
CMD ["sh", "-c", "/usr/local/bin/start.sh"]
