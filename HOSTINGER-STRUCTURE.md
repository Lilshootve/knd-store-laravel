# 🚀 Deploy KND Store en Hostinger - Estructura Correcta

## Problema
Hostinger no permite cambiar el document root fácilmente. Laravel necesita que `public/` sea el document root, pero Hostinger usa `public_html/`.

## Solución
Mover el contenido de `public/` a `public_html/` y el resto de Laravel fuera del directorio web.

## Estructura Final en Hostinger

```
public_html/          # Document root (solo archivos públicos)
├── index.php         # Index actualizado con rutas absolutas
├── .htaccess         # Configuración Apache
├── assets/           # CSS, JS, imágenes
└── favicon.ico

knd-laravel-app/      # Fuera de public_html (no accesible web)
├── app/
├── bootstrap/
├── config/
├── database/
├── resources/
├── routes/
├── storage/
├── vendor/
├── artisan
├── composer.json
└── .env
```

## Comandos de Deploy

### 1. Clonar repositorio
```bash
git clone https://github.com/Lilshootve/knd-store-laravel.git
cd knd-store-laravel
```

### 2. Instalar dependencias
```bash
composer install --no-dev --optimize-autoloader
```

### 3. Configurar estructura
```bash
# Crear directorio para Laravel fuera de public_html
mkdir ../knd-laravel-app

# Mover archivos de Laravel
mv app bootstrap config database lang resources routes storage tests vendor artisan composer.json composer.lock .env .env.example .gitignore .gitattributes package.json package-lock.json phpunit.xml postcss.config.js tailwind.config.js vite.config.js README.md ../knd-laravel-app/

# Mover contenido de public/ a public_html
mv public/* ./

# Actualizar index.php
cp index-hostinger.php index.php
```

### 4. Configurar aplicación
```bash
cd ../knd-laravel-app
php artisan key:generate
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force
chmod -R 755 storage
chmod -R 755 bootstrap/cache
```

## Variables de Entorno (.env)
```env
APP_NAME="KND Store"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://kndstore.com
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=tu_database
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_password
```

## Verificación
- ✅ `https://kndstore.com` - Página principal
- ✅ `https://kndstore.com/store` - Tienda
- ✅ `https://kndstore.com/products` - Productos
- ✅ `https://kndstore.com/cart` - Carrito 