<?php
$CONFIG = array (
  'data_directory' => '/mnt/data/files',
  'apps_paths' => 
  array (
    0 => 
    array (
      'path' => '/var/www/owncloud/apps',
      'url' => '/apps',
      'writable' => false,
    ),
    1 => 
    array (
      'path' => '/var/www/owncloud/custom',
      'url' => '/custom',
      'writable' => true,
    ),
  ),
  'dbtype' => 'mysql',
  'dbhost' => 'mariadb:3306',
  'dbname' => 'owncloud',
  'dbuser' => 'owncloud',
  'dbpassword' => 'owncloud',
  'dbtableprefix' => 'oc_',
  'trusted_domains' => 
  array (
    0 => 'localhost',
  ),
  'mysql.utf8mb4' => true,
  'passwordsalt' => '5YRwHVtiULRuikciz5H1l/DL+9PI1n',
  'secret' => 'WdxM+vdIrvQwfphBInO9MRylEun2eXKYS4jcLV8YCr92siKg',
  'datadirectory' => '/mnt/data/files',
  'overwrite.cli.url' => 'http://localhost/',
  'version' => '10.0.3.3',
  'logtimezone' => 'UTC',
  'installed' => true,
  'instanceid' => 'ocj4d93p7kin',
  'updatechecker' => 'false',
  'redis' => array('host' => 'redis', 'port' => 6379),
  'filelocking.enabled' => 'false',
  'memcache.local' => '\\OC\\Memcache\\APCu',
  'loglevel' => '0',
  'default_language' => 'en',
  'htaccess.RewriteBase' => '/',
  'memcache.distributed' => '\\OC\\Memcache\\Redis',
  'memcache.locking' => '\\OC\\Memcache\\Redis',
);
