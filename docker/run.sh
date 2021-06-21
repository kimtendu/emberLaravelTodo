#!/bin/sh
set -eu
echo "run sh"
echo "Wait for env to be ready"
eval "$(grep ^DB_HOST= ./.env)"
eval "$(grep ^DB_PORT= ./.env)"
echo "Wait for composer to be ready"
composer install
echo "Wait for MySQL to be ready"
#while true;
#do
#  nc -z $DB_HOST $DB_PORT && break
#  sleep 1
#done
echo "done MySQL"
MIGRATE_NOT_MIGRATED_STATUS=$(php artisan migrate:status | grep "not found" | wc -l)
if [ $MIGRATE_NOT_MIGRATED_STATUS = "1" ];
then
  php artisan migrate --seed
fi

#php artisan serve --host 0.0.0.0

chown -R www-data:www-data /var/www/storage
chmod ug+rwX -R /var/www/storage

#php artisan queue:work connection --daemon


echo "Finish install"
echo "App running at"
echo " - local:   http://localhost:9002/"
php-fpm
