# Use the official PHP image with Apache for PHP 8.3
FROM php:8.3-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    npm

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the application code to the container
COPY . .

# Install PHP dependencies
RUN composer install

# Ensure .env file exists, use .env.example as a fallback
COPY .env.example .env
RUN if [ ! -f ".env" ]; then cp .env.example .env; fi

# Enable Apache modules
RUN a2enmod rewrite

# Run Vite build
RUN npm install && npm run build

# Create a symbolic link for the storage
RUN php artisan storage:link

# DB migration
RUN php artisan migrate --force

# DB seed
RUN php artisan db:seed --force

# Change ownership of the directories
RUN chown -R www-data:www-data /var/www/html
RUN find /var/www/html -type d -exec chmod 755 {} \;
RUN find /var/www/html -type f -exec chmod 644 {} \;

# Update Apache configuration to point to the public directory
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Expose port 80
EXPOSE 80
