#!/bin/bash

# Script de deploy para Hostinger
echo "🚀 Iniciando deploy de KND Store..."

# Limpiar caché
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Optimizar para producción
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Instalar dependencias solo de producción
composer install --no-dev --optimize-autoloader

# Generar clave de aplicación si no existe
if [ ! -f .env ]; then
    cp .env.example .env
    php artisan key:generate
fi

# Ejecutar migraciones
php artisan migrate --force

echo "✅ Deploy completado exitosamente!" 