#!/sh

# Ensure storage directories exist and have proper permissions
mkdir -p /var/www/html/storage/framework/cache
mkdir -p /var/www/html/storage/framework/sessions
mkdir -p /var/www/html/storage/framework/views
mkdir -p /var/www/html/storage/logs
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Run Laravel setup commands if env is ready
if [ -f "/var/www/html/.env" ]; then
    echo "Running migrations..."
    php artisan migrate --force
    
    echo "Caching configurations..."
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
fi

# Start PHP-FPM in background
echo "Starting PHP-FPM..."
php-fpm -D

# Start Nginx in foreground to keep container running
echo "Starting Nginx..."
nginx -g "daemon off;"
