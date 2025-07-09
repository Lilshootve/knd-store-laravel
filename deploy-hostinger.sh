#!/bin/bash

echo "🚀 Deploy KND Store en Hostinger..."

# Eliminar composer.lock existente
rm -f composer.lock

# Usar composer.json de producción
cp composer.production.json composer.json

# Instalar dependencias limpias
composer install --no-dev --optimize-autoloader

# Generar clave de aplicación
php artisan key:generate

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

echo "✅ Deploy completado!" 