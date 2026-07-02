FROM ghcr.io/railwayapp/nixpacks:php-node
WORKDIR /app

COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts
RUN npm install
RUN npm run build

EXPOSE 8080
CMD ["php","artisan","serve","--host=0.0.0.0","--port=8080"]
