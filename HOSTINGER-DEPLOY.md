# 🚀 Deploy KND Store en Hostinger

## Configuración Rápida

### 1. Configurar Repositorio
- **URL**: `https://github.com/Lilshootve/knd-store-laravel.git`
- **Rama**: `main`

### 2. Comandos de Build (Hostinger)
```bash
# Usar composer.json de producción
cp composer.production.json composer.json

# Instalar dependencias
composer install --no-dev --optimize-autoloader

# Generar clave
php artisan key:generate

# Optimizar
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Migraciones
php artisan migrate --force
```

### 3. Variables de Entorno
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

### 4. Configuración del Dominio
- **Document Root**: `/public_html/public`
- **Directorio**: `/public_html`

### 5. Permisos
```bash
chmod -R 755 storage
chmod -R 755 bootstrap/cache
```

## Solución de Problemas

### Error de Dependencias
- Usar `composer.production.json`
- Ejecutar `composer install --no-dev`

### Error 500
- Verificar `.env`
- Revisar logs en `/storage/logs`

### Assets no cargan
- Verificar document root
- Ejecutar `php artisan storage:link` 