#!/bin/bash

echo "🚀 Configurando estructura para Hostinger..."

# Crear directorio para archivos fuera de public_html
mkdir -p ../knd-laravel-app

# Mover archivos de Laravel fuera de public_html
mv app ../knd-laravel-app/
mv bootstrap ../knd-laravel-app/
mv config ../knd-laravel-app/
mv database ../knd-laravel-app/
mv lang ../knd-laravel-app/
mv resources ../knd-laravel-app/
mv routes ../knd-laravel-app/
mv storage ../knd-laravel-app/
mv tests ../knd-laravel-app/
mv vendor ../knd-laravel-app/
mv artisan ../knd-laravel-app/
mv composer.json ../knd-laravel-app/
mv composer.lock ../knd-laravel-app/
mv .env ../knd-laravel-app/
mv .env.example ../knd-laravel-app/
mv .gitignore ../knd-laravel-app/
mv .gitattributes ../knd-laravel-app/
mv package.json ../knd-laravel-app/
mv package-lock.json ../knd-laravel-app/
mv phpunit.xml ../knd-laravel-app/
mv postcss.config.js ../knd-laravel-app/
mv tailwind.config.js ../knd-laravel-app/
mv vite.config.js ../knd-laravel-app/
mv README.md ../knd-laravel-app/

# Mover contenido de public/ a public_html
mv public/* ./

# Actualizar index.php con rutas absolutas
sed -i 's|../vendor|../knd-laravel-app/vendor|g' index.php
sed -i 's|../bootstrap|../knd-laravel-app/bootstrap|g' index.php

echo "✅ Estructura configurada para Hostinger!" 