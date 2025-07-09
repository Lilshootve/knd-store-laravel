#!/bin/bash

echo "🚀 Iniciando deploy de KND Store en Hostinger..."

# Limpiar caché
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Instalar dependencias de producción
composer install --no-dev --optimize-autoloader

# Generar clave de aplicación si no existe
if [ ! -f .env ]; then
    cp .env.example .env
    php artisan key:generate
fi

# Configurar para producción
sed -i 's/APP_ENV=local/APP_ENV=production/' .env
sed -i 's/APP_DEBUG=true/APP_DEBUG=false/' .env
sed -i 's/APP_URL=http:\/\/localhost:8000/APP_URL=https:\/\/kndstore.com/' .env

# Optimizar para producción
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Ejecutar migraciones
php artisan migrate --force

# Configurar permisos
chmod -R 755 storage
chmod -R 755 bootstrap/cache

echo "✅ Deploy completado exitosamente!" 