FROM node:20-bullseye-slim AS node-builder
WORKDIR /app

COPY package.json package-lock.json* ./
RUN echo "Installing frontend dependencies..."
RUN npm install
COPY . .
RUN echo "Building frontend assets with Vite..."
RUN npm run build && ls -la public/build

FROM php:8.5-cli
WORKDIR /app

RUN apt-get update && apt-get install -y git unzip zip libpq-dev libzip-dev libonig-dev libxml2-dev zlib1g-dev && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install pdo_pgsql zip

COPY --from=node-builder /app /app

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

RUN composer install --optimize-autoloader --no-interaction --no-scripts

EXPOSE 8080
CMD ["php","artisan","serve","--host=0.0.0.0","--port=8080"]
