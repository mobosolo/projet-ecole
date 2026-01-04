#!/usr/bin/env bash
# build.sh

echo "Installation des dépendances..."
composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

echo "Génération du cache..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Exécution des migrations..."
php artisan migrate --force --no-interaction

echo "Création du compte admin (si nécessaire)..."
php artisan db:seed --force --no-interaction

echo "Build terminé !"