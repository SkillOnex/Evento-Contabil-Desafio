#!/bin/bash

# Instala dependências se não existirem
if [ ! -f "vendor/autoload.php" ]; then
    echo "Instalando dependências do Composer..."
    composer install --no-interaction --prefer-dist --optimize-autoloader
fi

# Garante que os diretórios do Laravel existam
echo "Verificando diretórios de cache e sessão..."
mkdir -p storage/framework/cache/data \
         storage/framework/sessions \
         storage/framework/views \
         storage/logs \
         bootstrap/cache

# Corrige permissões
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

# Copia .env se ainda não existir
if [ ! -f ".env" ]; then
    echo "Arquivo .env não encontrado. Copiando .env.example para .env"
    cp .env.example .env
fi

# Gera APP_KEY se ainda não estiver definida
if ! grep -q "^APP_KEY=base64" .env; then
    echo "Gerando APP_KEY..."
    php artisan key:generate
fi

# Continua com o comando original
exec "$@"
