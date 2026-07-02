#!/bin/bash
# deploy-to-live.sh - Deploy from Docker to live server

set -e

echo "🚀 Deploying from Docker to Live Server..."

# Get the path to your project
PROJECT_PATH="/var/www/html"

# Deploy to server via SSH
ssh thynkadv@thynkadvisory.co.ke "
    cd /home/thynkadv/domains/thynkadvisory.co.ke/public_html
    
    echo '📦 Pulling latest code...'
    git pull origin main
    
    echo '🐳 Stopping containers...'
    docker-compose down || true
    
    echo '🐳 Rebuilding containers...'
    docker-compose up -d --build
    
    echo '📦 Installing dependencies...'
    docker exec admin-panel-laravel.test-1 composer install --no-dev --optimize-autoloader
    
    echo '🗄️ Running migrations...'
    docker exec admin-panel-laravel.test-1 php artisan migrate --force
    
    echo '🧹 Clearing cache...'
    docker exec admin-panel-laravel.test-1 php artisan optimize:clear
    docker exec admin-panel-laravel.test-1 php artisan config:cache
    docker exec admin-panel-laravel.test-1 php artisan route:cache
    docker exec admin-panel-laravel.test-1 php artisan view:cache
    
    echo '🔒 Setting permissions...'
    docker exec admin-panel-laravel.test-1 chown -R www-data:www-data storage bootstrap/cache
    docker exec admin-panel-laravel.test-1 chmod -R 775 storage bootstrap/cache
    
    echo '✅ Deployment complete!'
"

echo "🎉 Live deployment finished!"
