#!/usr/bin/env bash
# start.sh

echo "Démarrage de l'application..."

# Créer le lien symbolique pour le storage
php artisan storage:link

# Lancer le serveur sur le port fourni par Render
php artisan serve --host=0.0.0.0 --port=$PORT