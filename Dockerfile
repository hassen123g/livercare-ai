 
FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    python3 python3-pip nodejs npm curl unzip git \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

# PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Node dependencies
RUN npm install && npm run build

# Python dependencies
RUN pip3 install flask numpy pillow scikit-learn joblib --break-system-packages

# Laravel setup
RUN php artisan config:cache && php artisan route:cache

EXPOSE 8080

CMD python3 ai_models/predict.py & php artisan serve --host=0.0.0.0 --port=${PORT:-8080}