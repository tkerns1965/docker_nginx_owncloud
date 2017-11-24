#!/bin/bash

if [[ ! -f /var/www/config/ampache.cfg.php ]]; then
    mv /var/temp/ampache.cfg.php.dist /var/www/config/ampache.cfg.php.dist
fi

# chown -R www-data:www-data /var/www
chown -R www-data /var/www

# Start apache in the background
# service apache2 start

# Start cron in the background
cron

# Start a process to watch for changes in the library with inotify
(
while true; do
    inotifywatch /media
    php /var/www/bin/catalog_update.inc -a
    sleep 30
done
) &

# run this in the foreground so Docker won't exit
# exec mysqld_safe
apachectl -DFOREGROUND
